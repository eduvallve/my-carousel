<?php
/**
 * Remove selected carousel
 */

 if (isset($_GET) && isset($_GET['carousel-id']) && $_GET['carousel-id'] !== '') {
   deleteCarousel($_GET['carousel-id']);
   global $wp;
   $homeUrl = home_url( $wp->request )
   ?>
   <script>
      window.location.href = `<?php echo $homeUrl; ?>/wp-admin/admin.php?page=my-carousel`;
   </script>
   <?php
 }
 ?>