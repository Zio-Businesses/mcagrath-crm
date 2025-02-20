<style>
    .rating-stars ul {
        list-style-type: none;
        padding: 0;
        -moz-user-select: none;
        -webkit-user-select: none;
    }

    .rating-stars ul>li.star {
        display: inline-block;
        margin: 1px;
    }

    /* Idle State of the stars */
    .rating-stars ul>li.star>i.fa {
        /* font-size: 1.6em; */
        /* Change the size of the stars */
        color: #ccc;
        /* Color on idle state */
    }

    /* Hover state of the stars */
    .rating-stars ul>li.star.hover>i.fa {
        color: var(--header_color);
    }

    /* Selected state of the stars */
    .rating-stars ul>li.star.selected>i.fa {
        color: var(--header_color);
    }

    .selected {
        color: var(--header_color);
    }

</style>

<!-- ROW START -->
<div class="row py-3 py-lg-5 py-md-5">

    <div class="col-lg-12 col-md-12 mb-4 mb-xl-0 mb-lg-4">

        <?php
            $memberIds = $project->members->pluck('user_id')->toArray();
        ?>

        <?php if(
            $editRatingPermission == 'all'
            || ($editRatingPermission == 'added' && $project->rating->added_by == user()->id)
            || ($editRatingPermission == 'owned' && (in_array(user()->id, $memberIds) || $project->client_id == user()->id))
            || ($editRatingPermission == 'both' && (in_array(user()->id, $memberIds) || $project->client_id == user()->id || $project->rating->added_by == user()->id))
            || in_array('client', user_roles())
            ): ?>

            <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Form::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'save-project-rating-form','class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Arr::toCssClasses(['d-none' => (!is_null($project->rating) || ($addRatingPermission == 'none') && is_null($project->rating))]))]); ?>
                <div class="add-client rounded bg-white">
                    <div class="row p-20">

                        <div class="col-md-12">
                            <?php if (isset($component)) { $__componentOriginal89b295b0763c93abe0143426334eb5d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal89b295b0763c93abe0143426334eb5d6 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Label::resolve(['fieldLabel' => __('app.menu.projectRating'),'fieldId' => 'project-rating'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Label::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $attributes = $__attributesOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__attributesOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal89b295b0763c93abe0143426334eb5d6)): ?>
<?php $component = $__componentOriginal89b295b0763c93abe0143426334eb5d6; ?>
<?php unset($__componentOriginal89b295b0763c93abe0143426334eb5d6); ?>
<?php endif; ?>
                            <div class="rating-stars">
                                <ul id="stars">
                                    <li class="star <?php if(!is_null($project->rating) &&
                                        $project->rating->rating >= 1): ?> selected <?php endif; ?>"
                                        title="Poor" data-value="1">
                                        <i class="fa fa-star f-18"></i>
                                    </li>
                                    <li class="star <?php if(!is_null($project->rating) &&
                                        $project->rating->rating >= 2): ?> selected <?php endif; ?>"
                                        title="Fair" data-value="2">
                                        <i class="fa fa-star f-18"></i>
                                    </li>
                                    <li class="star <?php if(!is_null($project->rating) &&
                                        $project->rating->rating >= 3): ?> selected <?php endif; ?>"
                                        title="Good" data-value="3">
                                        <i class="fa fa-star f-18"></i>
                                    </li>
                                    <li class="star <?php if(!is_null($project->rating) &&
                                        $project->rating->rating >= 4): ?> selected <?php endif; ?>"
                                        title="Excellent" data-value="4">
                                        <i class="fa fa-star f-18"></i>
                                    </li>
                                    <li class="star <?php if(!is_null($project->rating) &&
                                        $project->rating->rating >= 5): ?> selected <?php endif; ?>"
                                        title="WOW!!!" data-value="5">
                                        <i class="fa fa-star f-18"></i>
                                    </li>
                                </ul>
                            </div>

                            <div class="form-group">
                                
                                    <input type="hidden" name="rating" id="ratingID" <?php if(!is_null($project->rating)): ?> value="<?php echo e($project->rating->id); ?>" <?php endif; ?>>
                            </div>

                        </div>

                        <div class="col-md-12 mt-4">
                            <?php if (isset($component)) { $__componentOriginal2f60389a9e230471cd863683376c182f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2f60389a9e230471cd863683376c182f = $attributes; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve(['fieldId' => 'comment','fieldName' => 'comment','fieldLabel' => __('app.comment'),'fieldValue' => (!is_null($project->rating) ? $project->rating->comment : '')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2f60389a9e230471cd863683376c182f)): ?>
<?php $attributes = $__attributesOriginal2f60389a9e230471cd863683376c182f; ?>
<?php unset($__attributesOriginal2f60389a9e230471cd863683376c182f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f60389a9e230471cd863683376c182f)): ?>
<?php $component = $__componentOriginal2f60389a9e230471cd863683376c182f; ?>
<?php unset($__componentOriginal2f60389a9e230471cd863683376c182f); ?>
<?php endif; ?>
                        </div>
                    </div>

                    <!-- CANCEL SAVE SEND START -->
                    <?php if(is_null($project->deleted_at)): ?>
                        <div class="px-lg-4 px-md-4 px-3 py-3 c-inv-btns">
                            <div class="d-flex">
                                <?php if (isset($component)) { $__componentOriginalcf8d12533ff890e0d6573daf32b7618d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf8d12533ff890e0d6573daf32b7618d = $attributes; } ?>
