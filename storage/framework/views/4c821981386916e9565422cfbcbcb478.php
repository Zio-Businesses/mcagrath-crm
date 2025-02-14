<!-- PAGE TITLE START -->
<div <?php echo e($attributes->merge(['class' => 'page-title'])); ?>>
    <div class="page-heading">
        <h2 class="mb-0 pr-3 text-dark f-18 font-weight-bold d-flex align-items-center">
            <span class="d-inline-block text-truncate mw-300"><?php echo e($pageTitle); ?></span>

            <span class="text-lightest f-12 f-w-500 ml-2 mw-250 text-truncate">
                <a href="<?php echo e(route('dashboard')); ?>" class="text-lightest"><?php echo app('translator')->get('app.menu.home'); ?></a> &bull;
                <?php
                    $link = '';
                ?>

                <?php for($i = 1; $i <= count(Request::segments()); $i++): ?>
                    <?php if(($i < count(Request::segments())) && ($i> 0)): ?>
                        <?php $link .= '/' . Request::segment($i); ?>

                        <?php if(Request::segment($i) != 'account'): ?>
                            <a href="<?php echo e(str_contains(url()->current(),'public')?'/public'.$link:$link); ?>" class="text-lightest">
                                <?php
                                    $langKey = 'app.'.str(Request::segment($i))->camel();

                                    if (!Lang::has($langKey)) {
                                        $langKey = str($langKey)->replace('app.', 'app.menu.')->__toString();
                                    }

                                ?>

                                <?php echo e(Lang::has($langKey) ? __($langKey) : ucwords(str_replace('-', ' ', Request::segment($i)))); ?>

                </a> &bull;
                        <?php endif; ?>
                    <?php else: ?>
                        <?php echo e($pageTitle); ?>

                    <?php endif; ?>
                <?php endfor; ?>
            </span>
        </h2>
    </div>
</div>
<!-- PAGE TITLE END -->
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/components/app-title.blade.php ENDPATH**/ ?>