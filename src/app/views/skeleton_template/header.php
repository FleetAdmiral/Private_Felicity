<?php
if (empty($is_ajax)):
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="keywords" content="felicity, felicty18, college, fest, threads, pulsation, iiit, iiith, international, institute, information, technology, hyderabad">
    <meta name="description" content="<?= __("Felicity is the annual technical and cultural fest of IIIT-H. Includes technical, cultural and literary events, Major nights, talks, workshops and performances. We, at IIIT-H, believe in giving back to the society and use Felicity as a medium to serve this motive and pickup various social initiatives.") ?>">
    <meta property="og:description" content="<?= __("Felicity is the annual technical and cultural fest of IIIT-H. Includes technical, cultural and literary events, Major nights, talks, workshops and performances. We, at IIIT-H, believe in giving back to the society and use Felicity as a medium to serve this motive and pickup various social initiatives.") ?>">
    <meta property="og:title" content="<?= isset($title) ? $title . ' · ' : '' ?><?= __('Felicity') ?> · <?= __('IIIT-H') ?>">
    <meta property="og:image" content="<?= base_url() . (isset($og_image) ? $og_image : 'files/17/poster-17.jpg') ?>" style="z-index: 3">

    <?php
    global $cfg;
    $path = empty($_SERVER['PATH_INFO']) ? '/' : $_SERVER['PATH_INFO'];
    $lang_prefix = explode('_', setlocale(LC_ALL, "0"))[0];

    if (strpos($path, $lang_prefix) === 1) {
        $path = substr($path, strlen($lang_prefix) + 1);
    }

    $lang_list = isset($cfg['i18n']['languages']) ? $cfg['i18n']['languages'] : [];
    ?>
    <?php if ($lang_list): ?>
        <link rel="alternate" href="<?= base_url() . substr($path, 1) ?>" hreflang="x-default" />
        <?php foreach ($lang_list as $lang => $locale): ?>
        <link rel="alternate" href="<?= base_url() . $lang . $path ?>" hreflang="<?= $lang ?>" />
        <?php endforeach; ?>
    <?php endif; ?>

    <title><?= isset($title) ? $title . ' · ' : '' ?><?= __('Felicity') ?> · <?= __('IIIT-Hyderabad') ?></title>

    <link rel="icon" href="<?= base_url() ?>favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/styles/vendor/pure-forms-tables-buttons.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/styles/core.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/styles/new.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/styles/vendor/felicons.css">
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">-->
    <link rel="stylesheet" href="<?= base_url() ?>static/styles/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slideout/1.0.1/slideout.min.js"></script>
    <script src="<?= base_url() ?>static/scripts/vendor/jquery.min.js"></script>
    <script type="text/javascript">
        var baseUrl = '<?= base_url() ?>';
        var localeBaseUrl = '<?= locale_base_url() ?>';
    </script>
</head>
<?php
    if (!isset($page_slug)) {
        $page_slug = 'static';
    }
?>

<body  style="overflow: hidden;">
  <div id = "plane" style="z-index: 2000;height: 20%;">
  <img src = "<?= base_url() ?>static/images/plane_final_crop.png" width = "auto" height ="70%;">
  </div>
  <?php if (isset($is_authenticated)): ?>
    <div class="auth-quick-links">
        <?php if ($is_authenticated): ?>
            <?php if (!empty($user_nick)): ?>
                <div class="nick"><?= sprintf(__('Hello, %s'), $user_nick) ?> <a href="<?= locale_base_url() . "logout/" ?>"><?= __('Logout') ?></a></div>
            <?php else: ?>
                <div><a href="<?= locale_base_url() . "login/" ?>" class="pure-button btn"><?= __('Login / Register') ?></a></div>
            <?php endif; ?>
        <?php else: ?>
            <div><a href="<?= locale_base_url() . "login/" ?>" class="pure-button btn"><?= __('Login / Register') ?></a></div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <div id="container" class="wrapper" style="z-index: 4;">
     <div id="flag" class='flag' style="z-index: 9000;"></div>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
     <script  src="<?= base_url() ?>static/scripts/index.js"></script><!---->
     <button id="menu-toggle" class="toggle-button" >☰</button>
      <div id="panelcontainer">

        <div class="content-center" style="position: relative;">
          <div style="top: 45%;z-index:4;">
                    <img src="<?= base_url() ?>static/images/logo.png" style="display: block; margin: 0 auto; width: 30%;">
          <p class="text-landing" style="font-size: 200%;text-shadow: 0 0 2px #000000;">Global Weekend</p>
          <br><br>
          <p class="text-landing" style="font-size: 150%;text-shadow: 0 0 2px #000000;">January 26 - 28, 2018</p>
                </div>
        </div>

      <section id="about" class="about" style="z-index: 4">
            <div class="cell">
                <div style="padding-bottom:0; height: 75vh; width: 80%; margin-top: 5%;" class="cables center accelerate newcsscozwell">
                    <!-- <div class="linkholder">
                        <div class="links">
                            <li><a onclick="showPage('about')">About US</a></li>
                            <li><a onclick="showPage('events')">Events</a></li>
                            <li><a onclick="showPage('gallery')">Gallery</a></li>
                            <li><a onclick="showPage('team')">Team</a></li>
                            <li><a onclick="showPage('diary')">Felicity Diaries</a></li>
                            <li><a onclick="showPage('sponsors')">Sponsors</a></li>
                            <li><a onclick="showPage('contact')">Contact Us</a></li>
                        </div>
                    </div> -->
                    <div class="panel accelerate content-holder" style="height:100%">
                      <!-- <button id="toggle" class="toggle i" style="display: block; left: 95%; top: 8%;">
                          <div class="cross">
                              <div class="x"></div>
                              <div class="y"></div>
                          </div>
                      </button> -->
      <!-- </section> -->
<?php endif;
