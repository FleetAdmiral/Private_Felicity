<?php
$text_input = function ($name, $large_text=false, $required=true) use ($errors) {
?>
    <?php if ($large_text): ?>
        <textarea name="<?= $name ?>" class="pure-input-1" <?php if ($required): ?>required=""<?php endif; ?> ><?= isset($_POST[$name]) ? $_POST[$name] : '' ?></textarea>
    <?php else: ?>
        <input
            name="<?= $name ?>"
            value="<?= isset($_POST[$name]) ? $_POST[$name] : '' ?>"
            <?php if ($required): ?>
            required=""
            <?php endif; ?>
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
            <small><a class="underlined" href="<?= locale_base_url() ?>cultural-Colosseum/bob/"><?= __('Riders on the Storms') ?></a></small><br/>
            <br/><br/><?= __('Register') ?>
        </h1>
        <?php if (!$errors && $user_details): ?>
            <?php if ($user_details['payment_status'] != 'success'): ?>
                <p class="text-center lead error">
                    You're registered for the event.
                </p>
                <p class="text-center">
                    But your payment is unsuccessful. If you think this is a mistake, please email us at <a href="mailto:cultural@felicity.iiit.ac.in" class="underlined">cultural@felicity.iiit.ac.in</a>
                </p>
                <a class="btn" href="<?= locale_base_url() ?>cultural-Colosseum/bob/pay_again/"> Click here to pay again.</a>
            <?php else: ?>
                <p class="text-center lead success">
                    Payment Successful. You're registered for the event.
                </p>
                <p class="text-center">
                    Kindly carry your payment receipt which is mailed to you while atteding riders on the storm.<br/>
                    If you think this is a mistake, please email us at <a href="mailto:cultural@felicity.iiit.ac.in" class="underlined">cultural@felicity.iiit.ac.in</a>
                </p>
            <?php endif; ?>
        <?php else: ?>
            <form class="pure-form pure-form-stacked row" method="post" action="">
                <fieldset class="offset3 col6">
                    <?php if (isset($errors['common'])): ?>
                        <div class="error pure-input-1-1"><?= $errors['common'] ?></div>
                    <?php endif; ?>

                    <label><?= __('Name of the Band (*)') ?></label>
                    <?php $text_input('name'); ?>

                    <label><?= __('Band Leader / Manager (*)') ?></label>
                    <?php $text_input('leader'); ?>

                    <label><?= __('Contact number (*)') ?></label>
                    <?php $text_input('contact_number'); ?>

                    <label><?= __('Band members and their roles (*)') ?></label>
                    <?php $text_input('members', true); ?>

                    <label><?= __('Provide a link to one of your recorded songs (E.g: SoundCloud, YouTube, etc) (*)') ?></label>
                    <?php $text_input('link', false, true); ?>

                    <label><?= __('Tell us about yourself') ?></label>
                    <?php $text_input('tell', true, false); ?>

                    <button type="submit" class="pure-button pure-button-primary some-top-margin" style="width: 200px;height:40px;"><?= __('Proceed to payment') ?></button>
                </fieldset>
            </form>
        <?php endif; ?>
    </div>
</article>