<?php $component = App\View\Components\Forms\ButtonPrimary::resolve(['icon' => 'check'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button-primary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\ButtonPrimary::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'save-form']); ?><?php echo app('translator')->get('app.save'); ?>
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
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- CANCEL SAVE SEND END -->

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
        <?php endif; ?>

        <div class="add-client rounded bg-white">
            <div class="row p-20">

                <?php if(!is_null($project->rating)): ?>
                    <?php if(
                        $viewRatingPermission == 'all'
                        || ($viewRatingPermission == 'added' && $project->rating->added_by == user()->id)
                        || ($viewRatingPermission == 'owned' && (in_array(user()->id, $memberIds) || $project->client_id == user()->id))
                        || ($viewRatingPermission == 'both' && (in_array(user()->id, $memberIds) || $project->client_id == user()->id || $project->rating->added_by == user()->id))
                        ): ?>

                        <div class="col-md-12 mt-1 rating-detail">
                            <div class="rating-stars">
                                <ul>
                                    <li class="star <?php if($project->rating->rating >= 1): ?> selected <?php endif; ?>" title="Poor" data-value="1">
                                        <i class="fa fa-star f-18"></i>
                                    </li>
                                    <li class="star <?php if($project->rating->rating >= 2): ?> selected <?php endif; ?>" title="Fair" data-value="2">
                                        <i class="fa fa-star f-18"></i>
                                    </li>
                                    <li class="star <?php if($project->rating->rating >= 3): ?> selected <?php endif; ?>" title="Good" data-value="3">
                                        <i class="fa fa-star f-18"></i>
                                    </li>
                                    <li class="star <?php if($project->rating->rating >= 4): ?> selected <?php endif; ?>" title="Excellent" data-value="4">
                                        <i class="fa fa-star f-18"></i>
                                    </li>
                                    <li class="star <?php if($project->rating->rating >= 5): ?> selected <?php endif; ?>" title="WOW!!!" data-value="5">
                                        <i class="fa fa-star f-18"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4 rating-detail">
                            <blockquote class="blockquote">
                                <p class="mb-0 f-16"><?php echo e(nl2br($project->rating->comment)); ?></p>
                                <footer class="blockquote-footer f-14"><?php echo e($project->client->name); ?>, <em class="f-11"><?php echo e($project->rating->created_at->diffForHumans()); ?></em></footer>
                            </blockquote>

                            <?php if(
                                is_null($project->deleted_at) &&
                                $editRatingPermission == 'all'
                                || ($editRatingPermission == 'added' && $project->rating->added_by == user()->id)
                                || ($editRatingPermission == 'owned' && (in_array(user()->id, $memberIds) || $project->client_id == user()->id))
                                || ($editRatingPermission == 'both' && (in_array(user()->id, $memberIds) || $project->client_id == user()->id || $project->rating->added_by == user()->id))
                                || in_array('client', user_roles())
                                ): ?>
                                <a href="javascript:;" class="text-darkest-grey edit-rating"><u><?php echo app('translator')->get('app.edit'); ?></u></a>
                            <?php endif; ?>

                            <?php if(
                                is_null($project->deleted_at) &&
                                $deleteRatingPermission == 'all'
                                || ($deleteRatingPermission == 'added' && $project->rating->added_by == user()->id)
                                || ($deleteRatingPermission == 'owned' && (in_array(user()->id, $memberIds) || $project->client_id == user()->id))
                                || ($deleteRatingPermission == 'both' && (in_array(user()->id, $memberIds) || $project->client_id == user()->id || $project->rating->added_by == user()->id))
                                || in_array('client', user_roles())
                                ): ?>
                                <a href="javascript:;" data-rating-id="<?php echo e($project->rating->id); ?>" class="text-darkest-grey delete-rating ml-2"><u><?php echo app('translator')->get('app.delete'); ?></u></a>
                            <?php endif; ?>

                        </div>

                    <?php else: ?>
                        <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'star','message' => __('modules.projects.noRatingAvailable')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.no-record'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\NoRecord::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $attributes = $__attributesOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__attributesOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $component = $__componentOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__componentOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginal269164c77d9d34462c34359c03da6a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269164c77d9d34462c34359c03da6a68 = $attributes; } ?>
