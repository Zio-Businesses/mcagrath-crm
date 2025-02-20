<?php switch($stickyNote->colour):
    case ('green'): ?>
        <?php
            $colour = 'dark-green';
        ?>
    <?php break; ?>
    <?php case ('purple'): ?>
        <?php
            $colour = 'dark-grey';
        ?>
    <?php break; ?>
    <?php default: ?>
        <?php
        $colour = $stickyNote->colour;
        ?>

<?php endswitch; ?>
<div class="card sticky-note border">
    <div class="card-body text-justify text-wrap">
        <div class="row">

            <div class="col-10">
                <?php echo nl2br($stickyNote->note_text); ?>

            </div>
            <div class="col-2 text-right">
                <div class="dropdown">
                    <button class="btn btn-lg f-14 px-2 py-0 text-dark-grey text-capitalize rounded  dropdown-toggle"
                        type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-h"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right border-grey rounded b-shadow-4 p-0"
                        aria-labelledby="dropdownMenuLink" tabindex="0">
                        <a class="openRightModal dropdown-item"
                            href="<?php echo e(route('sticky-notes.show', $stickyNote->id)); ?>"><i
                                class="fa fa-eye mr-2"></i><?php echo app('translator')->get('app.view'); ?></a>
                        <a class="openRightModal dropdown-item"
                            href="<?php echo e(route('sticky-notes.edit', $stickyNote->id)); ?>"><i
                                class="fa fa-edit mr-2"></i><?php echo app('translator')->get('app.edit'); ?></a>
                        <a class="dropdown-item delete-note" data-note-id="<?php echo e($stickyNote->id); ?>"
                            href="javascript:;"><i class="fa fa-trash mr-2"></i><?php echo app('translator')->get('app.delete'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer bg-white border-0">
        <div class="d-flex justify-content-between">
            <div class="text-lightest"><?php echo e($stickyNote->created_at->translatedFormat(company()->date_format)); ?></div>
            <div class="text-<?php echo e($colour); ?>"><i class="fa fa-circle"></i></div>
        </div>
    </div>
</div>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/components/cards/sticky-note.blade.php ENDPATH**/ ?>