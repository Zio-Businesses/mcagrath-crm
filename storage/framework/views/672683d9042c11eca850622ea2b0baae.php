<!-- <style>
    .dropdown-menu{
        top: 0px !important;
    }
</style>   -->
<div class="modal-header">
    <h5 class="modal-title" id="modelHeading"><?php echo app('translator')->get('Edit Filter'); ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
<?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve(['method' => 'PUT'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'editProjectFilterForm']); ?>
    <div class="modal-body">
    <input type="hidden" name="filterstartDate" id="filterstartDate">
    <input type="hidden" name="filterendDate" id="filterendDate">
    <input type="hidden" name="filterstartDatenxt" id="filterstartDatenxt">
    <input type="hidden" name="filterendDatenxt" id="filterendDatenxt">
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($component)) { $__componentOriginal4e45e801405ab67097982370a6a83cba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4e45e801405ab67097982370a6a83cba = $attributes; } ?>
<?php $component = App\View\Components\Forms\Text::resolve(['fieldLabel' => __('Filter Name'),'fieldName' => 'filter_name','fieldRequired' => 'true','fieldId' => 'filter_name_edit','fieldPlaceholder' => __('Enter filter name'),'fieldValue' => $filter->name] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Text::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $attributes = $__attributesOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__attributesOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4e45e801405ab67097982370a6a83cba)): ?>
<?php $component = $__componentOriginal4e45e801405ab67097982370a6a83cba; ?>
<?php unset($__componentOriginal4e45e801405ab67097982370a6a83cba); ?>
<?php endif; ?>
            </div>
            <div class="col-md-4 mt-3">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.dateFilterOn'); ?></label>
                <div class="mb-4">
                    <select class="form-control select-picker pb-1" name="custom_date_filter_on" id="custom_date_filter_on">
                        <option value="deadline" <?php if($filter->filter_on == 'deadline'): echo 'selected'; endif; ?> ><?php echo app('translator')->get('Due Date'); ?></option>
                        <option value="start_date" <?php if($filter->filter_on == 'start_date'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Project Date'); ?></option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.duration'); ?></label>
                <div class="select-status d-flex">
                    <input type="text" class="position-relative  form-control p-2 text-left border-additional-grey"
                    placeholder="<?php echo app('translator')->get('placeholders.dateRange'); ?>" id="customRangeEdit">
                </div>
            </div>       
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('Next Follow Up Date'); ?></label>
                <div class="select-status d-flex">
                    <input type="text" class="position-relative  form-control p-2 text-left border-additional-grey"
                    placeholder="<?php echo app('translator')->get('placeholders.dateRange'); ?>" id="nxtRangeEdit">
                </div>
            </div>
            <?php
            $selectedCategories = $filter->project_category ?? [];
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('modules.projects.projectCategory'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_category_id[]" id="filter_category_id_edit"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" 
                        <?php echo e(in_array($category->id, $selectedCategories) ? 'selected' : ''); ?>>
                            <?php echo e($category->category_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
            <?php
                $selectedSubCategories = $filter->project_sub_category ?? [];  // Assuming this is the array of selected category names
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('Project Sub-Category'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_sub_category[]" id="filter_sub_category_edit"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                    <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->sub_category); ?>" 
                                <?php echo e(in_array($category->sub_category, $selectedSubCategories) ? 'selected' : ''); ?>>
                            <?php echo e($category->sub_category); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
            <?php
                $selectedType = $filter->project_type ?? [];  // Assuming this is the array of selected category names
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('Project Type'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_type[]" id="filter_type_edit"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                    <?php $__currentLoopData = $projecttype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->type); ?>" 
                                <?php echo e(in_array($category->type, $selectedType) ? 'selected' : ''); ?>>
                            <?php echo e($category->type); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
            <?php
                $selectedPriority = $filter->project_priority ?? [];  // Assuming this is the array of selected category names
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('Project Priority'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_priority[]" id="filter_priority_edit"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                    <?php $__currentLoopData = $projectpriority; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->priority); ?>" 
                                <?php echo e(in_array($category->priority, $selectedPriority) ? 'selected' : ''); ?>>
                            <?php echo e($category->priority); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
            <?php
                $selectedStatus = $filter->project_status ?? [];  // Assuming this is the array of selected category names
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('Project Status'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_status[]" id="filter_status_edit"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                    <?php $__currentLoopData = $projectStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->status_name); ?>" 
                                <?php echo e(in_array($category->status_name, $selectedStatus) ? 'selected' : ''); ?>>
                            <?php echo e($category->status_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
            <?php
                $selectedDelayed = $filter->delayed_by ?? [];  // Assuming this is the array of selected category names
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('Delayed By'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_delayed[]" id="filter_delayed_edit"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                    <?php $__currentLoopData = $delayedby; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->delayed_by); ?>" 
                                <?php echo e(in_array($category->delayed_by, $selectedDelayed) ? 'selected' : ''); ?>>
                            <?php echo e($category->delayed_by); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
            <?php
                $selectedClient = $filter->client_id ?? [];  // Assuming this is the array of selected category names
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('Client'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_client[]" id="filter_client_edit"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" 
                                <?php echo e(in_array($category->id, $selectedClient) ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
            <?php
                $selectedCity = $filter->city ?? [];  // Assuming this is the array of selected category names
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('City'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_city[]" id="filter_city_edit"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                    <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category); ?>" 
                                <?php echo e(in_array($category, $selectedCity) ? 'selected' : ''); ?>>
                            <?php echo e($category); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
            <?php
                $selectedCounty = $filter->county ?? [];  // Assuming this is the array of selected category names
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('County'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_county[]" id="filter_county_edit"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                    <?php $__currentLoopData = $county; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category); ?>" 
                                <?php echo e(in_array($category, $selectedCounty) ? 'selected' : ''); ?>>
                            <?php echo e($category); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
            <?php
                $selectedState = $filter->state ?? [];  // Assuming this is the array of selected category names
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('State'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_state[]" id="filter_state_edit"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                    <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category); ?>" 
                                <?php echo e(in_array($category, $selectedState) ? 'selected' : ''); ?>>
                            <?php echo e($category); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
            <?php
                $selectedEmployee = $filter->project_members ?? [];  // Assuming this is the array of selected category names
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('Members'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_members[]" id="filter_members_edit"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                    <?php $__currentLoopData = $allEmployees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" 
                                <?php echo e(in_array($category->id, $selectedEmployee) ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'clearedit','class' => 'border-0 mr-3']); ?>Reset <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $attributes = $__attributesOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__attributesOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $component = $__componentOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__componentOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-dismiss' => 'modal','class' => 'border-0 mr-3']); ?><?php echo app('translator')->get('app.close'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $attributes = $__attributesOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__attributesOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $component = $__componentOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__componentOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'edit-filter']); ?><?php echo app('translator')->get('app.save'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $attributes = $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $component = $__componentOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $attributes = $__attributesOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $component = $__componentOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__componentOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>

<script>

$(document).ready(function() {

    var startDate = '<?php echo e($filter->start_date); ?>';
    var endDate = '<?php echo e($filter->end_date); ?>';
    var startDatenxt = '<?php echo e($filter->start_date_nxt); ?>';
    var endDatenxt = '<?php echo e($filter->end_date_nxt); ?>';

    $('#customRangeEdit,#nxtRangeEdit').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        },
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    });
        
        $('#customRangeEdit').on('apply.daterangepicker', function(ev, picker) {
            // Get start and end dates
            startDate = picker.startDate.format('YYYY-MM-DD');
            document.getElementById('filterstartDate').value=startDate;
            endDate = picker.endDate.format('YYYY-MM-DD');
            document.getElementById('filterendDate').value=endDate;
            
            $(this).val(picker.startDate.format('<?php echo e(company()->moment_date_format); ?>') + ' - ' + picker.endDate.format('<?php echo e(company()->moment_date_format); ?>'));
            
        });
        
        if(startDate!='' && endDate!=''){
            document.getElementById('filterstartDate').value=startDate;
            document.getElementById('filterendDate').value=endDate;
            $('#customRangeEdit').val(
                moment(startDate).format('<?php echo e(company()->moment_date_format); ?>') + ' - ' + moment(endDate).format('<?php echo e(company()->moment_date_format); ?>')
            );
        }

        $('#nxtRangeEdit').on('apply.daterangepicker', function(ev, picker) {
            // Get start and end dates
            startDatenxt = picker.startDate.format('YYYY-MM-DD');
            document.getElementById('filterstartDatenxt').value=startDatenxt;
            endDatenxt = picker.endDate.format('YYYY-MM-DD');
            document.getElementById('filterendDatenxt').value=endDatenxt;
            
            $(this).val(picker.startDate.format('<?php echo e(company()->moment_date_format); ?>') + ' - ' + picker.endDate.format('<?php echo e(company()->moment_date_format); ?>'));
            
        });

        if(startDatenxt!='' && endDatenxt!=''){
            document.getElementById('filterstartDatenxt').value=startDatenxt;
            document.getElementById('filterendDatenxt').value=endDatenxt;
            $('#nxtRangeEdit').val(
                moment(startDatenxt).format('<?php echo e(company()->moment_date_format); ?>') + ' - ' + moment(endDatenxt).format('<?php echo e(company()->moment_date_format); ?>')
            );
        }

        $('#edit-filter').click(function () {
            if($('#customRangeEdit').val()=='')
            {
                document.getElementById('filterstartDate').value='';
                document.getElementById('filterendDate').value='';
            }
            if($('#nxtRangeEdit').val()=='')
            {
                document.getElementById('filterstartDatenxt').value='';
                document.getElementById('filterendDatenxt').value='';
            }
            var url = "<?php echo e(route('project-filter.update',$filter->id)); ?>";
            $.easyAjax({
                url: url,
                container: '#editProjectFilterForm',
                type: "POST",
                blockUI: true,
                disableButton: true,
                buttonSelector: '#edit-filter',
                data: $('#editProjectFilterForm').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.reload();
                        
                    }
                }
            })
         });

        $("#editProjectFilterForm .select-picker").selectpicker();

        $('#clearedit').click(function() {
            $('#filter_category_id_edit').val([]).selectpicker('refresh');
            $('#filter_sub_category_edit').val([]).selectpicker('refresh');
            $('#filter_type_edit').val([]).selectpicker('refresh');
            $('#filter_priority_edit').val([]).selectpicker('refresh');
            $('#filter_status_edit').val([]).selectpicker('refresh');
            $('#filter_delayed_edit').val([]).selectpicker('refresh');
            $('#filter_client_edit').val([]).selectpicker('refresh');
            $('#filter_city_edit').val([]).selectpicker('refresh');
            $('#filter_state_edit').val([]).selectpicker('refresh');
            $('#filter_county_edit').val([]).selectpicker('refresh');
            $('#filter_members_edit').val([]).selectpicker('refresh');
            document.getElementById('filterstartDate').value='';
            document.getElementById('filterendDate').value='';
            document.getElementById('filterstartDatenxt').value='';
            document.getElementById('filterendDatenxt').value='';
            $('#customRangeEdit').val('');
            $('#nxtRangeEdit').val('');
            $('#filter_name_edit').val('');
        });

});


</script>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views/projects/edit-filter.blade.php ENDPATH**/ ?>