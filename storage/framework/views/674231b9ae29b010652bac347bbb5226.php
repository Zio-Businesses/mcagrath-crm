<div class=" d-flex flex-col">
        <div class="col-sm border-right-grey">
            <div class="row border-bottom-grey">
                <div class="col">
                    <h5 class="f-15 f-w-500 text-darkest-grey mb-0 py-2">Project Details</h5>
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                     Work Order # - <?php echo e($project->project_short_code ?? ''); ?>

                </div>
                <div class="col border-left-grey">
                     Project Status - <?php echo e($project->status ?? ''); ?> 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                     Project Type - <?php echo e($project->type ?? ''); ?>

                </div>
                <div class="col border-left-grey">
                     Client Name - <?php echo e($project->client?->name_salutation ?? ''); ?> 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                     Priority - <?php echo e($project->priority ?? ''); ?>

                </div>
                <div class="col border-left-grey">
                     Project Date - <?php echo e($project->start_date?->format(company()->date_format)); ?> 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                    Project Category - <?php echo e($project->category->category_name ?? ''); ?>

                </div>
                <div class="col border-left-grey">
                    Due Date - <?php echo e($project->deadline?->format(company()->date_format)); ?> 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                    Project SubCategory - <?php echo e($project->sub_category ?? ''); ?>

                </div>
                <div class="col border-left-grey">
                    Not To Exceed - <?php echo e($project->nte); ?> 
                </div>
            </div>
        </div>
        <div class="col-sm border-right-grey">
            <div class="row border-bottom-grey">
                <div class="col">
                    <h5 class="f-15 f-w-500 text-darkest-grey mb-0 py-2">Property Information</h5>
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                        Property Address - <?php echo e($project->propertyDetails->property_address ?? ''); ?> - <?php echo e($project->propertyDetails->optional ?? ''); ?>

                </div>
                <div class="col border-left-grey">
                        Property Type - <?php echo e($project->property_type ?? ''); ?> 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                        City - <?php echo e($project->propertyDetails->city ?? ''); ?>

                </div>
                <div class="col border-left-grey">
                        Bed - <?php echo e($project->propertyDetails->bedrooms ?? ''); ?> 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                        State - <?php echo e($project->propertyDetails->state ?? ''); ?>

                </div>
                <div class="col border-left-grey">
                        Bath - <?php echo e($project->propertyDetails->bathrooms ?? ''); ?> 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                        County - <?php echo e($project->propertyDetails->county ?? ''); ?>

                </div>
                <div class="col border-left-grey">
                        House Size - <?php echo e($project->propertyDetails->house_size ?? ''); ?> 
                </div>
            </div>
            <div class="row border-bottom-grey">
                <div class="col">
                        Occupied - <?php echo e($project->propertyDetails->occupancy_status ?? ''); ?>

                </div>
                <div class="col border-left-grey">
                        Lock Box Code - <?php echo e($project->propertyDetails->lockboxcode ?? ''); ?> 
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="row border-bottom-grey">
                <div class="col">
                    <h5 class="f-15 f-w-500 text-darkest-grey mb-0 py-2">Contact Information</h5>
                </div>
            </div>
        </div>
    </div><?php /**PATH C:\laragon\www\public_html\resources\views/projects/static.blade.php ENDPATH**/ ?>