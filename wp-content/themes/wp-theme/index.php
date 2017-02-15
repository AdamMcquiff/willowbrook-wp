<?php get_header(); ?>

	<div class="content wrap cf">

		<main class="main m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

					<header class="article-header">
						<h1 class="entry-title">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<?php the_title(); ?>
							</a>
						</h1>

						<p class="byline entry-meta vcard">
							<time class="updated entry-time" datetime="<?php the_time('Y-m-d') ?>" itemprop="datePublished">
								<?php the_time(get_option('date_format')) ?>
							</time>

							<span class="by">
								<?php echo __('by', 'wp-theme'); ?>
							</span>

							<span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">
								<?php the_author_link(); ?>
							</span>
						</p>
					</header>

					<section class="entry-content cf">
						<?php the_content(); ?>
					</section>

					<footer class="article-footer cf">
						<p class="footer-comment-count">
							<?php comments_number(
								__('<span>No</span> Comments', 'wp-theme'),
								__('<span>One</span> Comment', 'wp-theme'),
								__('<span>%</span> Comments', 'wp-theme')
							);?>
						</p>

						<p class="footer-category">
							Categories: <?php echo get_the_category_list(', '); ?>
						</p>

						<p class="footer-tags tags">
							<?php the_tags('Tags: ', ', ', ''); ?>
						</p>
					</footer>

				</article>

			<?php endwhile; ?>

				<?php page_navi(); ?>

			<?php else: ?>

				<article id="post-not-found" class="cf">
					<header class="article-header">
						<h1><?php _e('Oops, Post Not Found!', 'wp-theme'); ?></h1>
					</header>

					<section class="entry-content">
						<p><?php _e('Uh Oh. Something is missing. Try double checking things.', 'wp-theme'); ?></p>
					</section>

					<footer class="article-footer">
						<p><?php _e('This is the error message in the index.php template.', 'wp-theme'); ?></p>
					</footer>
				</article>

			<?php endif; ?>

		</main>

		<aside class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">

			<?php get_sidebar(); ?>

		</aside>

	</div>

<?php get_footer(); ?>
