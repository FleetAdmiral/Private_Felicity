<?php
if (empty($is_ajax)):
?>
              <!-- </div> -->
            </div>
        </div>
    </div>
</section>
<button id="toggle" class="toggle i" style="display: block; left: 90%; top: 17%; z-index: 4;">
    <div class="cross">
        <div class="x"></div>
        <div class="y"></div>
    </div>
</button>

<div id="menu">
  <h2>Menu</h2>
  <ul class="links" style="list-style: none;padding-left: 0px;">
      <li><a onclick="openPage('about')">About US</a></li>
      <li><a onclick="openPage('events')">Events</a></li>
      <li><a onclick="openPage('team')">Team</a></li>
      <li><a onclick="openPage('sponsors')">Sponsors</a></li>
      <li><a onclick="openPage('contact')">Contact Us</a></li>
  </ul>
</div>
<!-- Scripts -->
<script type="text/javascript">
  var slideout = new Slideout({
        'panel': document.getElementById('panelcontainer'),
        'menu': document.getElementById('menu'),
        'padding': 256,
        'tolerance': 70
      });

      // Toggle button
      document.querySelector('.toggle-button').addEventListener('click', function() {
        slideout.toggle();
      });
      document.querySelector('#panelcontainer').addEventListener('click', function() {
        slideout.close();
      });
</script>
<script src="<?= base_url() ?>static/scripts/common.js" charset="utf-8"></script>
<script src="<?= base_url() ?>static/scripts/ajaxify.js" charset="utf-8"></script>
<script src="<?= base_url() ?>static/scripts/navigation.js" charset="utf-8"></script>

<style>
      .slideout-menu {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        z-index: 0;
        width: 256px;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
        display: none;
        background-color: grey;
        background-image: linear-gradient(145deg, #1D1F20, #404348);
      }

      .slideout-open,
      .slideout-open body,
      .slideout-open .slideout-panel {
      }

      .slideout-open .slideout-menu {
        display: block;
      }
    </style>
    <div class="cloud-parent" style="position:absolute; top:100%;left:50%;z-index:2;">
      <?php
      for ($i = 1; $i <= 15; $i++) {
        ?>
      <div style="transform: rotate( <?= rand(1,360) ?>deg);">
        <div class="cloud globe" style="
          position:absolute;
          animation-duration: <?=35+rand(-5,5)?>s !important;
          top: 100%;
          left: 50%;
          ">
          <img src= "<?= base_url() ?>static/images/cloud<?=rand(1,3)?>.png" class="cloud-img" style="
          position: relative;
          z-index:2;
          transform: translate(-50%, -50%);
          bottom:<?=28+ rand(-5,5) ?>vw;
          width:9vw; height: auto; opacity: 80%;">
        </div>
      </div>
      <?php
      }
      ?>
    </div>
    <img src= "<?= base_url() ?>static/images/world.png" class="globe" style="
    z-index:2;
    position:absolute;
    left:50%;
    width: 50vw;
    height: auto;
    top:100%;
    transform: translate(-50%, -50%);">
    <?php $this->load_fragment('menu'); ?>
<?php $this->load_fragment('google_analytics'); ?>
    </body>
    <script>
        $('.content-center').css('display', 'none');
    </script>
</html>
<?php endif;
