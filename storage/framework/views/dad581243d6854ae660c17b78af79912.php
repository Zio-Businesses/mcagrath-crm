<?php $supportDate = \Carbon\Carbon::parse($fetchSetting->supported_until) ?>

<?php if($supportDate->isPast()): ?>
    <span>Your support has been expired on <b><?php echo e($supportDate->translatedFormat('d M, Y')); ?></b>
        <?php if($supportDate->isYesterday()): ?>
            (Yesterday)
        <?php endif; ?>
    </span>
    <br>
<?php else: ?>
    <span >Your support will expire on <b><?php echo e($supportDate->translatedFormat('d M, Y')); ?></b>
        <?php if($supportDate->isToday()): ?>
            (Today)
        <?php elseif($supportDate->isTomorrow()): ?>
            (Tomorrow)
        <?php endif; ?>
    </span>
    <?php if($supportDate->diffInDays() < 90): ?>
        <div class="h-mt2 mt-2">
            <p class="t-body -size-m -color-mid">
                <a class="img-lightbox"
                   data-image-url="<?php echo e(asset('img/Support_Extension_Cost.jpg')); ?>"
                   href="javascript:;">How much do I save by extending now?
                </a>
            </p>
        </div>
    <?php endif; ?>
<?php endif; ?>



<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/custom-modules/sections/support-date.blade.php ENDPATH**/ ?>