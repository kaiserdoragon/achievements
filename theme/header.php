<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="<?php if (wp_title('', false)): ?><?php bloginfo('name'); ?>の<?php echo trim(wp_title('', false)); ?>のページです。<?php endif; ?><?php bloginfo('description'); ?>">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-touch-icon.png">
	<?php wp_head(); ?>
</head>

<body>
	<div class="wrap">
		<header class="header">
			<div class="container">
				<h1 class="header--logo">
					<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="トータルスマート株式会社" width="139" height="29"></a>
				</h1>
				<h2>制作実績サイト</h2>
				<button id="js-gnav_btn" class="gnav_btn">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<nav id="js-gnav" class="gnav">
					<?php
					$categories = get_the_category();

					if (! empty($categories)) {
						echo '<ul>';
						foreach ($categories as $category) {
							$cat_link = get_category_link($category->term_id);
							if (! is_wp_error($cat_link)) {
								echo '<li><a href="' . esc_url($cat_link) . '">'
									. esc_html($category->name) .
									'</a></li>';
							}
						}
						echo '</ul>';
					}
					?>

				</nav>
			</div>
		</header>