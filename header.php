<?php defined( 'ABSPATH' ) or die( 'restricted access.' ); ?>

<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->

<!--[!(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <!-- meta information -->
    <meta charset="<?php echo esc_attr( get_bloginfo('charset') );?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

    <link rel="profile" href="//gmpg.org/xfn/11">
    <link rel="pingback" href="<?php echo esc_url( get_bloginfo('pingback_url') );?>">

    <title>
        <?php ( is_home() || is_front_page() ) ? bloginfo('name') : wp_title(); ?>
    </title>

    <?php wp_head();?>

</head>

<?php $styles = $GLOBALS['_webnukes']->fw_get_settings('sub_color_and_style', 'color_scheme', 'light');

$_COOKIE['social_color_scheme'] = kvalue( $_COOKIE, 'social_color_scheme', $styles );?>

<body <?php body_class( $styles ); ?>>

<div class="tp-bar">
    <div class="container">
        <?php get_template_part('libs/userbar'); ?>
        <?php wp_nav_menu(array('theme_location' => 'top_menu', 'container'=>null, 'menu_class' => 'tp-links', 'fallback_cb' => false)); ?>
    </div>
</div>
<!-- tp-links end -->
<div class="logo-bar">
    <div class="container">

        <div class="logo">
            <?php $logo = $GLOBALS['_webnukes']->fw_get_settings('sub_logo'); ?>
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo kvalue($logo, 'logo', get_template_directory_uri().'/images/logo.png'); ?>" alt="<?php bloginfo('name');?>">
            </a>
        </div>
        <!-- logo ends -->
        <?php $main_menu_toggle = $GLOBALS['_webnukes']->fw_get_settings('sub_general_settings', 'menu_status');

        $main_menu = wp_nav_menu(array('theme_location' => 'main_menu', 'container'=>null, 'menu_class' => 'menu', 'echo' => false,'fallback_cb' => false)); ?>

        <div class="menu-btn" <?php if( $main_menu && $main_menu_toggle == 'on' ): ?>style="display:none;"<?php endif; ?>>
            <a href="javascript:void(0);" class="open-menu">
            <?php _e('Menu', 'exc-proplay-theme');?>
            </a>
        </div>

        <div class="socialize">
            <ul>
                <li>
                    <div class="main-search">
                        <form action="" method="get" onsubmit="return validate();">
                            <input type="text" name="s" id="search" placeholder="<?php _e('Search Videos', 'exc-proplay-theme');?>" value="<?php echo kvalue($_GET, 's');?>" />
                            <input type="submit" value="" />
                        </form>
                    </div>
                </li>
                <li class="sp"></li>
                <?php echo fw_social_networks();?>
            </ul>
        </div>
    </div>
</div>
<!-- logo-bar ends -->
<div class="menu-bar" style=" <?php echo ($main_menu_toggle == 'on' ) ? 'display:block;' : ''; ?>">
    <div class="container">
        <?php echo $main_menu; ?>
    </div>
</div>
<!-- menu-bar ends -->
