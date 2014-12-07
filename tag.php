<?php get_header(); ?>
<article class="tag">
  <header>
    <h1><?php single_tag_title(); ?></h1>
  </header>
  <?php if ( have_posts() ) { ?>
    <div class="card container">
    <?php while ( have_posts() ) {
        the_post();
        article_card(get_the_id());
      }
    ?>
  </div>
  <?php } else {
          get_404();
        } ?>
</article>
<?php get_footer(); ?>
