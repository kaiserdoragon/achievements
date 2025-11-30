<?php get_header(); ?>
<div class="eyecatch">
  <?php
  if (is_category()) {
    $term = get_queried_object();

    if ($term instanceof WP_Term) {
      echo '<p>' . esc_html($term->name) . 'の制作一覧</p>';
    }
  }
  ?>
</div>

<main>
  <div class="top_info--wrap">
    <div class="top_info">
      <?php if (have_posts()) : ?>
        <ul class="top_info--list">
          <?php while (have_posts()) : the_post(); ?>
            <?php
            // ACF
            $siteurl  = get_field('siteurl');
            $has_link = ! empty($siteurl);
            ?>
            <li>
              <?php if ($has_link) : ?>
                <a href="<?php echo esc_url($siteurl); ?>" target="_blank" rel="noopener noreferrer">
                <?php endif; ?>

                <div class="top_info--img">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/thumbnail.jpg" alt="" width="1280" height="720">
                  <?php endif; ?>
                </div>

                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                  <?php echo esc_html(get_the_date('Y.m.d')); ?>
                </time>

                <p><?php the_title(); ?>様</p>

                <?php if ($has_link) : ?>
                </a>
              <?php endif; ?>
            </li>
          <?php endwhile; ?>
        </ul>

        <div class="pagination">
          <?php
          // 使っているテーマの関数に合わせて
          if (function_exists('wp_pagination')) {
            wp_pagination();
          } else {
            the_posts_pagination();
          }
          ?>
        </div>

      <?php else : ?>
        <p>投稿がありません。</p>
      <?php endif; ?>
      <a class="toppage_link" href="<?php echo esc_url(home_url('/')); ?>">TOPページに戻る</a>
    </div>



  </div>
</main>
<?php get_footer(); ?>