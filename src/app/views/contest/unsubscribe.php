<?php $this->load_fragment('skeleton_template/header', ['title' => __('UnSubscribe')]); ?>
    <div class="page about-content">
      <header>
          <h1>UnSubscribe</h1>
      </header>
      <br/><br/>
      <p class="page about-content"><?= __($message) ?></p>
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
