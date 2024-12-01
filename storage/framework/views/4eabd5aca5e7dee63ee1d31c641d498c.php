

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('twilio-chat/css/main.css')); ?>" defer="defer">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="chat-app-container">
        <!-- Left Sidebar -->
        <div class="sidebar">
            <div class="search-bar">
                <div class="form-group position-relative mt-1 mb-1">
                    <!-- The Dropdown -->
                    <select id="selectVendor" name="vendor_id" class="form-control select-picker pl-5" data-live-search="true"
                        data-size="8" data-dropdown-align-right="true" title="Search for vendors">
                        <option value="">Search for vendors</option>
                        <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($vendor->id); ?>"
                                data-content="<div class='d-flex align-items-center text-left'>
                                <div class='taskEmployeeImg border-0 d-inline-block mr-1'>
                                    <img class='rounded-circle' src='<?php echo e($vendor->image_url); ?>' alt='<?php echo e($vendor->vendor_name); ?>' width='30'>
                                </div>
                                <span><?php echo e($vendor->vendor_name); ?></span>
                            </div>">
                                <?php echo e($vendor->vendor_name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <!-- Search Icon -->
                    <span class="position-absolute search-icon" style="top: 10px; left: 15px; color: #6c757d;">
                        <i class="fas fa-search"></i>
                    </span>
                </div>

            </div>
            <div class="user-list">
                <?php $__currentLoopData = $vendors_in_chat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="user" data-vendor-id="<?php echo e($vendor->id); ?>">
                        <img src="<?php echo e($vendor->image_url); ?>" alt="" />
                        <div class="userdetails">
                            <span><?php echo e($vendor->vendor_name); ?>

                            </span>
                            <p class="usercontent"><?php echo e($vendor->last_msg ? $vendor->last_msg : ''); ?></p>
                        </div>

                        <div class="notif">
                        </div>
                        <div class="time">
                            <p><?php echo e($vendor->sms_updated_at ? \Carbon\Carbon::parse($vendor->sms_updated_at)->format('H:i') : ''); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <!-- Chat Area -->
        <div class="chat-area">
            <div class="chat-header" id="chatheader">
                <img id="chat-image" src="" alt="Vendor" style="display: none" />
                <h3 id="chat-title"></h3>
            </div>
            <div class="spinner d-none justify-content-center align-items-center">
                <div class="spinner-border" role="status" aria-hidden="true"></div>
            </div>
            <div id="messages">
            </div>
            <div id="loadingMessage" class="status-message loading">Loading messages...</div>
            <div id="sendingMessage" class="status-message sending">Sending message...</div>
            <div id="errorMessage" class="status-message error">An error occurred. Please try again.</div>
            <form id="message-input" action="/twilio-send" method="POST">
                <?php echo csrf_field(); ?>
                <input type="text" name="message" id="messageInput" placeholder="Type your message" required />
                <button type="submit" id="sendButton"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </button>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://sdk.twilio.com/js/conversations/v1.0/twilio-conversations.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
    <script src="<?php echo e(asset('twilio-chat/javascript/main.js')); ?>"></script>
    <script>
        window.appData = {
            csrfToken: "<?php echo e(csrf_token()); ?>",
            twilioSend: "<?php echo e(route('twilio-send')); ?>",
            createConversation: "<?php echo e(route('createConversation')); ?>",
            fetchVendors: "<?php echo e(route('fetchVendors')); ?>",
            loggedInUserName: "<?php echo e(auth()->user()->name); ?>",
        };
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Coding\crm-main\resources\views/twilio-sms/index.blade.php ENDPATH**/ ?>