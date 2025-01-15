<?php
require_once "admin.functions.php";

function mycarousel_admin_page(){
  // check user capabilities
  if ( ! current_user_can( 'manage_options' ) ) {
    return;
  }

  //Get the active tab from the $_GET param
  $default_tab = null;
  $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;

  ?>
  <!-- Our admin page content should all be inside .wrap -->
  <div class="wrap">
    <!-- Print the page title -->
    <!-- <h1><?php echo esc_html( get_admin_page_title() ); ?></h1> -->
    <!-- Here are our tabs -->
    <!-- <nav class="nav-tab-wrapper">
      <a href="?page=my-carousel" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">Content</a>
      <a href="?page=my-carousel&tab=translate" class="nav-tab <?php if($tab==='translate'):?>nav-tab-active<?php endif; ?>">Translate</a>
      <a href="?page=my-carousel&tab=settings" class="nav-tab <?php if($tab==='settings'):?>nav-tab-active<?php endif; ?>">Settings</a>
    </nav> -->

    <div class="tab-content">
    <?php switch($tab) :
      // case 'settings':
      //   echo 'Settings. Add required shortcode to menu to be able to change languages --> [my-dictionary-menu-language-switcher]'; //Put your HTML here
      //   break;
      // case 'translate':
      //   require_once 'tabs/translate/translate.php';
      //   break;
      case 'carousel-edit':
        require_once 'tabs/carousel-edit.php';
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