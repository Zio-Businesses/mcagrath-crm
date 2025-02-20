

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/dropzone.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/tagify.css')); ?>">

    <style>
        .message-action {
            visibility: hidden;
        }

        .ticket-left .card:hover .message-action {
            visibility: visible;
        }

        .file-action {
            visibility: hidden;
        }

        .file-card:hover .file-action {
            visibility: visible;
        }

        .frappe-chart .chart-legend {
            display: none;
        }

        .ticket-overflow {
            overflow-y: auto;
        }

        .ticket-activity .recent-ticket-inner:before {
            background-color: #99a5b5;
            content: "";
            height: 100%;
            left: 10.9px;
            position: absolute;
            top: 4px;
            width: 1px;
        }

    </style>
    <script src="<?php echo e(asset('vendor/jquery/frappe-charts.min.iife.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery/Chart.min.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php
$editTicketPermission = user()->permission('edit_tickets');
$deleteTicketPermission = user()->permission('delete_tickets');
$manageTypePermission = user()->permission('manage_ticket_type');
$manageAgentPermission = user()->permission('manage_ticket_agent');
$manageChannelPermission = user()->permission('manage_ticket_channel');
$manageGroupPermission = user()->permission('manage_ticket_groups');
$canEditTicket = ($editTicketPermission == 'all' || ($editTicketPermission == 'owned' && $ticket->agent_id == user()->id));
?>

<?php $__env->startSection('filter-section'); ?>
    <!-- FILTER START -->
    <!-- TICKET HEADER START -->
    <div class="d-flex px-4 filter-box bg-white">

        <a href="javascript:;"
            class="d-flex align-items-center height-44 text-dark-grey text-capitalize border-right-grey pr-3 reply-button"><i
                class="fa fa-reply mr-0 mr-lg-2 mr-md-2"></i><span
                class="d-none d-lg-block d-md-block"><?php echo app('translator')->get('app.reply'); ?></span></a>

        

        <div id="ticket-closed" <?php if($ticket->status == 'closed'): ?> style="display:none" <?php endif; ?>>
            <a href="javascript:;" data-status="closed"
                class="d-flex align-items-center height-44 text-dark-grey text-capitalize border-right-grey px-3 submit-ticket"><i
                    class="fa fa-times-circle mr-0 mr-lg-2 mr-md-2"></i><span
                    class="d-none d-lg-block d-md-block"><?php echo app('translator')->get('app.close'); ?></span></a>
        </div>

        <?php if($deleteTicketPermission == 'all' || ($deleteTicketPermission == 'owned' && $ticket->agent_id == user()->id)): ?>
            <a href="javascript:;"
                class="d-flex align-items-center height-44 text-dark-grey text-capitalize border-right-grey px-3 delete-ticket"><i
                    class="fa fa-trash mr-0 mr-lg-2 mr-md-2"></i><span
                    class="d-none d-lg-block d-md-block"><?php echo app('translator')->get('app.delete'); ?></span>
            </a>
        <?php endif; ?>

        <a onclick="openTicketsSidebar()"
            class="d-flex d-lg-none ml-auto align-items-center justify-content-center height-44 text-dark-grey text-capitalize border-left-grey pl-3"><i
                class="fa fa-ellipsis-v"></i></a>

    </div>
    <!-- FILTER END -->
    <!-- TICKET HEADER END -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- TICKET START -->
    <div class="ticket-wrapper bg-white border-top-0 d-lg-flex">

        <!-- TICKET LEFT START -->
        <div class="ticket-left w-100">
            <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve(['method' => 'PUT'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'updateTicket2']); ?>
                <input type="hidden" name="status" id="status" value="<?php echo e($ticket->status); ?>">
                <input type="hidden" id="ticket_reply_id" value="">

                <!-- START -->
                <div id="ticket-info-bar" class="d-flex justify-content-between align-items-center p-3 border-right-grey border-bottom-grey">
                    <span>
                        <p class="f-15 f-w-500 mb-0"><?php echo e($ticket->subject); ?></p>
                        <p class="f-11 text-lightest mb-0"><?php echo app('translator')->get('modules.tickets.requestedOn'); ?>
                            <?php echo e($ticket->created_at->timezone(company()->timezone)->translatedFormat(company()->date_format . ' ' . company()->time_format)); ?>

                        </p>
                    </span>
                    <span id="ticketStatusBadge">
                        <?php if($ticket->status == 'open'): ?>
                            <?php
                                $statusColor = 'red';
                            ?>
                        <?php elseif($ticket->status == 'pending'): ?>
                            <?php
                                $statusColor = 'yellow';
                            ?>
                        <?php elseif($ticket->status == 'resolved'): ?>
                            <?php
                                $statusColor = 'dark-green';
                            ?>
                        <?php elseif($ticket->status == 'closed'): ?>
                            <?php
                                $statusColor = 'blue';
                            ?>
                        <?php endif; ?>
                        <p class="mb-0 text-capitalize ticket-status">
                           <?php echo $ticket->badge('span'); ?>

                            <?php if (isset($component)) { $__componentOriginal86883428e4629123511f221a5a89811e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal86883428e4629123511f221a5a89811e = $attributes; } ?>
