<meta http-equiv="refresh" content="5">
<?php

require_once('./chat/newsfeed_chat.php');

$activateChat= new ChatRoom();

//draw chat application
$startChat = $initMessages->sendMessages();

$chatResult = 'Login before using';
//get previous chat messages if there are any
echo $activateChat->getChatMessages();

?>