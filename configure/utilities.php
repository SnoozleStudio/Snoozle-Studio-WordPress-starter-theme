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




function ss_customizer_settings($wp_customize)
{
  // Add a new section
  $wp_customize->add_section(
    'ss_brand_section',
    array(
      'title' => __('Brand Section', 'ss'),
      'priority' => 30, // Adjust priority as needed
    )
  );

  // Image setting
  $wp_customize->add_setting(
    'ss_brand_image_setting',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw', // Sanitize callback for the image URL
    )
  );

  // Image control
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'ss_brand_image_control',
      array(
        'label' => __('Custom Image', 'ss'),
        'section' => 'ss_brand_section', // Specify the section where you want to add the control
        'settings' => 'ss_brand_image_setting',
      )
    )
  );

  // Alt text setting
  $wp_customize->add_setting(
    'ss_brand_alt_text_setting',
    array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field', // Sanitize callback for the alt text
    )
  );

  // Alt text control
  $wp_customize->add_control(
    'ss_brand_alt_text_control',
    array(
      'label' => __('Custom Alt Text', 'ss'),
      'section' => 'ss_brand_section', // Specify the section where you want to add the control
      'type' => 'text',
      'settings' => 'ss_brand_alt_text_setting',
    )
  );



  // Add a new section
  $wp_customize->add_section(
    'ss_contacts_section',
    array(
      'title' => __('Contacts Section', 'ss'),
      'priority' => 40, // Adjust priority as needed
    )
  );

  // Image setting
  $wp_customize->add_setting(
    'ss_contacts_image_setting',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw', // Sanitize callback for the image URL
    )
  );

  // Image control
  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'ss_contacts_image_control',
      array(
        'label' => __('Contacts Image', 'ss'),
        'section' => 'ss_contacts_section', // Specify the section where you want to add the control
        'settings' => 'ss_contacts_image_setting',
      )
    )
  );


  // Contacts image alt text setting
  $wp_customize->add_setting(
    'ss_contacts_image_alt_text_setting',
    array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field', // Sanitize callback for the alt text
    )
  );

  // Alt text control
  $wp_customize->add_control(
    'ss_contacts_image_alt_text_control',
    array(
      'label' => __('Contacts image Alt Text', 'ss'),
      'section' => 'ss_contacts_section', // Specify the section where you want to add the control
      'type' => 'text',
      'settings' => 'ss_contacts_image_alt_text_setting',
    )
  );


  // Address setting
  $wp_customize->add_setting(
    'ss_contacts_address_setting',
    array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field', // Sanitize callback for the alt text
    )
  );

  // Address control
  $wp_customize->add_control(
    'ss_contacts_address_control',
    array(
      'label' => __('Address', 'ss'),
      'section' => 'ss_contacts_section', // Specify the section where you want to add the control
      'type' => 'text',
      'settings' => 'ss_contacts_address_setting',
    )
  );
}

add_action('customize_register', 'ss_customizer_settings');



/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function ss_search_form($form)
{
  $form = '<form role="search" method="get" id="searchform" class="searchform d-flex me-3" action="' . home_url('/') . '" >
	<input type="search" class="form-control me-2 text-bg-light" value="' . get_search_query() . '" name="s" id="s"	placeholder="' . esc_attr_x('Search', 'placeholder', 'ss') . '" />
	<button type="submit" class="btn btn-outline-secondary" id="searchsubmit">' . esc_html_x('Search', 'submit button', 'ss') . '</button>
	</form>';

  return $form;
}
add_filter('get_search_form', 'ss_search_form');