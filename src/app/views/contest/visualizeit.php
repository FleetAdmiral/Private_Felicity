<?php
$text_input = function ($name, $type="text") use ($errors) {
?>
    <input
        name="<?= $name ?>"
        value="<?= isset($_POST[$name]) ? $_POST[$name] : '' ?>"
        type="<?=$type?>"
        class="pure-input-1" required="">

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
<article class="page open full">
    <div class="container">
        <h1 class="text-center">
            <small><a class="underlined" href="<?= locale_base_url() ?>threads/visualizeit/"><?= __('Visualize it') ?></a></small><br/>
            <br/><br/><?= __('Submit') ?>
        </h1>
        <?php if ($user_details): ?>
            <div class="row">
                <div class="offset3 col6 success text-center">
                    <p class="lead">
                        You have submitted for the contest successfully :)
                    </p>
                    <p>
                        This is <a href="<?= $user_details['paper_link'] ?>" target="_blank" class="underlined">link</a> to your submission. If you want to update your solutions, update on drive.(Link won't change)
                        You can change it till 2017-01-15 21:00.
                </div>
            </div>
        <?php else: ?>
            <form class="pure-form pure-form-stacked row" method="post" action="">
                <fieldset class="offset3 col6">
                    <?php if (isset($errors['common'])): ?>
                        <div class="error pure-input-1-1"><?= $errors['common'] ?></div>
                    <?php endif; ?>

                    <label><?= __('Drive Link') ?></label>
                    <?php $text_input('paper_link', 'url'); ?>

                    <button type="submit" class="pure-button pure-button-primary some-top-margin" style="width: 200px;height:40px;"><?= __('Submit') ?></button>
                </fieldset>
            </form>
        <?php endif; ?>
    </div>
</article>
