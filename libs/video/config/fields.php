<?php
$t = $GLOBALS['_wpnukes_videos'];

$options['add_video']['link'] = array(
                                    'label'=>__('Link', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'attrs'=>array('class'=>'input-block-level', 'placeholder'=>__('Enter URL of Video/Channel/Playlist', 'exc-proplay-theme')),
                                    'validation'=>'required',
                                    'separator' => true,
                                    'settings' => array('heading' => __('Upload Video', 'exc-proplay-theme'), 'button_text' => __('Add Video', 'exc-proplay-theme')),
                                );
$options['add_video']['embed_code'] = array(
                                    'label'=>__('Embed Code', 'exc-proplay-theme'),
                                    'type'=>'textarea',
                                    'info'=>__('Or Insert the embed code', 'exc-proplay-theme'),
                                    'attrs'=>array('class'=>'input-block-level', 'placeholder'=>__('Or Enter Embed Code of the Video', 'exc-proplay-theme')),
                                    'validation'=>'required',
                                );
$options['upload_video']['file_upload'] = array(
                                    'label'=>__('Upload', 'exc-proplay-theme'),
                                    'type'=>'file',
                                    'info'=>__('Upload the file', 'exc-proplay-theme'),
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'validation'=>'required',
                                );

$options['fetch_video']['source'] = array(
                                    'label'=>__('Source', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                    'icon' => true,
                                    'settings' => array('heading' => __('Upload Video Detail', 'exc-proplay-theme'), 'button_text' => __('Submit Video', 'exc-proplay-theme')),
                                );
$options['fetch_video']['id'] = array(
                                    'label'=>__('ID', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['fetch_video']['title'] = array(
                                    'label'=>__('Title', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'info'=>__('Or Insert the embed code', 'exc-proplay-theme'),
                                    'attrs'=>array('class'=>'input-block-level', 'placeholder'=>__('Give the title to video', 'exc-proplay-theme')),
                                    'validation'=>'required',
                                );
$options['fetch_video']['desc'] = array(
                                    'label'=>__('Description', 'exc-proplay-theme'),
                                    'type'=>'textarea',
                                    'info'=>__('Or Insert the embed code', 'exc-proplay-theme'),
                                    'attrs'=>array('class'=>'input-block-level', 'placeholder'=>__('Provide detail description about the video', 'exc-proplay-theme')),
                                    'validation'=>'required',
                                );
$options['fetch_video']['tags'] = array(
                                    'label'=>__('Tags', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'info'=>__('Or Insert the embed code', 'exc-proplay-theme'),
                                    'attrs'=>array('class'=>'input-block-level', 'placeholder'=>__('Give tags to video', 'exc-proplay-theme')),
                                    'validation'=>'required',
                                );
$options['fetch_video']['image'] = array(
                                    'label'=>__('Custom Image', 'exc-proplay-theme'),
                                    'type'=>'file',
                                    'attrs'=>array('class'=>'input-block-level', 'placeholder'=>__('Enter Custom Image', 'exc-proplay-theme')),
                                    'validation'=>'required',
                                );
$options['fetch_video']['category'] = array(
                                    'label'=>__('Category', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'info'=>__('Or Insert the embed code', 'exc-proplay-theme'),
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'value' => $t->helper->get_terms_array('video_category'),
                                );
$options['fetch_video']['channel'] = array(
                                    'label'=>__('Channel', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'info'=>__('Or Insert the embed code', 'exc-proplay-theme'),
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'value' => $t->helper->get_terms_array('video_channel', true),
                                );
$options['fetch_video']['playlist'] = array(
                                    'label'=>__('Playlist', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'value' => $t->helper->get_terms_array('video_playlist', true),
                                );
$options['fetch_video']['safety'] = array(
                                    'label'=>__('Safety', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'value' => array('on' => __('On', 'exc-proplay-theme'), 'off' => __('Off', 'exc-proplay-theme')),
                                );
$options['fetch_video']['privacy'] = array(
                                    'label'=>__('Privacy', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'value' => array('public' => __('Public', 'exc-proplay-theme'), 'private' => __('Private', 'exc-proplay-theme'), 'unlisted' => __('Unlisted', 'exc-proplay-theme')),
                                );
$options['fetch_video']['views'] = array(
                                    'label'=>__('Views', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['fetch_video']['author'] = array(
                                    'label'=>__('Author', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                    'std'=>get_current_user_id(),
                                );
$options['fetch_video']['rating'] = array(
                                    'label'=>__('Rating', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['fetch_video']['duration'] = array(
                                    'label'=>__('Duration', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['fetch_video']['hd'] = array(
                                    'label'=>__('High Definition', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['fetch_video']['post_type'] = array(
                                    'label'=>__('POST Type', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );


$options['add_playlist']['title'] = array(
                                    'label'=>__('Title', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'settings' => array('heading' => __('Add / Edit Playlist', 'exc-proplay-theme'), 'button_text' => __('Submit Playlist', 'exc-proplay-theme')),
                                );
$options['add_playlist']['description'] = array(
                                    'label'=>__('Description', 'exc-proplay-theme'),
                                    'type'=>'textarea',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['add_playlist']['image'] = array(
                                    'label'=>__('Playlist Image', 'exc-proplay-theme'),
                                    'type'=>'file',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['add_playlist']['privacy'] = array(
                                    'label'=>__('Privacy', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'value' => array('public' => __('Public', 'exc-proplay-theme'), 'private' => __('Private', 'exc-proplay-theme'), 'unlisted' => __('Unlisted', 'exc-proplay-theme')),
                                );
$options['add_channel']['title'] = array(
                                    'label'=>__('Title', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'settings' => array('heading' => __('Add / Edit Channel', 'exc-proplay-theme'), 'button_text' => __('Submit Channel', 'exc-proplay-theme')),
                                );
$options['add_channel']['description'] = array(
                                    'label'=>__('Description', 'exc-proplay-theme'),
                                    'type'=>'textarea',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['add_channel']['image'] = array(
                                    'label'=>__('Playlist Image', 'exc-proplay-theme'),
                                    'type'=>'file',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['add_channel']['privacy'] = array(
                                    'label'=>__('Privacy', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'value' => array('public' => __('Public', 'exc-proplay-theme'), 'private' => __('Private', 'exc-proplay-theme'), 'unlisted' => __('Unlisted', 'exc-proplay-theme')),
                                );

$options['add_album']['title'] = array(
                                    'label'=>__('Title', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'settings' => array('heading' => __('Add / Edit Album', 'exc-proplay-theme'), 'button_text' => __('Submit Album', 'exc-proplay-theme')),
                                );
$options['add_album']['description'] = array(
                                    'label'=>__('Description', 'exc-proplay-theme'),
                                    'type'=>'textarea',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['add_album']['image'] = array(
                                    'label'=>__('Album Image', 'exc-proplay-theme'),
                                    'type'=>'file',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['add_album']['privacy'] = array(
                                    'label'=>__('Privacy', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'value' => array('public' => __('Public', 'exc-proplay-theme'), 'private' => __('Private', 'exc-proplay-theme'), 'unlisted' => __('Unlisted', 'exc-proplay-theme')),
                                );

$options['user_profile']['ID'] = array(
                                    'label'=>__('User ID', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['user_profile']['user_login'] = array(
                                    'label'=>__('Username', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'attrs'=>array('class'=>'input-block-level', 'disabled' => 'disabled'),

                                );
$options['user_profile']['first_name'] = array(
                                    'label'=>__('First Name', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'validation' => 'alpha_space',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['user_profile']['last_name'] = array(
                                    'label'=>__('Last Name', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'validation' => 'alpha_space',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['user_profile']['nickname'] = array(
                                    'label'=>__('Nickname', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'validation' => 'alpha_space',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['user_profile']['display_name'] = array(
                                'label'=>__('Display Name', 'exc-proplay-theme'),
                                'type'=>'input',
                                'attrs'=>array('class'=>'input-block-level'),
                                );
$options['user_profile']['user_email'] = array(
                                    'label'=>__('Email', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'validation' => 'valid_email',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['user_profile']['avatar'] = array(
                                    'label'=>__('Avatar', 'exc-proplay-theme'),
                                    'type'=>'file',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['user_profile']['user_url'] = array(
                                    'label'=>__('Website', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'validation' => 'valid_url',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['user_profile']['aim'] = array(
                                    'label'=>__('AIM', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['user_profile']['yim'] = array(
                                    'label'=>__('Yahoo IM', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['user_profile']['jabber'] = array(
                                    'label'=>__('Jabber / Google Talk', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['user_profile']['facebook'] = array(
                                    'label'=>__('Facebook Link', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );
$options['user_profile']['twitter'] = array(
                                    'label'=>__('Twitter Link', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'attrs'=>array('class'=>'input-block-level'),
                                );

$options['user_profile']['description'] = array(
                                    'label'=>__('Biographical Info', 'exc-proplay-theme'),
                                    'type'=>'textarea',
                                    'validation' =>'strip_tags',
                                    'attrs'=>array('class'=>'input-block-level'),

                                );
$options['user_profile']['pass1'] = array(
                                    'label'=>__('New Password', 'exc-proplay-theme'),
                                    'type'=>'password',
                                    'attrs'=>array('class'=>'input-block-level'),

                                );
$options['user_profile']['pass2'] = array(
                                    'label'=>__('Repeat Password', 'exc-proplay-theme'),
                                    'type'=>'password',
                                    'attrs'=>array('class'=>'input-block-level'),

                                );

$options['add_audio']['link'] = array(
                                    'label'=>__('Link', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'attrs'=>array('class'=>'input-block-level', 'placeholder'=>__('Enter URL of Audio', 'exc-proplay-theme')),
                                    'validation'=>'required',
                                    'separator' => true,
                                    'settings' => array('heading' => __('Upload Audio', 'exc-proplay-theme'), 'button_text' => __('Add Audio', 'exc-proplay-theme')),
                                );
$options['add_audio']['embed_code'] = array(
                                    'label'=>__('Embed Code', 'exc-proplay-theme'),
                                    'type'=>'textarea',
                                    'info'=>__('Or Insert the embed code', 'exc-proplay-theme'),
                                    'attrs'=>array('class'=>'input-block-level', 'placeholder'=>__('Or Enter Embed Code of the Audio', 'exc-proplay-theme')),
                                    'validation'=>'required',
                                );

$options['fetch_audio']['source'] = array(
                                    'label'=>__('Source', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                    'icon' => true,
                                    'settings' => array('heading' => __('Upload Audio Detail', 'exc-proplay-theme'), 'button_text' => __('Submit Audio', 'exc-proplay-theme')),
                                );
$options['fetch_audio']['id'] = array(
                                    'label'=>__('ID', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['fetch_audio']['title'] = array(
                                        'label'=>__('Title', 'exc-proplay-theme'),
                                        'type'=>'input',
                                        'info'=>__('Give the title to audio', 'exc-proplay-theme'),
                                        'attrs'=>array('class'=>'input-block-level', 'placeholder'=>__('Or Enter Embed Code of the Audio', 'exc-proplay-theme')),
                                        'validation'=>'required',
                                );
$options['fetch_audio']['desc'] = array(
                                    'label'=>__('Description', 'exc-proplay-theme'),
                                    'type'=>'textarea',
                                    'info'=>__('Add description to audio', 'exc-proplay-theme'),
                                    'attrs'=>array('class'=>'input-block-level', 'placeholder'=>__('Or Enter Embed Code of the Audio', 'exc-proplay-theme')),
                                    'validation'=>'required',
                                );
$options['fetch_audio']['tags'] = array(
                                    'label'=>__('Tags', 'exc-proplay-theme'),
                                    'type'=>'input',
                                    'info'=>__('Insert comma separated tags', 'exc-proplay-theme'),
                                    'attrs'=>array('class'=>'input-block-level', 'placeholder'=>__('Inser comma separated tags', 'exc-proplay-theme')),
                                    'validation'=>'required',
                                );
$options['fetch_audio']['image'] = array(
                                    'label'=>__('Custom Image', 'exc-proplay-theme'),
                                    'type'=>'file',
                                    'attrs'=>array('class'=>'input-block-level', 'placeholder'=>__('Enter Custom Image', 'exc-proplay-theme')),
                                    'validation'=>'required',
                                );
$options['fetch_audio']['category'] = array(
                                    'label'=>__('Category', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'info'=>__('Or Insert the embed code', 'exc-proplay-theme'),
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'value' => $t->helper->get_terms_array('audio_category'),
                                );
$options['fetch_audio']['album'] = array(
                                    'label'=>__('Album', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'value' => $t->helper->get_terms_array('audio_album', true),
                                );
$options['fetch_audio']['safety'] = array(
                                    'label'=>__('Safety', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'value' => array('on' => __('On', 'exc-proplay-theme'), 'off' => __('Off', 'exc-proplay-theme')),
                                );
$options['fetch_audio']['privacy'] = array(
                                    'label'=>__('Privacy', 'exc-proplay-theme'),
                                    'type'=>'dropdown',
                                    'attrs'=>array('class'=>'input-block-level'),
                                    'value' => array('public' => __('Public', 'exc-proplay-theme'), 'private' => __('Private', 'exc-proplay-theme'), 'unlisted' => __('Unlisted', 'exc-proplay-theme')),
                                );
$options['fetch_audio']['views'] = array(
                                    'label'=>__('Views', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['fetch_audio']['author'] = array(
                                    'label'=>__('Author', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                    'std'=>get_current_user_id(),
                                );
$options['fetch_audio']['rating'] = array(
                                    'label'=>__('Rating', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['fetch_audio']['duration'] = array(
                                    'label'=>__('Duration', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['fetch_audio']['hd'] = array(
                                    'label'=>__('High Definition', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );
$options['fetch_audio']['post_type'] = array(
                                    'label'=>__('POST Type', 'exc-proplay-theme'),
                                    'type'=>'hidden',
                                );