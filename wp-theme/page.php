<?php get_header(); ?>

	<div class="content wrap cf">

		<main class="main m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

					<?php // Use to get 'Feature Image URL' ?>
					<?php // echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>

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

					</footer>

					<?php comments_template(); ?>

				</article>

			<?php endwhile; endif; ?>

		</main>

		<aside class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">

			<?php get_sidebar(); ?>

		</aside>

	</div>

<?php get_footer(); ?>
