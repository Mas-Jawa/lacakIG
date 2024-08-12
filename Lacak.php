<?php

function getInstagramAccountInfo($username) {
    $url = "https://www.instagram.com/" . $username . "/?__a=1";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
}

$username = 'example_username'; // Ganti dengan username Instagram yang ingin dilacak
$accountInfo = getInstagramAccountInfo($username);

if ($accountInfo) {
    echo "Username: " . $accountInfo['graphql']['user']['username'] . "\n";
    echo "Full Name: " . $accountInfo['graphql']['user']['full_name'] . "\n";
    echo "Biography: " . $accountInfo['graphql']['user']['biography'] . "\n";
    echo "Followers: " . $accountInfo['graphql']['user']['edge_followed_by']['count'] . "\n";
    echo "Following: " . $accountInfo['graphql']['user']['edge_follow']['count'] . "\n";
    echo "Posts: " . $accountInfo['graphql']['user']['edge_owner_to_timeline_media']['count'] . "\n";
} else {
    echo "Failed to retrieve account information.";
}

?>