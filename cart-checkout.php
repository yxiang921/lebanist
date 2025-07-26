<?php
/* Template Name: Cart Check Out */
get_header();

// // Redirect to cart if no items
if (WC()->cart->is_empty()) {
  wp_redirect(wc_get_cart_url());
  exit;
}

// Process checkout
if (isset($_POST['woocommerce_checkout_place_order'])) {
  WC()->checkout()->process_checkout();
}

$checkout = WC()->checkout();
?>

<!-- <section class="banner" style="background-image:url(https://placehold.co/1920x300)">
  <div class="container">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a href="<?php echo home_url(); ?>">Home</a>
    </li>
    <li class="breadcrumb-item">
    <a href="<?php echo wc_get_page_permalink('shop'); ?>">Shop</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
  </ol>
  <h2>Checkout</h2>
  </div>
</section> -->

<section class="gap">
  <div class="container">
  <form name="checkout" method="post" class="checkout woocommerce-checkout checkout-meta donate-page" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
    <div class="row">
    <div class="col-lg-8">
      <h3 class="pb-3">Billing details</h3>
      <div class="col-lg-12">
      <?php
      $fields = $checkout->get_checkout_fields('billing');
      
      // Name field
      if (isset($fields['billing_first_name']) && isset($fields['billing_last_name'])) {
        echo '<div class="row">';
        echo '<div class="col-lg-6">';
        woocommerce_form_field('billing_first_name', array(
          'type' => 'text',
          'class' => array('form-row-first'),
          'label' => 'First Name',
          'placeholder' => 'First Name',
          'required' => true,
        ), $checkout->get_value('billing_first_name'));
        echo '</div>';
        echo '<div class="col-lg-6">';
        woocommerce_form_field('billing_last_name', array(
          'type' => 'text',
          'class' => array('form-row-last'),
          'label' => 'Last Name',
          'placeholder' => 'Last Name',
          'required' => true,
        ), $checkout->get_value('billing_last_name'));
        echo '</div>';
        echo '</div>';
      }
      
      // Email field
      if (isset($fields['billing_email'])) {
        woocommerce_form_field('billing_email', array(
          'type' => 'email',
          'class' => array('form-row-wide'),
          'label' => 'Email Address',
          'placeholder' => 'Email address',
          'required' => true,
        ), $checkout->get_value('billing_email'));
      }
      
      // Country field
      if (isset($fields['billing_country'])) {
        woocommerce_form_field('billing_country', array(
          'type' => 'country',
          'class' => array('form-row-wide country_to_state'),
          'label' => 'Country',
          'placeholder' => 'Select Country',
          'required' => true,
        ), $checkout->get_value('billing_country'));
      }
      ?>
      
      <div class="row" style="margin-top:20px;">
        <div class="col-lg-6">
        <?php
        // City field
        if (isset($fields['billing_city'])) {
          woocommerce_form_field('billing_city', array(
            'type' => 'text',
            'class' => array('form-row-first'),
            'label' => 'City',
            'placeholder' => 'City',
            'required' => true,
          ), $checkout->get_value('billing_city'));
        }
        ?>
        </div>
        <div class="col-lg-6">
        <?php
        // State field
        if (isset($fields['billing_state'])) {
          woocommerce_form_field('billing_state', array(
            'type' => 'state',
            'class' => array('form-row-last'),
            'label' => 'State / Province',
            'placeholder' => 'State / Province',
            'required' => true,
          ), $checkout->get_value('billing_state'));
        }
        ?>
        </div>
        <div class="col-lg-6">
        <?php
        // Postcode field
        if (isset($fields['billing_postcode'])) {
          woocommerce_form_field('billing_postcode', array(
            'type' => 'text',
            'class' => array('form-row-first'),
            'label' => 'Postal Code',
            'placeholder' => 'Postal Code',
            'required' => true,
          ), $checkout->get_value('billing_postcode'));
        }
        ?>
        </div>
        <div class="col-lg-6">
        <?php
        // Phone field
        if (isset($fields['billing_phone'])) {
          woocommerce_form_field('billing_phone', array(
            'type' => 'tel',
            'class' => array('form-row-last'),
            'label' => 'Phone',
            'placeholder' => 'Phone',
            'required' => true,
          ), $checkout->get_value('billing_phone'));
        }
        ?>
        </div>
      </div>
      
      <?php
      // Address fields
      if (isset($fields['billing_address_1'])) {
        woocommerce_form_field('billing_address_1', array(
          'type' => 'text',
          'class' => array('form-row-wide'),
          'label' => 'Address',
          'placeholder' => 'Street address',
          'required' => true,
        ), $checkout->get_value('billing_address_1'));
      }
      
      if (isset($fields['billing_address_2'])) {
        woocommerce_form_field('billing_address_2', array(
          'type' => 'text',
          'class' => array('form-row-wide'),
          'label' => 'Address 2',
          'placeholder' => 'Apartment, suite, etc. (optional)',
        ), $checkout->get_value('billing_address_2'));
      }
      ?>
      
      <div class="ship-address">
        <?php if (!is_user_logged_in()) : ?>
        <div class="d-flex">
        <input type="checkbox" id="createaccount" name="createaccount" value="1" <?php checked($checkout->get_value('createaccount'), 1); ?>>
        <label for="createaccount">Create an account for later use</label>
        </div>
        <?php endif; ?>
        
        <?php if (WC()->cart->needs_shipping()) : ?>
        <div class="d-flex">
        <input type="checkbox" id="ship-to-different-address" name="ship_to_different_address" value="1" <?php checked($checkout->get_value('ship_to_different_address'), 1); ?>>
        <label for="ship-to-different-address">Ship to a different address?</label>
        </div>
        <?php endif; ?>
      </div>
      </div>
      
      <?php if (WC()->cart->needs_shipping()) : ?>
      <div id="shipping-fields" style="display: none;">
      <h3>Shipping Details</h3>
      <?php
      $shipping_fields = $checkout->get_checkout_fields('shipping');
      foreach ($shipping_fields as $key => $field) {
        woocommerce_form_field($key, $field, $checkout->get_value($key));
      }
      ?>
      </div>
      <?php endif; ?>
      
      <div class="woocommerce-additional-fields">
      <?php
      woocommerce_form_field('order_comments', array(
        'type' => 'textarea',
        'class' => array('form-row-wide'),
        'label' => 'Order notes',
        'placeholder' => 'Notes about your order, e.g. special notes for delivery.',
      ), $checkout->get_value('order_comments'));
      ?>
      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="cart_totals-checkout">
      <div class="cart_totals cart-Total">
        <h4 class="pt-0">Your Order</h4>
        <table class="shop_table_responsive">
        <tbody>
          <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
            $product = $cart_item['data'];
            $product_id = $cart_item['product_id'];
            $quantity = $cart_item['quantity'];
          ?>
          <tr class="cart-item">
          <td><?php echo $product->get_name(); ?> × <?php echo $quantity; ?></td>
          <td><?php echo WC()->cart->get_product_subtotal($product, $quantity); ?></td>
          </tr>
          <?php endforeach; ?>
          
          <tr class="cart-subtotal">
          <th>Subtotal:</th>
          <td><?php echo WC()->cart->get_cart_subtotal(); ?></td>
          </tr>
          
          <?php if (WC()->cart->needs_shipping()) : ?>
          <tr class="shipping">
          <th>Shipping:</th>
          <td><?php echo WC()->cart->get_cart_shipping_total(); ?></td>
          </tr>
          <?php endif; ?>
          
          <?php if (WC()->cart->get_total_tax() > 0) : ?>
          <tr class="tax">
          <th>Tax:</th>
          <td><?php echo WC()->cart->get_taxes_total(); ?></td>
          </tr>
          <?php endif; ?>
          
          <tr class="total">
          <th>Total:</th>
          <td><?php echo WC()->cart->get_total(); ?></td>
          </tr>
        </tbody>
        </table>
      </div>
      
      <div class="checkout-side">
        <h4>Payment Method</h4>
        <?php
        $available_gateways = WC()->payment_gateways->get_available_payment_gateways();
        if (!empty($available_gateways)) :
        ?>
        <ul>
        <?php foreach ($available_gateways as $gateway) : ?>
        <li>
          <input type="radio" id="payment_method_<?php echo $gateway->id; ?>" name="payment_method" value="<?php echo esc_attr($gateway->id); ?>" <?php checked($gateway->chosen, true); ?>>
          <label for="payment_method_<?php echo $gateway->id; ?>">
          <?php echo $gateway->get_title(); ?>
          </label>
          
        </li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        
        <?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
        <button type="submit" class="btn" name="woocommerce_checkout_place_order" value="Place order">
        <span>Place Order</span>
        </button>
      </div>
      </div>
    </div>
    </div>
  </form>
  </div>
</section>

<script>
jQuery(document).ready(function($) {
  // Show/hide shipping fields
  $('#ship-to-different-address').change(function() {
    if ($(this).is(':checked')) {
      $('#shipping-fields').show();
    } else {
      $('#shipping-fields').hide();
    }
  });
  
  // Show/hide payment method details
  $('input[name="payment_method"]').change(function() {
    $('.payment_box').hide();
    $('.payment_method_' + $(this).val()).show();
  });
});
</script>

<?php
get_footer();
?></tr>