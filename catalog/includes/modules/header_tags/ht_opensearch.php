<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  class ht_opensearch {
    var $code = 'ht_opensearch';
    var $group = 'header_tags';
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function ht_opensearch() {
      $this->title = MODULE_HEADER_TAGS_OPENSEARCH_TITLE;
      $this->description = MODULE_HEADER_TAGS_OPENSEARCH_DESCRIPTION;

      if ( defined('MODULE_HEADER_TAGS_OPENSEARCH_STATUS') ) {
        $this->sort_order = MODULE_HEADER_TAGS_OPENSEARCH_SORT_ORDER;
        $this->enabled = (MODULE_HEADER_TAGS_OPENSEARCH_STATUS == 'True');
      }
    }

    function execute() {
      global $oscTemplate;

      $oscTemplate->addBlock('<link rel="search" type="application/opensearchdescription+xml" href="' . tep_href_link('opensearch.php', '', 'NONSSL', false) . '" title="' . tep_output_string(STORE_NAME) . '" />', $this->group);
    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_HEADER_TAGS_OPENSEARCH_STATUS');
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Activer le module OpenSearch', 'MODULE_HEADER_TAGS_OPENSEARCH_STATUS', 'True', 'Ajouter un module de recherche sur votre site au navigateur?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Nom court', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_SHORT_NAME', '" . tep_db_input(STORE_NAME) . "', 'Nom court pour désigner le moteur de recherche.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Description', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_DESCRIPTION', 'Search " . tep_db_input(STORE_NAME) . "', 'Description du moteur de recherche.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Contact', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_CONTACT', '" . tep_db_input(STORE_OWNER_EMAIL_ADDRESS) . "', 'Adresse mail de maintenance du moteur de recherche. (optionnel)', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Tags', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_TAGS', '', 'Mots clés pour sérier et définir le contenu de recherche, séparés par un espace. (optionnel)', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Attribution', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_ATTRIBUTION', 'Copyright (c) " . tep_db_input(STORE_NAME) . "', 'A qui est attribué le copyright du moteur de recherche. (optionnel)', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Site pour adulte', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_ADULT_CONTENT', 'False', 'Le moteur de recherche est associé à un contenu pour adultes.', '6', '0', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Icone 16x16', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_ICON', '" . HTTP_CATALOG_SERVER . DIR_WS_CATALOG . "favicon.ico', 'Une icone en 16x16 (doit être au format .ico, ex. http://server/favicon.ico). (Optionnel)', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Image 64x64', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_IMAGE', '', 'Une image en 64x64 (doit être au format .png, ex. http://server/images/logo.png). (Optionnel)', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Ordre d\'affichage.', 'MODULE_HEADER_TAGS_OPENSEARCH_SORT_ORDER', '0', 'Ordre d\'affichage dans la page. Le plus petit en premier. ', '6', '0', now())");
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_HEADER_TAGS_OPENSEARCH_STATUS', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_SHORT_NAME', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_DESCRIPTION', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_CONTACT', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_TAGS', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_ATTRIBUTION', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_ADULT_CONTENT', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_ICON', 'MODULE_HEADER_TAGS_OPENSEARCH_SITE_IMAGE', 'MODULE_HEADER_TAGS_OPENSEARCH_SORT_ORDER');
    }
  }
?>
