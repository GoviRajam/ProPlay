<?php defined('ABSPATH') OR die('restricted access');

class Wpnukes_Audios
{
    function __construct()
    {
        $this->activation_function();

        /** Video Settings Pages */
        add_action('admin_menu', array($this, 'settings_page'));

        add_action( 'init', array($this, 'register_post_type') );

        /** Custom field for video categories */
        add_action('audio_album_edit_form_fields', array($this, 'category_edit_form'));
        add_action('audio_album_add_form_fields', array($this, 'category_edit_form'));

        /** Custom field for video categories data saving */
        add_action('created_term', array($this, 'save_term_data'));
        add_action('edit_term', array($this, 'save_term_data'));
        add_action('publish_wpnukes_audios', array($this, 'save_wpnukes_audios') );

        add_action('wp_ajax_nukes_video_action', array($this, 'ajax_handler'));
        add_action('wp_ajax_nopriv_nukes_video_action', array($this, 'ajax_handler'));

        add_action( 'admin_print_scripts-post.php', array($this, 'admin_script'), 11 );
        add_action( 'admin_print_scripts-post-new.php', array($this, 'admin_script'), 11 );

        $this->_settings = get_option('wpnukes_video_settings');

        /** Video Columns */
        add_filter('manage_edit-wpnukes_audios_columns', array($this, 'head_only_gallery'), 10);
        add_action('manage_wpnukes_audios_posts_custom_column', array($this, 'content_only_gallery'), 10, 2);
    }

    function activation_function()
    {
        global $wpdb;

        add_role('video_contributor', __('Video Contributor', 'exc-proplay-theme'), array('read' => true, 'edit_posts' => true, 'delete_pots' => false));
    }

    function head_only_gallery($default)
    {
        unset($default['date']);
        unset($default['comments']);
        $default['author'] = __('Author', 'exc-proplay-theme');
        $default['audio_category'] = __('Category', 'exc-proplay-theme');
        $default['audio_tag'] = __('Tags', 'exc-proplay-theme');

        $default['comments'] = __('<span><span class="vers"><div class="comment-grey-bubble" title="Comments"></div></span></span>', 'exc-proplay-theme');
        $default['date'] = __('Date', 'exc-proplay-theme');

        return $default;
    }

    function content_only_gallery($column_name, $post_ID)
    {
        if($column_name == 'audio_category')
        {
            $terms = get_the_term_list( $post_ID , 'audio_category' , '' , ',' , '' );
            if(is_string($terms)) echo $terms;
            else echo '&mdash;';

        }elseif($column_name == 'audio_tag'){
            $terms = get_the_term_list( $post_ID , 'audio_tag' , '' , ',' , '' );
            if(is_string($terms)) echo $terms;
            else echo '&mdash;';
        }
    }

    function get_value($obj, $val, $def = '')
    {
        if(is_array($obj) && isset($obj[$val])) return $obj[$val];
        elseif(is_object($obj) && isset($obj->$val)) return $obj->$val;
        elseif($def) return $def;
        else return false;
    }

    function selected($name, $value, $echo = true)
    {
        if( $name == $value ) {
            if($echo) echo ' selected="selected"';
            else return ' selected="selected"';
        }
    }

    function settings_page()
    {
        //add_submenu_page('edit.php?post_type=wpnukes_videos', __('Video Settings'), __('Video Settings'), 'edit_posts', basename(__FILE__), array($this, 'video_settings'));
    }

    function admin_script()
    {
        global $post_type, $post;
        $custom_thumb = ($this->get_value($this->_settings, 'custom_thumbnail') == 'active') ? 'true' : 'false';
        echo '<script type="text/javascript">var nukes_custom_thumbnail = '.$custom_thumb.'; </script>';
        if($post_type == 'wpnukes_videos')
        {
            wp_enqueue_script('video_custom_script', get_template_directory_uri().'/js/custom.js');
            wp_enqueue_style('video_custom_style', get_template_directory_uri().'/css/video.css');
        }
    }

