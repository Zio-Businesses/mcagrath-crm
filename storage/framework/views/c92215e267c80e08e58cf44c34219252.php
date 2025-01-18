<?php if (isset($component)) { $__componentOriginald1a72e1108842d163a80559e15f530b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald1a72e1108842d163a80559e15f530b4 = $attributes; } ?>
<?php $component = App\View\Components\Filters\FilterBox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filters.filter-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Filters\FilterBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- DATE START -->
    <div class="select-box d-flex pr-2 border-right-grey border-right-grey-sm-0">
        <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('app.duration'); ?></p>
        <div class="select-status d-flex">
            <input type="text" class="position-relative text-dark form-control border-0 p-2 text-left f-14 f-w-500 border-additional-grey"
                id="datatableRange" placeholder="<?php echo app('translator')->get('placeholders.dateRange'); ?>">
        </div>
    </div>
    <!-- DATE END -->
    <div class="select-box d-flex py-2 px-lg-2 px-md-2 px-0 border-right-grey border-right-grey-sm-0">
        <p class="mb-0 pr-2 f-14 text-dark-grey d-flex align-items-center"><?php echo app('translator')->get('modules.deal.pipeline'); ?></p>
        <div class="select-status">
            <select class="form-control select-picker pipelineFilter" name="pipeline" id="pipeline">
                
                <?php $__currentLoopData = $pipelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pipeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if($pipeline->default == 1): echo 'selected'; endif; ?> value="<?php echo e($pipeline->id); ?>"><?php echo e($pipeline->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <!-- SEARCH BY TASK START -->
    <div class="task-search d-flex  py-1 px-lg-3 px-0 border-right-grey align-items-center">
        <form class="w-100 mr-1 mr-lg-0 mr-md-1 ml-md-1 ml-0 ml-lg-0">
            <div class="input-group bg-grey rounded">
                <div class="input-group-prepend">
                    <span class="input-group-text border-0 bg-additional-grey">
                        <i class="fa fa-search f-13 text-dark-grey"></i>
                    </span>
                </div>
                <input type="text" class="form-control f-14 p-1 border-additional-grey" id="search-text-field"
                    placeholder="<?php echo app('translator')->get('app.startTyping'); ?>">
            </div>
        </form>
    </div>
    <!-- SEARCH BY TASK END -->

    <!-- RESET START -->
    <div class="select-box d-flex py-1 px-lg-2 px-md-2 px-0">
        <?php if (isset($component)) { $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonSecondary::resolve(['icon' => 'times-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-secondary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonSecondary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-xs d-none','id' => 'reset-filters']); ?>
            <?php echo app('translator')->get('app.clearFilters'); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $attributes = $__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__attributesOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad)): ?>
<?php $component = $__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad; ?>
<?php unset($__componentOriginal5e57c6582b8a883148a28bb7ee46d2ad); ?>
<?php endif; ?>
    </div>
    <!-- RESET END -->

    <!-- MORE FILTERS START -->
    <?php if (isset($component)) { $__componentOriginala4acb898aa829ce2204627839760187d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala4acb898aa829ce2204627839760187d = $attributes; } ?>
<?php $component = App\View\Components\Filters\MoreFilterBox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filters.more-filter-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Filters\MoreFilterBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

        <div class="more-filter-items">
            <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.dateFilterOn'); ?></label>
            <div class="select-filter mb-4">
                <select class="form-control select-picker" name="date_filter_on" id="date_filter_on">
                    <option value="created_at"><?php echo app('translator')->get('app.createdOn'); ?></option>
                    <option value="updated_at"><?php echo app('translator')->get('app.updatedOn'); ?></option>
                </select>
            </div>
        </div>
        <div class="more-filter-items">
            <label class="f-14 text-dark-grey mb-12 text-capitalize" for="min"><?php echo app('translator')->get('app.deal'); ?> <?php echo app('translator')->get('app.value'); ?></label>
            <div class="select-filter mb-4">
                <div class="select-status d-flex">
                    <input type="number" class="position-relative text-dark form-control border-5 p-2 text-left f-14 f-w-500 border-additional-grey" placeholder="<?php echo app('translator')->get('placeholders.min'); ?>" id="min" name="min" min="0">
                    <span class="p-2 m-2"><?php echo app('translator')->get('app.to'); ?></span>
                    <input type="number" class="position-relative text-dark form-control border-5 p-2 text-left f-14 f-w-500 border-additional-grey" placeholder="<?php echo app('translator')->get('placeholders.max'); ?>" id="max" name="max" min="0">
                </div>
            </div>
        </div>

        <div class="more-filter-items">
            <?php if(!isset($viewStageFilter)): ?>
            <div class="more-filter-items  ">
                <label class="f-14 text-dark-grey mb-12 text-capitalize " for="usr"><?php echo app('translator')->get('modules.deal.leadStage'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" id="filter_status_id" data-live-search="true" data-container="body" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option data-content="<span class='fa fa-circle text-red' style='color: <?php echo e($sts->label_color); ?>'></span> <?php echo e($sts->name); ?>" value="<?php echo e($sts->id); ?>"><?php echo e($sts->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <?php endif; ?>

            <div class="more-filter-items  ">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('modules.tickets.agent'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="agent_id" id="agent_id" data-live-search="true"
                            data-container="body" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $leadAgents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    data-content="<div class='d-inline-block mr-1'><img class='taskEmployeeImg rounded-circle' src='<?php echo e($agent->user->image_url); ?>' ></div> <?php echo e($agent->user->name); ?>"
                                    value="<?php echo e($agent->id); ?>">
                                    <?php echo e($agent->user->name . ' [' . $agent->user->email . ']'); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items  ">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.dealWatcher'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="deal_watcher_agent_id" id="deal_watcher_agent_id" data-live-search="true"
                            data-container="body" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $dealWatcher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginal6c7097547485b98631a37d273a171e9f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c7097547485b98631a37d273a171e9f = $attributes; } ?>
<?php $component = App\View\Components\UserOption::resolve(['user' => $agent] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\UserOption::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6c7097547485b98631a37d273a171e9f)): ?>
<?php $attributes = $__attributesOriginal6c7097547485b98631a37d273a171e9f; ?>
<?php unset($__attributesOriginal6c7097547485b98631a37d273a171e9f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6c7097547485b98631a37d273a171e9f)): ?>
<?php $component = $__componentOriginal6c7097547485b98631a37d273a171e9f; ?>
<?php unset($__componentOriginal6c7097547485b98631a37d273a171e9f); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="more-filter-items  ">
                <label class="f-14 text-dark-grey mb-12 text-capitalize" for="usr"><?php echo app('translator')->get('app.lead'); ?></label>
                <div class="select-filter mb-4">
                    <div class="select-others">
                        <select class="form-control select-picker" name="lead_agent_id" id="lead_agent_id" data-live-search="true"
                            data-container="body" data-size="8">
                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                            <?php $__currentLoopData = $dealLeads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    data-content="<div class='d-inline-block mr-1'><img class='taskEmployeeImg rounded-circle' src='<?php echo e($agent->image_url); ?>' ></div> <?php echo e($agent->client_name); ?>"
                                    value="<?php echo e($agent->id); ?>">
                                    <?php echo e($agent->name . ' [' . $agent->email . ']'); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala4acb898aa829ce2204627839760187d)): ?>
