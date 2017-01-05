<?php $this->load_fragment('skeleton_template/header', ['title' => __('Gallery')]); ?>
<div style="height: 100%; width: 100%;">
    <section id="photostack-1" class="photostack">
    <div id="inner">
      
    </div>
  </section>
  </div>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>static/styles/vendor/component.css" />
  <script src="<?= base_url() ?>static/scripts/vendor/modernizr.min.js"></script>
  <script src="<?= base_url() ?>static/scripts/vendor/classie.js"></script>
  <script src="<?= base_url() ?>static/scripts/vendor/photostack.js"></script>

  <script>
    var stack = document.getElementById('photostack-1')
    var galleryImages = [
          "6.jpg","HairPainting.jpg","old_87.jpg","old_85.jpg","old_84.jpg",
          "old_83.jpg","old_79.jpg","old_74.jpg","old_55.jpg","old_53.jpg",
          "old_41.jpg","old_40.jpg","old_39.jpg","old_38.jpg","old_35.jpg",
          "old_34.jpg","old_30.jpg","IMG_2286.jpg","IMG_0263.jpg","IMG_0227.jpg",
          "IMG_0132.jpg","9.jpg","8.jpg","7.jpg","5.jpg","4.jpg","old_88.jpg",
          "3.jpg","22.jpg","21.jpg","20.jpg","2.jpg","19.jpg","18.jpg","17.jpg",
          "16.jpg","15.jpg","14.jpg","13.jpg","12.jpg","11.jpg","10.jpg","1.jpg"
      ]
    var getImage = function(imageName) {
          var F = document.createElement("figure");
          var I = document.createElement("img");
          I.src = baseUrl + 'static/images/gallery/' + imageName;
          I.alt = 'gallery thumbnail';

          // I.onload = placeThumb;
          F.appendChild(I);
          $("#inner").append(F);

      };
      for(var i in galleryImages){
        getImage(galleryImages[i]);
      }
     photostack = new Photostack(stack);
     setTimeout(function(){photostack._resizeHandler();},100);
     function changePhoto(dir){
        
        if(dir==37){
          if (photostack.current == 0){
          photostack._showPhoto(photostack.allItemsCount-1);
          return;}
          photostack._showPhoto( photostack.current - 1 );
        }else if(dir==39){
          if (photostack.current == photostack.allItemsCount-1){
          photostack._showPhoto(0);
          return;}
          photostack._showPhoto( photostack.current + 1 );
        }
     }
     document.addEventListener('keyup', function(e) {
      changePhoto(e.keyCode);
     });
  </script>

<?php $this->load_fragment('skeleton_template/footer'); ?>
<?php if (!$is_ajax): ?>
<script>
    (function() {
        $('#toggle').removeClass('i');
        $('.toggle-contact').css('display', 'none');
    })();
</script>
<?php endif; ?>
