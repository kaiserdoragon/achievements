<?php get_header(); ?>
<main>

  <div class="top_info">
    <?php
    $args = array(
      'posts_per_page' => -1,
      'post_type' => 'post', //postは通常の投稿機能
      'post_status' => 'publish'
    );
    $my_posts = get_posts($args);
    ?>
    <dl class="top_info--list">
      <?php foreach ($my_posts as $post): setup_postdata($post); ?>
        <dt class="top_info--time">
          <?php the_time('Y.m.j'); ?>
        </dt>
        <?php $siteurl = get_field('siteurl'); ?>
        <dd>
          <?php if ($siteurl) : ?>
            <a href="<?php echo esc_url($siteurl); ?>"><?php the_title(); ?></a>
          <?php else : ?>
            <?php the_title(); ?>
          <?php endif; ?>
        </dd>
      <?php endforeach; ?>
    </dl>
    <?php wp_reset_postdata(); ?>
  </div>
</main>
<?php get_footer(); ?>