<?php $attributes = $__attributesOriginala4acb898aa829ce2204627839760187d; ?>
<?php unset($__attributesOriginala4acb898aa829ce2204627839760187d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala4acb898aa829ce2204627839760187d)): ?>
<?php $component = $__componentOriginala4acb898aa829ce2204627839760187d; ?>
<?php unset($__componentOriginala4acb898aa829ce2204627839760187d); ?>
<?php endif; ?>
    <!-- MORE FILTERS END -->


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald1a72e1108842d163a80559e15f530b4)): ?>
<?php $attributes = $__attributesOriginald1a72e1108842d163a80559e15f530b4; ?>
<?php unset($__attributesOriginald1a72e1108842d163a80559e15f530b4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald1a72e1108842d163a80559e15f530b4)): ?>
<?php $component = $__componentOriginald1a72e1108842d163a80559e15f530b4; ?>
<?php unset($__componentOriginald1a72e1108842d163a80559e15f530b4); ?>
<?php endif; ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('#type, #pipeline, #filter_category_id, #filter_source_id, #filter_status_id, #date_filter_on, #min, #max, #agent_id, #deal_watcher_agent_id, #lead_agent_id')
            .on('change keyup', function() {

                if ($('#type').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#min').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#max').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#filter_category_id').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#filter_status_id').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#deal_watcher_agent_id').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#lead_agent_id').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#filter_source_id').val() != "all") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else if ($('#date_filter_on').val() != "created_at") {
                    $('#reset-filters').removeClass('d-none');
                    showTable();
                } else {
                    $('#reset-filters').addClass('d-none');
                    showTable();
                }
                getStages ();
            });

        $('#search-text-field').on('keyup', function() {
            if ($('#search-text-field').val() != "") {
                $('#reset-filters').removeClass('d-none');
                showTable();
            }
        });

        $('#reset-filters,#reset-filters-2').click(function() {
            $('#filter-form')[0].reset();

            $('.filter-box #status').val('not finished');
            $('.filter-box #date_filter_on').val('created_at');
            $('.filter-box .select-picker').selectpicker("refresh");
            $('#reset-filters').addClass('d-none');
            showTable();
        });

        <?php if(!isset($viewStageFilter)): ?>
        $('.pipelineFilter').change(function (e) {

            let pipelineId = $(this).val();

            var url = "<?php echo e(route('deals.get-stage', ':id')); ?>";
            url = url.replace(':id', pipelineId);

            $.easyAjax({
                url: url,
                type: "GET",
                success: function (response) {
                    if (response.status == 'success') {
                        var options = [];
                        var rData = [];
                        rData = response.data;
                        $.each(rData, function (index, value) {
                            var selectData = '';
                            selectData = '<option value="' + value.id + '">' + value
                                .name + '</option>';
                            options.push(selectData);
                        });

                        $('#filter_status_id').html('<option value="all"><?php echo app('translator')->get('modules.lead.all'); ?></option>' +
                            options);
                        $('#filter_status_id').selectpicker('refresh');
                    }
                }
            })

            });
            <?php endif; ?>

            function getStages () {

                if ( $( "#change-stage-action" ).length ) {

                    var pipelineId = $('#pipeline').val();
                    var url = "<?php echo e(route('deals.get-stage', ':id')); ?>";
                    url = url.replace(':id', pipelineId);

                    $.easyAjax({
                        url: url,
                        type: "GET",
                        success: function (response) {
                            if (response.status == 'success') {
                                var options = [];
                                var rData = [];
                                rData = response.data;
                                $.each(rData, function (index, value) {
                                    var selectData = '';
                                    var contect = `data-content="<i class='fa fa-circle' style='color:`+value.label_color+`'></i> `+value.name+`"`;
                                    selectData = `<option `+contect+` value="` + value.id + `">' + value
                                        .name + '</option>`;
                                    options.push(selectData);
                                });

                                $('#change-stage-action').html(options);
                                $('#change-stage-action').selectpicker('refresh');
                            }
                        }
                    });

                }
            }


    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\mcagrath-crm\resources\views\leads\filters.blade.php ENDPATH**/ ?>