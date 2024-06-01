<?php

namespace App\Observers;

use App\Enums\MaritalStatus;
use Illuminate\Support\Carbon;
use App\Models\EmployeeDetails;
use App\Models\EmployeeLeaveQuota;

class EmployeeDetailsObserver
{

    public function saving(EmployeeDetails $detail)
    {
        if (!isRunningInConsoleOrSeeding() && auth()->check()) {
            $detail->last_updated_by = user()->id;
        }
    }

    public function creating(EmployeeDetails $detail)
    {
        if (!isRunningInConsoleOrSeeding() && auth()->check()) {
            $detail->added_by = user()->id;
        }

        $detail->company_id = $detail->user->company_id;

        if (is_null($detail->marital_status)) {
            $detail->marital_status = MaritalStatus::Single;
        }

    }

    public function created(EmployeeDetails $detail)
    {
        $leaveTypes = $detail->company->leaveTypes;
        $settings = company();

        foreach ($leaveTypes as $value) {
            $leaves = $value->no_of_leaves;

            if ($settings && $settings->leaves_start_from == 'year_start' && $detail->joining_date->year == now()->year) {
                $joiningDate = $detail->joining_date->copy();
                $leaveAdd = 0;

                if ($joiningDate->day > 15) {
                    $joiningDate = $joiningDate->addMonth();
                    $leaveAdd = floor(($leaves / 12) / 2);
                }

                $joiningDate = $joiningDate->startOfMonth();

                $startingDate = Carbon::create(now()->year + 1, $settings->year_starts_from)->startOfMonth();
                $differenceMonth = $joiningDate->diffInMonths($startingDate);
                $countOfMonthsAllowed = $differenceMonth > 12 ? $differenceMonth - 12 : $differenceMonth;

                $leaves = floor($value->no_of_leaves / 12 * $countOfMonthsAllowed) + $leaveAdd;
            }

            EmployeeLeaveQuota::create(
                [
                    'user_id' => $detail->user_id,
                    'leave_type_id' => $value->id,
                    'no_of_leaves' => $leaves,
                    'leaves_used' => 0,
                    'leaves_remaining' => $leaves,
                ]
            );
        }
    }

}
