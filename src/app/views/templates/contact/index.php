<?php $this->load_fragment('skeleton_template/header', ['title' => __('Contact Us')]); ?>
<article class="page contact">
    <div class="container">
        <header>
            <h1>Contact<span class="tabheading"> Us</span></h1>
        </header>
        <p>
            <?= __('There are many ways of contacting us.') ?>
        </p>
        <p>
            <?= sprintf(__('You may email us at %s'), '<a target="_blank" class="underlined" href="mailto:contact@felicity.iiit.ac.in">contact@felicity.iiit.ac.in</a>') ?>
        </p>
        <p>
            <?= __('Or bug our coordinators') ?>
        </p>
        <div class="row text-center">
            <div class="col4">
                <p>
                    <?= __('Apaar Agrawal') ?>
                    <a target="_blank" href="https://www.facebook.com/apaar.agrawal.3">
                        <img class="social-icon" src="<?= base_url() ?>static/images/fb-icon.png">
                    </a>
                </p>
                <p>
                    <a target="_blank" class="underlined" href="mailto:apaar@felicity.iiit.ac.in">apaar@felicity.iiit.ac.in</a>
                </p>
                <p>(+91) 9515409221</p>
            </div>
            <div class="col4">
                <p>
                    <?= __('Himakar Yv') ?>
                    <a target="_blank" href="https://www.facebook.com/himakar.yv">
                        <img class="social-icon" src="<?= base_url() ?>static/images/fb-icon.png">
                    </a>
                </p>
                <p>
                    <a target="_blank" class="underlined" href="mailto:himakar@felicity.iiit.ac.in">himakar@felicity.iiit.ac.in</a>
                </p>
                <p>(+91) 7799013690</p>
            </div>
            <div class="col4">
                <p>
                    <?= __('Parth Shrivastava') ?>
                    <a target="_blank" href="https://www.facebook.com/parth20shri">
                        <img class="social-icon" src="<?= base_url() ?>static/images/fb-icon.png">
                    </a>
                </p>
                <p>
                    <a target="_blank" class="underlined" href="mailto:parth@felicity.iiit.ac.in">parth@felicity.iiit.ac.in</a>
                </p>
                <p>(+91) 8142657575</p>
            </div>
        </div>
    </div>
</article>
<?php $this->load_fragment('skeleton_template/footer'); ?>
<?php if (!$is_ajax): ?>
<script>
    (function() {
        $('#toggle').removeClass('i');
        $('.btn-box').css('display', 'none');
    })();
</script>
<?php endif; ?>
