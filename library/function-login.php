<?php 

/*==================================================================================
  5.0 SETUP LOGIN PAGE 
==================================================================================*/

$gFontUrl = "https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap";
$fontFamily = "'Lato', sans-serif";
$customLogo = get_stylesheet_directory_uri()."/dist/images/tcuk-logo.svg";
$mainColor = "#011025";

/* 2.6 LOGIN PAGE
/–––––––––––––––––––––––––––––––––*/
// Customize Logo URL.
add_filter( 'login_headerurl', 'my_custom_login_url' );
function my_custom_login_url() {
    return site_url( '/' );
}

// Style login page
function we_login_logo() { 
	GLOBAL $gFontUrl;
	GLOBAL $fontFamily;
	GLOBAL $customLogo;
	GLOBAL $mainColor;
    ?>
	<style type="text/css">
	<?php if($gFontUrl): ?>
		@import url('<?php echo $gFontUrl ?>');
	<?php endif; ?>

		body.login{
		<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
		<?php endif; ?>
		background-color:#011025;
		}
	
        #login h1 a, .login h1 a {
				background-image: url( <?php echo $customLogo ?>);
			background-repeat: no-repeat;
			background-size: 130px;
			width: 140px;
			height: 100px;
			<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
			<?php endif; ?>
        }
        body.login div#login form#loginform p.submit input#wp-submit {
			background-color: transparent;
			<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
			<?php endif; ?>
			color: black;
			text-shadow: none;
			box-shadow: none;
			border: 1px solid black;
			border-radius: 1px;
		}
		body.login div#login .message{
			border: 2px solid <?php echo $mainColor ?>;
		}
		body.login div#login form#loginform p.submit input#wp-submit:hover{
			background-color:<?php echo $mainColor ?>;
			color: #ffffff;
		}
        body.login div#login p#nav a:hover {
					color: #ffffff;
        }
        body.login div#login p#backtoblog a:hover {
            color: #ffffff;
        }
        body.login div#login form#loginform {
			border-radius: 5px;
			<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
			<?php endif; ?>
		}
		body.login div#login form#loginform input[type="text"]:focus, body.login div#login form#loginform input[type="password"]:focus {
			border-color: <?php echo $mainColor ?>;
			box-shadow: 0 0 0 1px <?php echo $mainColor ?>;
		}
		body.login div#login form#loginform div.wp-pwd button.button .dashicons{
			color:#ffffff;
		}

		.language-switcher .dashicons{
			color: #ffffff;
		}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'we_login_logo' );
