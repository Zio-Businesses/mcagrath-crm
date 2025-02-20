<div class="card ticket-message rounded-0 border-0  <?php if(user()->id == $user->id): ?> bg-white-shade <?php endif; ?>"
    id="message-<?php echo e($message->id); ?>">
    <div class="card-horizontal">
        <div class="card-img">
            <a
                href="<?php echo e(!is_null($user->employeeDetail) ? route('employees.show', $user->id) : route('clients.show', $user->id)); ?>"><img
                    class="" src="<?php echo e($user->image_url); ?>" alt="<?php echo e($user->name); ?>"></a>
        </div>
        <div class="card-body border-0 pl-0">
            <div class="d-flex">
                <a
                    href="<?php echo e(!is_null($user->employeeDetail) ? route('employees.show', $user->id) : route('clients.show', $user->id)); ?>">
                    <h4 class="card-title f-13 f-w-500 text-dark mr-3"><?php echo e($user->name); ?></h4>
                </a>
                <p class="card-date f-11 text-lightest mb-0">
                    <?php echo e($message->created_at->timezone(company()->timezone)->translatedFormat(company()->date_format . ' ' . company()->time_format)); ?>

                </p>

                <?php if($user->id == user()->id || in_array('admin', user_roles())): ?>
                    <div class="dropdown ml-auto message-action">
                        <button class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                            aria-labelledby="dropdownMenuLink" tabindex="0">

                            <a class="dropdown-item delete-message"
                                data-row-id="<?php echo e($message->id); ?>" data-user-id="<?php echo e($user->id); ?>"
                                href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

            <?php if($message->message != ''): ?>
                <div class="card-text text-dark-grey text-justify mb-2 text-break f-13">
                    <span><?php echo nl2br($message->message); ?></span>
                </div>
            <?php endif; ?>

            <?php echo e($slot); ?>


            <div class="d-flex flex-wrap">
                <?php $__currentLoopData = $message->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginalcc3eadf431dc104666da55af50a04915 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcc3eadf431dc104666da55af50a04915 = $attributes; } ?>
<?php $component = App\View\Components\FileCard::resolve(['fileName' => $file->filename,'dateAdded' => $file->created_at->diffForHumans()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('file-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FileCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if($file->icon == 'images'): ?>
                            <img src="<?php echo e($file->file_url); ?>">
                        <?php else: ?>
                            <i class="fa <?php echo e($file->icon); ?> text-lightest"></i>
                        <?php endif; ?>

                         <?php $__env->slot('action', null, []); ?> 
                            <div class="dropdown ml-auto file-action">
                                <button
                                    class="btn btn-lg f-14 p-0 text-lightest text-capitalize rounded  dropdown-toggle"
                                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                                    aria-labelledby="dropdownMenuLink" tabindex="0">

                                    <a class="dropdown-item" target="_blank"
                                            href="<?php echo e($file->file_url); ?>"><?php echo app('translator')->get('app.view'); ?></a>

                                    <a class="dropdown-item"
                                        href="<?php echo e(route('message_file.download', md5($file->id))); ?>"><?php echo app('translator')->get('app.download'); ?></a>

                                    <?php if(user()->id == $user->id): ?>
                                        <a class="dropdown-item delete-file"
                                            data-row-id="<?php echo e($file->id); ?>"
                                            href="javascript:;"><?php echo app('translator')->get('app.delete'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcc3eadf431dc104666da55af50a04915)): ?>
<?php $attributes = $__attributesOriginalcc3eadf431dc104666da55af50a04915; ?>
<?php unset($__attributesOriginalcc3eadf431dc104666da55af50a04915); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc3eadf431dc104666da55af50a04915)): ?>
<?php $component = $__componentOriginalcc3eadf431dc104666da55af50a04915; ?>
<?php unset($__componentOriginalcc3eadf431dc104666da55af50a04915); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>

    </div>
</div><!-- card end -->
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/components/cards/message.blade.php ENDPATH**/ ?>