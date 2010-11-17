<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  class bm_information {
    var $code = 'bm_information';
    var $group = 'boxes';
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function bm_information() {
      $this->title = MODULE_BOXES_INFORMATION_TITLE;
      $this->description = MODULE_BOXES_INFORMATION_DESCRIPTION;

      if ( defined('MODULE_BOXES_INFORMATION_STATUS') ) {
        $this->sort_order = MODULE_BOXES_INFORMATION_SORT_ORDER;
        $this->enabled = (MODULE_BOXES_INFORMATION_STATUS == 'True');

        $this->group = ((MODULE_BOXES_INFORMATION_CONTENT_PLACEMENT == 'Left Column') ? 'boxes_column_left' : 'boxes_column_right');
      }
    }

    function execute() {
      global $oscTemplate;

      $data = '<div class="ui-widget infoBoxContainer">' .
              '  <div class="ui-widget-header infoBoxHeading">' . MODULE_BOXES_INFORMATION_BOX_TITLE . '</div>' .
              '  <div class="ui-widget-content infoBoxContents">' .
              '    <a href="' . tep_href_link(FILENAME_SHIPPING) . '">' . MODULE_BOXES_INFORMATION_BOX_SHIPPING . '</a><br />' .
              '    <a href="' . tep_href_link(FILENAME_PRIVACY) . '">' . MODULE_BOXES_INFORMATION_BOX_PRIVACY . '</a><br />' .
              '    <a href="' . tep_href_link(FILENAME_CONDITIONS) . '">' . MODULE_BOXES_INFORMATION_BOX_CONDITIONS . '</a><br />' .
              '    <a href="' . tep_href_link(FILENAME_CONTACT_US) . '">' . MODULE_BOXES_INFORMATION_BOX_CONTACT . '</a>' .
              '  </div>' .
              '</div>';

      $oscTemplate->addBlock($data, $this->group);
    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_BOXES_INFORMATION_STATUS');
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Afficher le bloc Informations', 'MODULE_BOXES_INFORMATION_STATUS', 'True', 'Voulez-vous afficher ce module dans le site?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Position du bloc', 'MODULE_BOXES_INFORMATION_CONTENT_PLACEMENT', 'Left Column', 'Le module doit-il être placé en colonne de droite ou de gauche?', '6', '1', 'tep_cfg_select_option(array(\'Left Column\', \'Right Column\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Ordre d\'affichage.', 'MODULE_BOXES_INFORMATION_SORT_ORDER', '0', 'Ordre d\'affichage dans la page. Le plus petit en premier. ', '6', '0', now())");
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_BOXES_INFORMATION_STATUS', 'MODULE_BOXES_INFORMATION_CONTENT_PLACEMENT', 'MODULE_BOXES_INFORMATION_SORT_ORDER');
    }
  }
?>
