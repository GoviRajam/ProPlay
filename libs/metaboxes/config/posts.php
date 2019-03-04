<?php defined('ABSPATH') OR die('restricted access');

$t = $GLOBALS['_wpnukes_videos'];

$options = array();

$options['post']['sidebar']         = array(
                                            'label' =>__('Post Sidebar', 'exc-proplay-theme'),
                                            'type' =>'dropdown',
                                            'info' => __( 'select the sidebar for the current post' , 'exc-proplay-theme'),
                                            'validation'=>'',
                                            'value' => fw_sidebars_array(),
                                            'attrs'=>array('class' => ''),
                                        );
$options['post']['webnukes_format'] = array(
                                            'label' =>__('Post Format', 'exc-proplay-theme'),
                                            'type' =>'dropdown',
                                            'info' => __( 'select post format' , 'exc-proplay-theme'),
                                            'validation'=>'',
                                            'value' => array('image'=>__('Image', 'exc-proplay-theme'),'slider'=>__('Slider', 'exc-proplay-theme'), 'audio'=>__('Audio', 'exc-proplay-theme'), 'video'=>__('Video', 'exc-proplay-theme'),),
                                            'attrs'=>array('class' => ''),
                                        );
$options['post']['webnukes_audio_embed'] = array(
                                            'label' =>__('Audio Embed', 'exc-proplay-theme'),
                                            'type' =>'textarea',
                                            'info' => __( 'Enter embed code for audio' , 'exc-proplay-theme'),
                                            'validation'=>'',
                                            'attrs'=>array('class' => 'input-block-level', 'style' => 'width:100%; min-height:110px;'),
                                        );
$options['post']['webnukes_video_embed'] = array(
                                            'label' =>__('Video Embed Code', 'exc-proplay-theme'),
                                            'type' =>'textarea',
                                            'info' => __( 'Enter embed code for video' , 'exc-proplay-theme'),
                                            'validation'=>'',
                                            'attrs'=>array('class' => 'input-block-level', 'style' => 'width:100%; min-height:110px;'),
                                        );

$options['wpnukes_videos']['webnukes_source'] = array(
                                    'label'=>__('Source', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                    'icon' => true,
                                    'settings' => array('heading' => __('Upload Video Detail', 'exc-proplay-theme'), 'button_text' => __('Submit Video', 'exc-proplay-theme')),
                                );
$options['wpnukes_videos']['webnukes_id'] = array(
                                    'label'=>__('ID', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );

$options['wpnukes_videos']['webnukes_safety'] = array(
                                    'label'=>__('Safety', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'value' => array('on' => __('On', 'exc-proplay-theme'), 'off' => __('Off', 'exc-proplay-theme')),
                                );
$options['wpnukes_videos']['webnukes_privacy'] = array(
                                    'label'=>__('Privacy', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'value' => array('public' => __('Public', 'exc-proplay-theme'), 'private' => __('Private', 'exc-proplay-theme'), 'unlisted' => __('Unlisted', 'exc-proplay-theme')),
                                );
$options['wpnukes_videos']['webnukes_views'] = array(
                                    'label'=>__('Views', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['wpnukes_videos']['webnukes_thumb'] = array(
                                    'label'=>__('Thumb', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['wpnukes_videos']['webnukes_rating'] = array(
                                    'label'=>__('Rating', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['wpnukes_videos']['webnukes_duration'] = array(
                                    'label'=>__('Duration', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['wpnukes_videos']['webnukes_hd'] = array(
                                    'label'=>__('High Definition', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );

$options['wpnukes_audios']['webnukes_source'] = array(
                                    'label'=>__('Source', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                    'icon' => true,
                                    'settings' => array('heading' => __('Upload Video Detail', 'exc-proplay-theme'), 'button_text' => __('Submit Video', 'exc-proplay-theme')),
                                );
$options['wpnukes_audios']['webnukes_id'] = array(
                                    'label'=>__('ID', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );

$options['wpnukes_audios']['webnukes_safety'] = array(
                                    'label'=>__('Safety', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'attrs'=>array('class'=>''),
                                    'value' => array('on' => __('On', 'exc-proplay-theme'), 'off' => __('Off', 'exc-proplay-theme')),
                                );
$options['wpnukes_audios']['webnukes_privacy'] = array(
                                    'label'=>__('Privacy', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'attrs'=>array('class'=>''),
                                    'value' => array('public' => __('Public', 'exc-proplay-theme'), 'private' => __('Private', 'exc-proplay-theme'), 'unlisted' => __('Unlisted', 'exc-proplay-theme')),
                                );
$options['wpnukes_audios']['webnukes_views'] = array(
                                    'label'=>__('Views', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );

$options['wpnukes_audios']['webnukes_rating'] = array(
                                    'label'=>__('Rating', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['wpnukes_audios']['webnukes_duration'] = array(
                                    'label'=>__('Duration', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['wpnukes_audios']['webnukes_hd'] = array(
                                    'label'=>__('High Definition', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );

$options['page']['sidebar']         = array(
                                            'label' =>__('Page Sidebar 1', 'exc-proplay-theme'),
                                            'type' =>'dropdown',
                                            'info' => __( 'select the sidebar for the current page' , 'exc-proplay-theme'),
                                            'validation'=>'',
                                            'value' => fw_sidebars_array(),
                                            'attrs'=>array('class' => ''),
                                        );

$options['page']['author_info']         = array(
                                            'label' =>__('Show Author Information', 'exc-proplay-theme'),
                                            'type' =>'switch',
                                            //'info' => __( 'select the sidebar for the current page' , 'exc-proplay-theme'),
                                            'validation'=>'',
                                            'attrs'=>array('class' => 'input-block-level'),
                                        );





