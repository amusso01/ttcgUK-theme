<?php
/**
 * The standard one column page layout
 *
 * Template Name: Standard one column page layout
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

get_header();
?>

<main class="fdry-main fdry-main__standard-page">
  <div class="content-max content-block">
    <div class="container">
      <h1 class="fdry-main__standard-page-title"><?= get_the_title() ?></h1>
      <div class="fdry-main__standard-page-content">
        <?php  the_content() ?>
      </div>
    </div>
  </div>
</main>



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
get_footer();
