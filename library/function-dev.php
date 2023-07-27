<?php 

/**
 * Functions used for development purposes.
 *
 * @author      Andrea Musso
 *
 */


 /*=======================================================
Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 CODING TOOLKIT
    1.1 debug / dump'n die
    1.2 Return svg from ACF file field
    1.3 variables
    1.4 string shortener
    1.5 browser check
    1.6 environment check

  3.0 ACCESS TOOLKIT
    3.1 login page
    3.2 logged-in-only
=======================================================*/

/*==================================================================================
  1.0 CODING TOOLKIT
==================================================================================*/


/* 1.1 DEBUG / DUMP'N DIE
/––––––––––––––––––––––––*/
function debug($var) {
  echo '<pre>'.var_dump($var).'</pre>';
}
function dd($var) {
  echo '<pre>'.var_dump($var).'</pre>';
  die();
}


/* 1.2 Return svg from ACF file field
/––––––––––––––––––––––––*/
function acfFile_toSvg($file){
	if($file)
    return str_replace('\'', '',  var_export(file_get_contents($file), true));
}


/* 1.3 VARIABLES
/––––––––––––––––––––––––*/


/* 1.4 STRING SHORTENER
/––––––––––––––––––––––––*/
// shorten strings and append ...
function shorten($string,$length,$append="...") {
    $string = trim($string);
    if(strlen($string) > $length) {
      $string  = substr($string, 0, $length);
      $string .= $append;
    }
    return $string;
}





/*==================================================================================
  3.0 ACCESS TOOLKIT
==================================================================================*/


 // Print the image's srcset for lazyload
 function bml_the_image_srcset( $image_id, $echo = true ) {

  if ( !$image_id ) return;

  $image_labels = [ 'size_400', 'size_600', 'size_800', 'size_1000', 'size_1200', 'size_1400', 'size_1600', 'size_1800', 'full' ];
  $image_set = [];

  foreach ( $image_labels as $image_label ) {

    $image = wp_get_attachment_image_src( $image_id, $image_label );
    $image_url = $image[0];
    $image_width = $image[1] <= 300 ? 301 : $image[1];

    $image_set[] =  $image_url . ' ' . ( $image_width - 300 ) . 'w' ;
  }

  $image_set = array_unique( $image_set );

  if ( $echo ) {
    echo implode( ', ', $image_set );
  } else {
    return implode( ', ', $image_set );
  }
  
}

