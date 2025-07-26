<?php
/* Template Name: Cart */
get_header();
?>
<!-- <section class="banner" style="background-image:url(https://placehold.co/1920x300)">
    <div class="container">
        <?php woocommerce_breadcrumb(); ?>
        <h2>My Cart</h2>
    </div>
</section> -->
<section class="gap">
    <div class="container">
        <div class="row">
            <?php do_action('woocommerce_before_cart'); ?>
            <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
                <?php do_action('woocommerce_before_cart_table'); ?>
                <div class="row">
                    <div class="col-lg-8">
                        <div style="overflow-x:auto;overflow-y: hidden;">
                            <table class="shop_table table-responsive">
                                <thead>
                                    <tr>
                                        <th class="product-name">Product Detail</th>
                                        <th class="product-price">Each Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                                        $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                                        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                                        if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                                            ?>
                                            <tr class="product">
                                                <td class="product-name">
                                                    <?php
                                                    $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(array(70, 70)), $cart_item, $cart_item_key);
                                                    if (!$thumbnail) {
                                                        $thumbnail = '<img alt="img" src="https://placehold.co/70x70">';
                                                    }
                                                    echo $thumbnail;
                                                    ?>
                                                    <div>
                                                        <span><?php echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)); ?></span>
                                                        <?php
                                                        // Display product attributes
                                                        if ($_product->is_type('variation')) {
                                                            foreach ($cart_item['variation'] as $key => $value) {
                                                                if (empty($value))
                                                                    continue;
                                                                $attribute_name = str_replace('attribute_', '', $key);
                                                                $attribute_name = str_replace('pa_', '', $attribute_name);
                                                                echo '<p>' . ucfirst($attribute_name) . ': ' . $value . '</p>';
                                                            }
                                                        }
                                                        ?>
                                                        <p>SKU:
                                                            <?php echo $_product->get_sku() ? $_product->get_sku() : 'N/A'; ?>
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="product-price">
                                                    <?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); ?>
                                                </td>
                                                <td class="product-quantity">
                                                    <?php
                                                    if ($_product->is_sold_individually()) {
                                                        $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                                                    } else {
                                                        $product_quantity = woocommerce_quantity_input(
                                                            array(
                                                                'input_name' => "cart[{$cart_item_key}][qty]",
                                                                'input_value' => $cart_item['quantity'],
                                                                'max_value' => $_product->get_max_purchase_quantity(),
                                                                'min_value' => '0',
                                                                'product_name' => $_product->get_name(),
                                                                'classes' => 'input-text',
                                                            ),
                                                            $_product,
                                                            false
                                                        );
                                                    }
                                                    echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                                                    ?>
                                                </td>
                                                <td class="product-subtotal"></td>
                                                </td>
                                                <?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?>
                                                </td>
                                                <td class="product-remove">
                                                    <?php
                                                    echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                                        '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fa-regular fa-circle-xmark"></i></a>',
                                                        esc_url(wc_get_cart_remove_url($cart_item_key)),
                                                        esc_html__('Remove this item', 'woocommerce'),
                                                        esc_attr($product_id),
                                                        esc_attr($_product->get_sku())
                                                    ), $cart_item_key);
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h4><?php echo WC()->cart->get_cart_contents_count(); ?> items</h4>
                                                <h5><?php echo WC()->cart->get_cart_subtotal(); ?></h5>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        
                        <div class="cart_totals">
                            <h4>Payment Total</h4>
                            <table class="shop_table_responsive">
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal:</th>
                                        <td><?php echo WC()->cart->get_cart_subtotal(); ?></td>
                                    </tr>
                                    <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()): ?>
                                        <tr class="Shipping">
                                            <th>Shipping:</th>
                                            <td>
                                                <?php
                                                $shipping_total = WC()->cart->get_shipping_total();
                                                if ($shipping_total > 0) {
                                                    echo wc_price($shipping_total);
                                                } else {
                                                    echo 'free';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()): ?>
                                        <tr class="tax-total">
                                            <th>Tax:</th>
                                            <td><?php echo WC()->cart->get_taxes_total(); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr class="Total">
                                        <th>Total:</th>
                                        <td><?php echo WC()->cart->get_total(); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="btn">
                                    <span>Proceed to checkout</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
                <input type="hidden" name="update_cart" value="Update Cart">
            </form>
        </div>
    </div>
</section>


<?php
get_footer();
?>
