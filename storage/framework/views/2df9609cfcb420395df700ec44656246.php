 <div <?php echo e($attributes->merge(['class' => 'card bg-white border-grey file-card mr-3 mb-3'])); ?> >
     <div class="card-horizontal">
         <div class="card-img mr-0">
             <?php echo e($slot); ?>

         </div>
         <div class="card-body pr-2">
             <div class="d-flex flex-grow-1">
                 <h4 class="card-title f-12 text-dark-grey mr-3 text-truncate"  data-toggle="tooltip" data-original-title="<?php echo e($fileName); ?>"><?php echo e($fileName); ?></h4>
                 <?php if(isset($action)): ?>
                     <?php echo $action; ?>

                 <?php endif; ?>
             </div>
             <div class="card-date f-11 text-lightest">
                 <?php echo e($dateAdded); ?>

             </div>
         </div>
     </div>
 </div>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views/components/cards/file-card.blade.php ENDPATH**/ ?>