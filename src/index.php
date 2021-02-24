<!DOCTYPE html>
<html lang="en">
<?php
require_once "header.inc.php";
require_once "form.php";
require_once "integrations/discord.msg.send.php";
require_once "integrations/telegram.msg.send.php";
require_once "integrations/email.msg.send.php";
//require_once 'gcal.add.php';

$protocol = $_SERVER["HTTPS"] == "on" ? "https" : "http";
$redirect_url = "{$protocol}://{$_SERVER["HTTP_HOST"]}";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        !isset($_POST["title"]) ||
        !isset($_POST["description"]) ||
        !isset($_POST["signature"]) ||
        !isset($_POST["reply-to"]) ||
        !isset($_POST["ready"])
    ) {
        header("Location: {$redirect_url}/index.php?status=error", true, 301);
    }

    $title = $_POST["title"];
    $description = $_POST["description"];
    $signature = $_POST["signature"];
    $reply_to = $_POST["reply-to"];
    $datetime_start = $datetime_end = $url = "";

    // preprocess form info
    if (isset($_POST["url"])) {
        $url = $_POST["url"];
    }
    //if(isset($_POST['datetime_start'])) $datetime_start = $_POST['datetime_start'];
    //if(isset($_POST['datetime_end'])) $datetime_end = $_POST['datetime_end'];
    //echo "<div class='alert alert-warning'>".var_dump($_POST)."</div>";

    // Send announcements
    send_discord_msg($title, $description, $url);
    send_telegram_msg($title, $description, $url);
    send_email_msg($title, $description, $signature, $reply_to, $url);

    // if datetime is set, create calendar event
    //if($datetime_start != '') create_gcal_event($title, $datetime_start, $datetime_end);

    // Redirect back
    header("Location: {$redirect_url}/index.php?status=success", true, 301);
}
?>
</html>
