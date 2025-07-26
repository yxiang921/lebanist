<?php
/* Template Name: Home */
get_header();
?>

<?php
$uri = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($uri, '/'));
$locale = $segments[0] ?? 'en';

$langFile = __DIR__ . "/languages/{$locale}.php";
if (file_exists($langFile)) {
    $lang = include $langFile;
} else {
    $lang = include __DIR__ . '/languages/en.php'; // Fallback to English if the file doesn't exist
}
?>

<style>
    #hero_title {
        color: #9c7d7c;
        font-size: 4rem;
        font-weight: 700;
        padding: 12px 0;
    }
</style>

<?php the_content(); ?>
<section class="gap">
    <div class="container">
        <div class="heading">
            <h2>
                <?= esc_html($lang['s2_title']) ?>
            </h2>
            <p><?= esc_html($lang['s2_desc']) ?></p>
        </div>
        <div class="balloon-slider owl-carousel owl-theme">


            <?php
            $args = [
                'post_type' => 'product',
                'posts_per_page' => 10,
                'tax_query' => [
                    [
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => 'product',
                    ],
                ],
            ];

            $loop = new WP_Query($args);

            if ($loop->have_posts()):
                while ($loop->have_posts()):
                    $loop->the_post();
                    global $product;
                    ?>

                    <div class="item">
                        <div class="balloon-shap">
                            <img alt="balloon" style="width: 140px !important;height: 140px !important;"
                                src="<?php echo esc_url(wp_get_attachment_url($product->get_image_id())) ?>">
                            <a href="<?php the_permalink(); ?>">
                                <h5><?php the_title(); ?></h5>
                                <p>
                                    <?php echo $product->get_price_html(); ?>
                                </p>
                            </a>
                        </div>
                    </div>
                    <?php
                endwhile;


            else:
                echo '<p>No products found</p>';
            endif;

            // 恢复原始查询
            wp_reset_postdata();
            ?>

        </div>
    </div>
</section>
<section class="gap"
    style="background: url(<?= asset('assets/img/hero_slider.webp') ?>) no-repeat;background-position:center;background-size:cover;">
    <div class="container">
        <div class="heading">
            <h2><?= esc_html($lang['s3_title']) ?></h2>
            <p><?= esc_html($lang['s3_desc']) ?></p>
        </div>
        <div class="product-slider owl-carousel owl-theme">
            <?php
            $args = [
                'post_type' => 'product',
                'posts_per_page' => 10,
                'tax_query' => [
                    [
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => 'product',
                    ],

                ],
                'orderby' => 'date',
            ];

            $loop = new WP_Query($args);

            if ($loop->have_posts()):
                while ($loop->have_posts()):
                    $loop->the_post();
                    global $product;
                    ?>
                    <div class="item">
                        <div class="product-style">
                            <img alt="img" src="<?php echo esc_url(wp_get_attachment_url($product->get_image_id())) ?>">
                            <a href="<?php the_permalink(); ?>">
                                <h5><?= the_title(); ?></h5>
                            </a>
                            <h6>RM<?= $product->get_price() ?></h6>
                            <span>
                                <?php
                                if ($product->is_in_stock()) {
                                    echo 'In stock, ' . $product->get_stock_quantity() . ' units';
                                } else {
                                    echo 'Out of stock';
                                }
                                ?>
                            </span>
                            <div class="add-to-cart">
                                <form class="cart" method="post" enctype="multipart/form-data">
                                    <?php
                                    woocommerce_quantity_input(array(
                                        'min_value' => 1,
                                        'max_value' => $product->get_max_purchase_quantity(),
                                        'input_value' => 1
                                    ));
                                    ?>
                                    <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>"
                                        class="btn single_add_to_cart_button alt">
                                        <span><?= esc_html($lang['add_cart']) ?></span>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;


            else:
                echo '<p>No products found</p>';
            endif;

            // 恢复原始查询
            wp_reset_postdata();
            ?>

        </div>
    </div>
</section>
<section class="gap mt-12">
    <div class="container">
        <div class="heading two">
            <h2>
                <?= esc_html($lang['s4_title']) ?>
            </h2>
            <p>
                <?= esc_html($lang['s4_desc']) ?>
            </p>
        </div>
        <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <?php
            // Get subcategories under "service" category
            $service_subcategories = get_terms(array(
                'taxonomy' => 'product_cat',
                'parent' => get_term_by('slug', 'service', 'product_cat')->term_id,
                'hide_empty' => false,
            ));

            if (!empty($service_subcategories) && !is_wp_error($service_subcategories)) {
                $first = true;
                foreach ($service_subcategories as $subcategory) {
                    ?>
                    <button class="nav-link <?php echo $first ? 'active' : ''; ?>"
                        id="v-pills-<?php echo $subcategory->slug; ?>-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-<?php echo $subcategory->slug; ?>" type="button" role="tab"
                        aria-controls="v-pills-<?php echo $subcategory->slug; ?>"
                        aria-selected="<?php echo $first ? 'true' : 'false'; ?>">
                        <?php echo $subcategory->name; ?>
                    </button>
                    <?php
                    $first = false;
                }
            }
            ?>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <?php
            if (!empty($service_subcategories) && !is_wp_error($service_subcategories)) {
                $first = true;
                foreach ($service_subcategories as $subcategory) {
                    ?>
                    <div class="tab-pane fade <?php echo $first ? 'show active' : ''; ?>"
                        id="v-pills-<?php echo $subcategory->slug; ?>" role="tabpanel"
                        aria-labelledby="v-pills-<?php echo $subcategory->slug; ?>-tab">
                        <div class="row">
                            <?php
                            // Query products in this subcategory
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 4,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'term_id',
                                        'terms' => $subcategory->term_id,
                                    ),
                                ),
                            );

                            $products = new WP_Query($args);

                            if ($products->have_posts()) {
                                while ($products->have_posts()) {
                                    $products->the_post();
                                    global $product;
                                    ?>
                                    <div class="col-lg-6">
                                        <div class="product-style two">
                                            <div>
                                                <img alt="img" width="200px" height="120px"
                                                    src="<?php echo esc_url(wp_get_attachment_url($product->get_image_id())); ?>">
                                            </div>
                                            <div>
                                                <a href="<?php the_permalink(); ?>">
                                                    <h5><?php the_title(); ?></h5>
                                                </a>
                                                <h6>RM<?php echo $product->get_price(); ?></h6>
                                                <span>
                                                    <?php
                                                    if ($product->is_in_stock()) {
                                                        echo 'In stock, ' . $product->get_stock_quantity() . ' units';
                                                    } else {
                                                        echo 'Out of stock';
                                                    }
                                                    ?>
                                                </span>
                                                <div class="add-to-cart">
                                                    <form class="cart" method="post" enctype="multipart/form-data">
                                                        <button type="submit" name="add-to-cart"
                                                            value="<?php echo esc_attr($product->get_id()); ?>" class="btn">
                                                            <span>Add to Cart</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                wp_reset_postdata();
                            } else {
                                echo '<p>Empty</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    $first = false;
                }
            }
            ?>
        </div>
    </div>
