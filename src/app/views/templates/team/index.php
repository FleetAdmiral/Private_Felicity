<?php $this->load_fragment('skeleton_template/header'); ?>
<div class="linkholder">
  <div class="links">
    <li><a onclick="showPage('about')">About Us</a></li>
    <li class="selected"><a onclick="showPage('team')">Team</a></li>
  </div>
</div>
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
            <!-- <?php img('FCs.jpg'); ?> -->
        </div>
    </div>
    <div class="container">
        <p class="names">
            <?= __('Himakar Yv') ?>,
            <?= __('Apaar Agrawal') ?>,
            <?= __('Parth Shrivastava') ?>
        </p>
    </div>
</div>
<div>
    <div class="row">
        <div class="col6">
            <h2 class="text-center"><?= __('Core Team') ?></h2>
            <!-- <?php img('CoreTeam.jpg'); ?> -->
            <div class="container">
                <p class="names">
                    <!-- <strong><?= __('First row') ?></strong>:<br> -->
                    <?= __('Himakar Yv') ?>,
                    <?= __('Apaar Agrawal') ?>,
                    <?= __('Parth Shrivastava') ?>
                </p>
                <!-- <p class="names">
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
                </p> -->
            </div>
        </div>
        <div class="col6">
            <h2 class="text-center"><?= __('Finance Council') ?></h2>
            <!-- <?php img('FinanceC.jpg'); ?> -->
            <div class="container">
                <p class="names">
                    <?= __('Pranav Bhasin') ?>,
                    <?= __('Pooja Guhan') ?>
                </p
            </div>
        </div>
    </div>
</div>
<div>
    <h2 class="text-center"><?= __('The Threads Team') ?></h2>
    <div class="row">
        <div class="col11 offset-half">
            <!-- <?php img('Threads.jpg'); ?> -->
        </div>
    </div>
    <div class="container">
        <p class="names">
            <!-- <strong><?= __('First row') ?></strong>:<br> -->
            <?= __('Rishabh Arora') ?>,
            <?= __('Manas Kumar Verma') ?>,
            <?= __('Nikhil Rayaprolu') ?>
        </p>
        <!-- <p class="names">
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
        </p> -->
    </div>
</div>
<div>
    <div class="row">
        <div class="col6">
            <h2 class="text-center"><?= __('Web and Server Team') ?></h2>
            <!-- <?php img('WebAndServer.jpg', false); ?> -->
            <div class="container">
                <p class="names">
                    <?= __('Megh Parikh') ?>,
                    <?= __('Kartikey Pant') ?>,
                    <?= __('Jyotish') ?>,
                    <?= __('Anubhab Sen') ?>,
                    <?= __('Pranav Nair') ?>,
                    <?= __('Somu Bhargava') ?>
                </p>
            </div>
        </div>
        <div class="col6">
            <h2 class="text-center"><?= __('The Pulsation Team') ?></h2>
            <!-- <?php img('Pulsation.jpg', false); ?> -->
            <div class="container">
                <p class="names">
                    <?= __('Pooja Guhan') ?>,
                    <?= __('Adarsh Pal Singh') ?>,
                    <?= __('Alakh Desai') ?>
                    <!-- <?= __('Diplav') ?>,
                    <?= __('Parv Parkhiya') ?>,
                    <?= __('Akanksha Baranwal') ?>,
                    <?= __('Pooja Guhan') ?> -->
                </p>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="row">
        <div class="col6">
            <h2 class="text-center"><?= __('The Marketing Team') ?></h2>
            <!-- <?php img('Marketing.jpg'); ?> -->
            <div class="container text-center">
                <p class="names">
                    <!-- <strong><?= __('First row') ?></strong>:<br> -->
                    <?= __('Rohan Raavi Tiwari') ?>,
                    <?= __('Gokul B Nair') ?>,
                    <?= __('Rachna Konigari') ?>
                    <!-- <?= __('Aayush Deva') ?> -->
                </p>
                <!-- <p class="names">
                    <strong><?= __('Second row') ?></strong>:<br>
                    <?= __('Devansh Manu') ?>,
                    <?= __('Mayank Modi') ?>,
                    <?= __('Himakar Yv') ?>,
                    <?= __('Pranav Basin') ?>
                </p> -->
            </div>
        </div>
        <div class="col6">
            <h2 class="text-center"><?= __('The Sponsorship Team') ?></h2>
            <!-- <?php img('Sponsorship.jpg'); ?> -->
            <div class="container text-center">
                <p class="names">
                    <?= __('Srujay Reddy') ?>,
                    <?= __('Aakash Mittal') ?>,
                    <?= __('Eavanshi Arora') ?>,
                    <?= __('Vivek Jain') ?>
                    <!-- <?= __('Sidhant Subramanian') ?>,
                    <?= __('Arihant Jain') ?>
                    <?= __('Sai Sahith Nama') ?>,
                    <?= __('Seshadri Reddy') ?> -->
                </p>
            </div>
        </div>
    </div>
