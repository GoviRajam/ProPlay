<?php defined('ABSPATH') OR die('restricted access');

$visibility = array('public' => __('Public', 'exc-proplay-theme'), 'private' => __('Private', 'exc-proplay-theme'), 'unlisted' => __('Unlisted', 'exc-proplay-theme'),);

$key = '_wpnukes_'.kvalue($term, 'taxonomy').'_'.kvalue($term, 'term_id');

$edit = (kvalue($_GET, 'action') == 'edit') ? true : false;

if ( current_user_role() == 'administrator') {

    $author = get_option($key.'_author');
    $privacy = get_option($key.'_privacy');
    $users = get_users('role=video_contributor');?>
    <?php echo ( $edit ) ? '<tr><th>' : '<div class="form-field">'; ?>
        <label for="author"><?php _e('Author', 'exc-proplay-theme'); ?> </label>
        <?php if($edit) echo '</th><td>'; ?>
        <select name="author">
            <?php foreach((array)$users as $user):?>
                <?php $selected = ($author == $user->ID) ? 'selected="selected"' : ''; ?>
                <option value="<?php echo $user->ID;?>" <?php echo $selected; ?>><?php echo $user->data->display_name; ?></option>
            <?php endforeach;?>
        </select>
        <?php echo ($edit) ? '</td></tr>' : '</div>'; ?>

    <?php echo ( $edit ) ? '<tr><th>' : '<div class="form-field">'; ?>
        <label for="public"><?php _e('Visibility ?', 'exc-proplay-theme'); ?></label>
        <?php if($edit) echo '</th><td>'; ?>
        <select name="is_public">
            <?php foreach($visibility as $k => $v ): ?>
                <?php $selected = ($k == $privacy) ? 'selected="selected"' : '' ; ?>
                <option value="<?php echo $k; ?>" <?php echo $selected; ?> ><?php echo $v; ?></option>
            <?php endforeach; ?>
        </select>
    <?php echo ($edit) ? '</td></tr>' : '</div>'; ?>
    <?php
}