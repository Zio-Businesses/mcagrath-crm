<div class="col-sm-12">
    <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'process-'.e($importClassName).'-data-form']); ?>
        <div class="add-<?php echo e($importClassName); ?> bg-white rounded">
            <h4 class="mb-0 p-20 f-21 font-weight-normal text-capitalize border-bottom-grey">
                <?php echo e($headingTitle); ?></h4>
                <div class="col-12">
                    <p class="mt-3"><?php echo app('translator')->get("messages.matchColumnMessage"); ?></p>
                    <div class="alert alert-success" id="getUnMatchedSuccess" style="display:none;">
                        <?php echo app('translator')->get("messages.columnMatchSuccess"); ?>
                    </div>
                    <div class="alert alert-warning" id="requiredColumnsUnmatched" style="display:none;">
                        <?php echo app('translator')->get("messages.requiredColumnsUnmatched"); ?>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <b><?php echo app('translator')->get("messages.unmatchedColumns", ["unmatchCount" => (!empty($heading) ? collect($columns)->where('required','Yes')->whereNotIn('id', $heading)->count() : 0)]); ?></b>
                        <a href="javascript:void(0);"
                                onclick="skipall()"><?php echo app('translator')->get("app.skipAll"); ?></a>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="float-right">
                                <div class="checkbox checkbox-info">
                                    <input id="showSkipped" checked="checked" type="checkbox">
                                    <label for="random_password"><?php echo app('translator')->get("app.showSkippedColumns"); ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="col-md-12 import-table">
                    <input type="hidden" name="file" value="<?php echo e($file); ?>">
                    <input type="hidden" name="has_heading" value="<?php echo e($hasHeading); ?>">
            
                    <div class="row">
                        <?php $__empty_1 = true; $__currentLoopData = $importSample[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-md-3 importBox  border-grey <?php echo e(!empty($heading) ? (collect($columns)->whereIn('id', $heading[$key])->first() ? 'matched' : 'unmatched') : 'unmatched'); ?>"
                                id="box_<?php echo e($key); ?>" data-key="<?php echo e($key); ?>">
                                <div class="importOptions w-100">
                                    <div class="col-sm-12 p-0">
                                        <?php if(!empty($heading)): ?>
                                            <h4>
                                                <?php echo e($fileHeading[$key]); ?>

                                            </h4>
                                        <?php endif; ?>
                                    </div>

                                    <div class="selectColumnNameBox" id="selectColumnNameBox_<?php echo e($key); ?>" style="display:none;">
                                        <div class="col-sm-12 p-0">

                                            <div class="form-group">
                                                <label class="control-label">
                                                    <?php echo app('translator')->get('app.columnName'); ?>
                                                </label>
                                                <div id="selectOptionList_<?php echo e($key); ?>">
                                                    <select class="form-control select-picker mb-2" id="columnName_<?php echo e($key); ?>" name="columns[<?php echo e($key); ?>]">
                                                        <option value=""><?php echo app('translator')->get("app.selectAColumn"); ?></option>
                                                        <?php if(!empty($heading) && collect($columns)->whereIn('id', $heading[$key])->first()): ?>
                                                            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectKey => $selectColumn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($selectColumn['id']); ?>" <?php echo e(($heading[$key]==$selectColumn['id']) ? 'selected' : ''); ?>><?php echo e($selectColumn['name']); ?>

                                                            </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 p-0">
                                            <div class="form-group">
                                                <button onclick="goBack(<?php echo e($key); ?>)" class="btn btn-info btn-sm" type="button"><?php echo app('translator')->get("app.btnBack"); ?></button>
                                                <button onclick="saveColumnBox(<?php echo e($key); ?>)" class="btn btn-dark btn-sm"
                                                    type="button"><?php echo app('translator')->get("app.save"); ?></button>
                                                <a href="javascript:void(0);" onclick="skipColumnBox(<?php echo e($key); ?>)"><?php echo app('translator')->get("app.skip"); ?></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row columnDescriptionBox" id="columnDescriptionBox_<?php echo e($key); ?>">
                                        <div class="col-sm-12">
                                            <p id="columnDescriptionBoxText_<?php echo e($key); ?>">
                                                <?php if(!empty($heading)): ?>
                                                    <?php if(collect($columns)->whereIn('id', $heading[$key])->first()): ?>
                                                        <?php echo e(collect($columns)->whereIn('id', $heading[$key])->first()['name']); ?>

                                                    <?php else: ?>
                                                    <span class="unmatchedWarning" id="unmatchedWarning_<?php echo e($key); ?>">(<?php echo app('translator')->get('app.unmatchedColumn'); ?>)</span>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                <span class="unmatchedWarning" id="unmatchedWarning_<?php echo e($key); ?>">(<?php echo app('translator')->get('app.unmatchedColumn'); ?>)</span>
                                                <?php endif; ?>
                                                </p>
                                                <p class="alert alert-warning notimported" style="display:none;" id="columnSkipBox_<?php echo e($key); ?>">
                                                    <?php echo app('translator')->get("app.willNotBeImported"); ?></p>
                                            </div><!-- col-sm-12 -->
                                    </div>

                                    <div class="row editAndSkipBox" id="editAndSkipBox_<?php echo e($key); ?>">
                                        <div class="col-sm-12">
                                            <a href="javascript:void(0);" onclick="showColumnBox(<?php echo e($key); ?>)"><?php echo app('translator')->get("app.edit"); ?></a>&nbsp;
                                            <a href="javascript:void(0);" onclick="skipColumnBox(<?php echo e($key); ?>)"
                                                id="skipButton_<?php echo e($key); ?>"><?php echo app('translator')->get("app.skip"); ?></a>
                                        </div><!-- col-sm-12 -->
                                    </div>
                                </div>

                                <div class="importSample w-100">


                                    <?php $__currentLoopData = $importSample; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataKey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="sample">
                                        <?php echo e($value[$key]); ?>

                                    </p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                        <div class="col-md-12">
                        </div>
                    </div>
                </div>
            <?php if (isset($component)) { $__componentOriginalb19caa501eea72410c04d1917a586963 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb19caa501eea72410c04d1917a586963 = $attributes; } ?>
<?php $component = App\View\Components\FormActions::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FormActions::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['disabled' => true,'icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'process-'.e($importClassName).'-form','class' => 'mr-3']); ?><?php echo app('translator')->get('app.submit'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $attributes = $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__attributesOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d)): ?>
<?php $component = $__componentOriginalcf8d12533ff890e0d6573daf32b7618d; ?>
<?php unset($__componentOriginalcf8d12533ff890e0d6573daf32b7618d); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc35c79ed7e812580313ad04118477974 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc35c79ed7e812580313ad04118477974 = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonCancel::resolve(['link' => $backRoute] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-cancel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonCancel::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border-0']); ?><?php echo app('translator')->get('app.cancel'); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $attributes = $__attributesOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__attributesOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc35c79ed7e812580313ad04118477974)): ?>
<?php $component = $__componentOriginalc35c79ed7e812580313ad04118477974; ?>
<?php unset($__componentOriginalc35c79ed7e812580313ad04118477974); ?>
<?php endif; ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb19caa501eea72410c04d1917a586963)): ?>
<?php $attributes = $__attributesOriginalb19caa501eea72410c04d1917a586963; ?>
<?php unset($__attributesOriginalb19caa501eea72410c04d1917a586963); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb19caa501eea72410c04d1917a586963)): ?>
<?php $component = $__componentOriginalb19caa501eea72410c04d1917a586963; ?>
<?php unset($__componentOriginalb19caa501eea72410c04d1917a586963); ?>
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
    <div class="bg-white rounded p-2"  id="afterSubmitting" style="display:none">
        <div class="alert alert-warning" role="alert" id="process-warning">
                <?php echo app('translator')->get("app.doNotCloseOrRefreshPage"); ?>
        </div>
        <div class="alert alert-success" role="alert" id="importSuccess" style="display:none">
        </div>
        <div class="alert alert-success" role="alert" id="progressSuccess" style="display:none">
        </div>
        <div class="alert alert-danger" role="alert" id="failedJobsCount" style="display:none">
        </div>
        <div id="progressError" style="display:none"></div>
        <div id="progress">
            <p><?php echo app('translator')->get('app.importInProgress'); ?> <strong id="progressAmount"><?php echo app('translator')->get('app.pleaseWait'); ?></strong></p>
            <div class="progress">
                <div id="processingBarStatus" class="progress-bar  progress-bar-striped  progress-bar-animated" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
        </div>


    </div>
    <div class="w-100 border-top-grey justify-content-start px-4 py-3 bg-white rounded d-none" id="afterProcessing">
        <?php if (isset($component)) { $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f = $attributes; } ?>
