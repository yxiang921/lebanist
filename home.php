<?php
/* Template Name: Home */
get_header();
?>

<style>
    #hero_title {
        color: #9c7d7c;
        font-size: 3rem;
        font-weight: 700;
        padding: 12px 0;
    }
</style>

<section class="slider-home-1 owl-carousel owl-theme">
    <div class="hero-section item"
        style="background-image: url(<?= asset('assets/img/hero_slider.png') ?>) ;background-size: cover;background-position: center; ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="featured-area"
                        style="background: url(<?= asset('assets/img/balloon-bg.jpeg') ?>) no-repeat; background-size: cover;background-position: center;">
                        <span>点亮您的生活</span>
                        <h4 id="hero_title">乐伴工作室</h4>
                        <p>
                            乐伴会一直陪伴着您的喜悦
                            <br>
                            为您带来不一样的乐趣和喜悦
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="hero-section item" style="background-image: url(https://placehold.co/1920x640);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="featured-area">
                        <span>IT'S NOT A PARTY WITHOUT</span>
                        <h3>Balloons!</h3>
                        <h5>20,000+ BALLOON DESIGNS IN STOCK</h5>
                        <p>Balloons offers one of the largest online balloon selections in the world.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</section>

<section class="gap">
    <div class="container">
        <div class="heading">
            <h2>Shop By Bloons Types</h2>
            <p>The Balloons you want when you want them!</p>
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
                            <img alt="balloon" style="width: 120px !important;height: 120px !important;"
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
<section>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="party-balloons">
                    <h2>Explore party balloons for every milestone</h2>
                    <p>holiday, and style. Find all your latex, foil, and helium balloons. We can deliver as fast as
                        same day!</p>
                    <ul>
                        <li><img alt="chak" src="assets/img/chak.png">Wide Selection Of Foil Balloons</li>
                        <li><img alt="chak" src="assets/img/chak.png">Latex Balloons For Valentine's Day</li>
                        <li><img alt="chak" src="assets/img/chak.png">Best Options In Balloons Themes</li>
                    </ul>
                    <div class="call-us">
                        <img alt="call" src="assets/img/call.png">
                        <div>
                            <span>Have Questions? Call Us</span>
                            <a href="callto:+60123456789">+60123456789</a>
                            <p>Open monday to Friday 9:30 AM to 6:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="party-balloon-img">
                    <img alt="party-balloon" class="p-balloon" src="<?= asset('assets/img/explore_1.png') ?>">
                    <img alt="party-balloon" src="<?= asset('assets/img/explore_2.png') ?>">
                    <div class="b-shap"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gap" style="background-image: url(https://placehold.co/1920x904)">
    <div class="container">
        <div class="heading">
            <img alt="heading" src="assets/img/heading.png">
            <h2>Recent Products</h2>
            <p>Love With Our Wide Selection Of Foil Balloons</p>
        </div>
        <div class="product-slider owl-carousel owl-theme">
            <div class="item">
                <div class="product-style">
                    <img alt="img" src="https://placehold.co/195x210">
                    <a href="product-details.html">
                        <h5>Love Script Silver Baloon</h5>
                    </a>
                    <h6>RM28.61</h6>
                    <span>In stock, 21 units</span>
                    <div class="add-to-cart">
                        <a href="#" class="btn"><span>Add to Cart</span></a>
                        
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-style">
                    <img alt="img" src="https://placehold.co/195x210">
                    <h4>Save 16%</h4>
                    <a href="product-details.html">
                        <h5>Birthday Party Balloon Decoration</h5>
                    </a>
                    <div class="d-flex">
                        <h6>$16.69</h6><del>20.20</del>
                    </div>
                    <span>In stock, 21 units</span>
                    <div class="add-to-cart">
                        <a href="#" class="btn"><span>Add to Cart</span></a>
                        
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-style">
                    <img alt="img" src="https://placehold.co/195x210">
                    <a href="product-details.html">
                        <h5>Party Love Box Balloon</h5>
                    </a>
                    <h6>$28.61</h6>
                    <span>In stock, 21 units</span>
                    <div class="add-to-cart">
                        <a href="#" class="btn"><span>Add to Cart</span></a>
                        
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-style">
                    <img alt="img" src="https://placehold.co/195x210">
                    <h4>Save 16%</h4>
                    <a href="product-details.html">
                        <h5>Red Heart Balloon Decoration</h5>
                    </a>
                    <div class="d-flex">
                        <h6>$16.69</h6><del>20.20</del>
                    </div>
                    <span>In stock, 21 units</span>
                    <div class="add-to-cart">
                        <a href="#" class="btn"><span>Add to Cart</span></a>
                        
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-style">
                    <img alt="img" src="https://placehold.co/195x210">
                    <a href="product-details.html">
                        <h5>Mattalic Latex Balloons</h5>
                    </a>
                    <h6>$28.61</h6>
                    <span>In stock, 21 units</span>
                    <div class="add-to-cart">
                        <a href="#" class="btn"><span>Add to Cart</span></a>
                        
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="product-style">
                    <img alt="img" src="https://placehold.co/195x210">
                    <a href="product-details.html">
                        <h5>Party Love Box Balloon</h5>
                    </a>
                    <h6>$28.61</h6>
                    <span>In stock, 21 units</span>
                    <div class="add-to-cart">
                        <a href="#" class="btn"><span>Add to Cart</span></a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gap">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="holiday">
                    <img alt="holiday" src="https://placehold.co/416x264">
                    <div class="holiday-text">
                        <a href="packages.html">
                            <h3>Valentine's Day</h3>
                        </a>
                        <span>See Our Selection</span>
                    </div>
                </div>
                <div class="holiday mt-4">
                    <img alt="holiday" src="https://placehold.co/416x264">
                    <div class="holiday-text">
                        <a href="packages.html">
                            <h3>Mothers Day</h3>
                        </a>
                        <span>See Our Selection</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="holiday-text-style">
                    <h2>Holiday Balloons</h2>
                    <p>holiday, and style. Find all your latex, foil, and helium balloons. We can deliver as fast as
                        same day!</p>
                    <a href="packages.html" class="btn"><span>Shop Holiday Balloons</span></a>
                    <i class="fa-solid fa-location-dot"></i>
                    <span>547 S Mason Road, New town Street 2548 United State</span>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="holiday">
                    <img alt="holiday" src="https://placehold.co/416x264">
                    <div class="holiday-text">
                        <a href="packages.html">
                            <h3>Easter Day</h3>
                        </a>
                        <span>See Our Selection</span>
                    </div>
                </div>
                <div class="holiday mt-4">
                    <img alt="holiday" src="https://placehold.co/416x264">
                    <div class="holiday-text">
                        <a href="packages.html">
                            <h3>Colors Day</h3>
                        </a>
                        <span>See Our Selection</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gap no-top">
    <div class="container">
        <div class="heading two">
            <h2>Party Decorations</h2>
        </div>
        <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Valentine's</button>
            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Birthday</button>
            <button class="nav-link" id="v-pills-coffee-tab" data-bs-toggle="pill" data-bs-target="#v-pills-coffee"
                type="button" role="tab" aria-controls="v-pills-coffee" aria-selected="false">Alphabet</button>
            <button class="nav-link" id="v-pills-pizza-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pizza"
                type="button" role="tab" aria-controls="v-pills-pizza" aria-selected="false">Cartoon</button>
            <button class="nav-link" id="v-pills-burger-tab" data-bs-toggle="pill" data-bs-target="#v-pills-burger"
                type="button" role="tab" aria-controls="v-pills-burger" aria-selected="false">Shapes</button>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-style two">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="product-details.html">
                                    <h5>Love Script Silver Baloon</h5>
                                </a>
                                <h6>$28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-style two">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="product-details.html">
                                    <h5>Gold Number Ballons</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-style two mb-lg-0">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="product-details.html">
                                    <h5>Party Balloon Warm Numeral</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-style two mb-0">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="product-details.html">
                                    <h5>Giant Number Balloon</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-style two">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="#">
                                    <h5>Love Script Silver Baloon</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-style two">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="#">
                                    <h5>Gold Number Ballons</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-style two mb-0">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="#">
                                    <h5>Giant Number Balloon</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-coffee" role="tabpanel" aria-labelledby="v-pills-coffee-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-style two mb-lg-0">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="#">
                                    <h5>Party Balloon Warm Numeral</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-style two mb-0">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="#">
                                    <h5>Giant Number Balloon</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-pizza" role="tabpanel" aria-labelledby="v-pills-pizza-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-style two">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="#">
                                    <h5>Love Script Silver Baloon</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-style two">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="#">
                                    <h5>Gold Number Ballons</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-style two mb-lg-0">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="#">
                                    <h5>Party Balloon Warm Numeral</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-style two mb-0">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="#">
                                    <h5>Giant Number Balloon</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-burger" role="tabpanel" aria-labelledby="v-pills-burger-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-style two">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="#">
                                    <h5>Love Script Silver Baloon</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-style two">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="#">
                                    <h5>Gold Number Ballons</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-style two mb-lg-0">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="#">
                                    <h5>Party Balloon Warm Numeral</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-style two mb-0">
                            <div>
                                <img alt="img" src="https://placehold.co/140x165">
                            </div>
                            <div>
                                <a href="#">
                                    <h5>Giant Number Balloon</h5>
                                </a>
                                <h6>RM28.61</h6>
                                <span>In stock, 21 units</span>
                                <div class="add-to-cart">
                                    <a href="#" class="btn"><span>Add to Cart</span></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gap popular-occasion">
    <div class="container">
        <div class="heading">
            <img alt="heading" src="assets/img/heading.png">
            <h2>Popular Occasion Themes</h2>
            <p>whats trending at bargain balloons themes</p>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item tab-style" role="presentation">
                        <button class="nav-link active tab-ballon" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                            aria-selected="true">Love Theme
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="682.66669"
                                    height="682.66669" viewBox="0 0 682.66669 682.66669">
                                    <defs id="defs2128">
                                        <clipPath clipPathUnits="userSpaceOnUse" id="clipPath2138">
                                            <path d="M 0,512 H 512 V 0 H 0 Z" id="path2136" />
                                        </clipPath>
                                        <clipPath clipPathUnits="userSpaceOnUse" id="clipPath2150">
                                            <path d="M 0,512 H 512 V 0 H 0 Z" id="path2148" />
                                        </clipPath>
                                        <clipPath clipPathUnits="userSpaceOnUse" id="clipPath2174">
                                            <path d="M 0,512 H 512 V 0 H 0 Z" id="path2172" />
                                        </clipPath>
                                    </defs>
                                    <mask id="custom">
                                        <rect id="bg" x="0" y="0" width="100%" height="100%" fill="white" />
                                        <g transform="matrix(1.3333333,0,0,-1.3333333,0,682.66667)">
                                            <path transform="matrix(1,0,0,1,228.627,670.4834)"
                                                d="m 0,0 17.462,-34.924 c 5.387,-10.773 15.142,-18.712 26.785,-21.798 l 104.15,-27.603 c 26.627,-7.057 52.718,13.02 52.718,40.566 v 92.564 l 60.157,21.523 -52.458,115.904 20.987,32.659 C 218.654,310.637 127.586,389.448 25.943,388.52 c -116.016,-0.024 -209.371,-93.399 -209.37,-209.416 0,-61.115 26.179,-116.115 67.936,-154.398 18.278,-16.759 26.614,-41.77 22.456,-66.218 l -19.048,-111.983 H 93.688 l 8.997,82.951"
                                                style="stroke:#000000;stroke-width:30;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" />
                                            <path transform="matrix(1,0,0,1,402.4873,196.0645)"
                                                d="M 0,0 2.292,2.388 2.675,2.157 Z m 90.548,120.45 v 0 c -1.886,1.846 -3.834,3.64 -5.859,5.362 l -0.01,0.011 c 3.461,12.844 5.116,25.249 5.116,37.199 0,74.466 -60.367,134.833 -134.833,134.833 -40.463,0 -76.734,-17.847 -101.449,-46.07 -24.714,28.223 -60.987,46.07 -101.449,46.07 -74.466,0 -134.833,-60.367 -134.833,-134.833 0,-8.58 0.842,-17.391 2.597,-26.432 -23.432,-17.704 -37.43,-46.737 -37.314,-75.478 0,-42.075 22.939,-80.802 59.839,-101.02 l 134.259,-73.565 c 9.512,-17.545 23.695,-32.114 40.979,-42.093 l 32.628,-18.837 c 11.744,-6.781 26.705,-3.684 34.793,7.2 l 30.401,40.916 c 9.525,12.818 5.746,31.076 -8.084,39.06 l -6.279,3.626 1.94,1.59 34.982,28.645 c 16.157,12.297 30.852,24.351 44.158,36.159 l 6.32,5.176 4.154,4.327 c 3.52,3.27 6.938,6.523 10.246,9.755 l 28.372,-17.126 c 40.922,-24.862 93.291,-5.62 93.291,54.73 0,30.511 -12.326,59.6 -33.965,80.795"
                                                style="fill:#ffffff;fill-opacity:1;fill-rule:nonzero;stroke:none" />
                                            <path transform="matrix(1,0,0,1,406.832,199.5674)"
                                                d="M 0,0 C -27.567,-27.146 -62.561,-55.655 -106.049,-85.514"
                                                style="fill:none;stroke:#000000;stroke-width:30;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" />
                                            <path transform="matrix(1,0,0,1,87.7617,241.1289)"
                                                d="m 0,0 135.382,-82.25 c 0,0 19.619,11.6 43.154,15.539 21.166,3.543 36.946,-19.065 26.216,-37.651 l -7.768,-13.454 25.071,-14.475 c 13.831,-7.985 17.609,-26.242 8.084,-39.061 l -30.402,-40.915 c -8.088,-10.885 -23.049,-13.982 -34.793,-7.201 l -32.628,18.838 c -17.284,9.979 -31.466,24.547 -40.978,42.092 l -134.26,73.565 c -36.899,20.218 -59.839,58.946 -59.839,101.02 -0.115,28.744 13.885,57.779 37.321,75.483 C -57.298,54.059 -33.258,20.046 0,0 Z"
                                                style="fill:none;stroke:#000000;stroke-width:30;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" />
                                            <path transform="matrix(1,0,0,1,487.1768,321.8765)"
                                                d="m 0,0 v 0 c 25.265,-21.491 39.823,-52.988 39.823,-86.157 0,-60.35 -52.369,-79.592 -93.291,-54.73 l -193.418,116.751 c -19.95,-0.536 -39.659,4.463 -56.942,14.441 l -32.628,18.838 c -11.744,6.78 -16.543,21.285 -11.16,33.732 l 20.232,46.787 c 6.339,14.658 24.039,20.514 37.869,12.529 l 25.072,-14.475 7.768,13.455 c 10.731,18.585 38.198,16.224 45.714,-3.879 8.357,-22.351 8.119,-45.142 8.119,-45.142 L -18.351,-44.068 C -2.11,-15.011 5.105,12.089 5.105,37.21 c 0,74.466 -60.367,134.833 -134.833,134.833 -40.462,0 -76.734,-17.847 -101.449,-46.07 -24.714,28.223 -60.986,46.07 -101.448,46.07 -74.467,0 -134.833,-60.367 -134.833,-134.833 0,-8.58 0.842,-17.391 2.597,-26.432"
                                                style="fill:none;stroke:#000000;stroke-width:30;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" />
                                            <path transform="matrix(1,0,0,1,228.627,-393.5166)"
                                                d="m 0,0 17.462,-34.924 c 5.387,-10.772 15.142,-18.712 26.785,-21.798 l 104.15,-27.602 c 26.627,-7.058 52.718,13.018 52.718,40.565 v 92.564 l 60.157,21.523 -52.458,115.903 20.987,32.66 C 218.654,310.637 127.586,389.448 25.943,388.52 c -116.016,-0.024 -209.371,-93.399 -209.37,-209.416 0,-61.115 26.179,-116.115 67.936,-154.398 18.278,-16.759 26.614,-41.77 22.456,-66.219 l -19.048,-111.982 H 93.688 l 8.997,82.95"
                                                style="fill:none;stroke:#000000;stroke-width:30;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" />
                                        </g>
                                    </mask>
                                    <g mask="url(#custom)">
                                        <g id="g2130" transform="matrix(1.3333333,0,0,-1.3333333,0,682.66667)">
                                            <g>
                                                <g clip-path="url(#clipPath2138)">
                                                    <g transform="translate(228.627,670.4834)">
                                                        <path
                                                            d="m 0,0 17.462,-34.924 c 5.387,-10.773 15.142,-18.712 26.785,-21.798 l 104.15,-27.603 c 26.627,-7.057 52.718,13.02 52.718,40.566 v 92.564 l 60.157,21.523 -52.458,115.904 20.987,32.659 C 218.654,310.637 127.586,389.448 25.943,388.52 c -116.016,-0.024 -209.371,-93.399 -209.37,-209.416 0,-61.115 26.179,-116.115 67.936,-154.398 18.278,-16.759 26.614,-41.77 22.456,-66.218 l -19.048,-111.983 H 93.688 l 8.997,82.951"
                                                            style="fill:none;stroke:#ffffff;stroke-width:30;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"
                                                            id="path2142" />
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="g2144">
                                                <g id="g2146" clip-path="url(#clipPath2150)">
                                                    <g id="g2152" transform="translate(402.4873,196.0645)">
                                                        <path
                                                            d="M 0,0 2.292,2.388 2.675,2.157 Z m 90.548,120.45 v 0 c -1.886,1.846 -3.834,3.64 -5.859,5.362 l -0.01,0.011 c 3.461,12.844 5.116,25.249 5.116,37.199 0,74.466 -60.367,134.833 -134.833,134.833 -40.463,0 -76.734,-17.847 -101.449,-46.07 -24.714,28.223 -60.987,46.07 -101.449,46.07 -74.466,0 -134.833,-60.367 -134.833,-134.833 0,-8.58 0.842,-17.391 2.597,-26.432 -23.432,-17.704 -37.43,-46.737 -37.314,-75.478 0,-42.075 22.939,-80.802 59.839,-101.02 l 134.259,-73.565 c 9.512,-17.545 23.695,-32.114 40.979,-42.093 l 32.628,-18.837 c 11.744,-6.781 26.705,-3.684 34.793,7.2 l 30.401,40.916 c 9.525,12.818 5.746,31.076 -8.084,39.06 l -6.279,3.626 1.94,1.59 34.982,28.645 c 16.157,12.297 30.852,24.351 44.158,36.159 l 6.32,5.176 4.154,4.327 c 3.52,3.27 6.938,6.523 10.246,9.755 l 28.372,-17.126 c 40.922,-24.862 93.291,-5.62 93.291,54.73 0,30.511 -12.326,59.6 -33.965,80.795"
                                                            style="fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                            id="path2154" />
                                                    </g>
                                                    <g id="g2156" transform="translate(406.832,199.5674)">
                                                        <path
                                                            d="M 0,0 C -27.567,-27.146 -62.561,-55.655 -106.049,-85.514"
                                                            style="fill:none;stroke:#ffffff;stroke-width:30;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"
                                                            id="path2158" />
                                                    </g>
                                                    <g id="g2160" transform="translate(87.7617,241.1289)">
                                                        <path
                                                            d="m 0,0 135.382,-82.25 c 0,0 19.619,11.6 43.154,15.539 21.166,3.543 36.946,-19.065 26.216,-37.651 l -7.768,-13.454 25.071,-14.475 c 13.831,-7.985 17.609,-26.242 8.084,-39.061 l -30.402,-40.915 c -8.088,-10.885 -23.049,-13.982 -34.793,-7.201 l -32.628,18.838 c -17.284,9.979 -31.466,24.547 -40.978,42.092 l -134.26,73.565 c -36.899,20.218 -59.839,58.946 -59.839,101.02 -0.115,28.744 13.885,57.779 37.321,75.483 C -57.298,54.059 -33.258,20.046 0,0 Z"
                                                            style="fill:none;stroke:#ffffff;stroke-width:30;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"
                                                            id="path2162" />
                                                    </g>
                                                    <g id="g2164" transform="translate(487.1768,321.8765)">
                                                        <path
                                                            d="m 0,0 v 0 c 25.265,-21.491 39.823,-52.988 39.823,-86.157 0,-60.35 -52.369,-79.592 -93.291,-54.73 l -193.418,116.751 c -19.95,-0.536 -39.659,4.463 -56.942,14.441 l -32.628,18.838 c -11.744,6.78 -16.543,21.285 -11.16,33.732 l 20.232,46.787 c 6.339,14.658 24.039,20.514 37.869,12.529 l 25.072,-14.475 7.768,13.455 c 10.731,18.585 38.198,16.224 45.714,-3.879 8.357,-22.351 8.119,-45.142 8.119,-45.142 L -18.351,-44.068 C -2.11,-15.011 5.105,12.089 5.105,37.21 c 0,74.466 -60.367,134.833 -134.833,134.833 -40.462,0 -76.734,-17.847 -101.449,-46.07 -24.714,28.223 -60.986,46.07 -101.448,46.07 -74.467,0 -134.833,-60.367 -134.833,-134.833 0,-8.58 0.842,-17.391 2.597,-26.432"
                                                            style="fill:none;stroke:#ffffff;stroke-width:30;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"
                                                            id="path2166" />
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="g2168">
                                                <g id="g2170" clip-path="url(#clipPath2174)">
                                                    <g id="g2176" transform="translate(228.627,-393.5166)">
                                                        <path
                                                            d="m 0,0 17.462,-34.924 c 5.387,-10.772 15.142,-18.712 26.785,-21.798 l 104.15,-27.602 c 26.627,-7.058 52.718,13.018 52.718,40.565 v 92.564 l 60.157,21.523 -52.458,115.903 20.987,32.66 C 218.654,310.637 127.586,389.448 25.943,388.52 c -116.016,-0.024 -209.371,-93.399 -209.37,-209.416 0,-61.115 26.179,-116.115 67.936,-154.398 18.278,-16.759 26.614,-41.77 22.456,-66.219 l -19.048,-111.982 H 93.688 l 8.997,82.95"
                                                            style="fill:none;stroke:#ffffff;stroke-width:30;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1"
                                                            id="path2178" />
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>

                            </i>
                        </button>
                    </li>
                    <li class="nav-item tab-style" role="presentation">
                        <button class="nav-link tab-ballon" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Birthday Theme
                            <i>
                                <svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512"
                                    width="512" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd"
                                        d="m468.074 371.602v113.258h-424.148v-113.258c0-4.817 1.958-9.184 5.11-12.336l.03-.03c3.152-3.152 7.519-5.11 12.335-5.11h389.199c4.816 0 9.183 1.959 12.335 5.11l.03.03c3.151 3.151 5.109 7.519 5.109 12.336zm-343.126-119.723c6.283 5.293 10.186 12.681 10.186 20.881v21.422c0 3.655 1.858 7.048 4.849 9.567 3.342 2.815 8.051 4.563 13.315 4.563 5.267 0 9.975-1.748 13.316-4.563 2.99-2.519 4.849-5.913 4.849-9.568v-21.421c0-8.199 3.904-15.587 10.186-20.881 5.933-4.999 14.022-8.103 22.829-8.103 8.806 0 16.896 3.103 22.832 8.103 6.283 5.293 10.186 12.681 10.186 20.881v21.422c0 3.655 1.858 7.048 4.849 9.567 3.341 2.815 8.049 4.563 13.312 4.563 5.268 0 9.977-1.748 13.318-4.563 2.989-2.52 4.849-5.912 4.849-9.567v-21.422c0-8.199 3.903-15.587 10.185-20.881 5.933-4.999 14.023-8.103 22.829-8.103 8.808 0 16.896 3.103 22.831 8.103 6.284 5.293 10.185 12.681 10.185 20.881v21.422c0 3.655 1.858 7.048 4.849 9.567 3.342 2.815 8.051 4.563 13.316 4.563s9.975-1.748 13.316-4.563c2.99-2.52 4.849-5.912 4.849-9.567v-21.422c0-8.197 3.902-15.588 10.186-20.881 5.933-4.999 14.02-8.103 22.829-8.103 5.153 0 10.06 1.062 14.433 2.945-1.391-2.42-3.095-4.641-5.056-6.602-5.667-5.665-13.476-9.182-22.057-9.182h-281.039c-8.581 0-16.39 3.517-22.056 9.182-1.882 1.881-3.525 4.001-4.883 6.304 4.103-1.694 8.697-2.646 13.577-2.646 8.808-.001 16.897 3.103 22.83 8.102zm302.809 20.881h-.392c0-3.656-1.858-7.049-4.849-9.567-3.342-2.815-8.051-4.563-13.316-4.563-5.266 0-9.974 1.749-13.315 4.563-2.991 2.518-4.849 5.913-4.849 9.567v21.422c0 8.199-3.903 15.586-10.186 20.88-5.933 4.999-14.023 8.103-22.829 8.103-8.808 0-16.897-3.103-22.833-8.103-6.283-5.294-10.186-12.681-10.186-20.88v-21.422c0-3.656-1.857-7.049-4.847-9.567-3.342-2.815-8.05-4.563-13.315-4.563s-9.975 1.749-13.316 4.563c-2.991 2.519-4.849 5.913-4.849 9.567v21.422c0 8.199-3.903 15.586-10.186 20.88-5.933 4.999-14.022 8.103-22.83 8.103-8.81 0-16.898-3.103-22.831-8.103-6.284-5.294-10.186-12.681-10.186-20.88v-21.422c0-3.656-1.857-7.049-4.849-9.567-3.342-2.815-8.051-4.563-13.315-4.563-5.266 0-9.974 1.749-13.316 4.563-2.99 2.519-4.849 5.913-4.849 9.567v21.422c0 8.2-3.901 15.587-10.186 20.881-5.933 4.999-14.022 8.102-22.83 8.102-8.806 0-16.896-3.103-22.831-8.103-6.284-5.294-10.186-12.681-10.186-20.88v-21.422c0-3.656-1.857-7.049-4.848-9.567-3.341-2.815-8.05-4.563-13.315-4.563-5.112 0-9.581 1.719-12.747 4.477-2.946 2.567-4.737 6.048-4.737 9.795h-.391v66.373h343.515zm-247.278-132.122c0-3.204-1.299-6.105-3.388-8.194l-.03-.03c-2.088-2.088-4.99-3.387-8.194-3.387h-6.289c-3.92 0-7.49 1.609-10.083 4.201-2.592 2.592-4.201 6.162-4.201 10.082v72.773h32.184v-75.445zm75.521-55.036.421-.476c9.13-10.434 13.659-20.377 13.591-29.825-.069-9.291-4.681-18.62-13.833-27.98l-.179-.181-.178.182c-9.152 9.361-13.765 18.689-13.833 27.98-.069 9.447 4.461 19.39 13.59 29.825zm91.614.001.422-.477c9.129-10.434 13.66-20.377 13.59-29.825-.069-9.291-4.681-18.62-13.833-27.98l-.178-.182-.181.184c-9.151 9.359-13.762 18.687-13.831 27.978-.07 9.446 4.46 19.387 13.588 29.823zm-183.227 0 .424-.479c9.128-10.435 13.658-20.376 13.588-29.823-.069-9.291-4.679-18.62-13.831-27.978l-.181-.184-.181.184c-9.152 9.359-13.763 18.687-13.831 27.978-.07 9.446 4.46 19.387 13.588 29.823zm107.705 55.035c0-3.198-1.303-6.104-3.401-8.209-2.105-2.098-5.011-3.401-8.209-3.401h-6.288c-3.92 0-7.491 1.609-10.084 4.201l-.014-.014c-2.585 2.589-4.187 6.165-4.187 10.096v72.773h32.184v-75.446zm91.613 0c0-3.198-1.303-6.104-3.401-8.209-2.105-2.098-5.011-3.401-8.209-3.401h-6.288c-3.931 0-7.505 1.604-10.096 4.188l.015.014c-2.592 2.592-4.204 6.163-4.204 10.082v72.773h32.184v-75.447z"
                                        fill-rule="evenodd" />
                                </svg>
                            </i>
                        </button>
                    </li>
                    <li class="nav-item tab-style" role="presentation">
                        <button class="nav-link tab-ballon" id="messages-tab" data-bs-toggle="tab"
                            data-bs-target="#messages" type="button" role="tab" aria-controls="messages"
                            aria-selected="false">Gender Reveal<i>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" width="512" height="512">
                                    <g id="Icons">
                                        <path d="M42.04,23.47c.02-.13.04-.25.05-.38.04-.55.05-1.09.05-1.63Z" />
                                        <path
                                            d="M42.32,5.78a1.978,1.978,0,0,1,.02,2.82,2,2,0,0,1-2.84,0c-.33-.331-.4-.45-.67-.45s-.156-.054-2.31,2.1a17.961,17.961,0,0,1-10.49,28.4,12.666,12.666,0,0,1,.53-4.32,14.031,14.031,0,1,0-8.55.18,19.829,19.829,0,0,0-.29,4.05A17.987,17.987,0,1,1,33.78,7.38L35.67,5.5a.5.5,0,0,0,0-.71l-.34-.34a1.979,1.979,0,0,1-.01-2.81,2.039,2.039,0,0,1,2.84-.01c.351.362.427.481.68.5.295,0,.374-.154.77-.55A1.989,1.989,0,0,1,43,2.94a1.923,1.923,0,0,1-.56,1.41l-.45.45a.518.518,0,0,0,.05.71Z" />
                                        <path
                                            d="M51.53,49.78a18.306,18.306,0,0,1-25.31,1.93l-3.34,3.31h1.14a1.985,1.985,0,0,1,1.39,3.41,1.882,1.882,0,0,1-1.39.57H19.01A3,3,0,0,1,16,56.01V51.02a2.01,2.01,0,0,1,3.45-1.38,1.948,1.948,0,0,1,.56,1.38v1.21l3.43-3.38a17.942,17.942,0,0,1,10.53-28.5,12.167,12.167,0,0,1-.52,4.33A13.885,13.885,0,0,0,24.03,38.5C24.416,50.659,39.3,56.543,47.91,47.87a14.082,14.082,0,0,0-6.01-23.4,16.482,16.482,0,0,0,.23-4.04A17.954,17.954,0,0,1,51.53,49.78Z" />
                                    </g>
                                </svg>
                            </i></button>
                    </li>
                    <li class="nav-item tab-style" role="presentation">
                        <button class="nav-link tab-ballon" id="settings-tab" data-bs-toggle="tab"
                            data-bs-target="#settings" type="button" role="tab" aria-controls="settings"
                            aria-selected="false">Bubble Theme<i>
                                <svg height="512" viewBox="0 0 48 48" width="512" xmlns="http://www.w3.org/2000/svg">
                                    <g id="Bubbles">
                                        <path
                                            d="m13 24a11 11 0 1 0 11 11 11 11 0 0 0 -11-11zm8.93 12.12a9 9 0 0 1 -8.93 7.88 1 1 0 0 1 0-2 7 7 0 0 0 7-6.12 1 1 0 0 1 1.93.24z" />
                                        <path
                                            d="m39 18a7 7 0 1 0 7 7 7 7 0 0 0 -7-7zm5 8a1 1 0 0 1 -1-1 4 4 0 0 0 -4-4 1 1 0 0 1 0-2c5.49 0 7.42 7 5 7z" />
                                        <path
                                            d="m24 2a5 5 0 1 0 5 5 5 5 0 0 0 -5-5zm0 3a2 2 0 0 0 -2 2 1 1 0 0 1 -1 1c-2.09 0-.82-5 3-5a1 1 0 0 1 0 2z" />
                                        <circle cx="8" cy="13" r="3" />
                                    </g>
                                </svg>
                            </i></button>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="theme-img">
                                    <img alt="theme-img" src="https://placehold.co/440x466">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="theme-text party-balloons">
                                    <h6>Ready Time <span>– 2 to 2.5 Hours</span></h6>
                                    <h3>love surprise completely elegant theme</h3>
                                    <ul>
                                        <li><img alt="chak" src="assets/img/chak.png">50 Ballons on Ceiling</li>
                                        <li><img alt="chak" src="assets/img/chak.png">50 Ballons on Floor and Wall</li>
                                        <li><img alt="chak" src="assets/img/chak.png">Ravelling Expenses</li>
                                    </ul>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <span>Starting From:</span>
                                            <h3>RM82.61</h3>
                                        </div>
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <h6>(12)</h6>
                                        </div>
                                    </div>
                                    <a href="#" class="btn"><span>Book Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="theme-img">
                                    <img alt="theme-img" src="https://placehold.co/440x466">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="theme-text party-balloons">
                                    <h6>Ready Time <span>– 2 to 2.5 Hours</span></h6>
                                    <h3>Birthday surprise completely elegant theme</h3>
                                    <ul>
                                        <li><img alt="chak" src="assets/img/chak.png">50 Ballons on Ceiling</li>
                                        <li><img alt="chak" src="assets/img/chak.png">50 Ballons on Floor and Wall</li>
                                        <li><img alt="chak" src="assets/img/chak.png">Ravelling Expenses</li>
                                    </ul>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <span>Starting From:</span>
                                            <h3>RM82.61</h3>
                                        </div>
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <h6>(12)</h6>
                                        </div>
                                    </div>
                                    <a href="#" class="btn"><span>Book Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="theme-img">
                                    <img alt="theme-img" src="https://placehold.co/440x466">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="theme-text party-balloons">
                                    <h6>Ready Time <span>– 2 to 2.5 Hours</span></h6>
                                    <h3>Gender surprise completely elegant theme</h3>
                                    <ul>
                                        <li><img alt="chak" src="assets/img/chak.png">50 Ballons on Ceiling</li>
                                        <li><img alt="chak" src="assets/img/chak.png">50 Ballons on Floor and Wall</li>
                                        <li><img alt="chak" src="assets/img/chak.png">Ravelling Expenses</li>
                                    </ul>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <span>Starting From:</span>
                                            <h3>RM122.61</h3>
                                        </div>
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <h6>(12)</h6>
                                        </div>
                                    </div>
                                    <a href="#" class="btn"><span>Book Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="theme-img">
                                    <img alt="theme-img" src="https://placehold.co/440x466">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="theme-text party-balloons">
                                    <h6>Ready Time <span>– 2 to 2.5 Hours</span></h6>
                                    <h3>Bubble surprise completely elegant theme</h3>
                                    <ul>
                                        <li><img alt="chak" src="assets/img/chak.png">50 Ballons on Ceiling</li>
                                        <li><img alt="chak" src="assets/img/chak.png">50 Ballons on Floor and Wall</li>
                                        <li><img alt="chak" src="assets/img/chak.png">Ravelling Expenses</li>
                                    </ul>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <span>Starting From:</span>
                                            <h3>RM152.61</h3>
                                        </div>
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <h6>(12)</h6>
                                        </div>
                                    </div>
                                    <a href="#" class="btn"><span>Book Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section>
    <div class="container">
        <div class="heading">
            <h2>Happy Customer Feedback</h2>
            <p>whats trending at bargain balloons themes</p>
        </div>
        <div class="row feedback-slider owl-carousel owl-theme">
            <div class="col-lg-12 item">
                <div class="customer-feedback">
                    <i><img class="quote" alt="quote" src="assets/img/quote.png"></i>
                    <p>A huge Thanks Only team to select me for review of product. Its really mean lots to send me
                        products and i like to suggest all to buy them.</p>
                    <h4>James Parkar</h4>
                    <span>September 11, 2023</span>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 item">
                <div class="customer-feedback">
                    <i><img class="quote" alt="quote" src="assets/img/quote.png"></i>
                    <p>A huge Thanks Only team to select me for review of product. Its really mean lots to send me
                        products and i like to suggest all to buy them.</p>
                    <h4>Thomas Willimes</h4>
                    <span>September 11, 2023</span>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 item">
                <div class="customer-feedback">
                    <i><img class="quote" alt="quote" src="assets/img/quote.png"></i>
                    <p>A huge Thanks Only team to select me for review of product. Its really mean lots to send me
                        products and i like to suggest all to buy them.</p>
                    <h4>James Parkar</h4>
                    <span>September 11, 2023</span>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 item">
                <div class="customer-feedback">
                    <i><img class="quote" alt="quote" src="assets/img/quote.png"></i>
                    <p>A huge Thanks Only team to select me for review of product. Its really mean lots to send me
                        products and i like to suggest all to buy them.</p>
                    <h4>Nomina Morloo</h4>
                    <span>September 11, 2023</span>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<?php
get_footer();
?>