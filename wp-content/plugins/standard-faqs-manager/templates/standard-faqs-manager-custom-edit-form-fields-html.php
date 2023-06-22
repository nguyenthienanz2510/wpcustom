<?php
$image = get_term_meta($term->term_id, 'image', true);
$order = get_term_meta($term->term_id, 'order', true);
?>

<tr class="form-field">
    <th scope="row"><label for="image">Image</label></th>
    <td>
        <input name="image" id="image" type="text" value="<?= $image; ?>" size="255" aria-required="true" aria-describedby="name-description">
        <p class="description" id="image-description">Image of FAQs Type.</p>
    </td>
</tr>
<tr class="form-field">
    <th scope="row"><label for="order">Order</label></th>
    <td>
        <input name="order" id="order" type="number" value="<?= $order; ?>" aria-required="true" aria-describedby="name-description">
        <p class="description" id="order-description">Order of FAQs Type.</p>
    </td>
</tr>