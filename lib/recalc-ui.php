<?php

/**
 * Recalc User Interface functions
 */

define('RECALC_PROBLEM', 1);
define('RECALC_GOOD',    2);

function recalc_get_msg($type) {
  if ($type == RECALC_PROBLEM):
  ?>
    <div id="recalcMessage" class="problems">
      <h2>Crikey!</h1>
      <p>WordPress's terms are out of sync man.</p>
    </div>
  <?php
  elseif ($type == RECALC_GOOD):
  ?>
    <div id="recalcMessage" class="good">
      <h2>Awesome!</h1>
      <p>WordPress's terms are all synced up.</p>
    </div>
  <?php
  endif;
}

function recalc_show_header() {
  ?>
  <div id="recalcContainer">
    <h1>Recalc</h1>
    
    <p>Recalc is a simple tool solves all your problems. Or at least your category/tag postcount problems anyway. This tool does the following things:</p>
    
    <ul>
      <li>Checks for any inconsistencies in your tag/category post counts.</li>
      <li>Reports said inconsistencies to you, if any.</li>
      <li>Gives you a nice big honking button to fix said inconsistencies.</li></li>
    </ul>
  <?php
}

function recalc_show_problems($results) {
 ?>
 <table id="recalc" border="0" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
      <th>Term Name</th>
      <th>Count is:</th>
      <th>Count should be:</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
      $odd = FALSE;
      foreach ($results as $row):
    ?>
    
    <tr class="<?php echo $odd == TRUE ? 'odd' : ''; ?>">
      <td><?php echo strlen($name = $row->name) > 46 ? trim(substr($name, 0, 40)) . '&hellip;' : $name; ?></td>
      <td class="numeric"><?php echo $row->count; ?></td>
      <td class="numeric"><?php echo $row->real_count; ?></td>
    </tr>
    <?php
      $odd = !$odd;
      endforeach;
    ?>
  </tbody>
  </table>
  
  <?php
    if (count($results) >= 20):
  ?>
    <p id="loadsMore">There be loads more cap'n but we don't wanna be sinking this here ship!</p>
  <?php
    endif;
  ?>

  <a href="<?php echo $_SERVER['REQUEST_URI']; ?>&recalcit=1" id="recalcButton">
  </a>
 <?php
}

function recalc_show_footer() {
 ?>
   <span class="copyright">Copyright &copy; 2011 <a href="http://jameswdunne.com">James W. Dunne</a></span>
   </div>
 <?php
}

function recalc_add_styles() {
  $stylesheet = plugins_url('recalc/assets/css/') . 'style.css';
  wp_register_style('recalcStyle', $stylesheet);
  wp_enqueue_style('recalcStyle');
}