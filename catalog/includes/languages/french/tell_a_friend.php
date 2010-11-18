<?php
/*
  $Id: tell_a_friend.php $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Faire connaître à un contact');

define('HEADING_TITLE', 'Faire connaître à un contact le produit \'%s\'');

define('FORM_TITLE_CUSTOMER_DETAILS', 'Vous');
define('FORM_TITLE_FRIEND_DETAILS', 'Votre contact');
define('FORM_TITLE_FRIEND_MESSAGE', 'Votre message');

define('FORM_FIELD_CUSTOMER_NAME', 'Votre nom :');
define('FORM_FIELD_CUSTOMER_EMAIL', 'Votre adresse électronique :');
define('FORM_FIELD_FRIEND_NAME', 'Le nom de votre contact :');
define('FORM_FIELD_FRIEND_EMAIL', 'L\adresse électronqiue de votre ami(e) :');

define('TEXT_EMAIL_SUCCESSFUL_SENT', 'Votre courrier électronique à propos de <strong>%s</strong> a été envoyé à <strong>%s</strong>.');

define('TEXT_EMAIL_SUBJECT', 'Votre ami %s vous recommande la visite du site %s');
define('TEXT_EMAIL_INTRO', 'Hé %s !' . "\n\n" . 'Votre ami(e), %s, a pensé que vous seriez intéressés par %s de %s.');
define('TEXT_EMAIL_LINK', 'Pour voir le produit cliquez sur le lien ci-dessous ou copiez et collez le lien dans votre navigateur Internet :' . "\n\n" . '%s');
define('TEXT_EMAIL_SIGNATURE', 'Cordialement,' . "\n\n" . '%s');

define('ERROR_TO_NAME', 'Erreur : Le nom de votre contact ne doit pas être vide.');
define('ERROR_TO_ADDRESS', 'Erreur : L\'adresse électronique de votre contact doit être une adresse électronique valide.');
define('ERROR_FROM_NAME', 'Erreur : Votre nom ne doit pas être vide.');
define('ERROR_FROM_ADDRESS', 'Erreur : Votre adresse électronique doit être une adresse électronique valide.');
define('ERROR_ACTION_RECORDER', 'Erreur: Un e-mail a déjà été envoyé. Veuillez ré-essayer dans %s minutes.');
?>
