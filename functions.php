<?php if ( ! defined('ABSPATH')) exit('restricted access');

/** Theme settings note: don't remove it */
define('THEME_NAME', 'pro_play');
define('FW_LANG_DIR', get_template_directory() . '/languages');

/** include theme register sidebars */
get_template_part('libs/register_sidebars');

/** Initialize the WPnukes Apanel */
require get_template_directory() . '/includes/launcher.php';

// Include Theme Functions
require get_template_directory() . '/theme_functions.php';

// Add support for featured image
add_theme_support( 'post-thumbnails' );

// Add feed link support
add_theme_support( 'automatic-feed-links' );

// Title Tag
add_theme_support( "title-tag" );

// Custom Header
add_theme_support( "custom-header" );

// Custom header background
add_theme_support( "custom-background" );

/** Load the default functions after theme setup */
add_action('after_setup_theme', 'wl_theme_setup');

function wl_theme_setup()
{
    // Add languages support
    load_theme_textdomain('exc-proplay-theme', get_template_directory() . '/languages' );

    add_editor_style();

    register_nav_menus(
                array(
                    'top_menu'      => __( 'Top Menu', 'exc-proplay-theme' ),
                    'main_menu'     => __( 'Main Menu', 'exc-proplay-theme' )
                )
            );

    add_image_size('video-large', 565, 318, true);
    add_image_size('video-single', 750, 330, true);
    add_image_size('blog-single', 728, 288, true);
    add_image_size('video-medium', 370, 208, true);
    add_image_size('video-small', 175, 98, true);
    add_image_size('widget-post', 55, 55, true);
    add_image_size('term-listing', 170, 125, true);

}

/** Set the width of images and content. Should be equal to the width the theme */
$content = (isset($content_width)) ? $content_width : 613;

/** include theme scripts and styles */
get_template_part('libs/scripts_styles');

/** include theme breadcrumbs */
get_template_part('libs/breadcrumbs');

/** include theme widgets */
get_template_part('libs/widgets');

/** include theme widgets */
get_template_part('libs/ajax_handler');

$admin_bar = $GLOBALS['_webnukes']->fw_get_settings('sub_general_settings', 'admin_bar');

if ( $admin_bar == 'on' )
{
    function fw_wp_hide_admin_bar() {
        return false;
    }

    add_filter('show_admin_bar' ,'fw_wp_hide_admin_bar');
}

// Add an action on phpmailer_init
add_action('phpmailer_init','fw_init_smtp');

function fw_init_smtp($phpmailer)
{
    $settings = $GLOBALS['_webnukes']->fw_get_settings('sub_general_settings');

    // If we're sending via SMTP, set the host
    if (kvalue($settings, 'smtp_status') == "on") {

        $phpmailer->isSMTP();                                      // Set mailer to use SMTP
        // Set the SMTPSecure value, if set to none, leave this blank
        $phpmailer->SMTPSecure = (kvalue($settings, 'smtp_ssl') == 'none') ? '' : kvalue($settings, 'smtp_ssl');

        // Set the other options
        $phpmailer->Host = kvalue($settings, 'smtp_host');
        $phpmailer->Port = kvalue($settings, 'smtp_port');

        // If we're using smtp auth, set the username & password
        if (kvalue($settings, 'smtp_auth') == "on") {
            $phpmailer->SMTPAuth = TRUE;
            $phpmailer->Username = kvalue($settings, 'smtp_username');
            $phpmailer->Password = kvalue($settings, 'smtp_password');
        }
        if( $phpmailer->ErrorInfo ) echo $phpmailer->ErrorInfo;
    }
}

function add_copyright_field_to_media_uploader( $form_fields, $post ) {
    $form_fields['copyright_field'] = array(
        'label' => __('Copyright', 'exc-socialplay-theme' ),
        'input' => 'html',
        'value' => get_post_meta( $post->ID, '_custom_copyright', true ),
        'helps' => 'Set a copyright credit for the attachment',
        'html'=>'This sitest'
    );

    return $form_fields;
}

function fw_handle_video_upload( $file )
{
    return $file;
}

add_filter( 'wp_handle_upload_prefilter', 'fw_handle_video_upload' );

