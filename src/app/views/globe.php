<div class="cloud-parent" style="position:absolute; top:100%;left:50%;z-index:2;">
    <?php
    for ($i = 1; $i <= 15; $i++) {
        ?>
        <div style="transform: rotate( <?= rand(1,360) ?>deg);">
            <div class="cloud globe" style="
                    position:absolute;
                    animation-duration: <?=35+rand(-5,5)?>s !important;
                    top: 100%;
                    left: 50%;
                    ">
                <img src="<?= base_url() ?>static/images/cloud<?=rand(1,3)?>.png" class="cloud-img" style="
                        position: relative;
                        z-index:2;
                        transform: translate(-50%, -50%);
                        bottom:<?=28+ rand(-5,5) ?>vw;
                        width:9vw; height: auto; opacity: 80%;">
            </div>
        </div>
        <?php
}
?>
</div>
<img src="<?= base_url() ?>static/images/world.png" class="globe" style="
z-index:2;
position:absolute;
left:50%;
width: 50vw;
height: auto;
top:100%;
transform: translate(-50%, -50%);">
