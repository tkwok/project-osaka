<?php
if ( function_exists('remove_menu_page') ) :
	add_action('admin_menu', function() {
		// removes posts from dashboard
		remove_menu_page('edit.php');
		// removes comments from dashboard
		remove_menu_page('edit-comments.php');
	});
endif;

add_action('init', function() {
  /* options menu of ACF items */
  acf_add_options_page(array(
    'page_title' => 'Social Links',
    'menu_title' => 'Social Links',
    'menu_slug' => 'social_links',
    'capability' => 'edit_posts',
    'icon_url' => 'dashicons-share'
  ));

  acf_add_options_page(array(
    'page_title' 	=> 'Timeline Items',
    'menu_title'	=> 'Timeline Items',
    'menu_slug' 	=> 'timeline_items',
    'capability'	=> 'edit_posts'
  ));

  acf_add_options_page(array(
    'page_title' 	=> 'Skill Items',
    'menu_title'	=> 'Skill Items',
    'menu_slug' 	=> 'skill_items',
    'capability'	=> 'edit_posts'
  ));
});

add_action('acf/init', function() {
	if ( function_exists('acf_add_options_page') ) :

		$parent = acf_add_options_page(array(
			'page_title' => 'Project Osaka Options',
			'menu_title' => 'Project Osaka Options',
			'menu_slug' => 'project-osaka-options',
			'capability' => 'edit_themes',
			'redirect' 	=> true
		));

		acf_add_options_sub_page(array(
	    'page_title' => 'Footer Settings',
	    'menu_title' => 'Footer Settings',
	    'post_id' => 'footer',
	    'parent_slug' => $parent['menu_slug']
	  ));
	endif;
});
?>
