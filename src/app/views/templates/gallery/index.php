<?php $this->load_fragment('skeleton_template/header', ['title' => __('Gallery')]); ?>
<div style="position:absolute; height: 100%; width: 100%;">
  <div class="slideshow">
    <div class="slider slider-1">
    </div>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/styles/vendor/component.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/styles/vendor/slick.css" />
  <script src="<?= base_url() ?>static/scripts/vendor/modernizr.min.js"></script>
  <script src="<?= base_url() ?>static/scripts/vendor/slick.min.js"></script>
  <script src="<?= base_url() ?>static/scripts/vendor/classie.js"></script>
  <script src="<?= base_url() ?>static/scripts/vendor/photostack.js"></script>
  <script src="<?= base_url() ?>static/scripts/vendor/jquery.min.js"></script>
  <script src="<?= base_url() ?>static/scripts/vendor/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>static/scripts/vendor/slick.min.js"></script>
  <script>
    // var stack = document.getElementById('photostack-1')
    var galleryImages = [
          "1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg",
           // "6.jpg", "7.jpg", "8.jpg", "9.jpg", "10.jpg",
          // "11.jpg", "12.jpg", "13.jpg", "14.jpg", "15.jpg", "16.jpg", "17.jpg", "18.jpg", "19.jpg",
          // "20.jpg", "21.jpg", "22.jpg", "23.jpg", "24.jpg", "25.jpg", "26.jpg", "27.jpg"
      ]
    var getImage = function(imageName) {
          var F = document.createElement("div");
          F.className = 'item';
          var I = document.createElement("img");
          I.src = baseUrl + 'static/images/gallery/' + imageName;
          I.alt = 'gallery thumbnail';

          // I.onload = placeThumb;
          F.appendChild(I);
          $(".slider-1").append(F);
      };
      for(var i in galleryImages){
        getImage(galleryImages[i]);
      }
     // photostack = new Photostack(stack);
     // setTimeout(function(){photostack._resizeHandler();},100);

     // function changePhoto(dir){
     //    if(dir==37){
     //      if (photostack.current == 0){
     //      photostack._showPhoto(photostack.allItemsCount-1);
     //      return;}
     //      photostack._showPhoto( photostack.current - 1 );
     //    }else if(dir==39){
     //      if (photostack.current == photostack.allItemsCount-1){
     //      photostack._showPhoto(0);
     //      return;}
     //      photostack._showPhoto( photostack.current + 1 );
     //    }
     // }

    function slideshow() {
      // clone
      $('.slider-1').clone().removeClass('slider-1').addClass('slider-2').insertAfter($('.slider'));
    
      // set first
      $('.slider-1').slick({
        draggable: false,
        dots: false,
        infinite: true,
        responsive: true,
        asNavFor: '.slider-2',
        touchThreshold: 20,
        speed: 1000,
        fade: true
      });
    
      // set second
      $('.slider-2').slick({
        dots: true,
        infinite: true,
        responsive: true,
        asNavFor: '.slider-1',
        arrows: false,
        speed: 1000,
        easing: 'easeInOutQuart'
      });
    }

    function play() {
      setTimeout(function() {
        $('.slider-1 .slick-next').click();
        play();
      }, 5000);    	
    }

    $(function() {
      slideshow();
    	play();
    })


     // document.addEventListener('keyup', function(e) {
      // changePhoto(e.keyCode);
     // });
  </script>

<?php $this->load_fragment('skeleton_template/footer'); ?>
<?php if (!$is_ajax): ?>
<script>
    (function() {
        $('#toggle').removeClass('i');
        $('.btn-box').css('display', 'none');
    })();
</script>
<?php endif; ?>