</section>
<section class="gap popular-occasion">
    <div class="container">
        <div class="heading">
            <h2><?= esc_html($lang['s5_title']) ?></h2>
            <p><?= esc_html($lang['s5_desc']) ?></p>
        </div>
        <?php
        // Get subcategories under "popular" category
        $popular_category = get_term_by('slug', 'popular', 'product_cat');
        
        if ($popular_category) {
            $popular_subcategories = get_terms(array(
            'taxonomy' => 'product_cat',
            'parent' => $popular_category->term_id,
            'hide_empty' => false,
            ));

            if (!empty($popular_subcategories) && !is_wp_error($popular_subcategories)) {
            ?>
            <div class="row">
                <div class="col-lg-3">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php
                    $first = true;
                    foreach ($popular_subcategories as $index => $subcategory) {
                    ?>
                    <li class="nav-item tab-style" role="presentation">
                        <button class="nav-link <?php echo $first ? 'active' : ''; ?> tab-ballon" 
                            id="tab-<?php echo $subcategory->slug; ?>" 
                            data-bs-toggle="tab"
                            data-bs-target="#content-<?php echo $subcategory->slug; ?>" 
                            type="button" 
                            role="tab" 
                            aria-controls="content-<?php echo $subcategory->slug; ?>"
                            aria-selected="<?php echo $first ? 'true' : 'false'; ?>">
                        <?php echo esc_html($subcategory->name); ?>
                        </button>
                    </li>
                    <?php
                    $first = false;
                    }
                    ?>
                </ul>
                </div>
                <div class="col-lg-9">
                <div class="tab-content">
                    <?php
                    $first = true;
                    foreach ($popular_subcategories as $subcategory) {
                    // Get the first product from this subcategory
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 1,
                        'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'term_id',
                            'terms' => $subcategory->term_id,
                        ),
                        ),
                    );

                    $products = new WP_Query($args);

                    if ($products->have_posts()) {
                        $products->the_post();
                        global $product;
                        
                        // Get ready time attribute
                        $ready_time = $product->get_attribute('ready_time') ?: 'Not specified';
                        ?>
                        <div class="tab-pane <?php echo $first ? 'active' : ''; ?>" 
                         id="content-<?php echo $subcategory->slug; ?>" 
                         role="tabpanel" 
                         aria-labelledby="tab-<?php echo $subcategory->slug; ?>">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                            <div class="theme-img">
                                <img alt="<?php echo esc_attr(get_the_title()); ?>" 
                                 src="<?php echo esc_url(wp_get_attachment_url($product->get_image_id())); ?>" 
                                 style="width: 440px; height: 466px; object-fit: cover;">
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="theme-text party-balloons">
                                <h6>Ready Time <span>– <?php echo esc_html($ready_time); ?></span></h6>
                                <h3><?php echo esc_html(get_the_title()); ?></h3>
                                <ul>
                                <?php
                                // Display product short description or excerpt as features
                                $short_description = $product->get_short_description();
                                if ($short_description) {
                                    $features = explode("\n", strip_tags($short_description));
                                    foreach ($features as $feature) {
                                    if (trim($feature)) {
                                        echo '<li><img alt="chak" src="' . get_template_directory_uri() . '/assets/img/chak.png">' . esc_html(trim($feature)) . '</li>';
                                    }
                                    }
                                } 
                                ?>
                                </ul>
                                <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span>Starting From:</span>
                                    <h3>RM<?php echo $product->get_price(); ?></h3>
                                </div>
                                <div class="star">
                                    <?php
                                    $average = $product->get_average_rating();
                                    $rating_count = $product->get_rating_count();
                                    
                                    for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $average) {
                                        echo '<i class="fa-solid fa-star"></i>';
                                    } else {
                                        echo '<i class="fa-regular fa-star"></i>';
                                    }
                                    }
                                    ?>
                                    <h6>(<?php echo $rating_count; ?>)</h6>
                                </div>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn"><span>Book Now</span></a>
                            </div>
                            </div>
                        </div>
                        </div>
                        <?php
                        wp_reset_postdata();
                    }
                    $first = false;
                    }
                    ?>
                </div>
                </div>
            </div>
            <?php
            } else {
            echo '<p>No popular categories found</p>';
            }
        } else {
            echo '<p>Popular category not found</p>';
        }
        ?>

    </div>
</section>

<?php
get_footer();
?>