<?php

// Utilities functions here

if (!function_exists('SS_posted_on')) {
  /**
   * Prints HTML with meta information for the current post-date.
   */
  function SS_posted_on()
  {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
    $time_string = sprintf($time_string, esc_attr(get_the_date(DATE_W3C)), esc_html(get_the_date()));

    $posted_on = sprintf(
      esc_html_x('Posted on %s', 'post date', 'ss'),
      '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
  }
}

if (!function_exists('SS_posted_by')) {
  /**
   * Prints HTML with meta information for the current post-author.
   */
  function SS_posted_by()
  {
    $byline = sprintf(
      esc_html_x('by %s', 'post author', 'ss'),
      '<span class="author vcard"><a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );

    echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
  }
}

if (!function_exists('SS_entry_footer')) {
  /**
   * Prints HTML with meta information for the categories, tags, and comments.
   */
  function SS_entry_footer()
  {
    // Hide category and tag text for pages.
    if ('post' === get_post_type()) {
      /* translators: Used between list items, there is a space after the comma. */
      $categories_list = get_the_category_list(esc_html__(', ', 'ss'));
      if ($categories_list) {
        /* translators: 1: list of categories. */
        printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'ss') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
      }

      /* translators: Used between list items, there is a space after the comma. */
      $tags_list = get_the_tag_list('', esc_html__(', ', 'ss'));
      if ($tags_list) {
        /* translators: 1: list of tags. */
        printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'ss') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
      }
    }

    edit_post_link(
      sprintf(
        /* translators: %s: Name of current post. Only visible to screen readers. */
        esc_html__('Edit %s', 'ss'),
        the_title('<span class="screen-reader-text">"', '"</span>', false)
      ),
      '<span class="edit-link">',
      '</span>'
    );
  }
}
