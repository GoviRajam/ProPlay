<?php defined('ABSPATH') OR die('restricted access');

get_header();?>

<div id="page-404" class="container">
    <div class="page-404">
        <img src="<?php echo get_template_directory_uri();?>/images/404.png" />
        <h2 class="text-red" ><?php _e('Page not found', 'exc-proplay-theme'); ?></h2>
        <p><?php _e('Don&rsquo;t worry... You just need to go back or click at logo to navigation home page', 'exc-proplay-theme');?></p>
        <div class="clearfix"></div>
    </div>
</div>

<?php get_footer();?>