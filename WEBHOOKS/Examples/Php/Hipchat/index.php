<?php
require "libraries/HipChat.php";

$hcToken = "HIPCHAT_TOKEN";

$roomName = 'ROOM_NAME';

$from = 'BULUTFON';

if(isset($_POST['caller']) && isset($_POST['event_type']) && isset($_POST['callee'])) {
    $event_type = $_POST['event_type'];
    $caller = $_POST['caller'];
    $callee = $_POST['callee'];

    $hc = new HipChat\HipChat($hcToken);
    $hc->set_verify_ssl(false);

    if($event_type == 'call_init') {
        $message = "{$caller} - {$callee}'yi arıyor.";
        $color = 'green';
    } else if ($event_type == 'call_hangup') {
        $message = "{$caller} ile {$callee} arasındaki görüşme sonlandı.";
        $color = 'red';
    } else {
        $message = "{$caller}'dan yeni faks geldi";
        $color = 'gray';
    }
    $hc->message_room($roomName, $from, $message, true, $color);
}
?>