<?php
/**
 * The template for displaying all single posts and pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SS
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <?php
    // Start the loop.
    while (have_posts()):
      the_post();

      // Include the single post/page content template.
      get_template_part('template-parts/content', 'single');

      // If comments are open or we have at least one comment, load up the comment template.
      if (comments_open() || get_comments_number()):
        comments_template();
      endif;

      $args = array(
        'before' => '<div class="page-links-XXX"><span class="page-link-text">' . __('More pages: ', 'ss') . '</span>',
        'after' => '</div>',
        'link_before' => '<span class="page-link">',
        'link_after' => '</span>',
        'next_or_number' => 'next',
        'separator' => ' | ',
        'nextpagelink' => __('Next', 'ss'),
        'previouspagelink' => __('Previous', 'ss'),
      );

      wp_link_pages($args);

      // End the loop.
    endwhile;
    ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
