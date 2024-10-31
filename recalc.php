<<<<<<< .mine
<?php
/*
Plugin Name: Recalc
Plugin URI: http://jameswdunne.com/recalc/
Description: This plugin offers a simple way to make sure your category/tags counts in the database are in sync. Just press the great big honking button and away you go. If you get stuck, just contact <a href="http://jameswdunne.com">James W. Dunne</a>
Author: James W Dunne
Version: 1.4
Author URI: http://jameswdunne.com/
*/

include 'lib/recalc-ui.php';
include 'lib/recalc-logic.php';

add_action('admin_menu', 'recalc_add_menu');
recalc_add_styles();

/**
 * Adds the Recalc menu item to the tools menu.
 */
function recalc_add_menu() {
  add_management_page(
    'Recalc', 
    'Recalc', 
    'manage_options', 
    'recalc_menu',
    'recalc_menu'
  );
}

/**
 * Displays the recalc page when selected from the menu.
 */
function recalc_menu() {
  if ($_GET['recalcit'] == '1') {
    recalc_do_recalc();
  }

  $results = recalc_find_unsycned();
  
  recalc_show_header();
  
  if (! empty($results)) {
    recalc_get_msg(RECALC_PROBLEM);
    recalc_show_problems($results);
  }
  
  else {
    recalc_get_msg(RECALC_GOOD);
  }
  
  recalc_show_footer();
}
<?php
/*
Plugin Name: Recalc
Plugin URI: http://jameswdunne.com/recalc/
Description: This plugin offers a simple way to make sure your category/tags counts in the database are in sync. Just press the great big honking button and away you go. If you get stuck, just contact <a href="http://jameswdunne.com">James W. Dunne</a>
Author: James W Dunne
Version: 1.4
Author URI: http://jameswdunne.com/
*/

include 'lib/recalc-ui.php';
include 'lib/recalc-logic.php';

add_action('admin_menu', 'recalc_add_menu');
recalc_add_styles();

/**
 * Adds the Recalc menu item to the tools menu.
 */
function recalc_add_menu() {
  add_management_page(
    'Recalc', 
    'Recalc', 
    'manage_options', 
    'recalc_menu',
    'recalc_menu'
  );
}

/**
 * Displays the recalc page when selected from the menu.
 */
function recalc_menu() {
  if ($_GET['recalcit'] == '1') {
    recalc_do_recalc();
  }

  $results = recalc_find_unsycned();
  
  recalc_show_header();
  
  if (! empty($results)) {
    recalc_get_msg(RECALC_PROBLEM);
    recalc_show_problems($results);
  }
  
  else {
    recalc_get_msg(RECALC_GOOD);
  }
  
  recalc_show_footer();
}
=======
<?php
/*
Plugin Name: Recalc
Plugin URI: http://jameswdunne.com/recalc/
Description: This plugin offers a simple way to make sure your category/tags counts in the database are in sync.
Author: James W Dunne
Version: 1.4
Author URI: http://jameswdunne.com/
*/

include 'lib/recalc-ui.php';
include 'lib/recalc-logic.php';

add_action('admin_menu', 'recalc_add_menu');
recalc_add_styles();

/**
 * Adds the Recalc menu item to the tools menu.
 */
function recalc_add_menu() {
  add_management_page(
    'Recalc', 
    'Recalc', 
    'manage_options', 
    'recalc_menu',
    'recalc_menu'
  );
}

/**
 * Displays the recalc page when selected from the menu.
 */
function recalc_menu() {
  if ($_GET['recalcit'] == '1') {
    recalc_do_recalc();
  }

  $results = recalc_find_unsycned();
  
  recalc_show_header();
  
  if (! empty($results)) {
    recalc_get_msg(RECALC_PROBLEM);
    recalc_show_problems($results);
  }
  
  else {
    recalc_get_msg(RECALC_GOOD);
  }
  
  recalc_show_footer();
}
>>>>>>> .r401198
