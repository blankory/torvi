<?php

function image_tp_web($imageUrl, $imageName, $password, $login, $site) {

    $file = file_get_contents( $imageUrl );
    $url = "{$site}/wp-json/wp/v2/media";

    $ch = curl_init($url);
    // curl_setopt( $ch, CURLOPT_URL, $url );
    curl_setopt( $ch, CURLOPT_POST, 1 );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $file );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, [
        'Content-Disposition: form-data; filename="'.$imageName.'"',
        'Authorization: Basic ' . base64_encode( $login . ':' . $password ),
    ] );
    $result = curl_exec( $ch );
    $response = json_decode($result);
    curl_close( $ch );

    return $response->{'id'};
}

function post_to_web($title, $description, $imageUrl, $imageName) {
    include dirname(__FILE__) . "/../../secrets.php";
    $login =  $secrets->wp_username;
    $password = $secrets->wp_password;
    $site = $secrets->wp_address;
    $url = "{$site}/wp-json/wp/v2/posts";
    $imageId = image_tp_web($imageUrl, $imageName, $password, $login, $site);
    $params = array(
            'title'   => $title,
            'content'  => $description,
            'status' => 'draft',
            'featured_media' => $imageId
    );
    $content = json_encode($params);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode($login . ':' . $password),
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
}

?>