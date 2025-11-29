<?php get_header(); ?>
<div class="eyecatch">
  <?php
  if (is_category()) {
    $term = get_queried_object();

    if ($term instanceof WP_Term) {
      echo '<h1>' . esc_html($term->name) . 'の記事一覧</h1>';
    }
  }
  ?>
</div>
<div class="has_sidebar news_page">
  <main>
    <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
    <section class="post_excerpt">
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="post_excerpt--img">
        <?php if (has_post_thumbnail()): ?>
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
          </a>
          <?php else: // サムネイルを持っていない 
          ?><?php endif; ?>
      </div>
      <div class="post_excerpt--txt">
        <div class="post_meta">
          <time class="post_meta--date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
        </div>
      </div>
    </section>
    <?php endwhile; ?><?php endif; ?>
    <div class="pagination">
      <?php wp_pagination(); ?>
    </div>
  </main>
</div>
<?php get_footer(); ?>