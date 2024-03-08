<?php 
// Template Name: News-Aggregator

// Make a request to the API endpoint
$responseGames = wp_remote_get('http://localhost/ws2022/ws2022_cms/wp-json/api/v1/get_posts/games');
$responseMedia = wp_remote_get('http://localhost/ws2022/ws2022_cms/wp-json/api/v1/get_posts/p_media');
$responseAnimation = wp_remote_get('http://localhost/ws2022/ws2022_cms/wp-json/api/v1/get_posts/animation_studio');

    $bodyGames = wp_remote_retrieve_body($responseGames);
    $postsGames = json_decode($bodyGames);

    $bodyMedia = wp_remote_retrieve_body($responseMedia);
    $postsMedia = json_decode($bodyMedia);

    $bodyAnimation = wp_remote_retrieve_body($responseAnimation);
    $postsAnimation = json_decode($bodyAnimation);

    $actualGamePosts = [];  
    $actualAnimationPosts = [];
    $actualMediaPosts = [];
    if(isset($_GET['search'])){
        $searchQuery = strval($_GET['search']);
        foreach($postsGames as $game){
            if((preg_match('/'.$searchQuery.'/i' , $game->post_title ))){
                $actualGamePosts[] = $game;
            }
        }
        foreach($postsMedia as $media){
            if((preg_match('/'.$searchQuery.'/i' , $media->post_title ))){
                $actualMediaPosts[] = $media;
            }
        }
        foreach($postsAnimation as $animation){
            if((preg_match('/'.$searchQuery.'/i' , $animation->post_title ))){
                $actualAnimationPosts[] = $animation;
            }
        }
    }else{
        $actualGamePosts = $postsGames;
        $actualMediaPosts = $postsMedia;
        $actualAnimationPosts = $postsAnimation;
    }
    get_header();
?>
    <head>
        <style>
            .post{
                width: 600px;
                margin: 0 auto;
            }
            .news-stat{
                text-align: center;
            }
            #form-search{
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 20px 0;
            }
            #form-search > input{
                height: 40px;
            }
            #form-search > button{
                height: 40px;
                background-color: #000000;
                color: white;
            } 
        </style>
    </head>
    <main>
        <section aria-label="News Section">
            <h1 class="heading-title">News From All Corners</h1>
                <form action="#" method="get" id="form-search">
                    <input type="search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search']:'' ?>" id="search">
                    <button type="submit">Search</button>
                </form>
            <div class="news-stat"><?=count($actualGamePosts)?> (Game Platform), <?=count($actualAnimationPosts)?> (Animation Studio), <?=count($actualMediaPosts) ?> (P-Media)</div>
            <div class="news-container">
                <?php 
                // Check if posts are available
                if (!empty($actualGamePosts)) {
                    // Loop through each post
                    foreach ($actualGamePosts as $post) {
                        ?>
                        <div class="post">
                            <h2><?php echo $post->post_title; ?></h2>
                            <div class="post-content"><?php echo $post->post_content; ?></div>
                        </div>
                        <?php
                    }
                } 
                // Check if posts are available
                if (!empty($actualMediaPosts)) {
                    // Loop through each post
                    foreach ($actualMediaPosts as $post) {
                        ?>
                        <div class="post">
                            <h2><?php echo $post->post_title; ?></h2>
                            <div class="post-content"><?php echo $post->post_content; ?></div>
                        </div>
                        <?php
                    }
                } 
                // Check if posts are available
                if (!empty($actualAnimationPosts)) {
                    // Loop through each post
                    foreach ($actualAnimationPosts as $post) {
                        ?>
                        <div class="post">
                            <h2><?php echo $post->post_title; ?></h2>
                            <div class="post-content"><?php echo $post->post_content; ?></div>
                        </div>
                        <?php
                    }
                } 
                ?>
            </div>
        </section>
    </main>
    
<?php
    // Display the footer
    get_footer();
?>
