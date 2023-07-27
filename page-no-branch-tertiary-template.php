<?php
/**
 * The tertiary page template file
 *
 * Template Name: No Branch Tertiary Page
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */
global $noBranch;
$noBranch = true;

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

