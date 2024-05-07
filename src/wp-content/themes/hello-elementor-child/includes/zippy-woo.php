<?php

add_theme_support('woocommerce');


add_filter('woocommerce_loop_add_to_cart_link', 'replace_default_button');
function replace_default_button()
{

  //replace default button code with custom code
  return '';
}

function remove_price_from_loop()
{
  return "";
}
// add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action('woocommerce_get_price_html', 'remove_price_from_loop', 10);
// Enqueue/Add CSS and JS files
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');


add_action('woocommerce_after_order_notes', 'custom_checkout_field');

function custom_checkout_field($checkout)

{

  echo '<div id="custom_checkout_field"><h3>' . __('Please Provide The Custom Data') . '</h3>';

  woocommerce_form_field(
    'custom_field_name',
    array(

      'type' => 'text',
      'required' => 'true',

      'class' => array(

        'my-field-class form-row-wide'

      ),

      'label' => __('Custom Field'),

      'placeholder' => __('Enter Custom Data'),

    ),

    $checkout->get_value('custom_field_name')
  );

  echo '</div>';
}
