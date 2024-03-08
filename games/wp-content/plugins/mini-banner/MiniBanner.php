<?php
/*
 * Plugin Name: Mini Banners
 * Author: Fei
 * Description: Create Custom Fields for Mini Banners of Games and Display Them in any page using shortcode: [mini-banners]
 *
 * */
class MiniBanner
{

    public function __construct()
    {
        add_action('admin_enqueue_scripts' , array($this, 'enqueue_scripts'));
        add_action('wp_enqueue_scripts' , array($this, 'enqueue_scripts'));
        add_action('init' , array($this,'register_mini_banner_post_type'));
        add_shortcode('mini-banners' , array($this,'generate_mini_banners'));
    }
    public function enqueue_scripts(){
        wp_enqueue_media();
        wp_enqueue_script('mini_banner_js' , plugin_dir_url(__FILE__).'mini-banner.js' , array('jquery') , 1.0);
        wp_enqueue_style('mini_banner_css' , plugin_dir_url(__FILE__).'mini-banner.css');

    }
    public function register_mini_banner_post_type(){
        $labels = array(
            'name'               => __('Mini Banners shortcode: [mini-banners]'),
            'singular_name'      => __('Mini Banner'),
            'add_new'            => __('Add New Mini Banner'),
            'add_new_item'       => __('Add New Mini Banner'),
            'edit_item'          => __('Edit Mini Banner'),
            'new_item'           => __('New Mini Banner'),
            'all_items'          => __('All Mini Banners'),
            'view_item'          => __('View Mini Banner'),
            'search_items'       => __('Search Mini Banners'),
            'not_found'          => __('No mini banners found'),
            'not_found_in_trash' => __('No mini banners found in Trash'),
            'parent_item_colon'  => '',
            'menu_name'          => 'Mini Banners'
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'mini-banner'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title')
        );

        register_post_type('mini_banner', $args);
//        After register the mini_banner post type, now we need to create a meta box for url and image field
        add_action('add_meta_boxes_mini_banner' , array($this,'add_meta_boxes'));
        add_action('save_post_mini_banner', array($this, 'save_mini_banner_meta_data'));
    }
    public function add_meta_boxes(){
        add_meta_box(
            'mini_banner_meta_box',
            'Mini Banner Details',
            array($this, 'render_mini_banner_meta_box'),
            'mini_banner',
        );
    }
    public function render_mini_banner_meta_box($post){
        $url = get_post_meta($post->ID, 'banner_url', true);
        $image_id = get_post_thumbnail_id($post->ID);
        ?>
        <style>
            .attachment-post-thumbnail{
                height: auto;
                width: 100%;
            }

        </style>
        <div>
            <label for="banner_url">Game's URL: </label>
            <input type="text" id="banner_url" name="banner_url" value="<?php echo esc_attr($url); ?>" required>
        </div>
        <div>
            <label for="banner_image" style="display:block">Image(accepted_format = jpg,jpeg,png):</label>
            <?php
                if(wp_get_attachment_image($image_id, 'thumbnail')){
                    echo get_the_post_thumbnail($post->id) ."<br>" ;
                }else{
                    echo "<img class='attachment-post-thumbnail'>";
                }
                ?>
            <input type="button" id="upload_image_button" class="button button-primary" value="Upload Image"><br><br>
            <input type="hidden" id="banner_image_id" name="banner_image_id" value="<?php echo esc_attr($image_id); ?>">
        </div>

        <?php
    }
    public function save_mini_banner_meta_data($post_id)
    {
        if (isset($_POST['banner_url'])) {
            update_post_meta($post_id, 'banner_url', sanitize_text_field($_POST['banner_url']));
        }

        if (isset($_POST['banner_image_id'])) {
            update_post_meta($post_id, '_thumbnail_id', absint($_POST['banner_image_id']));
        }
    }

    public function generate_mini_banners(){
        $banners = new WP_Query(array(
            'post_type' => 'mini_banner',
            'post_status' => 'publish',
            'order_by' => 'post_date',
            'order' => 'DESC',
        ));
        $output = "<section aria-label='Mini Banner Section' class='banners-container'>";
        if($banners->have_posts()){
            while($banners->have_posts()){
                $banners->the_post();
                $output .= "<article class='banner-container'><a href='".esc_url(get_post_meta(get_the_ID(),'banner_url' ,true))."'>";
                $output .= get_the_post_thumbnail(get_the_ID());
                $output .= "<div class='banner-overlay'>".get_the_title()."</div>";
                $output .=  "</a></article>";
            }
            wp_reset_postdata();
        }else{
            $output .= "<p>No mini banners found</p>";
        }
        $output .= "</section>";

        return $output;
    }
}

new MiniBanner();