<?php
add_action('rest_api_init', 'fetchPostsFromSites');

function fetchPostsFromSites() {
    register_rest_route('api/v1', '/get_posts/(?P<site>\w+)', array(
        'methods' => 'GET',
        'callback' => 'getPostsFromSites',
    ));
}

function getPostsFromSites($request) {
    $site = $request['site'];
    $results = [];

    switch ($site) {
        case 'games':
            $results = retrievePostsFromDatabase('ws2022_games', 'root', '', 'localhost:3301', 'wp_gamesposts');
            break;
        case 'p_media':
            $results = retrievePostsFromDatabase('ws2022_p_media', 'root', '', 'localhost:3301', 'wp_p_mediaposts');
            break;
        case 'animation_studio':
            $results = retrievePostsFromDatabase('ws2022_animation_studio', 'root', '', 'localhost:3301', 'animation_wp_posts');
            break;
    }

    return $results;
}

function retrievePostsFromDatabase($db, $user, $password, $host, $table) {
    $connection = new wpdb($user, $password, $db, $host);
    $sql = "SELECT * FROM $table WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC LIMIT 12";
    $results = $connection->get_results($sql);

    return $results;
}
?>