<?php $component = App\View\Components\Status::resolve(['color' => $statusColor,'value' => __('app.'. $ticket->status)] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Status::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $attributes = $__attributesOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__attributesOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $component = $__componentOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__componentOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
                        </p>
                    </span>
                </div>
                <!-- END -->
                <!-- TICKET MESSAGE START -->
                <div class="ticket-msg border-right-grey" data-menu-vertical="1" data-menu-scroll="1"
                    data-menu-dropdown-timeout="500" id="ticketMsg">

                    <?php $__currentLoopData = $ticket->reply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal5d29d59e16b69dcc25c7cef2c3998a0d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5d29d59e16b69dcc25c7cef2c3998a0d = $attributes; } ?>
<?php $component = App\View\Components\Cards\Ticket::resolve(['message' => $reply,'user' => $reply->user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.ticket'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Ticket::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5d29d59e16b69dcc25c7cef2c3998a0d)): ?>
<?php $attributes = $__attributesOriginal5d29d59e16b69dcc25c7cef2c3998a0d; ?>
<?php unset($__attributesOriginal5d29d59e16b69dcc25c7cef2c3998a0d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5d29d59e16b69dcc25c7cef2c3998a0d)): ?>
<?php $component = $__componentOriginal5d29d59e16b69dcc25c7cef2c3998a0d; ?>
<?php unset($__componentOriginal5d29d59e16b69dcc25c7cef2c3998a0d); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <!-- TICKET MESSAGE END -->
                <div class="border-right-grey" id="ticketMsgBottom">
                    <div class="col-md-12 border-top d-none mb-5" id="reply-section">
                        <div class="form-group my-3">
                            <?php if($ticket->requester->id != user()->id || (!is_null($ticket->agent_id) && $ticket->agent_id != user()->id)): ?>
                            <p class="f-w-500">
                                <?php echo app('translator')->get('app.to'); ?>: <?php echo e(($ticket->requester->id != user()->id) ? $ticket->requester->name : $ticket->agent->name); ?>

                            </p>
                            <?php endif; ?>
                            <div id="description"></div>
                            <textarea name="message" id="description-text" class="d-none"></textarea>
                        </div>
                        <div class="my-3">
                            <a class="f-15 f-w-500" href="javascript:;" id="add-file"><i
                                    class="fa fa-paperclip font-weight-bold mr-1"></i><?php echo app('translator')->get('modules.projects.uploadFile'); ?></a>
                        </div>
                        <?php if (isset($component)) { $__componentOriginal22e84ee8172e1045de536542f4ffc9a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22e84ee8172e1045de536542f4ffc9a0 = $attributes; } ?>
<?php $component = App\View\Components\Forms\FileMultiple::resolve(['fieldLabel' => '','fieldName' => 'file[]','fieldId' => 'ticket-file-upload-dropzone'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-multiple'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileMultiple::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-0 mr-lg-2 mr-md-2 upload-section d-none']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22e84ee8172e1045de536542f4ffc9a0)): ?>
<?php $attributes = $__attributesOriginal22e84ee8172e1045de536542f4ffc9a0; ?>
<?php unset($__attributesOriginal22e84ee8172e1045de536542f4ffc9a0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22e84ee8172e1045de536542f4ffc9a0)): ?>
<?php $component = $__componentOriginal22e84ee8172e1045de536542f4ffc9a0; ?>
<?php unset($__componentOriginal22e84ee8172e1045de536542f4ffc9a0); ?>
<?php endif; ?>
                    </div>

                    <div class="ticket-reply-back justify-content-start px-lg-4 px-md-4 px-3 py-3  d-flex bg-white border-top-grey"
                        id="reply-section-action">

                        <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'reply'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'reply-button mr-3']); ?><?php echo app('translator')->get('app.reply'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $attributes = $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $component = $__componentOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['link' => route('tickets.index'),'icon' => 'arrow-left'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo app('translator')->get('app.back'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $attributes = $__attributesOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__attributesOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $component = $__componentOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__componentOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>

                    </div>
                    <div class="ticket-reply-back flex-row justify-content-start px-lg-4 px-md-4 px-3 py-3 c-inv-btns bg-white border-top-grey d-none"
                        id="reply-section-action-2">
                        <?php if($editTicketPermission == 'all'
                        || ($editTicketPermission == 'added' && user()->id == $ticket->added_by)
                        || ($editTicketPermission == 'owned' && (user()->id == $ticket->user_id || $ticket->agent_id == user()->id))
                        || ($editTicketPermission == 'both' && (user()->id == $ticket->user_id || $ticket->agent_id == user()->id || $ticket->added_by == user()->id))): ?>
                            <div class="inv-action dropup mr-3">
                                <button class="btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <?php echo app('translator')->get('app.submit'); ?>
                                    <span><i class="fa fa-chevron-up f-15 text-white"></i></span>
                                </button>
                                <!-- DROPDOWN - INFORMATION -->
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuBtn" tabindex="0">
                                    <li>
                                        <a class="dropdown-item f-14 text-dark submit-ticket" href="javascript:;"
                                            data-status="open">
                                            <?php if (isset($component)) { $__componentOriginal86883428e4629123511f221a5a89811e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal86883428e4629123511f221a5a89811e = $attributes; } ?>
<?php $component = App\View\Components\Status::resolve(['color' => 'red','value' => __('modules.tickets.submitOpen')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Status::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $attributes = $__attributesOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__attributesOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $component = $__componentOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__componentOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item f-14 text-dark submit-ticket" href="javascript:;"
                                            data-status="pending">
                                            <?php if (isset($component)) { $__componentOriginal86883428e4629123511f221a5a89811e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal86883428e4629123511f221a5a89811e = $attributes; } ?>
<?php $component = App\View\Components\Status::resolve(['color' => 'yellow','value' => __('modules.tickets.submitPending')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Status::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $attributes = $__attributesOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__attributesOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $component = $__componentOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__componentOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item f-14 text-dark submit-ticket" href="javascript:;"
                                            data-status="resolved">
                                            <?php if (isset($component)) { $__componentOriginal86883428e4629123511f221a5a89811e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal86883428e4629123511f221a5a89811e = $attributes; } ?>
<?php $component = App\View\Components\Status::resolve(['color' => 'dark-green','value' => __('modules.tickets.submitResolved')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Status::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $attributes = $__attributesOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__attributesOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $component = $__componentOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__componentOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item f-14 text-dark submit-ticket" href="javascript:;"
                                            data-status="closed">
                                            <?php if (isset($component)) { $__componentOriginal86883428e4629123511f221a5a89811e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal86883428e4629123511f221a5a89811e = $attributes; } ?>
<?php $component = App\View\Components\Status::resolve(['color' => 'blue','value' => __('modules.tickets.submitClosed')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Status::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $attributes = $__attributesOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__attributesOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $component = $__componentOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__componentOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-status' => 'open','class' => 'submit-ticket mr-3']); ?>
                                <?php echo app('translator')->get('app.submit'); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $attributes = $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $component = $__componentOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
                        <?php endif; ?>

                        <?php if(!in_array('client', user_roles())): ?>
                            <div class="inv-action dropup mr-3">
                                <button class="btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bolt f-15 mr-1"></i>
                                    <?php echo app('translator')->get('modules.tickets.applyTemplate'); ?>
                                    <span><i class="fa fa-chevron-up f-15"></i></span>
                                </button>
                                <!-- DROPDOWN - INFORMATION -->
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuBtn" tabindex="0">
                                    <?php $__empty_1 = true; $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <li><a href="javascript:;" data-template-id="<?php echo e($template->id); ?>"
                                                class="dropdown-item f-14 text-dark apply-template"><?php echo e($template->reply_heading); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <li><a class="dropdown-item f-14 text-dark"><?php echo app('translator')->get('messages.noTemplateFound'); ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal29acd9b76240152ae380821b082bd629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal29acd9b76240152ae380821b082bd629 = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkSecondary::resolve(['link' => 'javascript:;'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'cancel-reply','class' => 'border-0']); ?><?php echo app('translator')->get('app.cancel'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $attributes = $__attributesOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__attributesOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal29acd9b76240152ae380821b082bd629)): ?>
<?php $component = $__componentOriginal29acd9b76240152ae380821b082bd629; ?>
<?php unset($__componentOriginal29acd9b76240152ae380821b082bd629); ?>
<?php endif; ?>

                    </div>
            </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $attributes = $__attributesOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $component = $__componentOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__componentOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
        </div>
        <!-- TICKET LEFT END -->

        <!-- TICKET RIGHT START -->
        <div class="mobile-close-overlay w-100 h-100" id="close-tickets-overlay"></div>
        <div class="ticket-right bg-white ticket-sidebar" id="ticket-detail-contact">
            <a class="d-block d-lg-none close-it" id="close-tickets"><i class="fa fa-times"></i></a>
            <div id="tabs">
                <nav class="tabs px-2 border-bottom-grey">
                    <div class="nav" id="nav-tab" role="tablist">
                        <?php if($canEditTicket): ?>
                        <a class="nav-item nav-link f-14 active" id="nav-detail-tab" data-toggle="tab"
                            href="#nav-details" role="tab" aria-controls="nav-email"
                            aria-selected="false"><?php echo app('translator')->get('app.details'); ?></a>
                        <?php endif; ?>
                        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'nav-item nav-link f-14',
                            'active' => !$canEditTicket
                        ]); ?>"
                        id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                            role="tab" aria-controls="nav-slack" aria-selected="true"><?php echo app('translator')->get('app.contact'); ?></a>
                        <a class="nav-item nav-link f-14" id="nav-other-tab" data-toggle="tab" href="#nav-other"
                            role="tab"><?php echo app('translator')->get('app.other'); ?></a>
                        <a class="nav-item nav-link f-14" id="nav-activity-tab" data-toggle="tab" href="#nav-activity"
                            role="tab"><?php echo app('translator')->get('app.activity'); ?></a>
                    </div>
                </nav>
            </div>
            <div class="tab-content h-100" id="nav-tabContent">
                <!-- DETAILS START -->
                <?php if($canEditTicket): ?>
                <div class="tab-pane fade h-100 show active" id="nav-details" role="tabpanel"
                    aria-labelledby="nav-detail-tab">
                    <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'updateTicket1']); ?>
                        <!-- TICKET FILTERS START -->
                        <div id="updateTicketForm" class="ticket-overflow p-4 w-100 position-relative border-bottom">
                            <div class="more-filter-items mb-4">
                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'group_id','fieldLabel' => __('modules.tickets.assignGroup')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'my-3']); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $attributes; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <select class="form-control select-picker " name="group_id" id="group_id"
                                        data-live-search="true" data-container="body" data-size="8">
                                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($group->id == $ticket->group_id): echo 'selected'; endif; ?> value="<?php echo e($group->id); ?>"><?php echo e($group->group_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($manageGroupPermission == 'all'): ?>
                                         <?php $__env->slot('append', null, []); ?> 
                                            <button id="manage-groups" type="button"
                                                class="btn btn-outline-secondary border-grey"><?php echo app('translator')->get('app.add'); ?></button>
                                         <?php $__env->endSlot(); ?>
                                    <?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $attributes = $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $component = $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>
                            </div>
                            <div class="more-filter-items mb-4">
                                <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'agent_id','fieldLabel' => __('modules.tickets.agent')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'my-3']); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $attributes; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <select class="form-control select-picker " name="agent_id" id="agent_id"
                                        data-live-search="true" data-container="body" data-size="8">
                                        <option value="">--</option>
                                    </select>
                                    <?php if($manageAgentPermission == 'all'): ?>
                                         <?php $__env->slot('append', null, []); ?> 
                                            <button id="addAgent" type="button"
                                                class="btn btn-outline-secondary border-grey"><?php echo app('translator')->get('app.add'); ?></button>
                                         <?php $__env->endSlot(); ?>
                                    <?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $attributes = $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $component = $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>
                            </div>
                            <div class="more-filter-items">
                                <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'priority','fieldLabel' => __('modules.tasks.priority'),'fieldName' => 'priority'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-container' => 'body']); ?>
                                    <option <?php if($ticket->priority == 'low'): echo 'selected'; endif; ?> value="low"
                                            data-content="<i class='fa fa-circle mr-2 text-dark-green'></i> <?php echo e(__('app.low')); ?>"
                                    ><?php echo app('translator')->get('app.low'); ?></option>
                                    <option <?php if($ticket->priority == 'medium'): echo 'selected'; endif; ?> value="medium"
                                            data-content="<i class='fa fa-circle mr-2 text-blue'></i> <?php echo e(__('app.medium')); ?>"
                                    ><?php echo app('translator')->get('app.medium'); ?></option>
                                    <option <?php if($ticket->priority == 'high'): echo 'selected'; endif; ?> value="high"
                                            data-content="<i class='fa fa-circle mr-2 text-warning'></i> <?php echo e(__('app.high')); ?>"
                                    ><?php echo app('translator')->get('app.high'); ?></option>
                                    <option <?php if($ticket->priority == 'urgent'): echo 'selected'; endif; ?> value="urgent"
                                            data-content="<i class='fa fa-circle mr-2 text-red'></i> <?php echo e(__('app.urgent')); ?>"
                                    ><?php echo app('translator')->get('app.urgent'); ?></option>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $attributes = $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $component = $__componentOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
                            </div>
                            <div class="more-filter-items mb-4">
                                <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'ticket_type_id','fieldLabel' => __('modules.invoices.type')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'my-3']); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $attributes; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <select class="form-control select-picker" name="type_id" id="ticket_type_id"
                                        data-container="body" data-live-search="true" data-size="8">
                                        <option value="">--</option>
                                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($type->id == $ticket->type_id): echo 'selected'; endif; ?> value="<?php echo e($type->id); ?>">
                                                <?php echo e($type->type); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($manageTypePermission == 'all'): ?>
                                         <?php $__env->slot('append', null, []); ?> 
                                            <button id="addTicketType" type="button"
                                                class="btn btn-outline-secondary border-grey"><?php echo app('translator')->get('app.add'); ?></button>
                                         <?php $__env->endSlot(); ?>
                                    <?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $attributes = $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $component = $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>
                            </div>
                            <div class="more-filter-items mb-4">
                                <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'ticket_channel_id','fieldLabel' => __('modules.tickets.channelName')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'my-3']); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7 = $attributes; } ?>