// Ajax login
function socialplay_ajax_login()
{
    if( ! wp_verify_nonce( $_POST['security'], 'proplay-login') )
    {
        wp_send_json_error( __('<strong>Error:</strong> Hacking attempt', 'exc-proplay-theme') );
    }

    $creds = array();

    if( ! $creds['user_login'] = $_POST['log'] )
    {
        wp_send_json_error( __('<strong>Error:</strong> The username field is empty.', 'exc-proplay-theme') );
    }

    $creds['user_password'] = $_POST['pwd'];

    $creds['remember'] = $_POST['rememberme'] ? true : false;

    $user = wp_signon($creds, true);

    if ( is_wp_error($user) )
    {
        wp_send_json_error( $user->get_error_message() );
    }

    $home_url = home_url();
    $redirect_to = $_POST['redirect_to'] ? $_POST['redirect_to'] : $home_url;

    $login_msg = sprintf( __('Thank you! you\'re logged in successfully and being redirected in few seconds %s.', 'exc-proplay-theme'),
                        '<a href="'.$redirect_to.'">' . __('Click here in case of delay', 'exc-proplay-theme') . '</a>');

    wp_send_json_success( array('redirect_to' => $redirect_to, 'login_msg' => $login_msg) );
}

add_action( 'wp_ajax_nopriv_ajax_login', 'proplay_ajax_login' );

function socialplay_forgot_password()
{
    global $wpdb;

    if ( ! wp_verify_nonce( $_POST['security'], 'proplay-forgot-password') )
    {
        wp_send_json_error( __('Hacking Attempt', 'exc-proplay-theme') );
    }

    if( ! $username = $_POST['user_login'])
    {
        wp_send_json_error( __('Please enter username or email address.', 'exc-proplay-theme') );
    }

    if(strpos($username, '@') >= 0)
    {
        $user_data = get_user_by('email', $username);

    }else
    {
        $user_data = get_user_by('login', $username);
    }

    if( ! $user_data)
    {
        wp_send_json_error( __('Please enter a valid username or email address', 'exc-proplay-theme') );
    }

    do_action('lostpassword_post');

     // redefining user_login ensures we return the right case in the email
    $user_login = $user_data->user_login;
    $user_email = $user_data->user_email;

    do_action('retrieve_password', $user_login);

    if ( !$allow = apply_filters('allow_password_reset', true, $user_data->ID))
    {
        wp_send_json_error( __('You don\'t have permission to reset password', 'exc-proplay-theme' ) );

    }elseif( is_wp_error($allow) )
    {
        wp_send_json_error( $allow->get_error_message() );
    }

    $key = wp_generate_password( 20, false );

    do_action( 'retrieve_password_key', $user_login, $key );

    if ( empty( $wp_hasher ) )
    {
        require_once ABSPATH . 'wp-includes/class-phpass.php';
        $wp_hasher = new PasswordHash( 8, true );
    }

    $hashed = $wp_hasher->HashPassword( $key );
    $wpdb->update( $wpdb->users, array( 'user_activation_key' => $hashed ), array( 'user_login' => $user_login ) );

    $message = __('Someone requested that the password be reset for the following account:', 'exc-proplay-theme') . "\r\n\r\n";
    $message .= network_home_url( '/' ) . "\r\n\r\n";
    $message .= sprintf(__('Username: %s', 'exc-proplay-theme' ), $user_login) . "\r\n\r\n";
    $message .= __('If this was a mistake, just ignore this email and nothing will happen.', 'exc-proplay-theme') . "\r\n\r\n";
    $message .= __('To reset your password, visit the following address:', 'exc-proplay-theme') . "\r\n\r\n";
    $message .= '<' . network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login') . ">\r\n";

    if ( is_multisite() )
    {
        $blogname = $GLOBALS['current_site']->site_name;
    }
    else
    {
        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
    }

    $title = sprintf( __('[%s] Password Reset', 'exc-proplay-theme'), $blogname );

    $title = apply_filters('retrieve_password_title', $title);
    $message = apply_filters('retrieve_password_message', $message, $key);

    if( $message && ! wp_mail($user_email, $title, $message) )
    {
        wp_send_json_error( __('The e-mail could not be sent.', 'exc-proplay-theme') . "<br />\n" . __('Possible reason: your host may have disabled the mail() function...', 'exc-proplay-theme') );
    }

    wp_send_json_success( __('Link for password reset has been emailed to you. Please check your email.', 'exc-proplay-theme'));
}

add_action( 'wp_ajax_nopriv_forgot_password', 'proplay_forgot_password' );