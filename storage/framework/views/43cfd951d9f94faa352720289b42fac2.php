<?php if($projectID == ''): ?>
    <select class="form-control select-picker" name="client_id" id="client_company_id" data-style="form-control">
        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($client->id); ?>"><?php echo e($client->name_salutation); ?>

                <?php if($client->company_name != ''): ?> <?php echo e('('.$client->company_name.')'); ?> <?php endif; ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
<?php else: ?>
    <div class="input-icon">
        <input type="text" readonly class="px-6 position-relative text-dark font-weight-normal form-control height-35 rounded p-0 text-left f-15" name="company_name" id="company_name" value="<?php echo e($companyName); ?>">
    </div>
    <input type="hidden" class="form-control" name="client_id" id="client_id" value="<?php echo e($clientId); ?>">
<?php endif; ?>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/invoices/client_or_company_name.blade.php ENDPATH**/ ?>