</div>
<div>
    <h2 class="text-center"><?= __('The Kalakshetra Team') ?></h2>
    <div class="row">
        <div class="col10 offset1">
            <!-- <?php img('Kalashetra.jpg', false); ?> -->
        </div>
    </div>
    <div class="container text-center">
        <p class="names">
            <!-- <strong><?= __('First row') ?></strong>:<br> -->
            <?= __('Vanalata Bulusu') ?>,
            <?= __('Vaishnavi Reddy') ?>,
            <?= __('Vedant Sareen') ?>,
            <?= __('Aiswarya Sunil') ?>,
            <?= __('Aayush Sanghvi') ?>
        </p>
        <!-- <p class="names">
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
        </p> -->
    </div>
</div>
<div>
    <div class="row">
        <div class="col6">
            <h2 class="text-center"><?= __('The LitCafe Team') ?></h2>
            <!-- <?php img('Litcafe.jpg', false); ?> -->
            <div class="container text-center">
                <p class="names">
                    <?= __('Neelesh Agrawal') ?>,
                    <?= __('Vivek Iyer') ?>,
                    <?= __('Aditya Srivastava') ?>,
                    <?= __('Sathvik') ?>,
                    <?= __('Vanalata Bulusu') ?>,
                    <?= __('Aditya Morolia') ?>
                </p>
            </div>
        </div>
        <div class="col6">
            <h2 class="text-center"><?= __('The Sports Team') ?></h2>
            <!-- <?php img('Sports.jpg', false); ?> -->
            <div class="container text-center">
                <p class="names">
                    <?= __('Eashwar Subramanian') ?>,
                    <?= __('Abhishek Kumar') ?>,
                    <?= __('Aashay Singhal') ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div>
    <h2 class="text-center"><?= __('The Cultural Team') ?></h2>
    <div class="row">
        <div class="col10 offset1">
            <!-- <?php img('Cultural.jpg', false); ?> -->
            <div class="container text-center">
                <p class="names">
                    <?= __('Aayush Tiwari') ?>,
                    <?= __('Sravan Mylavarapu') ?>,
                    <?= __('Sreya Mittal') ?>,
                    <?= __('Sailaja Nimmagadda') ?>,
                    <?= __('Nakul Vaidya') ?>,
                    <?= __('Bhavya Lahiri') ?>,
                    <?= __('Prakrati Dangarh') ?>,
                    <?= __('Yash Goyal') ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="row">
        <div class="col6">
            <h2 class="text-center"><?= __('The Parliamentary Debate Team') ?></h2>
            <!-- <?php img('MUN.jpg', false); ?>  -->
            <div class="container text-center">
                <p class="names">
                    <?= __('Aditya Bharti') ?>,
                    <?= __('Alok Debnath') ?>,
                    <?= __('Tanmai Khanna') ?>
                </p>
            </div>
        </div>
        <div class="col6">
            <h2 class="text-center"><?= __('The Zombiezone Team') ?></h2>
            <!--<?php img('Zombiezone.jpg', false); ?>  -->
            <div class="container text-center">
                <p class="names">
                    <?= __('Aman Mehta') ?>,
                    <?= __('Marchala Sreevatsava') ?>,
                    <?= __('Anam Raihan') ?>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- <div> -->
    <!-- <h2 class="text-center"><?= __('The Complete Family') ?></h2> -->
    <!-- <div class="row"> -->
        <!-- <div class="col10 offset1"> -->
            <!-- <?php img('Team.jpg', false); ?>  -->
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->
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
