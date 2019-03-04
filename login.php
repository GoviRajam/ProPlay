<?php defined('ABSPATH') OR die('restricted access');

/* Template Name: Login */

/** Check if user is logged in */
if( is_user_logged_in() )
{
    wp_redirect( home_url() );
    exit;
}

get_header();?>

<!-- Page Container -->
<div class="container" id="page-single">

    <!-- BreadCrumbs Bar -->
    <div class="bread-bar clearfix">

        <!-- BreadCrumbs -->
        <?php echo get_the_breadcrumb();?>

        <!-- News Ticker -->
        <?php fw_news_ticker();?>
    </div>

    <div class="row">
        <article class="contents span12">
            <div style="background-image:url(<?php echo $GLOBALS['_webnukes']->fw_get_settings('sub_background', 'login_bg_image');?>);" class="signing-block">
                <section class="login-box login-box-mar">
                    <div class="heading">

                        <!-- Page Title -->
                        <h1 class="text-red">
                            <?php _e('Log In', 'exc-proplay-theme');?>
                        </h1>

                        <!-- Forgot Password -->
                        <?php if( $forgot = fw_page_template('forgot.php') ):?>
                            <a class="forgot" href="<?php echo get_permalink( kvalue( $forgot, 'ID' ) );?>" title="<?php echo get_permalink( kvalue( $forgot, 'post_title' ) );?>">
                                <?php _e('Forgot Password?', 'exc-proplay-theme');?>
                            </a>
                        <?php endif;?>
                    </div>

                    <!-- Login Form -->
                    <form action="<?php echo home_url();?>/wp-login.php" method="post" id="socialplay_login">
                        <input type="text" id='login' name="log" class="input-block-level" placeholder="Enter Username" />
                        <input type="password" id='password' class="input-block-level" name="pwd" placeholder="Enter Password">
                        <p class="forgetmenot">
                            <label for="rememberme">
                                <input type="checkbox" style="margin-top:-2px;" value="forever" id="rememberme" name="rememberme">
                                <?php _e( 'Remember Me', 'exc-proplay-theme' );?>
                            </label>
                        </p>

                        <input type="hidden" value="<?php echo wp_create_nonce('proplay-login');?>" name="security" />
                        <input type="hidden" value="<?php echo home_url();?>" name="redirect_to">
                        <input type="hidden" value="1" name="testcookie">
                        <input type="hidden" value="ajax_login" name="action" />
                        <input name="wp-submit" type="submit" value="<?php _e('Login', 'exc-proplay-theme');?>" class="btn btn-cyan">

                        <?php if( $signup_obj = fw_page_template('signup.php') && get_option('users_can_register') == 1 ):?>
                            <?php $signup_obj = fw_page_template('signup.php');?>
                            <a href="<?php echo get_permalink( kvalue( $signup_obj, 'ID') );?>" class="btn btn-red" title="<?php echo kvalue( $signup_obj, 'post_title');?>">
                                <?php _e('Signup', 'exc-proplay-theme');?>
                            </a>
                        <?php endif;?>

                        <?php if ( defined( 'WORDPRESS_SOCIAL_LOGIN_ABS_PATH' ) && get_option( 'wsl_settings_bouncer_authentication_enabled' ) != 2 ) :?>
                            <?php do_action( 'wordpress_social_login' ); ?>
                        <?php endif;?>
                    </form>
                </section>
            </div>
        </article>
    </div>
</div>

<!-- Footer -->
<?php get_footer();?>