<?php $component = App\View\Components\Forms\LinkPrimary::resolve(['link' => $backRoute] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.link-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\LinkPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e($backButtonText); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $attributes = $__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__attributesOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f)): ?>
<?php $component = $__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f; ?>
<?php unset($__componentOriginaldbb84df4c3a5cbdd95fb35d18ba6410f); ?>
<?php endif; ?>
    </div>
</div>
<div id="exceptionTable" class="col-sm-12 mt-2" style="display:none">

</div>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script type="text/javascript">

    $('.select-picker').selectpicker();
        // Current column being edited
        let columnID = 0;
        let progress = 0;
        // Fields associated with this import
        let jsColumnArray = $.parseJSON('<?php echo addslashes(json_encode($columns)); ?>');
        let currentImportColumnID = jsColumnArray[0].id; // By default column 0 is selected

        // Array to store matched columns. ith element tells that Column i of the CSV matches with which field
        // of the import. Initially each columns is matched serially with columns in the CSV
        let jsMatchedColumnArray = $.parseJSON('<?php echo addslashes( json_encode( $matchedColumns )); ?>');

        function contains(array, value) {
            for (let i = 0; i < array.length; i++) {
                if (array[i] == value) {
                    return true;
                }
            }
            return false;
        }
        function updateJsMatchedColumnArray() {

            jsMatchedColumnArray = [];

            $('.selectColumnNameBox').each(function () {
                if ($(this).find('select').val() != '') {
                    jsMatchedColumnArray.push($(this).find('select').val());
                }
            });

            return jsMatchedColumnArray;
        }

        function checkRequiredMatch() {

            let requiredNotMatched = [];
            // Check if all required columns are matched b
            for (let i = 0; i < jsColumnArray.length; i++) {
                if (jsColumnArray[i]["required"] == "Yes") {
                    if (!contains(jsMatchedColumnArray, jsColumnArray[i]["id"])) {
                        requiredNotMatched.push(jsColumnArray[i]);
                    }
                }
            }
            return requiredNotMatched;
        }

        function requiredMatchAction() {
            let requiredMatched = checkRequiredMatch();
            if (requiredMatched.length == 0) {
                $("#getUnMatchedSuccess").show();
                $("#requiredColumnsUnmatched").hide();
                $("#process-<?php echo e($importClassName); ?>-form").removeAttr("disabled");
            } else {
                let str = _.join(_.map(requiredMatched, 'name'), ', ');
                let msg = "<?php echo app('translator')->get("messages.requiredColumnsUnmatched"); ?>";
                msg = msg.replace(":columns", str);
                $("#getUnMatchedSuccess").hide();
                $("#requiredColumnsUnmatched").html(msg).show();
            }
        }

        function showColumnBox(columnID) {

            // Hide all other edit boxes
            $(".selectColumnNameBox").hide();
            $(".editAndSkipBox").show();
            $(".columnDescriptionBox").show();

            // Show hide for this column
            $('#skipButton_' + columnID).show();
            $('#columnSkipBox_' + columnID).hide();
            $('#editAndSkipBox_' + columnID).hide();
            $('#columnDescriptionBox_' + columnID).hide();
            $('#selectColumnNameBox_' + columnID).show();

            // Hide back button for first column
            if (columnID == 0) {
                $("#selectColumnNameBox_" + columnID + " .btn-info").hide();
            }

            let selectedOption = $('#columnName_' + columnID);
            let selectedColumnID = selectedOption.val();
            currentImportColumnID = selectedColumnID;
            selectedOption.selectpicker('refresh');

            let selectListText = generateSelectList(columnID);

            $('#selectOptionList_' + columnID).html(selectListText);
            $('.select-picker').selectpicker('refresh');
        }


        function goBack(columnID) {
            $('#columnName_' + columnID).val(currentImportColumnID);
            $('#skipButton_' + columnID).show();
            $('#columnSkipBox_' + columnID).hide();
            $('#selectColumnNameBox_' + columnID).hide();
            $('#editAndSkipBox_' + columnID).show();
            $('#columnDescriptionBox_' + columnID).show();

            if ($('#columnName_' + columnID).hasClass('skipped')) {
                $('#columnName_' + columnID).val('');
                $('#columnSkipBox_' + columnID).show();
            }
            $('#columnName_' + columnID).selectpicker('refresh');
            --columnID;
            showColumnBox(columnID);
        }

        function saveColumnBox(columnID) {
            let selectedOption = $('#columnName_' + columnID + ' option:selected');
            let selectedColumnID = selectedOption.val();

            if (selectedColumnID == "") {
                Swal.fire({
                    icon: 'error',
                    text: "<?php echo app('translator')->get("messages.pleaseSelectAColumn"); ?>",

                    toast: true,
                    position: "top-end",
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,

                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                    showClass: {
                        popup: "swal2-noanimation",
                        backdrop: "swal2-noanimation",
                    },
                });
            } else {
                $('#columnName_' + columnID).removeClass('skipped');

                let columnName = selectedOption.text();

                updateJsMatchedColumnArray();

                $('#skipButton_' + columnID).show();

                $('#columnSkipBox_' + columnID).hide();
                $('#columnDescriptionBoxText_' + columnID).html(columnName);
                $('#selectColumnNameBox_' + columnID).hide();
                $('#columnDescriptionBox_' + columnID).show();
                $('#columnDescriptionBoxText_' + columnID).show();
                $('#editAndSkipBox_' + columnID).show();
                $('#unmatchedWarning_' + columnID).hide();

                $('#box_' + columnID).removeClass('unchanged unmatched').addClass('matched');

                let unmatched = getUnMatched();
                $("#unmatchedCount").html(unmatched);

                requiredMatchAction();

                ++columnID;

                if ($('#columnName_' + columnID).length) {
                    showColumnBox(columnID);
                }
            }

        }

        function skipColumnBox(columnID) {
            $('#columnName_' + columnID).addClass('skipped');
            $('#columnName_' + columnID).val('');
            $('#columnName_' + columnID).selectpicker('refresh');

            updateJsMatchedColumnArray();

            $('#columnDescriptionBox_' + columnID).show();
            $('#selectColumnNameBox_' + columnID).hide();
            $('#columnDescriptionBoxText_' + columnID).hide();
            $('#skipButton_' + columnID).hide();

            $('#columnSkipBox_' + columnID).show();
            $('#editAndSkipBox_' + columnID).show();
            $('#unmatchedWarning_' + columnID).hide();


            $('#box_' + columnID).removeClass('matched unchanged').addClass('unmatched');

            let unmatched = getUnMatched();
            $("#unmatchedCount").html(unmatched);

            requiredMatchAction();

            ++columnID;

            if ($('#columnName_' + columnID).length) {
                showColumnBox(columnID);
            }

        }
          // Generate the select control for this column box
        function generateSelectList(columnID) {

            // So that we can select column if user edits it
            let selectedColumnID = jsMatchedColumnArray[columnID];

            let skippedClass = '';

            if($('#columnName_' + columnID).hasClass('skipped')){
                skippedClass = 'skipped';
            }

            let text = '<select id="columnName_' + columnID + '" class="form-control select-picker mb-2 ' + skippedClass + '" name="columns[' + columnID +']">' +
                '<option value=""><?php echo app('translator')->get("app.selectAColumn"); ?></option>';

            for (let i = 0; i < jsColumnArray.length; i++) {
                let id = jsColumnArray[i]['id'];
                let name = jsColumnArray[i]['name'];
                let skip = false;

                $('.selectColumnNameBox').each(function () {
                    if ($(this).find('select').val() != '' && $(this).find('select').val() == id && $('.selectColumnNameBox #columnName_'+ columnID).val() != id) {
                        skip = true;
                    }
                });

                if (skip) continue;

                if (selectedColumnID == id || $('.selectColumnNameBox #columnName_'+ columnID).val() == id) {
                    text += '<option value="' + id + '" selected>' + name + '</option>';
                } else {
                    text += '<option value="' + id + '">' + name + '</option>';
                }

            }

            text += "</select>";

            return text;
        }

        function getUnMatched() {
            let jsMatchedColumn = [];

            $('.selectColumnNameBox').each(function () {
                if ($(this).find('select').val() == '' && !$(this).find('select').hasClass('skipped')) {
                    jsMatchedColumn.push($(this).find('select').val());
                }
            });

            return jsMatchedColumn.length;
        }

        function skipall() {
            $('.unmatched').each(function () {
                skipColumnBox($(this).data('key'));
            });
        }


        function getProgress(batchId){

            $('#process-<?php echo e($importClassName); ?>-data-form').hide();
            $('#afterSubmitting').show();
            var url = "<?php echo e(route('import.process.progress', [$importClassName, ':batchId'])); ?>";
            url = url.replace(':batchId', batchId);

            setTimeout(function () {
                $.easyAjax({
                    type: 'GET',
                    url: url,
                    success: function (response) {
                        var failedJobs = response.failedJobs;
                        var pendingJobs = response.pendingJobs;
                        var processedJobs = response.processedJobs;
                        progress = response.progress;
                        var totalJobs = response.totalJobs;

                        $('#processingBarStatus').width( progress + '%');
                        $('#processingBarStatus').html(progress + '%');
                        $('#progressAmount').html(progress + '%');


                        if(failedJobs > 0){
                            var failedMsg = `<?php echo app('translator')->get("app.importFailedJobs"); ?>`;
                            failedMsg = failedMsg.replace(':failedJobs', failedJobs).replace(':totalJobs', totalJobs);
                            $('#failedJobsCount').html(failedMsg);
                            $('#failedJobsCount').show();
                        }
                        if(processedJobs > 0){
                            var processedMsg = `<?php echo app('translator')->get("app.importProcessedJobs"); ?>`;
                            processedMsg = processedMsg.replace(':processedJobs', processedJobs).replace(':totalJobs', totalJobs);
                            $('#progressSuccess').html(processedMsg);
                            $('#progressSuccess').show();
                        }

                        if (totalJobs != (failedJobs + processedJobs)) {
                            getProgress(batchId);
                        }else{
                            $('#importSuccess').html(`<?php echo app('translator')->get("app.importCompleted"); ?>`);
                            $('#process-warning').hide();
                            $('#importSuccess').show();
                            $('#progress').hide();
                            $('#afterProcessing').removeClass('d-none');
                            $('#afterProcessing').addClass('d-lg-flex d-md-flex d-block');
                            getQueueException();
                        }
                    },
                    error: function (response) {
                        if (progress != 100) {
                            getProgress(batchId);
                        }
                    }
                });
            }, 2000);
        }

        function getQueueException() {
            var url = "<?php echo e(route('import.process.exception', $importClassName)); ?>";

            $.easyAjax({
                type: 'GET',
                url: url,
                success: function(response){
                    if (response.count) {
                        $('#exceptionTable').html(response.view);
                        $('#exceptionTable').show();

                    }
                }
            });
        }

    $(document).ready(function() {

        $('body').on('click', '#showSkipped', function() {
            if (this.checked) {
                $(".unmatched").show();
            } else {
                $(".unmatched").hide();
            }
        });

        let unmatched = getUnMatched();
        $("#unmatchedCount").html(unmatched);

        if (getUnMatched() == 0) {
            $("#getUnMatchedSuccess").show();
            $("#process-<?php echo e($importClassName); ?>-form").removeAttr("disabled");
        } else {
            $("#process-<?php echo e($importClassName); ?>-form").attr("disabled", "disabled");
            showColumnBox(columnID);
        }

        requiredMatchAction();

        $('body').on('click', '#process-<?php echo e($importClassName); ?>-form', function() {
            const url = "<?php echo e($processRoute); ?>";

            $.easyAjax({
                url: url,
                container: '#process-<?php echo e($importClassName); ?>-data-form',
                type: "POST",
                disableButton: true,
                blockUI: true,
                buttonSelector: "#process-<?php echo e($importClassName); ?>-form",
                data: $('#process-<?php echo e($importClassName); ?>-data-form').serialize(),
                success: function (response) {
                    if (response.status == 'success') {
                        getProgress(response.batch.id);
                    }
                }
            });
        });
    });

    $('.import-table').on('shown.bs.select', function () {
        $('.import-table').css("overflow", "inherit");
        $('#import_table').css("overflow-x", "hidden");
    });

    $('.import-table').on('hidden.bs.select', function () {
        $('.import-table').css("overflow", "auto");
        $('#import_table').css("overflow-x", "auto");
    })
</script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/import/process-form.blade.php ENDPATH**/ ?>