<?php
  add_action('init', function() {

    register_post_type('techblog', array(
      'description' => __('Tech blog about different technologies', 'project-osaka'),
      'supports' => array('title', 'editor', 'thumbnail'),
      'rewrite' => array('slug' => 'techblogs'),
      'has_archive' => true,
      'public' => true,
      'taxonomies' => array('techblog-tags'),
      'labels' => array(
        'name' => __('Tech Blogs', 'project-osaka'),
        'add_new_item' => __('Add New Tech Blog', 'project-osaka'),
        'edit_item' => __('Edit Tech Blog', 'project-osaka'),
        'all_items' => __('All Tech Blogs', 'projct-osaka'),
        'singular_name' => __('Tech Blog', 'project-osaka')
      ),
      'menu_icon' => 'dashicons-calendar-alt'
    ));

    register_post_type('case', array(
      'supports' => array('title', 'thumbnail'),
      'rewrite' => array('slug' => 'cases'),
      'has_archive' => true,
      'public' => true,
      'labels' => array(
        'name' => 'Cases',
        'add_new_item' => __('Add Case', 'project-osaka'),
        'edit_item' => __('Edit Case', 'project-osaka'),
        'all_items' => __('All Cases', 'project-osaka'),
        'singular_name' => __('Case', 'project-osaka')
      ),
      'menu_icon' => 'dashicons-clipboard'
    ));

    register_post_type('bio', array(
      'supports' => array('title', 'editor', 'thumbnail'),
      'rewrite' => array('slug' => 'bios'),
      'has_archive' => true,
      'public' => true,
      'labels' => array(
        'name' => 'Bios',
        'add_new_item' => __('Add Bio', 'project-osaka'),
        'edit_item' => __('Edit Bio', 'project-osaka'),
        'all_items' => __('All Bios', 'project-osaka'),
        'singular_name' => __('Bio', 'project-osaka')
      ),
      'menu_icon' => 'dashicons-admin-users'
    ));

    register_post_type('work', array(
      'supports' => array('title', 'thumbnail'),
      'rewrite' => array('slug' => 'works'),
      'has_archive' => true,
      'public' => true,
      'labels' => array(
        'name' => 'Works',
        'add_new_item' => 'Add Work',
        'edit_item' => 'Edit Work',
        'all_items' => 'All Works',
        'singular_name' => 'Work'
      ),
      'menu_icon' => 'dashicons-megaphone'
    ));

    register_taxonomy('techblog-tags', 'techblog', array(
      'hierarchical' => false,
      'label' => 'Tech Blog Tags',
      'singular_name' => __('Tech Blog Tag', 'project-osaka'),
      'rewrite' => true,
      'query_var' => true
    ));
});


?>
