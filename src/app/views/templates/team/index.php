<?php $this->load_fragment('skeleton_template/header'); ?>
<article class="page team">
<?php
function img($img_name, $name=null) {
?>
    <div class="img-container<?=$name ? '' : ' group-pic' ?>" style="transform: rotate(<?= 2 - rand(1, 4) ?>deg)">
        <img src="<?=base_url()?>static/images/team/<?=$img_name?>">
    </div>
    <?php if ($name): ?>
        <p class="name"><?= $name ?></p>
    <?php endif; ?>
<?php
}
?>
<div>
    <h2 class="text-center"><?= __('The Felicity Coordinators') ?></h2>
    <div class="row">
        <div class="col11 offset-half">
            <?php img('FCs.jpg'); ?>
        </div>
    </div>
    <div class="container">
        <p class="names">
            <?= __('Arihant Jain') ?>,
            <?= __('Nishant Gupta') ?>,
            <?= __('Sai Sahith Nama') ?>,
        </p>
    </div>
</div>
<div>
    <div class="row">
        <div class="col6">
            <h2 class="text-center"><?= __('Core Team') ?></h2>
            <?php img('CoreTeam.jpg'); ?>
            <div class="container">
                <p class="names">
                    <strong><?= __('First row') ?></strong>:<br>
                    <?= __('Arihant Jain') ?>,
                    <?= __('Nishant Gupta') ?>,
                    <?= __('Sai Sahith Nama') ?>,
                </p>
                <p class="names">
                    <strong><?= __('Second row') ?></strong>:<br>
                    <?= __('Devansh Manu') ?>,
                    <?= __('Divanshu Jain') ?>,
                    <?= __('Dipankar Jain') ?>,
                    <?= __('Anshul Singhal') ?>,
                    <?= __('Riya Pal') ?>,
                </p>
                <p class="names">
                    <strong><?= __('Third row') ?></strong>:<br>
                    <?= __('Apaar Agrawal') ?>,
                    <?= __('Himakar Yv') ?>,
                    <?= __('Mayank Modi') ?>,
                    <?= __('Isha Mangurkar') ?>,
                </p>
            </div>
        </div>
        <div class="col6">
            <h2 class="text-center"><?= __('Finance Council') ?></h2>
            <?php img('FinanceC.jpg'); ?>
            <div class="container">
                <p class="names">
                    <?= __('Aayush Naik') ?>,
                    <?= __('Nikita Chaturvedi') ?>,
                </p
            </div>
        </div>
    </div>
</div>
<div>
    <h2 class="text-center"><?= __('The Threads Team') ?></h2>
    <div class="row">
        <div class="col11 offset-half">
            <?php img('Threads.jpg'); ?>
        </div>
    </div>
    <div class="container">
        <p class="names">
            <strong><?= __('First row') ?></strong>:<br>
            <?= __('Tanmay Chaudhari') ?>,
            <?= __('Shubham Vijayvargiya') ?>,
            <?= __('Satyam Pandey') ?>,
            <?= __('Abhinav Aggarwal') ?>,
            <?= __('Rahul Nahata') ?>
        </p>
        <p class="names">
            <strong><?= __('Second row') ?></strong>:<br>
            <?= __('Shivin Yadav') ?>,
            <strong><?= __('Pinkesh Badjatiya')  ?> (<?= __('Server Admin')?>)</strong>,
            <?= __('Rohan Karnawat') ?>,
            <?= __('Vikash') ?>,
            <strong><?= __('Aalekh Jain')  ?> (<?= __('Server Admin')?>)</strong>,
            <?= __('Animesh Chandra Pathak') ?>,
            <?= __('Arvind') ?>
        </p>
        <p class="names">
            <strong><?= __('Third row') ?></strong>:<br>
            <?= __('Adarsh Sanjeev') ?>,
            <?= __('Archit Rai') ?>,
            <?= __('Amit Kumar Gupta') ?>,
            <?= __('Saatwik Singh Nagpal') ?>,
            <strong><?= __('Shivam Kakkar')  ?> (<?= __('Threads Coordinator')?>)</strong>,
            <strong><?= __('Vishal Batchu')  ?> (<?= __('Threads Coordinator')?>)</strong>,
            <strong><?= __('Anshul Singhal')  ?> (<?= __('Server Admin')?>)</strong>,
            <?= __('Tanuj Khattar') ?>
        </p>
    </div>
