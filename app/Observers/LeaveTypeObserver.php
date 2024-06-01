<?php

namespace App\Observers;

use App\Models\LeaveType;
use Illuminate\Support\Carbon;
use App\Models\EmployeeDetails;
use App\Models\EmployeeLeaveQuota;

class LeaveTypeObserver
{

    public function creating(LeaveType $leaveType)
    {
        if (company()) {
            $leaveType->company_id = company()->id;
        }
    }

    public function created(LeaveType $leaveType)
    {
        if (!isRunningInConsoleOrSeeding()) {
            $employees = EmployeeDetails::select('id', 'user_id', 'joining_date')->get();
            $settings = company();

            foreach ($employees as $key => $employee) {
                $leaves = $leaveType->no_of_leaves;

                if ($settings && $settings->leaves_start_from == 'year_start' && $employee->joining_date->year == now()->year) {
                    $joiningDate = $employee->joining_date->copy();
                    $leaveAdd = 0;

                    if ($joiningDate->day > 15) {
                        $joiningDate = $joiningDate->addMonth();
                        $leaveAdd = floor(($leaves / 12) / 2);
                    }

                    $joiningDate = $joiningDate->startOfMonth();

                    $startingDate = Carbon::create(now()->year + 1, $settings->year_starts_from)->startOfMonth();
                    $differenceMonth = $joiningDate->diffInMonths($startingDate);
                    $countOfMonthsAllowed = $differenceMonth > 12 ? $differenceMonth - 12 : $differenceMonth;

                    $leaves = floor($leaveType->no_of_leaves / 12 * $countOfMonthsAllowed) + $leaveAdd;
                }

                EmployeeLeaveQuota::create(
                    [
                        'user_id' => $employee->user_id,
                        'leave_type_id' => $leaveType->id,
                        'no_of_leaves' => $leaves,
                        'leaves_used' => 0,
                        'leaves_remaining' => $leaves,
                    ]
                );
            }
        }
    }

}
