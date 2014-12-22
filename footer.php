    <footer>
        <div class="container">
            <p>&copy; Cloth 2014</p>
        </div>
    </footer>
    <script src="js/vendor/jquery-1.11.0.min.js"></script>
    <!-- <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script> -->

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/jquery.cycle2.js"></script>

    <script src="js/vendor/jquery.elevateZoom-3.0.8.min.js"></script>

    <script src="js/main.js"></script>

    <script>
        //initiate the plugin and pass the id of the div containing gallery images
        $("#product_main_image").elevateZoom({
            gallery:'product_gallery',
            cursor: 'pointer',
            galleryActiveClass: 'active',
            imageCrossfade: true,
            loadingIcon: '',
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500,
            lensFadeIn: 500,
            lensFadeOut: 500
        });
        //pass the images to Fancybox
        $("#product_main_image").bind("click", function(e) {
            var ez = $('#product_main_image').data('elevateZoom');
            $.fancybox(ez.getGalleryList());
            return false;
        });
    </script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        // (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        // function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        // e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        // e.src='//www.google-analytics.com/analytics.js';
        // r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        // ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
</body>
</html>