<?php $component = App\View\Components\Forms\InputGroup::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.input-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\InputGroup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <select class="form-control select-picker" name="channel_id" id="ticket_channel_id"
                                        data-container="body" data-live-search="true" data-size="8">
                                        <option value="">--</option>
                                        <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($channel->id == $ticket->channel_id): echo 'selected'; endif; ?> value="<?php echo e($channel->id); ?>">
                                                <?php echo e($channel->channel_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($manageChannelPermission == 'all'): ?>
                                         <?php $__env->slot('append', null, []); ?> 
                                            <button id="addChannel" type="button"
                                                class="btn btn-outline-secondary border-grey"><?php echo app('translator')->get('app.add'); ?></button>
                                         <?php $__env->endSlot(); ?>
                                    <?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $attributes = $__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__attributesOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7)): ?>
<?php $component = $__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7; ?>
<?php unset($__componentOriginalcbf9105fd4879d5d6ef9e1f6fe271af7); ?>
<?php endif; ?>
                            </div>
                            <div class="more-filter-items">
                                <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['fieldId' => 'ticket-status','fieldLabel' => __('app.status'),'fieldName' => 'status'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-container' => 'body']); ?>
                                    <option <?php if($ticket->status == 'open'): echo 'selected'; endif; ?> value="open"
                                        data-content="<i class='fa fa-circle mr-2 text-red'></i><?php echo e(__('app.open')); ?>">
                                        <?php echo app('translator')->get('app.open'); ?>
                                    </option>
                                    <option <?php if($ticket->status == 'pending'): echo 'selected'; endif; ?> value="pending"
                                        data-content="<i class='fa fa-circle mr-2 text-yellow'></i><?php echo e(__('app.pending')); ?>">
                                        <?php echo app('translator')->get('app.pending'); ?></option>
                                    <option <?php if($ticket->status == 'resolved'): echo 'selected'; endif; ?> value="resolved"
                                        data-content="<i class='fa fa-circle mr-2 text-dark-green'></i><?php echo e(__('app.resolved')); ?>">
                                        <?php echo app('translator')->get("app.resolved"); ?></option>
                                    <option <?php if($ticket->status == 'closed'): echo 'selected'; endif; ?> value="closed"
                                        data-content="<i class='fa fa-circle mr-2 text-blue'></i><?php echo e(__('app.closed')); ?>">
                                        <?php echo app('translator')->get('app.closed'); ?></option>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $attributes = $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $component = $__componentOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
                            </div>
                            <div class="more-filter-items">
                                <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldId' => 'tags','fieldLabel' => __('modules.tickets.tags')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'my-3']); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                                <input type="text" name="tags" id="tags" class="rounded f-14"
                                    value="<?php echo e(implode(',', $ticket->ticketTags->pluck('tag_name')->toArray())); ?>">
                            </div>
                        </div>
                        <!-- TICKET FILTERS END -->
                        <!-- TICKET UPDATE START -->
                        <div id="updateTicketFormSubmit" class="ticket-update bg-white px-4 py-3">
                            <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-none d-flex submit-ticket-2 fixed-bottom']); ?>
                                <?php echo app('translator')->get('app.update'); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $attributes = $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $component = $__componentOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
                        </div>
                        <!-- TICKET UPDATE END -->
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $attributes = $__attributesOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $component = $__componentOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__componentOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
                </div>
                <?php endif; ?>
                <!-- DETAILS END -->
                <!-- CONTACT START -->
                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'tab-pane fade',
                    'show active' => !$canEditTicket
                ]); ?>"
                class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <!-- CONTACT OWNER START  -->
                    <div class="card-horizontal bg-white-shade ticket-contact-owner p-4 rounded-0">
                        <div class="card-img mr-3">
                            <img class="___class_+?88___" src="<?php echo e($ticket->requester->image_url); ?>"
                                alt="<?php echo e($ticket->requester->name); ?>">
                        </div>
                        <div class="card-body border-0 p-0 w-100">
                            <h4 class="card-title f-14 font-weight-normal mb-0">
                                <a class="text-dark-grey" <?php if($ticket->requester->hasRole('employee')): ?>
                                    href="<?php echo e(route('employees.show', $ticket->requester->id)); ?>"
                                <?php else: ?>
                                    href="<?php echo e(route('clients.show', $ticket->requester->id)); ?>"
                                <?php endif; ?>>
                                <?php echo e($ticket->requester->name); ?>

                                </a>
                            </h4>
                            <?php if($ticket->requester->country_id): ?>
                                <span class="card-text f-12 text-dark-grey text-capitalize d-flex align-items-center">
                                    <span class='flag-icon flag-icon-<?php echo e(strtolower($ticket->requester->country->iso)); ?> mr-2'></span>
                                    <?php echo e($ticket->requester->country->nicename); ?>

                                </span>
                            <?php else: ?>
                                --
                            <?php endif; ?>

                        </div>
                    </div>
                    <!-- CONTACT OWNER END  -->
                    <!-- TICKET CHART START  -->
                    <?php if (isset($component)) { $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9 = $attributes; } ?>
