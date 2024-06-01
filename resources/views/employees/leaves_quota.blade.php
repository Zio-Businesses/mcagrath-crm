<div class="card w-100 rounded-0 border-0 comment">
    <div class="card-horizontal">
        <div class="card-body border-0 px-1 py-1">
            @if ($hasLeaveQuotas)
                <div class="card-text f-14 text-dark-grey text-justify">
                    <x-table class="table-bordered my-3 rounded">
                        <x-slot name="thead">
                            <th>@lang('modules.leaves.leaveType')</th>
                            <th class="text-right">@lang('modules.leaves.noOfLeaves')</th>
                            <th class="text-right">@lang('modules.leaves.monthLimit')</th>
                            <th class="text-right">@lang('app.totalLeavesTaken')</th>
                            <th class="text-right">@lang('modules.leaves.remainingLeaves')</th>
                        </x-slot>
                        @foreach ($employeeLeavesQuotas as $key => $leavesQuota)
                        @if($leavesQuota->leaveType->leaveTypeCondition($leavesQuota->leaveType,  $employee))
                        <tr>
                            <td>
                                <x-status :value="$leavesQuota->leaveType->type_name" :style="'color:'.$leavesQuota->leaveType->color" />
                            </td>
                            <td class="text-right">{{ $leavesQuota?->no_of_leaves ?: 0 }}</td>
                            <td class="text-right">{{ ($leavesQuota->leaveType->monthly_limit > 0) ? $leavesQuota->leaveType->monthly_limit : '--' }}</td>
                            <td class="text-right">
                                {{ $leavesQuota->leaves_used }}
                            </td>
                            <td class="text-right">{{ $leavesQuota->leaves_remaining }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </x-table>
                </div>
            @endif

            @if (!$hasLeaveQuotas)
                <x-cards.no-record icon="redo" :message="__('messages.noRecordFound')" />
            @endif
        </div>
    </div>
</div>
