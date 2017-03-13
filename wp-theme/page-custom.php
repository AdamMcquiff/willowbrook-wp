<?php
/*
 Template Name: Custom Page Example
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

	<div class="content wrap cf">

		<main class="main m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

					<header class="article-header">

						<h1 class="page-title" itemprop="headline">
							<?php the_title(); ?>
						</h1>

						<p class="byline entry-meta vcard">
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

					<section class="entry-content cf" itemprop="articleBody">
						<?php the_content(); ?>
					</section>


					<footer class="article-footer cf">
						<p class="footer-comment-count">
							<?php comments_number(
								__('<span>No</span> Comments', 'theme_slug'),
								__('<span>One</span> Comment', 'theme_slug'),
								__('<span>%</span> Comments', 'theme_slug')
							);?>
						</p>

						<p class="footer-category">
							<?php echo __('Categories:', 'theme_slug'); ?>
							<?php echo get_the_category_list(', '); ?>
						</p>

						<p class="footer-tags tags">
							<?php the_tags('Tags: ', ', ', ''); ?>
						</p>
					</footer>

					<?php // comments_template(); ?>

				</article>

			<?php endwhile; else : ?>

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
