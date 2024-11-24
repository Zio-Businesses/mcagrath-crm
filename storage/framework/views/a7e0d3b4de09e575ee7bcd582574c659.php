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
<?php $component->withAttributes(['id' => 'editLeadVendorFilterForm']); ?>
<div class="modal-body"> 
    <input type="hidden" name="filterstartDate" id="filterstartDate">
    <input type="hidden" name="filterendDate" id="filterendDate">
    <div class="container">
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
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('Next Follow Up Date'); ?></label>
                <div class="select-status d-flex">
                    <input type="text" class="position-relative  form-control p-2 text-left border-additional-grey"
                    placeholder="<?php echo app('translator')->get('placeholders.dateRange'); ?>" id="customRangeEdit">
                </div>
            </div>
            <?php
            $selectedCity = $filter->city ?? [];
            ?>
            <div class="col-md-4 mt-3">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('City'); ?></label>
                <div class="mb-4">
                    <select class="form-control select-picker" name="filter_city[]" id="filter_city_edit"
                            data-live-search="true" data-container="body" data-size="8" multiple>
                        <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->city); ?>" <?php echo e(in_array($category->city, $selectedCity) ? 'selected' : ''); ?>>
                                <?php echo e($category->city); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <?php
                $selectedCounty = $filter->county ?? [];
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('County'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_county[]" id="filter_county_edit"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                    <?php $__currentLoopData = $county; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->county); ?>" <?php echo e(in_array($category->county, $selectedCounty) ? 'selected' : ''); ?>>
                            <?php echo e($category->county); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
            <?php
                $selectedState = $filter->state ?? [];
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('State'); ?></label>
                <div class="mb-4">
                    <select class="form-control select-picker" name="filter_state[]" id="filter_state_edit"
                            data-live-search="true" data-container="body" data-size="8" multiple>
                        <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->state); ?>" <?php echo e(in_array($category->state, $selectedState) ? 'selected' : ''); ?>>
                                <?php echo e($category->state); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <?php
                $selectedContractorType = $filter->contractor_type ?? [];
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('Contractor Type'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_contractor_type[]" id="filter_contractor_type_edit"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                    <?php $__currentLoopData = $contracttype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->contractor_type); ?>" <?php echo e(in_array($category->contractor_type, $selectedContractorType) ? 'selected' : ''); ?>>
                            <?php echo e($category->contractor_type); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
            <?php
                $selectedCreatedBy = $filter->created_by ?? [];
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('Created By'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_members[]" id="filter_members_edit"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                    <?php $__currentLoopData = $allEmployees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->name); ?>" <?php echo e(in_array($category->name, $selectedCreatedBy) ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
            <?php
                $selectedLeadSource = $filter->lead_source?? [];
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('Lead Source'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_lead_source[]" id="filter_lead_source_edit"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                    <?php $__currentLoopData = $leadsource; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->type); ?>" <?php echo e(in_array($category->type, $selectedLeadSource) ? 'selected' : ''); ?>>
                            <?php echo e($category->type); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
            </div>
            <?php
                $selectedLeadVendorStatus = $filter->lead_vendor_status?? [];
            ?>
            <div class="col-md-4">
                <label class="f-14 text-dark-grey mb-12 text-capitalize"
                    for="usr"><?php echo app('translator')->get('Status'); ?></label>
                <div class="mb-4">
                <select class="form-control select-picker" name="filter_status[]" id="filter_status"
                        data-live-search="true" data-container="body" data-size="8" multiple>
                        <option value="Accepted" <?php echo e(in_array('Accepted', $selectedLeadVendorStatus) ? 'selected' : ''); ?>>
                            Accepted
                         </option>
                        <?php $__currentLoopData = $vendorStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category); ?>" <?php echo e(in_array($category, $selectedLeadVendorStatus) ? 'selected' : ''); ?>>
                                <?php echo e($category); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
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

    $("#editLeadVendorFilterForm .select-picker").selectpicker();

    $('#customRangeEdit').daterangepicker({
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

    $('#edit-filter').click(function () {
        if($('#customRangeEdit').val()=='')
        {
            document.getElementById('filterstartDate').value='';
            document.getElementById('filterendDate').value='';
        }
        var url = "<?php echo e(route('lead-vendor-filter.update',$filter->id)); ?>";
        $.easyAjax({
            url: url,
            container: '#editLeadVendorFilterForm',
            type: "POST",
            blockUI: true,
            disableButton: true,
            buttonSelector: '#edit-filter',
            data: $('#editLeadVendorFilterForm').serialize(),
            success: function(response) {
                if (response.status == 'success') {
                    window.location.reload();
                    
                }
            }
        })
    });
    
    $('#clearedit').click(function() {
        $('#filter_state_edit').val([]).selectpicker('refresh');
        $('#filter_city_edit').val([]).selectpicker('refresh');
        $('#filter_county_edit').val([]).selectpicker('refresh');
        $('#filter_members_edit').val([]).selectpicker('refresh');
        $('#filter_contractor_type_edit').val([]).selectpicker('refresh');
        $('#filter_lead_source_edit').val([]).selectpicker('refresh');
        document.getElementById('startDate').value='';
        document.getElementById('endDate').value='';
        $('#customRangeEdit').val('');
        $('#filter_name_edit').val('');
    });
    
});<?php /**PATH C:\xampp\htdocs\public_html\resources\views/vendortrack/edit-filter.blade.php ENDPATH**/ ?>