</div>
<div>
    <div class="row">
        <div class="col6">
            <h2 class="text-center"><?= __('Web and Server Team') ?></h2>
            <?php img('WebAndServer.jpg', false); ?>
            <div class="container">
                <p class="names">
                    <?= __('Mukul Hase') ?>,
                    <?= __('Adarsh Sanjeev') ?>,
                    <?= __('Anshul Singhal') ?>,
                    <?= __('Pinkesh Badjatiya') ?>,
                    <?= __('Aalekh Jain') ?>,
                    <?= __('Animesh Pathak') ?>
                </p>
            </div>
        </div>
        <div class="col6">
            <h2 class="text-center"><?= __('The Pulsation Team') ?></h2>
            <?php img('Pulsation.jpg', false); ?>
            <div class="container">
                <p class="names">
                    <?= __('Aalekh Jain') ?>,
                    <?= __('Shubham Rai') ?>,
                    <?= __('Harshil Jain') ?>,
                    <?= __('Diplav') ?>,
                    <?= __('Parv Parkhiya') ?>,
                    <?= __('Akanksha Baranwal') ?>,
                    <?= __('Pooja Guhan') ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="row">
        <div class="col6">
            <h2 class="text-center"><?= __('The Marketing Team') ?></h2>
            <?php img('Marketing.jpg'); ?>
            <div class="container text-center">
                <p class="names">
                    <strong><?= __('First row') ?></strong>:<br>
                    <?= __('Divanshu Jain') ?>,
                    <?= __('Sri Aurobindo Munagala') ?>,
                    <?= __('Apaar Agrawal') ?>,
                    <?= __('Aayush Deva') ?>
                </p>
                <p class="names">
                    <strong><?= __('Second row') ?></strong>:<br>
                    <?= __('Devansh Manu') ?>,
                    <?= __('Mayank Modi') ?>,
                    <?= __('Himakar Yv') ?>,
                    <?= __('Pranav Basin') ?>
                </p>
            </div>
        </div>
        <div class="col6">
            <h2 class="text-center"><?= __('The Sponsorship Team') ?></h2>
            <?php img('Sponsorship.jpg'); ?>
            <div class="container text-center">
                <p class="names">
                    <?= __('Anirudh Sharma') ?>,
                    <?= __('Nishant Gupta') ?>,
                    <?= __('Aayush Aanand') ?>,
                    <?= __('Rahul Nahata') ?>,
                    <?= __('Sidhant Subramanian') ?>,
                    <?= __('Arihant Jain') ?>
                    <?= __('Sai Sahith Nama') ?>,
                    <?= __('Seshadri Reddy') ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div>
    <h2 class="text-center"><?= __('The Kalakshetra Team') ?></h2>
    <div class="row">
        <div class="col10 offset1">
            <?php img('Kalashetra.jpg', false); ?>
        </div>
    </div>
    <div class="container text-center">
        <p class="names">
            <strong><?= __('First row') ?></strong>:<br>
            <?= __('PG Harsha') ?>,
            <?= __('Varshit Battu') ?>,
            <?= __('Nishanth Reddy') ?>,
            <?= __('Harshavardhan Bandi') ?>,
            <?= __('Himakar Yv') ?>
        </p>
        <p class="names">
            <strong><?= __('Second row') ?></strong>:<br>
            <?= __('Apaar agrawal') ?>,
            <?= __('Ankur jain') ?>,
            <?= __('vikas thamizharasan') ?>,
            <?= __('Rishith Reddy') ?>,
            <?= __('Rohith Punati') ?>
        </p>
        <p class="names">
            <strong><?= __('Third row') ?></strong>:<br>
            <?= __('Aiswarya Sunil') ?>,
            <?= __('Sailaja') ?>,
            <?= __('Vaishnavi Reddy') ?>,
            <?= __('Surya Soujanya') ?>,
            <?= __('Vanalata Bulusu') ?>
        </p>
    </div>
</div>
<div>
    <div class="row">
        <div class="col6">
            <h2 class="text-center"><?= __('The LitCafe Team') ?></h2>
            <?php img('Litcafe.jpg', false); ?>
            <div class="container text-center">
                <p class="names">
                    <?= __('Mayank Modi') ?>,
                    <?= __('Parv parkhiya') ?>,
                    <?= __('Vivek iyer') ?>,
                    <?= __('Alok debnath') ?>,
                    <?= __('Neelesh') ?>,
                    <?= __('Vishnu') ?>
                </p>
            </div>
        </div>
        <div class="col6">
            <h2 class="text-center"><?= __('The Sports Team') ?></h2>
            <?php img('Sports.jpg', false); ?>
            <div class="container text-center">
                <p class="names">
                    <?= __('Allen Jojo') ?>,
                    <?= __('Dipankar Jain') ?>,
                    <?= __('Siddharth Gairola') ?>,
                    <?= __('Vinay singh') ?>,
                    <?= __('Swapnil') ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div>
    <h2 class="text-center"><?= __('The Cultural Team') ?></h2>
    <div class="row">
        <div class="col10 offset1">
            <?php img('Cultural.jpg', false); ?>
        </div>
    </div>
</div>
<div>
    <div class="row">
        <div class="col6">
            <h2 class="text-center"><?= __('The MUN Team') ?></h2>
            <?php img('MUN.jpg', false); ?>
        </div>
        <div class="col6">
            <h2 class="text-center"><?= __('The Zombiezone Team') ?></h2>
            <?php img('Zombiezone.jpg', false); ?>
        </div>
    </div>
</div>
<div>
    <h2 class="text-center"><?= __('The Complete Family') ?></h2>
    <div class="row">
        <div class="col10 offset1">
            <?php img('Team.jpg', false); ?>
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