<?php $component = App\View\Components\Cards\Data::resolve(['title' => __('app.menu.tickets'),'padding' => 'false'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\Data::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginalb982231180e038d497f4b363f639c469 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb982231180e038d497f4b363f639c469 = $attributes; } ?>
<?php $component = App\View\Components\PieChart::resolve(['labels' => $ticketChart['labels'],'values' => $ticketChart['values'],'colors' => $ticketChart['colors']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pie-chart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PieChart::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'ticket-chart','height' => '200','width' => '220']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb982231180e038d497f4b363f639c469)): ?>
<?php $attributes = $__attributesOriginalb982231180e038d497f4b363f639c469; ?>
<?php unset($__attributesOriginalb982231180e038d497f4b363f639c469); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb982231180e038d497f4b363f639c469)): ?>
<?php $component = $__componentOriginalb982231180e038d497f4b363f639c469; ?>
<?php unset($__componentOriginalb982231180e038d497f4b363f639c469); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $attributes = $__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__attributesOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9)): ?>
<?php $component = $__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9; ?>
<?php unset($__componentOriginalbc9540fa671f26a0f8028a5a8d8f93e9); ?>
<?php endif; ?>
                    <!-- TICKET CHART END  -->
                    <!-- RECENT TICKETS START -->
                    <div class="card pt-4 px-4 border-grey border-left-0 border-right-0 rounded-0">
                        <div class="card-title">
                            <h4 class="f-18 f-w-500 text-capitalize mb-3"><?php echo app('translator')->get('modules.tickets.recentTickets'); ?></h4>
                        </div>
                        <!-- CHART START -->
                        <div class="card-body p-0">
                            <div class="recent-ticket position-relative" data-menu-vertical="1" data-menu-scroll="1"
                                data-menu-dropdown-timeout="500" id="recentTickets">
                                <div class="recent-ticket-inner position-relative">
                                    <?php $__currentLoopData = $ticket->requester->tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="r-t-items d-flex">
                                            <div class="r-t-items-left text-lightest f-21">
                                                <i class="fa fa-ticket-alt"></i>
                                            </div>
                                            <div class="r-t-items-right ">
                                                <h3 class="f-14 font-weight-bold">
                                                    <a class="text-dark"
                                                        href="<?php echo e(route('tickets.show', $item->ticket_number)); ?>"><?php echo e($item->subject); ?></a>
                                                </h3>
                                                <span class="d-flex mb-1">
                                                    <span class="mr-3 f-w-500 text-dark-grey">#<?php echo e($item->ticket_number); ?></span>
                                                    <?php if($item->status == 'open'): ?>
                                                        <?php
                                                            $statusColor = 'red';
                                                        ?>
                                                    <?php elseif($item->status == 'pending'): ?>
                                                        <?php
                                                            $statusColor = 'yellow';
                                                        ?>
                                                    <?php elseif($item->status == 'resolved'): ?>
                                                        <?php
                                                            $statusColor = 'dark-green';
                                                        ?>
                                                    <?php elseif($item->status == 'closed'): ?>
                                                        <?php
                                                            $statusColor = 'blue';
                                                        ?>
                                                    <?php endif; ?>
                                                    <span class="f-13 text-darkest-grey text-capitalize">
                                                        <?php if (isset($component)) { $__componentOriginal86883428e4629123511f221a5a89811e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal86883428e4629123511f221a5a89811e = $attributes; } ?>
