
<div class="modal-header">
    <h5 class="modal-title" id="modelHeading"><?php echo app('translator')->get('Tenant Details'); ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
    <div class="row py-5">
        
        <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">
            
            <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f = $attributes; } ?>
<?php $component = App\View\Components\Table::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0 pb-3 admin-dash-table table-hover']); ?>

                 <?php $__env->slot('thead', null, []); ?> 
                    <th> Sl #</th>
                    <th><?php echo app('translator')->get('Tenant Name'); ?></th>
                    <th><?php echo app('translator')->get('Tenant Ph #'); ?></th>
                    <th><?php echo app('translator')->get('Tenant Email'); ?></th>
                 <?php $__env->endSlot(); ?>
                <tr>
                    <td>1</td>
                    <td>
                        <?php echo e($project->projectContacts->tenant_name_1); ?>

                    </td>
                    <td>
                        <?php echo e($project->projectContacts->tenant_phone_1); ?>

                    </td>
                    <td>
                        <?php echo e($project->projectContacts->tenant_email_1); ?>

                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <?php echo e($project->projectContacts->tenant_name_2); ?>

                    </td>
                    <td>
                        <?php echo e($project->projectContacts->tenant_phone_2); ?>

                    </td>
                    <td>
                        <?php echo e($project->projectContacts->tenant_email_2); ?>

                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <?php echo e($project->projectContacts->tenant_name_3); ?>

                    </td>
                    <td>
                        <?php echo e($project->projectContacts->tenant_phone_3); ?>

                    </td>
                    <td>
                        <?php echo e($project->projectContacts->tenant_email_3); ?>

                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        <?php echo e($project->projectContacts->tenant_name_4); ?>

                    </td>
                    <td>
                        <?php echo e($project->projectContacts->tenant_phone_4); ?>

                    </td>
                    <td>
                        <?php echo e($project->projectContacts->tenant_email_4); ?>

                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>
                        <?php echo e($project->projectContacts->tenant_name_5); ?>

                    </td>
                    <td>
                        <?php echo e($project->projectContacts->tenant_phone_5); ?>

                    </td>
                    <td>
                        <?php echo e($project->projectContacts->tenant_email_5); ?>

                    </td>
                </tr>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $attributes = $__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__attributesOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $component = $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
<?php endif; ?>

        </div>

    </div>
</div>


<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/projects/ajax/view-tenants.blade.php ENDPATH**/ ?>