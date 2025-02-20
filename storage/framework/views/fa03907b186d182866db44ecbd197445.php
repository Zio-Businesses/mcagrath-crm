<!-- ROW START -->
<div class="row py-0 py-md-0 py-lg-3 mt-4">
    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
        <!-- ACTIVITY DETAIL START -->
        <div class="p-activity-detail cal-info b-shadow-4" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500" id="projectActivityDetail">
            
            <?php $__empty_1 = true; $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card border-0 b-shadow-4 p-20 rounded">
                    <div class="card-horizontal">
                        <div class="card-img my-1 ml-0">
                            <img src="<?php echo e($history->user->image_url); ?>" alt="<?php echo e($history->user->name); ?>">
                        </div>
                        <div class="card-body border-0 pl-0 py-1 mb-2">
                            <div class="d-flex flex-grow-1">
                                <h4 class="card-title f-12 font-weight-normal text-dark mr-3 mb-1">
                                    <?php if($history->employee_activity == "leave-created" ): ?>
                                        <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?>  <span
                                            class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                            <a
                                            href="<?php echo e(route('leaves.show', $history->leave_id).'?tab=leaves'); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "leave-updated" ): ?>
                                        <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?>  <span
                                            class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                            href="<?php echo e(route('leaves.show', $history->leave_id).'?tab=leaves'); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "leave-deleted" ): ?>
                                        <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?>  <span
                                            class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>

                                    <?php if($history->employee_activity == "task-created" ): ?>
                                        <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                            class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                            href="<?php echo e(route('tasks.show', $history->task_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "task-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('tasks.show', $history->task_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "task-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "proposal-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('proposals.show', $history->proposal_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "proposal-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('proposals.show', $history->proposal_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "proposal-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "project-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('projects.show', $history->proj_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>

                                    <?php if($history->employee_activity == "project-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('projects.show', $history->proj_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "project-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "invoice-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('invoices.show', $history->invoice_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "invoice-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('invoices.show', $history->invoice_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "invoice-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "ticket-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('tickets.show', $history->ticket_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "ticket-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('tickets.show', $history->ticket_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "ticket-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "estimate-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('estimates.show', $history->estimate_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "estimate-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('estimates.show', $history->estimate_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "estimate-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "deal-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('deals.show', $history->deal_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "deal-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('deals.show', $history->deal_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "deal-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "client-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('clients.show', $history->client_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "client-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('clients.show', $history->client_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "client-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "expenses-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('expenses.show', $history->expenses_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "expenses-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('expenses.show', $history->expenses_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "expenses-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "timelog-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('timelogs.show', $history->timelog_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "timelog-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('timelogs.show', $history->timelog_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "timelog-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "event-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('events.show', $history->event_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "event-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('events.show', $history->event_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "event-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "product-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('products.show', $history->product_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "product-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('products.show', $history->product_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "product-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "creditNote-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('creditnotes.show', $history->credit_note_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "creditNote-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('creditnotes.show', $history->credit_note_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "creditNote-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "payment-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('payments.show', $history->payment_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "payment-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('payments.show', $history->payment_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "payment-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "order-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('orders.show', $history->order_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "order-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('orders.show', $history->order_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "order-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "contract-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('contracts.show', $history->contract_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "contract-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('contracts.show', $history->contract_id)); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "contract-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "followUp-created" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('deals.show', $history->deal_followup_id).'?tab=follow-up'); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "followUp-updated" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span><a
                                        href="<?php echo e(route('deals.show', $history->deal_followup_id).'?tab=follow-up'); ?>"> <?php echo e(__('modules.client.viewDetails')); ?></a>
                                    <?php endif; ?>
                                    <?php if($history->employee_activity == "followUp-deleted" ): ?>
                                    <?php echo e(__('modules.employees.activities.'.$history->employee_activity)); ?> <?php echo app('translator')->get('app.by'); ?> <span
                                        class="text-darkest-grey"><?php echo e($history->user->name); ?></span>
                                    <?php endif; ?>


                                </h4>

                            </div>
                            <div class="card-text f-11 text-lightest text-justify">

                                <span class="f-11 text-lightest">
                                    <?php echo e($history->created_at->timezone(company()->timezone)->translatedFormat(company()->date_format .' '. company()->time_format)); ?></span>
                            </div>
                        </div>
                    </div>
                </div><!-- card end -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="card border-0 p-20 rounded">
                    <div class="card-horizontal">

                        <div class="card-body border-0 p-0 ml-3">
                            <h4 class="card-title f-14 font-weight-normal">
                                <?php echo app('translator')->get('messages.noActivityByThisUser'); ?>
                            </h4>
                            <p class="card-text f-12 text-dark-grey"></p>
                        </div>
                    </div>
                </div><!-- card end -->
            <?php endif; ?>


        </div>
        <!-- ACTIVITY DETAIL END -->
    </div>
</div>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/employees/ajax/activity.blade.php ENDPATH**/ ?>