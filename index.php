<?php
get_header();
?>
<style>
    .product-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        list-style: none;
        padding: 0;
    }

    .product-item {
        width: 200px;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 6px;
    }

    .product-item img {
        width: 100%;
        height: auto;
    }
</style>


<?php
$args = [
    'post_type' => 'product',
    'posts_per_page' => 10,
];

$loop = new WP_Query($args);

if ($loop->have_posts()):
    echo '<ul class="product-list">';
    while ($loop->have_posts()):
        $loop->the_post();
        global $product;
        ?>
        <li class="product-item">
            <a href="<?php the_permalink(); ?>">
                <?php echo $product->get_image(); ?>
                <h2><?php the_title(); ?></h2>
                <p><?php echo $product->get_price_html(); ?></p>
            </a>
        </li>
        <?php
    endwhile;
    echo '</ul>';
else:
    echo '<p>No products found</p>';
endif;

// 恢复原始查询
wp_reset_postdata();
?>

<?php the_content() ?>
<?php
get_footer();