    function save_wpnukes_audios($id)
    {
        global $post;
        $post_id = ($id) ? $id : $post->ID;

        if( is_admin() ) return;

        $videos = array();
        foreach($_POST as $k => $v )
        {
            if( strstr($k, 'webnukes_video_')) $videos[str_replace('webnukes_video_', '', $k)] = $v;
        }

        $safety_mode = kvalue($_POST, 'webnukes_video_safety', 'off');
        $privacy = kvalue($_POST, 'webnukes_video_privacy', 'public');
        update_post_meta($post_id, '_wpnukes_video', $videos);

        update_post_meta($post_id, '_wpnukes_video_safety', $safety_mode);
        update_post_meta($post_id, '_wpnukes_video_privacy', $privacy);
    }

    function register_post_type()
    {
        register_post_type( 'wpnukes_audios',
            array(
                'labels' => array(
                    'name' => _x('Audios', 'WPnukes Audios', 'exc-proplay-theme'),
                    'singular_name' =>  _x('Audio', 'WPnukes Audio', 'exc-proplay-theme'),
                    'add_new' =>  _x('Add New', 'WPnukes Audio', 'exc-proplay-theme'),
                    'add_new_item' =>  __('Add New Audio', 'exc-proplay-theme'),
                    'edit' =>  __('Edit', 'exc-proplay-theme'),
                    'edit_item' =>  __('Edit Audio', 'exc-proplay-theme'),
                    'new_item' =>  __('New Audio', 'exc-proplay-theme'),
                    'view' =>  __('View', 'exc-proplay-theme'),
                    'view_item' =>  __('View Audio', 'exc-proplay-theme'),
                    'search_items' =>  __('Search Audios', 'exc-proplay-theme'),
                    'not_found' =>  __('No Audio found', 'exc-proplay-theme'),
                    'not_found_in_trash' =>  __('No Audio found in Trash', 'exc-proplay-theme'),
                    'parent' =>  __('Parent Audio', 'exc-proplay-theme')
                ),
                'description' => __('Audio post type to create a Audio collection', 'exc-proplay-theme'),
                'public' => true,
                'show_in_admin_bar' => false,
                'show_ui' => true,
                'menu_position' => 15,
                'supports' => array( 'title', 'thumbnail', 'editor', 'comments', 'author' ),
                'taxonomies' => array( 'audio_category', 'audio_tag', 'audio_album'),
                'menu_icon' => get_template_directory_uri(). '/images/audio.png',
                'rewrite' => array( 'slug' => 'audio' ),
                'has_archive' => true,
            )
        );

        register_taxonomy('audio_category', 'wpnukes_audios', array(
            'hierarchical' => true,
            'labels' => array(
                'name' => _x( 'Audio Categories', 'WPnukes Audio Categories', 'exc-proplay-theme' ),
                'singular_name' => _x( 'Audio Category', 'WPnukes Audio Category', 'exc-proplay-theme' ),
                'search_items' =>  __( 'Search Audio Categories', 'exc-proplay-theme' ),
                'all_items' => __( 'All Audio Categories', 'exc-proplay-theme' ),
                'parent_item' => __( 'Parent Category', 'exc-proplay-theme' ),
                'parent_item_colon' => __( 'Parent Category:', 'exc-proplay-theme' ),
                'edit_item' => __( 'Edit Category' , 'exc-proplay-theme'),
                'update_item' => __( 'Update Category', 'exc-proplay-theme' ),
                'add_new_item' => __( 'Add New Category', 'exc-proplay-theme' ),
                'new_item_name' => __( 'New Audio Category Name', 'exc-proplay-theme' ),
                'menu_name' => __( 'Audio Categories', 'exc-proplay-theme' ),
            ),
            'rewrite' => array(
                'slug' => 'audio_category', /** This controls the base slug that will display before each term */
                'with_front' => false, /** Don't display the category base before "/galleries/" */
                'hierarchical' => true /** This will allow URL's like "/galleries/videos/youtube/" */
            ),
        ));

        register_taxonomy('audio_tag', 'wpnukes_audios', array(
            'hierarchical' => false,
            'labels' => array(
                'name' => _x( 'Audio Tags', 'WPnukes Audio Tags', 'exc-proplay-theme' ),
                'singular_name' => _x( 'Audio Tag', 'WPnukes Audio Tag', 'exc-proplay-theme' ),
                'search_items' =>  __( 'Search Audio Tags', 'exc-proplay-theme' ),
                'all_items' => __( 'All Audio Tags', 'exc-proplay-theme' ),
                'parent_item' => __( 'Parent Tag', 'exc-proplay-theme' ),
                'parent_item_colon' => __( 'Parent Tag:', 'exc-proplay-theme' ),
                'edit_item' => __( 'Edit Tag', 'exc-proplay-theme' ),
                'update_item' => __( 'Update Tag', 'exc-proplay-theme' ),
                'add_new_item' => __( 'Add New Tag', 'exc-proplay-theme' ),
                'new_item_name' => __( 'New Audio Tag Name', 'exc-proplay-theme' ),
                'menu_name' => __( 'Audio Tags', 'exc-proplay-theme' ),
            ),
            'rewrite' => array(
                'slug' => 'audio_tag', /** This controls the base slug that will display before each term */
                'with_front' => false, /** Don't display the category base before "/galleries/" */
                'hierarchical' => true /** This will allow URL's like "/galleries/videos/youtube/" */
            ),
        ));


        register_taxonomy('audio_album', 'wpnukes_audios', array(
            'hierarchical' => true,
            'labels' => array(
                'name' => _x( 'Audio Album', 'WPnukes Audio Albums', 'exc-proplay-theme' ),
                'singular_name' => _x( 'Audio Album', 'WPnukes Audio Album', 'exc-proplay-theme' ),
                'search_items' =>  __( 'Search Audio Albums', 'exc-proplay-theme' ),
                'all_items' => __( 'All Audio Albums', 'exc-proplay-theme' ),
                'parent_item' => __( 'Parent Album' , 'exc-proplay-theme'),
                'parent_item_colon' => __( 'Parent Album:', 'exc-proplay-theme' ),
                'edit_item' => __( 'Edit Album', 'exc-proplay-theme' ),
                'update_item' => __( 'Update Album', 'exc-proplay-theme' ),
                'add_new_item' => __( 'Add New Album', 'exc-proplay-theme' ),
                'new_item_name' => __( 'New Audio Album Name', 'exc-proplay-theme' ),
                'menu_name' => __( 'Audio Albums', 'exc-proplay-theme' ),
            ),
            'rewrite' => array(
                'slug' => 'audio_album', /** This controls the base slug that will display before each term */
                'with_front' => false, /** Don't display the category base before "/galleries/" */
                'hierarchical' => true /** This will allow URL's like "/galleries/videos/youtube/" */
            ),
        ));

    }

