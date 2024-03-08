<?php

/*
    Plugin Name: Card View
    Author: Fei
    Description: Generate Card View for recent 5 posts using shortcode [card-view]
*/

class CardView{
    public function __construct(){
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts') );
        add_action( 'admin_enqueue_scripts', array($this, 'enqueue_scripts') );
        add_shortcode('card-view', array($this, 'generate_card_view') );
    }
    public function enqueue_scripts(){
        wp_enqueue_script('card_view_js', plugin_dir_url( __FILE__).'card-view.js' , array('jquery') , 1.0);
        wp_enqueue_style('card_view_css', plugin_dir_url( __FILE__).'card-view.css');
    }
    public function generate_card_view(){
        global $wpdb;
        $posts = $wpdb->get_results("SELECT * FROM wp_gamesposts WHERE post_type='post' AND post_status ='publish' ORDER BY post_date DESC LIMIT 5");
        $output = '<section class="card-view-container" aria-label="Post Card Section">';
        foreach ($posts as $post){  
            $output .= "<article class='card-view'> 
                        <div class='card-view-head'>Article <span>on ". date('Y-m-d',strtotime($post->post_date))."</span></div>
                        <div class='card-view-body'>$post->post_title</div>
                    </article>";
        }
        $output .= '</section>';

        return $output;

    }
}

new CardView();