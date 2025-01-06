<?php

include_once 'includes/constants.php';
include_once 'includes/shortcodes.php';
include_once 'includes/helpers.php';
include_once 'includes/api.php';
include_once "includes/classes/TcFinance.php";



/*==================================================================================
  SETTINGS
==================================================================================*/
require get_template_directory() . '/library/function-settings.php';

/*==================================================================================
  OLD SETTINGS
==================================================================================*/
require get_template_directory() . '/library/function-v1.php';

/*==================================================================================
  AJAX
==================================================================================*/
require get_template_directory() . '/library/function-ajax.php';

/*==================================================================================
  API SETTINGS
==================================================================================*/
require get_template_directory() . '/library/function-api.php';

/*==================================================================================
  CPT
==================================================================================*/
require get_template_directory() . '/library/function-cpt.php';

/*==================================================================================
  ADCAR this is the function calling the adcar and updating the DB
==================================================================================*/
require get_template_directory() . '/library/function-adcar.php';

/*==================================================================================
  DEV
==================================================================================*/
require get_template_directory() . '/library/function-login.php';

/*==================================================================================
  DEV
==================================================================================*/
require get_template_directory() . '/library/function-dev.php';

/*==================================================================================
  ACF
==================================================================================*/
require get_template_directory() . '/library/function-acf.php';



if ($_GET['flush']) {
  flush_rewrite_rules();
}
