<?php
/**
 * Template Name: Congratulations
 * The thank you page template file
 * 
 * Template Post Type: page
 *
 * @package Strapped
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $noBranch;
$noBranch = true;

get_header();

include 'page-tertiary-template.php';

?>
<script>
  window.dataLayer = window.dataLayer || [];
  window.dataLayer.push({
    'event': 'form_complete',
    'enhanced_conversion_data': {
      "email": "<?php echo $_SESSION['email']  ?>",
      "phone_number": "<?php echo $_SESSION['phone']  ?>"
    }
  });

</script>

<?php
