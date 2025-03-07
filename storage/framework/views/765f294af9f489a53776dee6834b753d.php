<?php if($pushSetting->status == 'active'): ?>
    <link rel="manifest" href="<?php echo e(asset('manifest.json')); ?>"/>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function () {
            OneSignal.SERVICE_WORKER_PARAM = {
                scope: '/vendor/onesignal/'
            };
            OneSignal.SERVICE_WORKER_PATH = 'vendor/onesignal/OneSignalSDKWorker.js'
            OneSignal.SERVICE_WORKER_UPDATER_PATH = 'vendor/onesignal/OneSignalSDKUpdaterWorker.js'
            OneSignal.init({
                appId: "<?php echo e($pushSetting->onesignal_app_id); ?>",
                autoRegister: false,
                notifyButton: {
                    enable: true,
                    showCredit: false,
                    theme: "inverse",
                    size: "small",
                    position: '<?php echo e(user()->rtl ? 'bottom-left' : 'bottom-right'); ?>',
                    text: {
                        'tip.state.unsubscribed': "<?php echo app('translator')->get('app.onesignal.tip.state.unsubscribed'); ?>",
                        'tip.state.subscribed': "<?php echo app('translator')->get('app.onesignal.tip.state.subscribed'); ?>",
                        'tip.state.blocked': "<?php echo app('translator')->get('app.onesignal.tip.state.blocked'); ?>",
                        'message.prenotify': "<?php echo app('translator')->get('app.onesignal.message.prenotify'); ?>",
                        'message.action.subscribed': "<?php echo app('translator')->get('app.onesignal.message.action.subscribed'); ?>",
                        'message.action.resubscribed': "<?php echo app('translator')->get('app.onesignal.message.action.resubscribed'); ?>",
                        'message.action.unsubscribed': "<?php echo app('translator')->get('app.onesignal.message.action.unsubscribed'); ?>",
                        'dialog.main.title': "<?php echo app('translator')->get('app.onesignal.dialog.main.title'); ?>",
                        'dialog.main.button.subscribe': "<?php echo app('translator')->get('app.onesignal.dialog.main.button.subscribe'); ?>",
                        'dialog.main.button.unsubscribe': "<?php echo app('translator')->get('app.onesignal.dialog.main.button.unsubscribe'); ?>",
                        'dialog.blocked.title': "<?php echo app('translator')->get('app.onesignal.dialog.blocked.title'); ?>",
                        'dialog.blocked.message': "<?php echo app('translator')->get('app.onesignal.dialog.blocked.message'); ?>"
                    }
                },
                promptOptions: {
                    /* actionMessage limited to 90 characters */
                    actionMessage: "<?php echo app('translator')->get('app.onesignal.actionMessage'); ?>",
                    /* acceptButtonText limited to 15 characters */
                    acceptButtonText: "<?php echo app('translator')->get('app.onesignal.acceptButtonText'); ?>",
                    /* cancelButtonText limited to 15 characters */
                    cancelButtonText: "<?php echo app('translator')->get('app.onesignal.cancelButtonText'); ?>"
                }
            });

            OneSignal.on('subscriptionChange', function (isSubscribed) {
                console.log("The user's subscription state is now:", isSubscribed);
            });


            if (Notification.permission === "granted") {
                // Automatically subscribe user if deleted cookies and browser shows "Allow"
                OneSignal.getUserId()
                    .then(function (userId) {
                        if (!userId) {
                            OneSignal.registerForPushNotifications();
                        } else {
                            let db_onesignal_id = '<?php echo e($user->onesignal_player_id); ?>';

                            if (db_onesignal_id !== userId) { //update onesignal ID if it is new
                                updateOnesignalPlayerId(userId);
                            }
                        }
                    })
            } else {
                OneSignal.isPushNotificationsEnabled(function (isEnabled) {

                    OneSignal.getUserId(function (userId) {
                        console.log("OneSignal User ID:", userId);
                        // (Output) OneSignal User ID: 270a35cd-4dda-4b3f-b04e-41d7463a2316
                        let db_onesignal_id = '<?php echo e($user->onesignal_player_id); ?>';
                        console.log('database id : ' + db_onesignal_id);

                        if (db_onesignal_id !== userId) { //update onesignal ID if it is new
                            updateOnesignalPlayerId(userId);
                        }
                    });

                    if (isEnabled) {
                        console.log("Push notifications are enabled! - 2    ");
                        // console.log("unsubscribe");
                        // OneSignal.setSubscription(false);
                    } else {
                        console.log("Push notifications are not enabled yet. - 2");
                        OneSignal.showNativePrompt();
                        // OneSignal.registerForPushNotifications({
                        //         modalPrompt: true
                        // });
                    }
                });

            }
        });
    </script>
<?php endif; ?>

<?php if($pusherSettings->status): ?>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script>
        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;

        const pusher = new Pusher('<?php echo e($pusherSettings->pusher_app_key); ?>', {
            cluster: '<?php echo e($pusherSettings->pusher_cluster); ?>',
            forceTLS: '<?php echo e($pusherSettings->force_tls); ?>'
        });
        
    </script>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Mcagrath\mcagrath-crm\resources\views/sections/push-setting-include.blade.php ENDPATH**/ ?>