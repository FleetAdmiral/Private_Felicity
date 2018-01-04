<?php $this->load_fragment('skeleton_template/header', ['title' => __('About Us')]); ?>

    <div class="linkholder">
      <div class="links">
        <li class="selected"><a onclick="showPage('about')">About Us</a></li>
        <li><a onclick="showPage('team')">Team</a></li>
      </div>
    </div>

    <div class="page about-content">
      <!-- <header> -->
      <br/> <br/>
          <!-- <h1>About<span class="tabheading"> Us</span></h1> -->
      <!-- </header> -->
      <?= __($about_us) ?>
    </div>
<?php $this->load_fragment('skeleton_template/footer'); ?>

<?php if (!$is_ajax): ?>
<script>
    (function() {
        $('#toggle').removeClass('i');
        $('.btn-box').css('display', 'none');
    })();
</script>
<?php endif; ?>

<!--<div style="position: fixed; bottom: 0; width: 100%;">
    <ul style="position: fixed; bottom: 0; width: 100%; display: flex;">
      <li><a onclick="openPage('about')">About Us</a></li>
      <li><a onclick="openPage('events')">Events</a></li>
      <li><a onclick="openPage('team')">Team</a></li>
      <li><a onclick="openPage('sponsors')">Sponsors</a></li>
      <li><a onclick="openPage('contact')">Contact Us</a></li>
  </ul>
</div>-->
