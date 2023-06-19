<?php

global $post;

$order = get_post_meta($post->ID, 'order', true);
$banner_image = get_post_meta($post->ID, 'banner_image', true);
$banner_image_xs = get_post_meta($post->ID, 'banner_image_xs', true);

?>

<table class="form-table">
    <tr>
        <th scope="row"><label for="order">Order</label></th>
        <td><input name="order" type="number" id="order" value="<?= $order ?>" class="regular-text"></td>
    </tr>
    <tr>
        <th scope="row"><label for="banner_image">Banner image</label></th>
        <td><input name="banner_image" type="text" id="banner-image" value="<?= $banner_image ?>" class="regular-text"></td>
    </tr>
    <tr>
        <th scope="row"><label for="banner_image_xs">Banner image mobile</label></th>
        <td><input name="banner_image_xs" type="text" id="banner-image-xs" value="<?= $banner_image_xs ?>" class="regular-text"></td>
    </tr>
</table>