<?php
$text_input = function ($name, $required=true) use ($errors) {
?>
    <input
        name="<?= $name ?>"
        value="<?= isset($_POST[$name]) ? $_POST[$name] : '' ?>"
        type="text"
        <?php if ($required): ?>
            required=""
        <?php endif; ?>
        class="pure-input-1">

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
        <h1 class="text-center">Register for
            <a class="underlined" href="<?= locale_base_url() ?>pulsation/artuino/">Artuino</a>
        </h1>
        <?php if (!$errors && $team_info): ?>
            <?php if ($team_info['payment_status'] != 'success'): ?>
                <p class="text-center lead error">
                    You're registered for the event as a part of team <?= $team_info['team_name'] ?>
                </p>
                <p class="text-center">
                    But your payment is unsuccessful. If you think this is a mistake, please email us at <a href="mailto:pulsation@felicity.iiit.ac.in" class="underlined">pulsation@felicity.iiit.ac.in</a>
                </p>
                <a class="btn" href="<?= locale_base_url() ?>pulsation/artuino/pay_again/"> Click here to pay again.</a>
            <?php else: ?>
                <p class="text-center lead success">
                    Payment Succesful. You're registered for the event as a part of team <?= $team_info['team_name'] ?>
                </p>
                <p class="text-center">
                    Kindly carry your payment receipt which is mailed to you while atteding workshop.<br/>
                    If you think this is a mistake, please email us at <a href="mailto:pulsation@felicity.iiit.ac.in" class="underlined">pulsation@felicity.iiit.ac.in</a>
                </p>
            <?php endif; ?>
        <?php else: ?>
            <p class="text-center lead">
                Note: Make sure that all of the team members are registered with us.
            </p>
            <p class="text-center">
                Fields marked (*) are required.
            </p>
            <form class="pure-form pure-form-stacked row" method="post" action="">
                <fieldset class="offset3 col6">
                    <?php if (isset($errors['common'])): ?>
                        <div class="error pure-input-1-1"><?= $errors['common'] ?></div>
                    <?php endif; ?>

                    <label><?= __('Team name') ?> (*)</label>
                    <?php $text_input('team_name'); ?>

                    <label><?= __('Contact number of any one team member') ?> (*)</label>
                    <?php $text_input('contact_number'); ?>

                    <label><?= __('Team member 1 username') ?> (*)</label>
                    <input value="<?= $user_nick ?>" type="text" class="pure-input-1" disabled="">

                    <label><?= __('Team member 2 username') ?></label>
                    <?php $text_input('nick2', false); ?>

                    <label><?= __('Team member 3 username') ?></label>
                    <?php $text_input('nick3', false); ?>

                    <label><?= __('Team member 4 username') ?></label>
                    <?php $text_input('nick4', false); ?>

                    <button type="submit" class="pure-button pure-button-primary some-top-margin" style="width: 200px;height:40px;"><?= __('Proceed to payment') ?></button>
                </fieldset>
            </form>
        <?php endif; ?>
    </div>
</article>