<?php $component = App\View\Components\Cards\NoRecord::resolve(['icon' => 'star','message' => __('modules.projects.noRatingAvailable')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('cards.no-record'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Cards\NoRecord::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $attributes = $__attributesOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__attributesOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal269164c77d9d34462c34359c03da6a68)): ?>
<?php $component = $__componentOriginal269164c77d9d34462c34359c03da6a68; ?>
<?php unset($__componentOriginal269164c77d9d34462c34359c03da6a68); ?>
<?php endif; ?>
                <?php endif; ?>

            </div>
        </div>

    </div>
</div>

    <script>
        $(document).ready(function() {
            var ratingValue = "<?php echo e(!is_null($project->rating) ? $project->rating->rating : 0); ?>";

            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function() {
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function(e) {
                    if (e < onStar) {
                        $(this).addClass('hover');
                    } else {
                        $(this).removeClass('hover');
                    }
                });
            }).on('mouseout', function() {
                $(this).parent().children('li.star').each(function(e) {
                    $(this).removeClass('hover');
                });
            });

            /* 2. Action to perform on click */
            $('#stars li').on('click', function() {
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');

                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }

                ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            });

            $('.save-form').click(function() {

                var token = "<?php echo e(csrf_token()); ?>";
                var url = "<?php echo e(route('project-ratings.store')); ?>";
                var method = 'POST';
                var ratingID = $('#ratingID').val();

                if (ratingID) {
                    url = "<?php echo e(route('project-ratings.update', ':id')); ?>";
                    url = url.replace(':id', ratingID);
                    method = 'PUT';
                }

                if (ratingValue !== 0) {
                    $.easyAjax({
                        url: url,
                        container: "#save-project-rating-form",
                        type: "POST",
                        blockUI: true,
                        redirect: true,
                        data: {
                            'rating': ratingValue,
                            'project_id': <?php echo e($project->id); ?>,
                            'comment': $('#comment').val(),
                            '_token': token,
                            '_method': method
                        },
                        success: function () {
                            window.location.reload();
                        }
                    })
                }
            });

            $('.delete-rating').click(function() {

                var token = "<?php echo e(csrf_token()); ?>";
                var method = 'DELETE';
                var ratingID = $(this).data('rating-id');

                if (ratingID) {
                    url = "<?php echo e(route('project-ratings.destroy', ':id')); ?>";
                    url = url.replace(':id', ratingID);
                }

                $.easyAjax({
                    url: url,
                    container: "#save-project-rating-form",
                    type: "POST",
                    blockUI: true,
                    redirect: true,
                    data: {
                        'ratingID': ratingID,
                        '_token': token,
                        '_method': method
                    },
                    success: function () {
                        window.location.reload();
                    }
                })
            });

            $('.edit-rating').click(function() {
                $('#save-project-rating-form').removeClass('d-none');
                $('.rating-detail').addClass('d-none');
            });


        });
    </script>
<?php /**PATH /home/u659716913/domains/crm.mcresi.com/public_html/resources/views/projects/ajax/rating.blade.php ENDPATH**/ ?>