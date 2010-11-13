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
  <p>Suivez les instructions à l'écran qui vous sont données pour le serveur SQL, le serveur Web et les paramètres de la boutique. Si vous avez besoin d'aide, veuillez consulter la documentation, la FAQ ou les espaces spécifiques sur le forum.</p>
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
    <h2>Online Store Settings</h2>

    <form name="install" id="installForm" action="install.php?step=4" method="post">

    <table border="0" width="99%" cellspacing="0" cellpadding="5" class="inputForm">
      <tr>
        <td class="inputField"><?php echo 'Store Name<br />' . osc_draw_input_field('CFG_STORE_NAME', null, 'class="text"'); ?></td>
        <td class="inputDescription">Le nom de la Boutique tel qu'il sera présenté au public.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'Store Owner Name<br />' . osc_draw_input_field('CFG_STORE_OWNER_NAME', null, 'class="text"'); ?></td>
        <td class="inputDescription">Le Nom du Propriétaire tel qu'il sera présenté au public.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'Store Owner E-Mail Address<br />' . osc_draw_input_field('CFG_STORE_OWNER_EMAIL_ADDRESS', null, 'class="text"'); ?></td>
        <td class="inputDescription">Email du Propriétaire tel qu'il sera présenté au public.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'Administrator Username<br />' . osc_draw_input_field('CFG_ADMINISTRATOR_USERNAME', null, 'class="text"'); ?></td>
        <td class="inputDescription">Nom d'utilisateur de l'Administrateur de la boutique.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'Administrator Password<br />' . osc_draw_input_field('CFG_ADMINISTRATOR_PASSWORD', null, 'class="text"'); ?></td>
        <td class="inputDescription">Le Mot de Passe du compte Administrateur.</td>
      </tr>

<?php
  if (osc_is_writable($dir_fs_document_root) && osc_is_writable($dir_fs_document_root . 'admin')) {
?>
      <tr>
        <td class="inputField"><?php echo 'Administration Directory Name<br />' . osc_draw_input_field('CFG_ADMIN_DIRECTORY', 'admin', 'class="text"'); ?></td>
        <b class="inputDescription">C"est le répertoire ou la section d'administration de la boutique sera installée. <b>Pour des questions de sécurité vous devez le modifier.</b></td>
      </tr>
<?php
  }
?>

    </table>

    <p align="right"><input type="image" src="images/button_continue.gif" border="0" alt="Continue" id="inputButton" />&nbsp;&nbsp;<a href="index.php"><img src="images/button_cancel.gif" border="0" alt="Cancel" /></a></p>

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
