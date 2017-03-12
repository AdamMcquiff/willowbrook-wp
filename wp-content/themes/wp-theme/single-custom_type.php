<?php
/*
 * CUSTOM POST TYPE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

	<div class="content wrap cf">

		<main class="main m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

					<header class="article-header">

						<h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>

						<p class="byline vcard">
							<time class="updated entry-time" datetime="<?php the_time('Y-m-d') ?>" itemprop="datePublished">
								<?php the_time(get_option('date_format')) ?>
							</time>

							<span class="by">
								<?php echo __('by', 'theme_slug'); ?>
							</span>

							<span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">
								<?php the_author_link(); ?>
							</span>
						</p>

					</header>

					<section class="entry-content cf">
						<?php the_content(); ?>
					</section>

					<footer class="article-footer">
						<p class="tags">
							<?php echo get_the_term_list(get_the_ID(), 'custom_tag') ?>
						</p>

						<span class="tags-title">
							<?php echo __('Custom Tags:', 'theme_slug'); ?>
						</span>
					</footer>

					<?php comments_template(); ?>

				</article>

			<?php endwhile; ?>

			<?php else: ?>

				<article id="post-not-found" class="cf">
					<header class="article-header">
						<h1><?php _e('Oops, Post Not Found!', 'theme_slug'); ?></h1>
					</header>

					<section class="entry-content">
						<p><?php _e('Uh Oh. Something is missing. Try double checking things.', 'theme_slug'); ?></p>
					</section>

					<footer class="article-footer">
						<p><?php _e('This is the error message in the index.php template.', 'theme_slug'); ?></p>
					</footer>
				</article>

			<?php endif; ?>

		</main>

		<aside class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">

			<?php get_sidebar(); ?>

		</aside>

	</div>

<?php get_footer(); ?>
