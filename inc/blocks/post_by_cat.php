<section class="px-5 pt-20 xl:px-0">
    <div class="max-w-[1280px] mx-auto">
    
        <div class="flex justify-between mb-4 flex-cols md:flex-cols">
            <div>
                <h2 class="text-2xl font-bold text-[#0984e3]">
                    <?php the_field('post_cat_heading'); ?>
                </h2>
            </div>
            <div>
                <a class="flex items-center" href="#">
                    <p class="text-[14px] text-[#0984e3] font-semibold leading-[19px]">See all Latest Phones</p>
                    <svg class="w-[14px] h-[14.4px] ml-[10px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                </a>
            </div>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <?php 
            $pbc_cat_name = get_field('pbc_name');
           

            $args = array(
                'post_type'         => 'mobile',
                'posts_per_page'    => 6,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'brand',
                        'field'    => 'slug',
                        'terms'    => $pbc_cat_name,
                    ),
                ),
                'post_status'       => 'publish'
            );

            $the_query = new WP_Query($args);

            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post(); 
					$m_price = get_post_meta(get_the_ID(), 'm_price', true);
			?>
			 
                    <div class="border rounded-lg pt-5 pb-[15px] px-9 relative">
                        <svg class="w-6 absolute top-3 right-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/>
                        </svg>
                        <div>
                            <?php if (has_post_thumbnail()): ?>
                                <a href="<?php the_permalink(); ?>">
                                    <img 
                                        class="mx-auto relative"
                                        src="<?php the_post_thumbnail_url('featured-img', ['class' => 'w-full']); ?>"
                                        alt="<?php the_title_attribute(); ?>"
                                    >
                                </a>
                            <?php endif; ?>

                            <span class="bg-[#0984e3] absolute top-[56px] right-0 text-white font-4 pl-[15px] pr-[25px]">
                                <?php echo $m_price; ?>
                                <span class="text-[#ffffffb0]">Rs</span>
                            </span>
                        </div>

                        <p class="text-[14px] text-[#a80500] text-center mb-2">
                            <?php //echo get_field('availability') ? 'Available' : 'Not Available'; ?>
                        </p>

                        <div class="flex justify-center mb-[5px]">
                            <?php 
                            $rating = get_field('rating');
                            for ($i = 0; $i < 5; $i++): ?>
                                <svg class="w-4 fill-<?php echo $i < $rating ? '#ffdc64' : '#e2e8f0'; ?>" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                            <?php endfor; ?>
                        </div>
                        <h3 class="text-[14px] text-[#303f4a] font-semibold text-center">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                    </div>
                <?php endwhile;
            else : ?>
                <p>No mobiles found in this category.</p>
            <?php endif; 
            wp_reset_postdata(); ?>
        </div>
        
    </div>
</section>