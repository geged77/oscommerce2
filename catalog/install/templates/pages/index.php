<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/

  $compat_register_globals = true;

  if (function_exists('ini_get') && (PHP_VERSION < 4.3) && ((int)ini_get('register_globals') == 0)) {
    $compat_register_globals = false;
  }
?>

<div class="mainBlock">

  <h1>Bienvenue sur l'installateur de osCommerce Online Merchant v<?php echo osc_get_version(); ?> FR !</h1>

      <p>osCommerce est une solution E-Commerce en Open Source se développant grâce à sa communauté. Cette solution permet aux propriétaires de magasins d'installer, configurer, utiliser et assurer la maintenance de leur boutique en ligne avec un minimun d'effort et sans les coûts impliqués.</p>
      <p>osCommerce associe des solutions Open Source pour fournir une plateforme de développement libre et ouverte, qui inclue la <i>puissance</i> du langage script PHP, la <i>stabilité</i> des serveurs Apache, et la <i>rapidité</i> des bases de données MySQL.</p>
      <p>Sans obligations ni restrictions, osCommerce peut être installé sur tous serveurs où php 4.x à php 5.x et MySQL 3.23 à MySQL 5 sont exécutés, sur tout environnement PHP et MySQL sont supportés, incluant Linux, Solaris, BSD, et Microsoft Windows XX.</p>
      <p>Pour des questions de performance, il est recommandé d'utiliser au minimum php 5.x et MySQL 4</p>
</div>

<div class="contentBlock">
  <div class="infoPane">
    <h3>Compatibilité du serveur</h3>

    <div class="infoPaneContents">
      <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr>
          <td><strong>Version de PHP</strong></td>
          <td align="right"><?php echo PHP_VERSION; ?></td>
          <td align="right" width="25"><img src="images/<?php echo ((PHP_VERSION >= 4) ? 'tick.gif' : 'cross.gif'); ?>" border="0" width="16" height="16"></td>
        </tr>
      </table>

<?php
  if (function_exists('ini_get')) {
?>

      <br />

      <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr>
          <td><strong>Paramètres de PHP</strong></td>
          <td align="right"></td>
          <td align="right" width="25"></td>
        </tr>
        <tr>
          <td>register_globals</td>
          <td align="right"><?php echo (((int)ini_get('register_globals') == 0) ? 'Off' : 'On'); ?></td>
          <td align="right"><img src="images/<?php echo (($compat_register_globals == true) ? 'tick.gif' : 'cross.gif'); ?>" border="0" width="16" height="16"></td>
        </tr>
        <tr>
          <td>magic_quotes</td>
          <td align="right"><?php echo (((int)ini_get('magic_quotes') == 0) ? 'Off' : 'On'); ?></td>
          <td align="right"><img src="images/<?php echo (((int)ini_get('magic_quotes') == 0) ? 'tick.gif' : 'cross.gif'); ?>" border="0" width="16" height="16"></td>
        </tr>
        <tr>
          <td>file_uploads</td>
          <td align="right"><?php echo (((int)ini_get('file_uploads') == 0) ? 'Off' : 'On'); ?></td>
          <td align="right"><img src="images/<?php echo (((int)ini_get('file_uploads') == 1) ? 'tick.gif' : 'cross.gif'); ?>" border="0" width="16" height="16"></td>
        </tr>
        <tr>
          <td>session.auto_start</td>
          <td align="right"><?php echo (((int)ini_get('session.auto_start') == 0) ? 'Off' : 'On'); ?></td>
          <td align="right"><img src="images/<?php echo (((int)ini_get('session.auto_start') == 0) ? 'tick.gif' : 'cross.gif'); ?>" border="0" width="16" height="16"></td>
        </tr>
        <tr>
          <td>session.use_trans_sid</td>
          <td align="right"><?php echo (((int)ini_get('session.use_trans_sid') == 0) ? 'Off' : 'On'); ?></td>
          <td align="right"><img src="images/<?php echo (((int)ini_get('session.use_trans_sid') == 0) ? 'tick.gif' : 'cross.gif'); ?>" border="0" width="16" height="16"></td>
        </tr>
      </table>

      <br />

      <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr>
          <td><strong>Extensions de PHP requises</strong></td>
          <td align="right" width="25"></td>
        </tr>
        <tr>
          <td>MySQL</td>
          <td align="right"><img src="images/<?php echo (extension_loaded('mysql') ? 'tick.gif' : 'cross.gif'); ?>" border="0" width="16" height="16"></td>
        </tr>
      </table>

      <br />

      <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr>
          <td><strong>Extensions PHP optionnelles</strong></td>
          <td align="right" width="25"></td>
        </tr>
        <tr>
          <td>GD</td>
          <td align="right"><img src="images/<?php echo (extension_loaded('gd') ? 'tick.gif' : 'cross.gif'); ?>" border="0" width="16" height="16"></td>
        </tr>
        <tr>
          <td>cURL</td>
          <td align="right"><img src="images/<?php echo (extension_loaded('curl') ? 'tick.gif' : 'cross.gif'); ?>" border="0" width="16" height="16"></td>
        </tr>
        <tr>
          <td>OpenSSL</td>
          <td align="right"><img src="images/<?php echo (extension_loaded('openssl') ? 'tick.gif' : 'cross.gif'); ?>" border="0" width="16" height="16"></td>
        </tr>
      </table>

<?php
  }
