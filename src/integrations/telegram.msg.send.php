<?php
function escape_telegram_message(string $message): string {
    return htmlspecialchars($message, ENT_NOQUOTES | ENT_HTML5, 'UTF-8');
}

function send_telegram_msg(string $title, string $description, string $url): void {
    include dirname(__FILE__) . "/../../secrets.php";
    $token = $secrets->telegram_token;
    $group_id = $secrets->telegram_group_id;
    $escaped_title = escape_telegram_message($title);
    $escaped_desc = escape_telegram_message($description);

    $tgsend = "https://api.telegram.org/bot{$token}/sendMessage";
    $fields = [
        "chat_id" => $group_id,
        "text" => "<b>{$escaped_title}</b>\n\n{$escaped_desc}",
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
    // echo $response;
    curl_close($ch);
}

?>
