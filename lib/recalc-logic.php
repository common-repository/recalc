<?php

function recalc_find_unsycned() {
  global $wpdb;
  
  $wheres = _recalc_get_object_wheres();
  $joins  = _recalc_get_object_joins();
  $results = $wpdb->get_results("
    SELECT wp_terms.name, count, COUNT(object_id) AS real_count FROM `wp_term_taxonomy` AS tax
    LEFT OUTER JOIN wp_term_relationships AS rel ON tax.term_taxonomy_id = rel.term_taxonomy_id
    {$joins}
    JOIN wp_terms ON tax.term_id = wp_terms.term_id
    WHERE {$wheres}
    GROUP BY tax.term_taxonomy_id
    HAVING count != real_count
    LIMIT 0,20
  ");
  
  echo mysql_error();
  
  return $results;
}

function recalc_do_recalc() {
  global $wpdb;
  
  // Every postcount is reset. This makes sure those that should be 0 are set to
  // to 0. Those which aren't will be covered in the next query.
  $wpdb->query("
    UPDATE wp_term_taxonomy AS tax
    SET count = 0
  ");
  
  $wheres = _recalc_get_object_wheres();
  $joins  = _recalc_get_object_joins();
  $wpdb->query("
    UPDATE wp_term_taxonomy AS tax
    SET count = (SELECT COUNT(*) 
                 FROM wp_term_relationships AS rel
                 {$joins}
                 WHERE tax.term_taxonomy_id = rel.term_taxonomy_id
                   AND {$wheres})
  ");
}

/**
 * Since WordPress uses terms for both links and posts, we have to account for
 * both so we simply make sure we have both covered.
 */
function _recalc_get_object_joins() {
  return "LEFT OUTER JOIN wp_posts ON rel.object_id = wp_posts.ID
LEFT OUTER JOIN wp_links ON rel.object_id = wp_links.link_id";
}

function _recalc_get_object_wheres() {
  return "(wp_links.link_visible = 'Y' OR wp_posts.post_status = 'publish')";
}