?>

    </div>
  </div>

  <div class="contentPane">
    <h2>Nouvelle installation</h2>

<?php
  $configfile_array = array();

  if (file_exists(osc_realpath(dirname(__FILE__) . '/../../../includes') . '/configure.php') && !osc_is_writable(osc_realpath(dirname(__FILE__) . '/../../../includes') . '/configure.php')) {
    @chmod(osc_realpath(dirname(__FILE__) . '/../../../includes') . '/configure.php', 0777);
  }

  if (file_exists(osc_realpath(dirname(__FILE__) . '/../../../admin/includes') . '/configure.php') && !osc_is_writable(osc_realpath(dirname(__FILE__) . '/../../../admin/includes') . '/configure.php')) {
    @chmod(osc_realpath(dirname(__FILE__) . '/../../../admin/includes') . '/configure.php', 0777);
  }

  if (file_exists(osc_realpath(dirname(__FILE__) . '/../../../includes') . '/configure.php') && !osc_is_writable(osc_realpath(dirname(__FILE__) . '/../../../includes') . '/configure.php')) {
    $configfile_array[] = osc_realpath(dirname(__FILE__) . '/../../../includes') . '/configure.php';
  }

  if (file_exists(osc_realpath(dirname(__FILE__) . '/../../../admin/includes') . '/configure.php') && !osc_is_writable(osc_realpath(dirname(__FILE__) . '/../../../admin/includes') . '/configure.php')) {
    $configfile_array[] = osc_realpath(dirname(__FILE__) . '/../../../admin/includes') . '/configure.php';
  }

  $warning_array = array();

  if (function_exists('ini_get')) {
    if ($compat_register_globals == false) {
      $warning_array['register_globals'] = 'Compatibility with register_globals is supported from PHP 4.3+. This setting <u>must be enabled</u> due to an older PHP version being used.';
    }
  }

  if (!extension_loaded('mysql')) {
    $warning_array['mysql'] = 'The MySQL extension is required but is not installed. Please enable it to continue installation.';
  }

  if ((sizeof($configfile_array) > 0) || (sizeof($warning_array) > 0)) {
?>

    <div class="noticeBox">

<?php
    if (sizeof($warning_array) > 0) {
?>

      <table border="0" width="100%" cellspacing="0" cellpadding="2" style="background: #fffbdf; border: 1px solid #ffc20b; padding: 2px;">

<?php
      reset($warning_array);
      while (list($key, $value) = each($warning_array)) {
        echo '        <tr>' . "\n" .
             '          <td valign="top"><strong>' . $key . '</strong></td>' . "\n" .
             '          <td valign="top">' . $value . '</td>' . "\n" .
             '        </tr>' . "\n";
      }
?>

      </table>
<?php
    }

    if (sizeof($configfile_array) > 0) {
?>

      <p>Le serveur Web ne peut sauvegarder les paramètres d'installation dans les fichiers de configuration</p>
      <p>Les fichiers suivants doivent avoir des droits d'écriture (chmod 777):</p>
      <p>

<?php
      for ($i=0, $n=sizeof($configfile_array); $i<$n; $i++) {
        echo $configfile_array[$i];

        if (isset($configfile_array[$i+1])) {
          echo '<br />';
        }
      }
?>

      </p>

<?php
    }
?>

    </div>

<?php
  }

  if ((sizeof($configfile_array) > 0) || (sizeof($warning_array) > 0)) {
?>

    <p>Corrigez les erreurs suivantes et relancez en suite l'installation.</p>

<?php
    if (sizeof($warning_array) > 0) {
      echo '    <p><i>Les changements de paramètres du serveur imposent le redémarage du serveur pour prendre effet.</i></p>' . "\n";
    }
?>

    <p align="right"><a href="index.php"><img src="images/button_retry.gif" border="0" alt="Retry" /></a></p>

<?php
  } else {
?>

<p>L'environnement du serveur a été vérifié en vue de l'installation et de la configuration de votre boutique.</p>
    <p>Veuillez continuer la procédure d'installation.</p>
    <p align="right"><a href="install.php"><img src="images/button_continue.gif" border="0" alt="Continue" /></a></p>

<?php
  }
?>

  </div>
</div>
