<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/

  $dir_fs_document_root = $HTTP_POST_VARS['DIR_FS_DOCUMENT_ROOT'];
  if ((substr($dir_fs_document_root, -1) != '\\') && (substr($dir_fs_document_root, -1) != '/')) {
    if (strrpos($dir_fs_document_root, '\\') !== false) {
      $dir_fs_document_root .= '\\';
    } else {
      $dir_fs_document_root .= '/';
    }
  }
?>

<div class="mainBlock">
  <div class="stepsBox">
    <ol>
      <li>Serveur de base de données</li>
      <li>Serveur Web</li>
      <li style="font-weight: bold;">Paramètres de la boutique</li>
      <li>Fini!</li>
    </ol>
  </div>

  <h1>Nouvelle installation</h1>

  <p>Le système installera et configurera correctement votre boutique sur le serveur.</p>
  <p>Suivez les instructions à l'écran qui vous sont données pour le serveur de base de données, le serveur Web et les paramètres de la boutique. Si vous avez besoin d'aide, veuillez consulter la documentation, la FAQ ou les espaces spécifiques sur le forum.</p>
</div>

<div class="contentBlock">
  <div class="infoPane">
    <h3>Etape 3: Paramètres de la boutique</h3>

    <div class="infoPaneContents">
<p>Vous pouvez definir ici le nom de votre Boutique et l'Email de contact du propriétaire.</p>
      <p>Egalement, le Nom d'utilisateur et le Mot de passe utilisés pour accéder à l'Administration protégée de votre boutique.</p>
    </div>
  </div>

  <div class="contentPane">
    <h2>Paramètres de la boutique</h2>

    <form name="install" id="installForm" action="install.php?step=4" method="post">

    <table border="0" width="99%" cellspacing="0" cellpadding="5" class="inputForm">
      <tr>
        <td class="inputField"><?php echo 'Nom de la boutique<br />' . osc_draw_input_field('CFG_STORE_NAME', null, 'class="text"'); ?></td>
        <td class="inputDescription">Le nom de la boutique tel qu'il sera présenté au public.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'Nom du propriétaire de la boutique<br />' . osc_draw_input_field('CFG_STORE_OWNER_NAME', null, 'class="text"'); ?></td>
        <td class="inputDescription">Le Nom du propriétaire tel qu'il sera présenté au public.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'E-Mail du propriétaire de la boutique<br />' . osc_draw_input_field('CFG_STORE_OWNER_EMAIL_ADDRESS', null, 'class="text"'); ?></td>
        <td class="inputDescription">Email du propriétaire tel qu'il sera présenté au public.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'Nom d\'utilisateur de l\'administrateur<br />' . osc_draw_input_field('CFG_ADMINISTRATOR_USERNAME', null, 'class="text"'); ?></td>
        <td class="inputDescription">Nom d'utilisateur de l'administrateur de la boutique.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'Mot de passe de l\'administrateur<br />' . osc_draw_input_field('CFG_ADMINISTRATOR_PASSWORD', null, 'class="text"'); ?></td>
        <td class="inputDescription">Le Mot de Passe du compte administrateur.</td>
      </tr>

<?php
  if (osc_is_writable($dir_fs_document_root) && osc_is_writable($dir_fs_document_root . 'admin')) {
?>
      <tr>
        <td class="inputField"><?php echo 'Nom du répertoire d\'administration<br />' . osc_draw_input_field('CFG_ADMIN_DIRECTORY', 'admin', 'class="text"'); ?></td>
        <td class="inputDescription">C'est le répertoire où la section d'administration de la boutique sera installée.<strong> Pour des questions de sécurité vous devez le modifier.</strong></td>
      </tr>
<?php
  }
?>

    </table>

    <p align="right"><input type="image" src="images/button_continue.gif" border="0" alt="Continuer" id="inputButton" />&nbsp;&nbsp;<a href="index.php"><img src="images/button_cancel.gif" border="0" alt="Annuler" /></a></p>

<?php
  reset($HTTP_POST_VARS);
  while (list($key, $value) = each($HTTP_POST_VARS)) {
    if (($key != 'x') && ($key != 'y')) {
      if (is_array($value)) {
        for ($i=0, $n=sizeof($value); $i<$n; $i++) {
          echo osc_draw_hidden_field($key . '[]', $value[$i]);
        }
      } else {
        echo osc_draw_hidden_field($key, $value);
      }
    }
  }
?>

    </form>
  </div>
</div>