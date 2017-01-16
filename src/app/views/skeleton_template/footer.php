<?php
if (empty($is_ajax)):
?>
            </div>
        </div>
    </div>
</section>
<button id="toggle" class="toggle i">
    <div class="cross">
        <div class="x"></div>
        <div class="y"></div>
    </div>
</button>
<div style="width: 100%" class="btn-box">
<table style="margin: 0 auto">
<tr>
<td>
  <button class="toggle-contact fb-btn" onclick="window.open('https://www.facebook.com/felicity.iiith/')">
    <i class="icon-facebook"></i>
  </button>
  </td><td>
  <button class="toggle-contact youtube-btn" onclick="window.open('https://www.youtube.com/channel/UC_1vMv4Al_96QgYzkFjh99w/')">
    <i class="icon-youtube"></i>
  </button>
  </td><td>
  <button class="toggle-contact instagram-btn" onclick="window.open('https://www.instagram.com/felicity.iiith/')">
    <i class="icon-instagram"></i>
  </button>
  </td>
  </tr>
</table>
</div>
</div>
<div id="menu">
  <h2>Menu</h2>
  <ul class="links" style="list-style: none;padding-left: 0px">
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
<?php $this->load_fragment('google_analytics'); ?>
    </body>
</html>
<?php endif;
