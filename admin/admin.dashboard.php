<?php
function mycarousel_admin_page(){
  // check user capabilities
  if ( ! current_user_can( 'manage_options' ) ) {
    return;
  }

  // Get the active tab from the $_GET param
  $default_tab = null;
  $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;

  ?>
  <!-- Our admin page content should all be inside .wrap -->
  <div class="wrap">
    <div class="tab-content">
    <?php switch($tab) :
      case 'carousel-edit':
        require_once 'tabs/carousel-edit.php';
        break;
      case 'carousel-delete':
        require_once 'tabs/carousel-delete.php';
        break;
      default:
        require_once 'tabs/general.php';
        break;
    endswitch; ?>
    </div>
  </div>
  <?php
}
?>