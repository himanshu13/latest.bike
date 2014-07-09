        <?php
        if (of_get_option('ticker_categories') == 0) {
        $ticker_arg = array('showposts' => of_get_option('newsticker_num'));
        } else {
        $ticker_arg = array('showposts' => of_get_option('newsticker_num'), 'category__in' => array(of_get_option('ticker_categories')));
        }
        $ticker_query = null;
        $ticker_query = new WP_Query($ticker_arg);
		echo '<ul id="scroller">';
        while ($ticker_query->have_posts()) {
        $ticker_query->the_post();
        ?>
        <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php } wp_reset_query();?>
        </ul>

   

