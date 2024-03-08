<?php
/*
 Plugin Name: Post Listing
 Author: Fei
 Description: When listing posts, there are two types of layout, horizontal for a big banner, or vertical layout for other posts.
 shortcode : [listing-post]
*/

class PostListing {
    public function __construct(){
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_shortcode( 'listing-post', array($this, 'generate_post_listing') );
    }

    public function enqueue_scripts(){
        wp_enqueue_style('listing_post_css' , plugin_dir_url( __FILE__ ).'/post-listings.css');
    }

    public function generate_post_listing(){
        $posts = new WP_Query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'order_by' => 'date',
            'order' => 'DESC',
        ));
        $output = "<section aria-label='Post Listing'> 
        <h2 class='text-center'>Listing of Posts</h2>";
        if($posts->have_posts()){
            while($posts->have_posts()){
                $posts->the_post();
                if($posts->current_post == 0){
                    $output .= "<article class='post-listing-horizontal'>
                                        ".get_the_post_thumbnail()."
                                        <div class='img-overlay'></div>
                                        <div class='content'>
                                            <div class='post-title'>".get_the_title()."</div>
                                            <div class='post-content'>".get_the_content()."</div>
                                            <div class='post-date'>on ". date('Y-m-d',strtotime(get_the_date()))."</div>                                        
                                        </div>

                                </article>";                       
                }else{
                    $output .= "<article class='post-listing-vertical'>
                            ".get_the_post_thumbnail()."
                            <div class='img-overlay'></div>
                            <div class='content'>
                                <div class='post-title'>".get_the_title()."</div>
                                <div class='post-content'>".get_the_content()."</div>
                                <div class='post-date'>on ".date('Y-m-d',strtotime(get_the_date()))."</div>                                        
                            </div>
                    </article>";    
                }
            }
         
            wp_reset_postdata();
        }

        $output .= "</section>";

        return $output;
    }
}
new PostListing();
