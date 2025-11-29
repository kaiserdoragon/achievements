<?php get_header(); ?>
<main>

  <div class="top_info--wrap">
    <div class="top_info">
      <?php
      // 1. 現在のページ番号を取得
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      // 2. WP_Query用の引数設定
      $args = array(
        'posts_per_page' => 9,       // 1ページあたりの表示数
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'paged'          => $paged,   // ページ番号を渡す
      );

      // 3. WP_Query インスタンス作成
      $the_query = new WP_Query($args);
      ?>

      <?php if ($the_query->have_posts()) : ?>
        <ul class="top_info--list">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <?php
            // 投稿データをセット（ACF等の関数がそのまま使えます）
            $siteurl  = get_field('siteurl');
            $has_link = !empty($siteurl);
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

                <p>
                  <?php the_title(); ?>様
                </p>

                <?php if ($has_link) : ?>
                </a>
              <?php endif; ?>
            </li>
          <?php endwhile; ?>
        </ul>

        <div class="pagination">
          <?php wp_pagination(); ?>
        </div>

        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>

</main>
<?php get_footer(); ?>