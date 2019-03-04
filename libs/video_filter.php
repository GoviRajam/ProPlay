<?php defined('ABSPATH') OR die('restricted access');

global $wpdb;

$count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE 1=1 AND $wpdb->posts.post_type IN ('wpnukes_videos', 'wpnukes_audios') AND ($wpdb->posts.post_status = 'publish')" );

$filters = array( 'upload_date' => array('last_hour'=>__('Last Hour', 'exc-proplay-theme'), 'today'=>__('Today', 'exc-proplay-theme'),
                                                'this_week'=>__('This Week', 'exc-proplay-theme'), 'this_month'=>__('This Month', 'exc-proplay-theme'),
                                                'this_year'=>__('This Year', 'exc-proplay-theme'), 'previous_years'=>__('Previous Years', 'exc-proplay-theme'),),
                        'result_types' => array('youtube'=>'Youtube', 'vimeo'=>'Vimeo', 'ustream'=>__('uStream', 'exc-proplay-theme'), 'dailymotion'=>__('DailyMotion', 'exc-proplay-theme'),
                                                'blip'=>__('Blip', 'exc-proplay-theme'), 'metacafe'=>__('Metacafe', 'exc-proplay-theme'), 'soundcloud'=>__('SoundCloud', 'exc-proplay-theme'),),

                        'duration' => array('1_600'=>'0 - 10 Minutes', '600_1800'=>'10 - 30 Minutes', '1800_3600'=>'30 - 60 Minutes', '3600_10800'=>'1 - 3 Hours', '10800_3600000'=>'More than 3 Hours',),

                        'sort_by' => array('date'=>__('Recent Videos', 'exc-proplay-theme'), 'random'=>__('Random', 'exc-proplay-theme'),
                                                'title'=>__('Title', 'exc-proplay-theme'), 'type'=>__('Type', 'exc-proplay-theme'),
                                                'popular'=>__('Popular', 'exc-proplay-theme'), 'most_viewed'=>__('Most Viewed', 'exc-proplay-theme'),),
                        );

$settings = $GLOBALS['_webnukes']->fw_get_settings('sub_video_settings');
if( kvalue($settings, 'show_filter') != 'on' ) return;?>

<div class="filters">

    <div class="filter-tp">
        <h2 class="text-red"><?php _e('Now Trending', 'exc-proplay-theme'); ?></h2>
        <div class="filter-data">
            <span><?php echo number_format($count); ?> <?php _e('Videos and Audios', 'exc-proplay-theme'); ?></span>
            <a class="btn-filter" href="javascript:void(0);"><?php _e('Filter Videos', 'exc-proplay-theme'); ?></a>
        </div>
    </div>

    <div class="filter-content clearfix">
        <div class="row">
            <?php foreach( $filters as $k => $v ): ?>
            <div class="span3" style="width:22%;">
                <h4 class="text-red"><?php echo ucwords( str_replace('_', ' ', $k ) ); ?></h4>
                <ul class="double">
                    <?php foreach( $v as $key => $val ): ?>
                    <li><a href="<?php echo home_url().'/?social_filter_type='.$k.'&social_filter='.$key;?>"><?php echo $val; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
