<?php

namespace App\Console\Commands;

use App\Events\TaskEvent;
use App\Models\Company;
use App\Models\Task;
use Illuminate\Console\Command;
class AutoCreateRecurringTasks extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recurring-task-create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create recurring tasks';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Company::active()->select('id', 'timezone', 'default_task_status')->chunk(50, function ($companies) {

            foreach ($companies as $company) {

                $now = now($company->timezone);

                $repeatedTasks = Task::withCount('recurrings')
                    ->with('labels', 'users')
                    ->where('repeat', 1)
                    ->whereDate('start_date', '<', $now)
                    ->where('repeat_complete', 0)
                    ->where('company_id', $company->id)
                    ->get();

                $repeatedTasks->each(function ($task) use ($now, $company) {

                    if ($task->repeat_cycles == -1 || $task->recurrings_count < ($task->repeat_cycles - 1)) { // Subtract 1 to include original task

                        $startDate = $task->start_date->copy();
                        $endDate = (!is_null($task->due_date)) ? $task->due_date->copy() : null;
                        $repeatCount = $task->repeat_count + ($task->recurrings_count * $task->repeat_count);
                        $repeatStartDate = $now;
                        $repeatDueDate = (!is_null($endDate)) ? $now->copy()->addDays($endDate->diffInDays($startDate)) : null;
                        $isTaskCreate = false;

                        if ($task->repeat_type == 'day' && ($startDate->copy()->addDays($repeatCount)->isPast() || $startDate->copy()->addDays($repeatCount)->isToday())) {
                            $isTaskCreate = true;
                        }
                        elseif ($task->repeat_type == 'week' && ($startDate->copy()->addWeeks($repeatCount)->isPast() || $startDate->copy()->addWeeks($repeatCount)->isToday())) {
                            $isTaskCreate = true;

                        }
                        elseif ($task->repeat_type == 'month' && ($startDate->copy()->addMonths($repeatCount)->isPast() || $startDate->copy()->addMonths($repeatCount)->isToday())) {
                            $isTaskCreate = true;

                        }
                        elseif ($task->repeat_type == 'year' && ($startDate->copy()->addYears($repeatCount)->isPast() || $startDate->copy()->addYears($repeatCount)->isToday())) {
                            $isTaskCreate = true;
                        }

                        if ($isTaskCreate) {
                            $this->createTask($task, $repeatStartDate, $repeatDueDate, $company->default_task_status);

                            // Mark repeat complete if cycles are complete
                            if ($task->repeat_cycles != -1 && ($task->recurrings_count + 2) == $task->repeat_cycles) { // Add 2 to include newly created task and the original task
                                $task->repeat_complete = 1;
                                $task->save();
                            }

                        }

                    }
                });
            }
        });

        return Command::SUCCESS;

    }

    protected function createTask($task, $startDate, $endDate, $taskStatus)
    {
        $newTask = new Task();
        $newTask->heading = $task->heading;
        $newTask->company_id = $task->company_id;
        $newTask->description = $task->description;
        $newTask->start_date = $startDate->format('Y-m-d');
        $newTask->due_date = (!is_null($endDate)) ? $endDate->format('Y-m-d') : null;
        $newTask->project_id = $task->project_id;
        $newTask->task_category_id = $task->category_id;
        $newTask->priority = $task->priority;
        $newTask->repeat = 1;
        $newTask->board_column_id = $taskStatus;
        $newTask->recurring_task_id = $task->id;
        $newTask->is_private = $task->is_private;
        $newTask->billable = $task->billable;
        $newTask->estimate_hours = $task->estimate_hours;
        $newTask->estimate_minutes = $task->estimate_minutes;
        $newTask->save();

        $newTask->users()->sync($task->users->pluck('id')->toArray());
        $newTask->labels()->sync($task->labels->pluck('id')->toArray());

        foreach ($newTask->users as $key => $user) {
            event(new TaskEvent($newTask, $user, 'NewTask'));
        }

    }

}
