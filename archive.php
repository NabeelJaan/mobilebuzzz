<?php
/**
 * The template for displaying archive pages
 */

get_header();

?>

<div class="grid grid-cols-12">
    <div class="col-span-3">
        <h3>Filter By:</h3>
    </div>
    <div class="for_icon max-w-[1280px] mx-auto px-4 pb-16 xl:pb-24 xl:px-0 col-span-9">
        <div>
            <div class="grid gap-5 md:grid-cols-3 md:grid-flow-row md:gap-[20px] lg:grid-cols-6 lg:gap-8">
                <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            get_template_part('template-parts/content', 'archive');
                        endwhile;
                    else :
                        get_template_part('template-parts/content', 'none');
                    endif;
                ?>
            </div>
            <div>
                <?php
                    echo '<div class="pagination flex items-center justify-center mt-[24px]">';
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => __('«', 'mobilebuzzz'),
                        'next_text' => __('»', 'mobilebuzzz'),
                    ));
                    echo '</div>';
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>