<?php $component = App\View\Components\Status::resolve(['color' => $statusColor,'value' => $item->status] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Status::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $attributes = $__attributesOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__attributesOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal86883428e4629123511f221a5a89811e)): ?>
<?php $component = $__componentOriginal86883428e4629123511f221a5a89811e; ?>
<?php unset($__componentOriginal86883428e4629123511f221a5a89811e); ?>
<?php endif; ?>
                                                    </span>

                                                </span>
                                                <p class="f-12 text-dark-grey">
                                                    <?php echo e($item->created_at->timezone(company()->timezone)->translatedFormat(company()->date_format . ' ' . company()->time_format)); ?>

                                                </p>
                                            </div>
                                        </div><!-- item end -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                        </div>
                        <!-- CHART END -->
                    </div>
                    <!-- RECENT TICKETS END -->
                </div>
            <!-- CONTACT END -->

                <div class="tab-pane fade" id="nav-other" role="tabpanel" aria-labelledby="nav-other-tab">
                    <?php if($ticket->project): ?>
                        <div class="p-4 w-100 position-relative border-bottom">
                            <?php echo app('translator')->get('app.project'); ?> : <a
                            href="<?php echo e(route('projects.show', $ticket->project_id)); ?>"><?php echo e($ticket->project->project_name); ?></a>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'updateOther']); ?>
                        <!-- TICKET FILTERS START -->
                        <div class="ticket-filters p-4 w-100 position-relative border-bottom">
                            <?php if (isset($component)) { $__componentOriginalc7faf3da9dd03559633827985b4aafa9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7faf3da9dd03559633827985b4aafa9 = $attributes; } ?>
