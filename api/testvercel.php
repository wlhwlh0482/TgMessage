<?php 
define('BOT_TOKEN', '5969604325:AAH1yRb9t2hSbx7rETqY4Czz_ehkSkpRJq4');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
 
// read incoming info and grab the chatID
$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chatID = $update["message"]["chat"]["id"];
$got_message = $update["message"]["text"];

// compose reply
$reply =  $got_message;
  
// send reply
$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$reply;
file_get_contents($sendto);
?>