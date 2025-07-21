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

<?php the_content() ?>
<?php
get_footer();
