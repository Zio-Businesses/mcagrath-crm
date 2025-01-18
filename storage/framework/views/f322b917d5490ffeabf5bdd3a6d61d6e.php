<?php if($projectID == '' || !($client->currency)): ?>
    <select class="form-control select-picker" name="currency_id" id="currency_id">
        <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($currency->id); ?>">
                <?php echo e($currency->currency_code . ' (' . $currency->currency_symbol . ')'); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
<?php else: ?>
    <div class="input-icon">
        <input type="hidden" readonly class="px-6 position-relative text-dark font-weight-normal form-control height-35 rounded p-0 text-left f-15" name="currency_id" id="currency_id" value="<?php echo e($client->currency ? $client->currency->id : company()->currency_id); ?>">
        <input type="text" readonly class="px-6 position-relative text-dark font-weight-normal form-control height-35 rounded p-0 text-left f-15" value="<?php echo e($client->currency ? $client->currency->currency_code . ' (' . $client->currency->currency_symbol . ')' : company()->currency->currency_code . ' (' . company()->currency->currency_symbol . ')'); ?>">
    </div>
<?php endif; ?>

<script>
    $(function() {
        $('#currency_id').selectpicker();
    });
</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\invoices\currency_list.blade.php ENDPATH**/ ?>