    function category_edit_form($term)
    {
        $term = (object) $term;
        $term->term_id = isset($term->term_id) ? $term->term_id : '';
        include('taxonomy_meta.php');
    }

    function save_term_data($term_id)
    {
        $t = $GLOBALS['_webnukes'];
        $current = wp_get_current_user();
        $taxonomies = array('video_channel', 'video_playlist');
        $key = '_wpnukes_'.kvalue($_POST, 'taxonomy').'_'.$term_id;

        if( !in_array(kvalue($_POST, 'taxonomy'), $taxonomies) ) return;

        $movefile = array();
        if( $_FILES && kvalue( kvalue($_FILES, 'image_file'), 'name') )
        {
            $movefile = $this->helper->upload_file( kvalue($_FILES, 'image_file'), true, array(170, 125) );
            if( !$movefile ) $movefile = get_option($key.'_image');
        }else $movefile = get_option($key.'_image');

        if( is_admin() && kvalue($_POST, 'author') ) $c_user = kvalue($_POST, 'author');
        else $c_user = in_array('video_contributor', $current->roles) ? $current->ID : 1;


        update_option($key.'_author', $c_user);
        update_option($key.'_privacy', kvalue($_POST, 'privacy', 'public'));
        update_option($key.'_image', $movefile);
    }
}

$_wpnukes_audios = new Wpnukes_Audios;
$GLOBALS['_wpnukes_audios'] = $_wpnukes_audios;