<?php $component = App\View\Components\Forms\CustomFieldShow::resolve(['fields' => $fields,'model' => $ticket] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.custom-field-show'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\CustomFieldShow::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7faf3da9dd03559633827985b4aafa9)): ?>
<?php $attributes = $__attributesOriginalc7faf3da9dd03559633827985b4aafa9; ?>
<?php unset($__attributesOriginalc7faf3da9dd03559633827985b4aafa9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7faf3da9dd03559633827985b4aafa9)): ?>
<?php $component = $__componentOriginalc7faf3da9dd03559633827985b4aafa9; ?>
<?php unset($__componentOriginalc7faf3da9dd03559633827985b4aafa9); ?>
<?php endif; ?>
                        </div>
                        <!-- TICKET FILTERS END -->
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $attributes = $__attributesOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $component = $__componentOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__componentOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
                </div>

                <div class="tab-pane fade h-100" id="nav-activity" role="tabpanel" aria-labelledby="nav-activity-tab">
                    <!-- Activity TICKETS START -->
                    <div class="card pt-4 pl-4 border-grey border-left-0 border-right-0 rounded-0 h-100">
                        <div class="card-title">
                            <h4 class="f-18 f-w-500 text-capitalize mb-3"><?php echo app('translator')->get('app.ticketActivity'); ?></h4>
                        </div>
                        <!-- CHART START -->
                        <div class="card-body p-0">
                            <div class="ticket-activity ticket-overflow position-relative h-100" data-menu-vertical="1" data-menu-scroll="1"
                                data-menu-dropdown-timeout="500" id="ticketActivity">
                                <div class="recent-ticket-inner position-relative">
                                    <?php $__currentLoopData = $ticket->activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="r-t-items d-flex">
                                            <div class="r-t-items-left text-lightest f-21">
                                                <i class="fa fa-ticket-alt"></i>
                                            </div>
                                            <div class="r-t-items-right pl-2 w-100">
                                                <h3 class="f-14 font-weight-bold">
                                                    <?php echo e($activity->user->name); ?>

                                                </h3>
                                                <span class="d-flex mb-1">
                                                    <span class="mr-3 f-w-500 text-dark-grey">
                                                        <?php echo e($activity->details); ?>

                                                    </span>
                                                </span>
                                                <p class="f-12 text-dark-grey">
                                                    <?php echo e($activity->created_at->timezone(company()->timezone)->translatedFormat(company()->date_format . ' ' . company()->time_format)); ?>

                                                </p>
                                            </div>
                                        </div><!-- item end -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                        </div>
                        <!-- CHART END -->
                    </div>
                    <!-- Activity TICKETS END -->
                </div>
            </div>
        </div>
        <!-- TICKET RIGHT END -->

    </div>
