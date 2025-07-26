<?php
/* Template Name: Product Detail */
get_header();
?>

<?php
defined('ABSPATH') || exit;

get_header('shop');

if (have_posts()):
  while (have_posts()):
    the_post();

    global $product; // 在 the_post() 后才可用
    if ($product instanceof WC_Product):
      ?>

      <!-- <div class="custom-product-wrapper">
        <h1 class="product-title"><?php the_title(); ?></h1>

        <div class="product-image">
          <?php echo $product->get_image(); ?>
        </div>

        <div class="product-price">
          <?php echo $product->get_price_html(); ?>
        </div>

        <div class="product-short-description">
          <?php echo apply_filters('woocommerce_short_description', $post->post_excerpt); ?>
        </div>

        <div class="product-add-to-cart">
          <?php woocommerce_template_single_add_to_cart(); ?>
        </div>
      </div> -->

      <section class="gap" style="margin-top: 12px;background-color: #f7f7f7 ;">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="pd-gallery">
                <ul class="pd-imgs" style="overflow: scroll !important;width: 150px !important;height: 320px !important;">
                  <?php
                  $attachment_ids = $product->get_gallery_image_ids();
                  $main_image_id = $product->get_image_id();
                  $all_images = array_merge([$main_image_id], $attachment_ids);

                  foreach ($all_images as $index => $attachment_id):
                    $image_url = wp_get_attachment_image_url($attachment_id, 'large');
                    $active_class = $index === 0 ? 'nav-active' : '';
                    ?>
                    <li class="li-pd-imgs <?php echo $active_class; ?>">
                      <a href="JavaScript:void(0)" style="padding: 0 !important;">
                        <img style="min-width: 100% !important;" alt="<?php echo get_the_title(); ?>"
                          src="<?php echo $image_url; ?>">
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
                <div class="pd-main-img">
                  <img style="width: 90%;height: 90%; object-fit: cover;" id="NZoomImg" alt="<?php echo get_the_title(); ?>"
                    src="<?php echo wp_get_attachment_image_url($main_image_id, 'large'); ?>">
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="product-info">
                <div class="d-flex align-items-center">
                  <?php if ($product->is_on_sale()): ?>
                    <p>Save
                      <?php echo round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100); ?>%
                    </p>
                  <?php endif; ?>
                  <h5>SKU <?php echo $product->get_sku(); ?></h5>
                </div>
                <h2><?php the_title(); ?></h2>

                <?php if ($product->get_review_count() > 0): ?>
                  <div class="star">
                    <?php
                    $rating = $product->get_average_rating();
                    for ($i = 1; $i <= 5; $i++):
                      $star_class = $i <= $rating ? 'fa-solid' : 'fa-regular';
                      ?>
                      <i class="<?php echo $star_class; ?> fa-star"></i>
                    <?php endfor; ?>
                    <span>( <?php echo $product->get_review_count(); ?> Reviews )</span>
                  </div>
                <?php endif; ?>

                <div class="price">
                  <div>
                    <div class="d-flex">
                      <h3><?php echo $product->get_price_html(); ?></h3>
                    </div>
                    <span
                      class="dots"><?php echo $product->get_stock_status() === 'instock' ? 'In stock' : 'Out of stock'; ?><?php echo $product->get_stock_quantity() ? ', ' . $product->get_stock_quantity() . ' units' : ''; ?></span>

                    <?php
                    $attributes = $product->get_attributes();
                    foreach ($attributes as $attribute):
                      if ($attribute->get_visible()):
                        $attribute_name = wc_attribute_label($attribute->get_name());
                        $attribute_values = $attribute->get_options();
                        ?>
                        <div class="quantity">
                          <h6><?php echo $attribute_name; ?>:</h6>
                          <?php if ($attribute_name === 'Color' || $attribute_name === 'Colors'): ?>
                            <ul class="color">
                              <?php foreach ($attribute_values as $value): ?>
                                <li class="<?php echo strtolower($value); ?>"></li>
                              <?php endforeach; ?>
                            </ul>
                          <?php else: ?>
                            <span><?php echo implode(', ', $attribute_values); ?></span>
                          <?php endif; ?>
                        </div>
                        <?php
                      endif;
                    endforeach;
                    ?>

                    <?php if ($product->is_purchasable()): ?>
                      <form class="cart"
                        action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
                        method="post" enctype='multipart/form-data'>
                        <div class="quantity">
                          <h6>Quantity:</h6>
                          <?php
                          woocommerce_quantity_input(array(
                            'min_value' => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
                            'max_value' => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                            'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(),
                          ));
                          ?>
                        </div>
                        <div class="add-to-cart">
                          <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>"
                            class="btn single_add_to_cart_button">
                            <span>Add to Cart</span>
                          </button>
                          <?php wp_nonce_field('woocommerce-add-to-cart'); ?>
                        </div>
                      </form>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="payment-methods">
                <ul class="product_meta">
                  <li><span class="theme-bg-clr">Category:</span>
                    <ul class="pd-cat">
                      <li>
                        <?php echo wc_get_product_category_list($product->get_id(), ', '); ?>
                      </li>
                    </ul>
                  </li>
                </ul>
                <ul class="social-media">
                  <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="gap">
        <div class="container">
          <div class="comment mt-0">
            <h3>Description</h3>
            <div class="boder"></div>
            <?php echo apply_filters('the_content', $product->get_description()); ?>
          </div>

          <?php if ($product->has_attributes()): ?>
            <div class="comment mt-0">
              <h3>Additional Information</h3>
              <div class="boder"></div>
              <ul class="specification">
                <?php foreach ($product->get_attributes() as $attribute): ?>
                  <li>
                    <h6><?php echo wc_attribute_label($attribute->get_name()); ?></h6>
                    <?php echo implode(', ', $attribute->get_options()); ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <div class="row">
            <div class="col-lg-7">
              <div class="comment">
                <h3>Reviews</h3>
                <div class="boder"></div>
              </div>
              <?php if ($product->get_review_count() > 0): ?>
                <ul class="reviews">
                  <?php
                  $reviews = get_comments(array(
                    'post_id' => $product->get_id(),
                    'status' => 'approve',
                    'type' => 'review'
                  ));
                  foreach ($reviews as $review):
                    $rating = get_comment_meta($review->comment_ID, 'rating', true);
                    ?>
                    <li>
                      <div>
                        <?php echo get_avatar($review->comment_author_email, 100); ?>
                        <div class="star">
                          <?php for ($i = 1; $i <= 5; $i++): ?>
                            <i class="fa-solid fa-star <?php echo $i <= $rating ? '' : 'fa-regular'; ?>"></i>
                          <?php endfor; ?>
                        </div>
                      </div>
                      <div>
                        <div class="d-flex align-items-center">
                          <h4><?php echo $review->comment_author; ?></h4>
                          <span><?php echo date('F j, Y', strtotime($review->comment_date)); ?></span>
                        </div>
                        <p><?php echo $review->comment_content; ?></p>
                      </div>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
            <div class="col-lg-5">
              <?php if (comments_open()): ?>
                <form class="add-review comment leave-comment" method="post">
                  <div class="rating">
                    <h3>Add Review</h3>
                    <div class="boder"></div>
                    <div class="d-flex align-items-center mb-4">
                      <span>Select Rating:</span>
                      <div class="start d-flex align-items-center ps-md-4">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                          <i class="fa-regular fa-star" data-rating="<?php echo $i; ?>"></i>
                        <?php endfor; ?>
                      </div>
                    </div>
                  </div>
                  <input type="text" name="author" placeholder="Complete Name" required>
                  <input type="email" name="email" placeholder="Email Address" required>
                  <textarea name="comment" placeholder="Add Review" required></textarea>
                  <input type="hidden" name="rating" value="5">
                  <input type="hidden" name="comment_post_ID" value="<?php echo $product->get_id(); ?>">
                  <button type="submit" class="btn">
                    <span>Add Review</span>
                  </button>
                </form>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
      <?php
    endif;
  endwhile;
endif;

get_footer('shop');
?>