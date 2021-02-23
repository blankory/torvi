<?php
function send_telegram_msg($title, $description, $url)
{
    include "../../secrets.php";
    $token = $secrets->telegram_token;
    $group_id = $secrets->telegram_group_id;

    $tgsend = "https://api.telegram.org/bot{$token}/sendMessage";
    $fields = [
        "chat_id" => $group_id,
        "text" => "<b>{$title}</b>\n\n{$description}",
        "parse_mode" => "html", // alternatives: 'markdown'
    ];

    $ch = curl_init($tgsend);
    //curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);
    // If you need to debug, or find out why you can't send message uncomment line below, and execute script.
    echo $response;
    curl_close($ch);
}

?>
