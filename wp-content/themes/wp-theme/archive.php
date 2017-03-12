<?php get_header(); ?>

	<div class="content wrap cf">

		<main class="main m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php the_archive_title('<h1 class="archive-title">', '</h1>'); ?>
			<?php the_archive_description('<div class="taxonomy-description">', '</div>'); ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

					<header class="entry-header article-header">

						<header class="article-header">
							<h2 class="entry-title">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>

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

					</header>

					<section class="entry-content cf">

						<?php the_post_thumbnail('bones-thumb-300'); ?>

						<?php the_excerpt(); ?>

					</section>

					<footer class="article-footer">

					</footer>

				</article>

			<?php endwhile; ?>

				<?php page_navi(); ?>

			<?php else : ?>

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
