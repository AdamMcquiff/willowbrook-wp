<!DOCTYPE html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title(''); ?></title>

	<meta name="HandheldFriendly" content="true">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="apple-touch-icon" sizes="57x57" href="library/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="library/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="library/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="library/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="library/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="library/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="library/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="library/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="library/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="library/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="library/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="library/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="library/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="library/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="library/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php head(); ?>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', '<?php // TODO: add analytics code ?>', 'auto');
		ga('send', 'pageview');
	</script>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

	<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

		<div class="header__top">
			<div class="header__logo cf" itemscope itemtype="http://schema.org/Organization">
				<a href="<?php echo home_url(); ?>" rel="nofollow">
					<?php bloginfo('name'); ?>
				</a>
			</div>

			<p><?php bloginfo('description'); ?></p>
		</div>

		<nav class="header__nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<?php wp_nav_menu(array(
		         'container' => false,                           // remove nav container
		         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
		         'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
		         'menu_class' => 'nav cf',               		 // adding custom nav class
		         'theme_location' => 'main-nav',                 // where it's located in the theme
		         'before' => '',                                 // before the menu
	               'after' => '',                                  // after the menu
	               'link_before' => '',                            // before each link
	               'link_after' => '',                             // after each link
	               'depth' => 0,                                   // limit the depth of the nav
		         'fallback_cb' => ''                         	 // fallback function (if there is one)
			)); ?>
		</nav>

	</header>