<!-- TICKET END -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('vendor/jquery/tagify.min.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            quillImageLoad('#description');
        });

        $('.reply-button').click(function() {
            $('#reply-section-action').toggleClass('d-none d-flex');
            $('#reply-section-action-2').toggleClass('d-none flex-row');
            $('#reply-section').removeClass('d-none');
            window.scrollTo(0, document.body.scrollHeight);
            setViewHeight();
        });

        $('#cancel-reply').click(function() {
            $('#reply-section-action').toggleClass('d-none d-flex');
            $('#reply-section-action-2').toggleClass('d-none flex-row');
            $('#reply-section').addClass('d-none');
            window.scrollTo(0, document.body.scrollHeight);
            setViewHeight();
        });

        $('#add-file').click(function() {
            $('.upload-section').removeClass('d-none');
            $('#add-file').addClass('d-none');
            window.scrollTo(0, document.body.scrollHeight);
        });

        var input = document.querySelector('input[name=tags]'),
            // init Tagify script on the above inputs
            tagify = new Tagify(input);

            Dropzone.autoDiscover = false;
        //Dropzone class
        ticketDropzone = new Dropzone("div#ticket-file-upload-dropzone", {
            dictDefaultMessage: "<?php echo e(__('app.dragDrop')); ?>",
            url: "<?php echo e(route('ticket-files.store')); ?>",
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            paramName: "file",
            maxFilesize: DROPZONE_MAX_FILESIZE,
            maxFiles: DROPZONE_MAX_FILES,
            autoProcessQueue: false,
            uploadMultiple: true,
            addRemoveLinks: true,
            parallelUploads: DROPZONE_MAX_FILES,
            acceptedFiles: DROPZONE_FILE_ALLOW,
            init: function() {
                ticketDropzone = this;
            }
        });
        ticketDropzone.on('sending', function(file, xhr, formData) {
            var ids = $('#ticket_reply_id').val();
            formData.append('ticket_reply_id', ids);
            formData.append('ticket_id', '<?php echo e($ticket->id); ?>');
            $.easyBlockUI();
        });
        ticketDropzone.on('uploadprogress', function() {
            $.easyBlockUI();
        });
        ticketDropzone.on('queuecomplete', function() {
            var msgs = "<?php echo app('translator')->get('messages.addDiscussion'); ?>";
            window.location.href = "<?php echo e(route('tickets.show', $ticket->ticket_number)); ?>";
        });
        ticketDropzone.on('removedfile', function () {
            var grp = $('div#file-upload-dropzone').closest(".form-group");
            var label = $('div#file-upload-box').siblings("label");
            $(grp).removeClass("has-error");
            $(label).removeClass("is-invalid");
        });
        ticketDropzone.on('error', function (file, message) {
            ticketDropzone.removeFile(file);
            var grp = $('div#file-upload-dropzone').closest(".form-group");
            var label = $('div#file-upload-box').siblings("label");
            $(grp).find(".help-block").remove();
            var helpBlockContainer = $(grp);

            if (helpBlockContainer.length == 0) {
                helpBlockContainer = $(grp);
            }

            helpBlockContainer.append('<div class="help-block invalid-feedback">' + message + '</div>');
            $(grp).addClass("has-error");
            $(label).addClass("is-invalid");

        });

        $('.submit-ticket').click(function() {
            var note = document.getElementById('description').children[0].innerHTML;
            document.getElementById('description-text').value = note;

            var status = $(this).data('status');
            $('#status').val(status);

            const url = "<?php echo e(route('tickets.update', $ticket->id)); ?>";

            $.easyAjax({
                url: url,
                container: '#ticketMsg',
                type: "POST",
                blockUI: true,
                data: $('#updateTicket2').serialize(),
                success: function(response) {

                    if (response.status == 'success') {
                        if (ticketDropzone.getQueuedFiles().length > 0) {
                            $('#ticket_reply_id').val(response.reply_id);
                            ticketDropzone.processQueue();
                        } else {
                            window.location.href = "<?php echo e(route('tickets.show', $ticket->ticket_number)); ?>";
                        }
                    }
                }
            });
        });

        $('.submit-ticket-2').click(function() {

            $.easyAjax({
                url: "<?php echo e(route('tickets.update_other_data', $ticket->id)); ?>",
                container: '#updateTicket1',
                type: "POST",
                blockUI: true,
                disableButton: true,
                buttonSelector: ".submit-ticket-2",
                data: $('#updateTicket1').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        var status = $('#ticket-status').val();

                        ($('#ticket-status').val() != 'closed') ? $('#ticket-closed').show() :  $('#ticket-closed').hide();

                        switch (status) {
                            case 'open':
                                var statusHtml =
                                    '<i class="fa fa-circle mr-2 text-red"></i><?php echo app('translator')->get("app.open"); ?>';
                                break;
                            case 'pending':
                                var statusHtml =
                                    '<i class="fa fa-circle mr-2 text-yellow"></i><?php echo app('translator')->get("app.pending"); ?>';
                                break;
                            case 'resolved':
                                var statusHtml =
                                    '<i class="fa fa-circle mr-2 text-dark-green"></i><?php echo app('translator')->get("app.resolved"); ?>';
                                break;
                            case 'closed':
                                var statusHtml =
                                    '<i class="fa fa-circle mr-2 text-blue"></i><?php echo app('translator')->get("app.closed"); ?>';
                                break;

                            default:
                                var statusHtml =
                                    '<i class="fa fa-circle mr-2 text-red"></i><?php echo app('translator')->get("app.open"); ?>';
                                break;
                        }
                        $('#ticketStatusBadge').html(statusHtml);
                    }
                }
            })
        });


        $('.apply-template').click(function() {
            var templateId = $(this).data('template-id');

            $.easyAjax({
                url: "<?php echo e(route('replyTemplates.fetchTemplate')); ?>",
                data: {
                    templateId: templateId
                },
                success: function(response) {
                    if (response.status == "success") {
                        var container = $('#description').get(0);
                        var quill = new Quill(container);
                        quill.clipboard.dangerouslyPasteHTML(0, response.replyText);
                    }
                }
            })
        })


        $('body').on('click', '.delete-file', function() {
            var id = $(this).data('row-id');
            var replyFile = $(this);
            Swal.fire({
                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                text: "<?php echo app('translator')->get('messages.recoverRecord'); ?>",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "<?php echo app('translator')->get('messages.confirmDelete'); ?>",
                cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
                customClass: {
                    confirmButton: 'btn btn-primary mr-3',
                    cancelButton: 'btn btn-secondary'
                },
                showClass: {
                    popup: 'swal2-noanimation',
                    backdrop: 'swal2-noanimation'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = "<?php echo e(route('ticket-files.destroy', ':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {
                            '_token': token,
                            '_method': 'DELETE'
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                replyFile.closest('.card').remove();
                            }
                        }
                    });
                }
            });
        });

        $('body').on('click', '.delete-ticket', function() {
            Swal.fire({
                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                text: "<?php echo app('translator')->get('messages.recoverRecord'); ?>",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "<?php echo app('translator')->get('messages.confirmDelete'); ?>",
                cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
                customClass: {
                    confirmButton: 'btn btn-primary mr-3',
                    cancelButton: 'btn btn-secondary'
                },
                showClass: {
                    popup: 'swal2-noanimation',
                    backdrop: 'swal2-noanimation'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = "<?php echo e(route('tickets.destroy', $ticket->id)); ?>";

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {
                            '_token': token,
                            '_method': 'DELETE'
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                window.location.href =
                                    "<?php echo e(route('tickets.index')); ?>";
                            }
                        }
                    });
                }
            });
        });

        $('body').on('click', '.delete-message', function() {
            var id = $(this).data('row-id');
            Swal.fire({
                title: "<?php echo app('translator')->get('messages.sweetAlertTitle'); ?>",
                text: "<?php echo app('translator')->get('messages.recoverRecord'); ?>",
                icon: 'warning',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: "<?php echo app('translator')->get('messages.confirmDelete'); ?>",
                cancelButtonText: "<?php echo app('translator')->get('app.cancel'); ?>",
                customClass: {
                    confirmButton: 'btn btn-primary mr-3',
                    cancelButton: 'btn btn-secondary'
                },
                showClass: {
                    popup: 'swal2-noanimation',
                    backdrop: 'swal2-noanimation'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = "<?php echo e(route('ticket-replies.destroy', ':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {
                            '_token': token,
                            '_method': 'DELETE'
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                $('#message-' + id).remove();
                            }
                        }
                    });
                }
            });
        });

        /* open add agent modal */
        $('body').on('click', '#addAgent', function() {
            var url = "<?php echo e(route('ticket-agents.create')); ?>";
            $(MODAL_XL + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_XL, url);
        });

        $('body').on('click', '#addChannel', function() {
            var url = "<?php echo e(route('ticketChannels.create')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        /* open add agent modal */
        $('body').on('click', '#addTicketType', function() {
            var url = "<?php echo e(route('ticketTypes.create')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });


        function scrollToBottom(divId) {
            var myDiv = document.getElementById(divId);
            myDiv.scrollTop = myDiv.scrollHeight;
        }

        scrollToBottom('ticketMsg');

        getAgents($('#group_id').val());

        function getAgents(groupId){
            var url = "<?php echo e(route('tickets.agent_group', ':id').'?ticketNumber='.$ticket->ticket_number); ?>";
            url = url.replace(':id', groupId);
            $.easyAjax({
                url: url,
                type: "GET",
                // data: ticket_number,
                success: function(response)
                {
                    var options = [];
                    var rData = [];
                    if($.isArray(response.data))
                    {
                        rData = response.data;
                        $.each(rData, function(index, value) {
                            var selectData = '';
                            options.push(value);
                        });
                        $('#agent_id').html('<option value="">--</option>' + options);
                    }
                    else
                    {
                        $('#agent_id').html(response.data);
                    }
                    $('#agent_id').selectpicker('refresh');
                }
            });
        }

        $('#group_id').change(function(){
            var id = $(this).val();
            getAgents(id)
        });

        $('#manage-groups').click(function() {
            var url = "<?php echo e(route('ticket-groups.create')); ?>";
            $(MODAL_LG + ' ' + MODAL_HEADING).html('...');
            $.ajaxModal(MODAL_LG, url);
        });

        function setViewHeight() {
            let otherBodyHeight = $('#header').outerHeight() + $('.filter-box').outerHeight();

            document.getElementById("ticket-detail-contact").style.height = "calc(100vh - " + (
                $('#tabs').outerHeight() + otherBodyHeight
            ) + "px)";
            document.getElementById("ticketMsg").style.height = "calc(100vh - " + (
                otherBodyHeight + $('#ticket-info-bar').outerHeight() +
                $('#ticketMsgBottom').outerHeight()
            ) + "px)";

            if (document.getElementById("updateTicketForm")) {
                document.getElementById("updateTicketForm").style.height = "calc(100vh - " + (
                    $('#tabs').outerHeight() + otherBodyHeight +
                    ($('#reply-section-action').outerHeight() ? $('#reply-section-action').outerHeight() : $('#reply-section-action-2').outerHeight())
                ) + "px)";
            }
        }

        $('body').on('click', '#tabs', function() {
            setViewHeight();
        });

        setViewHeight();
        window.addEventListener('resize', function(event) {
            setViewHeight();
        }, true);

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/tickets/edit.blade.php ENDPATH**/ ?>