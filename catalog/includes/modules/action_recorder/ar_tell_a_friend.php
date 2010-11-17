<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  class ar_tell_a_friend {
    var $code = 'ar_tell_a_friend';
    var $title;
    var $description;
    var $sort_order = 0;
    var $minutes = 15;
    var $identifier;

    function ar_tell_a_friend() {
      $this->title = MODULE_ACTION_RECORDER_TELL_A_FRIEND_TITLE;
      $this->description = MODULE_ACTION_RECORDER_TELL_A_FRIEND_DESCRIPTION;

      if ($this->check()) {
        $this->minutes = (int)MODULE_ACTION_RECORDER_TELL_A_FRIEND_EMAIL_MINUTES;
      }
    }

    function setIdentifier() {
      $this->identifier = tep_get_ip_address();
    }

    function canPerform($user_id, $user_name) {
      $check_query = tep_db_query("select date_added from " . TABLE_ACTION_RECORDER . " where module = '" . tep_db_input($this->code) . "' and (" . (!empty($user_id) ? "user_id = '" . (int)$user_id . "' or " : "") . " identifier = '" . tep_db_input($this->identifier) . "') and date_added >= date_sub(now(), interval " . (int)$this->minutes  . " minute) and success = 1 order by date_added desc limit 1");
      if (tep_db_num_rows($check_query)) {
        return false;
      } else {
        return true;
      }
    }

    function expireEntries() {
      global $db_link;

      tep_db_query("delete from " . TABLE_ACTION_RECORDER . " where module = '" . $this->code . "' and date_added < date_sub(now(), interval " . (int)$this->minutes  . " minute)");

      return mysql_affected_rows($db_link);
    }

    function check() {
      return defined('MODULE_ACTION_RECORDER_TELL_A_FRIEND_EMAIL_MINUTES');
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) VALUES ('Minutes de latence entre 2 envois', 'MODULE_ACTION_RECORDER_TELL_A_FRIEND_EMAIL_MINUTES', '15', 'Durée pendant laquelle l\'envoi d\'un nouveau mail est impossible : ex. 5 pour obliger un délai de 5 minutes entre chaque mail', '6', '0', now())");
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
      return array('MODULE_ACTION_RECORDER_TELL_A_FRIEND_EMAIL_MINUTES');
    }
  }
?>
