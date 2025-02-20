<?php
$viewFilePermission = user()->permission('view_miroboard');
?>

<!-- TAB CONTENT START -->
<div class="tab-pane fade show active mt-5" role="tabpanel" aria-labelledby="nav-email-tab">
    <iframe width="100%" height="800" src="https://miro.com/app/live-embed/<?php echo e($project->miro_board_id); ?>" frameBorder="0" scrolling="no" allowFullScreen></iframe>
</div>
<!-- TAB CONTENT END -->
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/projects/ajax/miroboard.blade.php ENDPATH**/ ?>