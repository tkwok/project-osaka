<?php
  if (have_rows('modules')):
      while (have_rows('modules')) : the_row();
        //echo get_row_layout();
        switch (get_row_layout()) {
          case 'hero_with_cta':
            get_template_part('components/module', 'hero-with-cta');
            break;
          case 'three_columns_with_title_description_cta':
            get_template_part('components/module', 'three-columns-with-title-description-cta');
            break;
          case 'single_center_column_with_title_description_cta':
            get_template_part('components/module', 'single-center-column-with-title-description-cta');
            break;
          default:
            break;
        }
      endwhile;
    else : _e('Empty content', 'up');
  endif;
?>
