<?php
$text_input = function ($name, $large_text=false) use ($errors) {
?>
    <?php if ($large_text): ?>
        <textarea name="<?= $name ?>" class="pure-input-1" required=""><?= isset($_POST[$name]) ? $_POST[$name] : '' ?></textarea>
    <?php else: ?>
        <input
            name="<?= $name ?>"
            value="<?= isset($_POST[$name]) ? $_POST[$name] : '' ?>"
            required=""
            type="text"
            class="pure-input-1">
    <?php endif; ?>

    <?php if (isset($errors[$name])): ?>
        <div class="error pure-input-1-1"><?= $errors[$name] ?></div>
    <?php endif; ?>
<?php
}
?>

<style>
.pure-form input[type="text"][disabled] {
    color: #555;
}
</style>
<article class="page full">
    <div class="container">
        <h1 class="text-center">
            <small><a class="underlined" href="<?= locale_base_url() ?>talks-and-workshops/web-development/"><?= __('Web development workshop') ?></a></small><br/>
            <br/><br/><?= __('Register') ?>
        </h1>
        <?php if ($user_details['payment_status'] == 'failed'): ?>
            <a class="btn" href="<?= locale_base_url() ?>talks-and-workshops/web-development/pay_again/"> Click to pay again </a>
            <h3> Payment Unsuccessful. <br/>In case of any discrepancy, Please drop a mail at webdev@felicity.iiit.ac.in</h3>
        <?php elseif($user_details['payment_status'] == 'success'): ?>
            <h3> Payment successful. Kindly carry your payment receipt which is mailed to you while atteding workshop.</h3>
            <h3> In case of any discrepancy, Please drop a mail at webdev@felicity.iiit.ac.in </h3>
        <?php else: ?>
          <form class="pure-form pure-form-stacked row" method="post" action="">
              <fieldset class="offset3 col6">
                  <?php if (isset($errors['common'])): ?>
                      <div class="error pure-input-1-1"><?= $errors['common'] ?></div>
                  <?php endif; ?>

                  <label><?= __('Contact number') ?></label>
                  <?php $text_input('contact_number'); ?>

                  <label><?= __('Stream of study / Branch') ?></label>
                  <?php $text_input('stream'); ?>

                  <label><?= __('Year of study') ?></label>
                  <?php $text_input('year'); ?>

                  <label><?= __('Your experience in web development') ?></label>
                  <?php $text_input('experience', true); ?>

                  <label><?= __('Why you want to do this workshop?') ?></label>
                  <?php $text_input('why_join', true); ?>

                  <button type="submit" class="pure-button pure-button-primary some-top-margin" style="width: 200px;height:40px;"><?= __('Proceed to payment') ?></button>
              </fieldset>
          </form>
        <?php endif; ?>
    </div>
</article>
