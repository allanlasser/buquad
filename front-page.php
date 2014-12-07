<?php
/*
Template Name: Homepage
*/
get_header();
?>
<div class="homepage">
<?php
$paged = (get_query_var('page')) ? get_query_var('page') : 1;
$postCounter = 0;
$postMax = 20;
$blogs_query = new WP_Query('cat=-3822&posts_per_page='.$postMax.'&paged='.$paged);
$features_query = new WP_Query('orderby=date&order=desc&cat=3822&posts_per_page=1');
if ($features_query->have_posts()) :
    while($features_query->have_posts()) :
        $features_query->the_post();

        $post_author = get_the_author();
        $post_author_name = get_the_author_meta('display_name', $post_author);
        $post_author_url = get_author_posts_url($post_author);
        $post_image = get_the_post_thumbnail(get_the_id(), 'large');
?>
    <div class="featured-article container">
        <div class="featured-article-image">
            <a href="<?php the_permalink(); ?>"><?php echo $post_image; ?></a>
        </div>
        <div class="featured-article-description">
            <dfn>Feature Story</dfn>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <h3>by <a href="<?php echo $post_author_url; ?>"><?php echo $post_author_name; ?></a></h3>
            <p><?php the_excerpt(); ?></p>
        </div>
    </div>
<?php
    endwhile;
endif;
?>
    <div class="card container">
<?php
if ($blogs_query->have_posts()) :
    while ($blogs_query->have_posts()) :
        $blogs_query->the_post();
        article_card(get_the_id());
    endwhile;
endif;
?>
    </div>
</div>

<?php get_footer(); ?>