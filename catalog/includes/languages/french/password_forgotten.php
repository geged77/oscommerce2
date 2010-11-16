<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Connexion');
define('NAVBAR_TITLE_2', 'Mot de passe oublié');

define('HEADING_TITLE', 'J\'ai oublié mon mot de passe !');

define('TEXT_MAIN', 'Si vous avez oublié votre mot de passe, entrez votre adresse électronique ci-dessous et nous vous enverrons un courrier électronique contenant votre nouveau mot de passe.');

define('TEXT_NO_EMAIL_ADDRESS_FOUND', 'Erreur : L\'adresse électronique n\'a pas été trouvée dans notre base, veuillez réessayer. ');

define('EMAIL_PASSWORD_REMINDER_SUBJECT', STORE_NAME . ' - Nouveau mot de passe');
define('EMAIL_PASSWORD_REMINDER_BODY', 'Un nouveau mot de passe a été demandé de ' . tep_get_ip_address() . '.' . "\n\n" . 'Votre nouveau mot de passe sur \'' . STORE_NAME . '\' est:' . "\n\n" . '   %s' . "\n\n"."Ne faites pas de copier/coller depuis ce mail mais recopier ce mot de passe manuellement.\nEn faisant un copier/coller, vous risquez d'insérer un caractère de contrôle (fin de ligne, retour chariot, espace...) qui rendra ce mot de passe invalide. Enfin, veillez aux différences entre majuscule et minuscule, aussi bien pour le mot de passe que pour l'adresse mail de connexion." );

define('SUCCESS_PASSWORD_SENT', 'Un nouveau mot de passe a été envoyé à votre adresse électronique.');
?>