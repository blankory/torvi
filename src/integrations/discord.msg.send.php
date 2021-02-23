<?php
function send_discord_msg($title, $description, $url)
{
    include "../../secrets.php";
    //=======================================================================================================
    // Create new webhook in your Discord channel settings and copy&paste URL
    //=======================================================================================================

    $webhookurl = $secrets->discord_webhook;

    //=======================================================================================================
    // Compose message. You can use Markdown
    // Message Formatting -- https://discordapp.com/developers/docs/reference#message-formatting
    //========================================================================================================

    $timestamp = date("c", strtotime("now"));

    $json_data = json_encode(
        [
            // Message
            //"content" => "Hello World! This is message line ;) And here is the mention, use userID <@12341234123412341>",
            "content" => "",

            // Username
            "username" => "Tiedotustorvi",

            // Avatar URL.
            // Uncoment to replace image set in webhook
            //"avatar_url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=512",

            // Text-to-speech
            "tts" => false,

            // File upload
            // "file" => "",

            // Embeds Array
            "embeds" => [
                [
                    // Embed Title
                    "title" => $title,

                    // Embed Type
                    "type" => "rich",

                    // Embed Description
                    "description" => $description,

                    // URL of title link
                    "url" => $url,

                    // Timestamp of embed must be formatted as ISO8601
                    "timestamp" => $timestamp,

                    // Embed left border color in HEX
                    "color" => hexdec("00cef0"),

                    // Footer
                    //"footer" => [
                    //    "text" => "GitHub.com/blankory",
                    //    "icon_url" => "https://avatars.githubusercontent.com/u/24474712?s=200&v=4"
                    //],

                    // Image to send
                    //"image" => [
                    //    "url" => "https://avatars.githubusercontent.com/u/24474712?s=200&v=4"
                    //],

                    // Thumbnail
                    //"thumbnail" => [
                    //    "url" => "https://avatars.githubusercontent.com/u/24474712?s=200&v=4"
                    //],

                    // Author
                    //"author" => [
                    //    "name" => "Blanko",
                    //    "url" => "https://blanko.fi/"
                    //],

                    // Additional Fields array
                    //"fields" => [
                    //    // Field 1
                    //    [
                    //        "name" => "Field #1 Name",
                    //        "value" => "Field #1 Value",
                    //        "inline" => false
                    //    ],
                    //    // Field 2
                    //    [
                    //        "name" => "Field #2 Name",
                    //        "value" => "Field #2 Value",
                    //        "inline" => true
                    //    ]
                    // Etc..
                    //]
                ],
            ],
        ],
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
    );

    $ch = curl_init($webhookurl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-type: application/json"]);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);
    // If you need to debug, or find out why you can't send message uncomment line below, and execute script.
    // echo $response;
    curl_close($ch);
}
