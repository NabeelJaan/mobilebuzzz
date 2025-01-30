<?php
get_header(); // Include the header

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

<div class="max-w-[1110px] mx-auto pt-8">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="px-5 lg:px-0 ">
    <div class="max-w-[1110px] mx-auto lg:flex justify-between">
        <div>

            <?php custom_breadcrumb(); ?>
                <?php if ( has_post_thumbnail() ):?>
                    <div class="">
                        <?php the_post_thumbnail('f-img', ['class' => 'w-full']); ?>
                    </div>
                <?php endif; ?>
        </div>
        <div>
            <div class="mt-[32px] lg:mt-0">
                <h1 class="text-[24px]"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <p class="text-[17px] leading-[23px] font-bold my-[5px]">
                    Price in Pakistan: <span class="text-[#b7070a]"> <?php the_field('m_price'); ?></span> PKR
                </p>
                <p class="text-[#b7070a] text-[16px] font-semibold">Available</p>
                <div class="flex mt-2 mb-[55px]">
                    <svg class="w-4 fill-[#ffdc64]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                    <svg class="w-4 fill-[#ffdc64]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                    <svg class="w-4 fill-[#ffdc64]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                    <svg class="w-4 fill-[#ffdc64]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                    <svg class="w-4 fill-[#ffdc64]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                </div>
                <div class="grid grid-cols-2 gap-5">

                    <?php if(have_rows('featured_specs')) : ?>
                        <?php while(have_rows('featured_specs')) : the_row(); ?>

                            <div class="flex items-center gap-4">

                                <img src="/wp-content/uploads/2024/08/camera-grp.png" alt="">

                                <p class="text-[#02243e] text-[13px] leading-[18px] font-semibold">
                                    <?php the_sub_field('feature_name'); ?>
                                    <span class="text-[#303F4A80]">
                                        <?php the_sub_field('feature_label'); ?>
                                    </span>
                                </p>
                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>
            
        </div>
    </div>
</div>

<div>
    <div class="container max-w-[1110px] mx-auto pt-16 mb-[25px]">
    <div class="lg:flex gap-[30px]">
            <div class="lg:w-[67%] max-w-[100%]">
                <div class="bg-[#f1f2f6] px-[22px] py-[17px] rounded-xl">
                    <div>
                        <h3 class="text-[24px] font-bold leading-[33px] text-[#02243e]">
                            <?php the_title(); ?>
                        </h3> 
                        <h4 class="text-[18px] font-bold leading-[25px] text-[#0984e3] mt-[5px] mb-2">Specifications</h4>
                        <p class="text-[17px] leading-[23px] my-[5px]">
                            Price in Pakistan: <span class="text-[#b7070a]"> <?php the_field('m_price'); ?></span> PKR
                        </p>
                    </div>

                    <div>
                        
                        <?php if(have_rows('features_main')) : ?>
                            <?php while(have_rows('features_main')) : the_row(); ?>

                                <div class="c-radius mt-5 mb-[25px] bg-[#DDDFE5] flex items-center gap-[13px] rounded-r-lg rounded-l-[25px]">
                                    <svg class="inline-flex w-[46px] h-[46px] border border-black rounded-full p-2 bg-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg>
                                    <h5 class="font-semibold uppercase">
                                        <?php the_sub_field('feature_heading'); ?>
                                    </h5>
                                </div>
                                
                                <div>
                                    <table>
                                        <?php if(have_rows('features_inner')) : ?>
                                            <?php while(have_rows('features_inner')) : the_row(); ?>
                                                <tr>
                                                    <td class="py-[5px] px-[22px] w-[20%] text-[#303f4a80]">
                                                        <?php the_sub_field('feature_heading'); ?>
                                                    </td>
                                                    <td class="py-[5px] px-[22px] w-[20%] text-[#303f4a]">
                                                        <?php the_sub_field('feature_details'); ?>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </table>
                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>

                </div>
            </div>

            <div class="lg: w-[33%]">
            <div class="border rounded-xl">
                <div class="bg-[#DD9631] border rounded-t-xl">
                    <h1 class="text-[24px] font-bold px-[15px] pt-[10px] pb-8 text-white">Explore Your Favorite Brands</h1>
                </div>
                <div class="grid grid-cols-5 p-[15px] gap-5">
                    <a href="#"><img class="w-[40px]"  src="/wp-content/uploads/2024/08/apple.png" alt=""></a>
                    <a href="#"><img class="w-[40px]" src="/wp-content/uploads/2024/08/blackberry-icon.png" alt=""></a>
                    <a href="#"><img class="w-[40px]" src="/wp-content/uploads/2024/08/gionee-icon-e1533215817513.png" alt=""></a>
                    <a href="#"><img class="w-[40px]" src="/wp-content/uploads/2024/08/Huawei-Logo-e1533215969223.png" alt=""></a>
                    <a href="#"><img class="w-[40px]" src="/wp-content/uploads/2024/08/infinix-icon.png" alt=""></a>
                    <a href="#"><img class="w-[40px]" src="/wp-content/uploads/2024/08/oppo-icon-e1533216305932.png" alt=""></a>
                    <a href="#"><img class="w-[40px]" src="/wp-content/uploads/2024/08/oneplus-icon.png" alt=""></a>
                    <a href="#"><img class="w-[40px]" src="/wp-content/uploads/2024/08/nokia-icon-e1533216263815.jpg" alt=""></a>
                    <a href="#"><img class="w-[40px]" src="/wp-content/uploads/2024/08/microsoft-icon.png" alt=""></a>
                    <a href="#"><img class="w-[40px]" src="/wp-content/uploads/2024/08/lenovo-icon.gif" alt=""></a>
                    <a href="#"><img class="w-[40px]" src="/wp-content/uploads/2024/08/mi-icon.png" alt=""></a>
                    <a href="#"><img class="w-[40px]" src="/wp-content/uploads/2024/08/vivo-icon.png" alt=""></a>
                    <a href="#"><img class="w-[40px]" src="/wp-content/uploads/2024/08/tecno-icon.png" alt=""></a>
                    <a href="#"><img class="w-[40px]" src="/wp-content/uploads/2024/08/sony-icon.png" alt=""></a>
                    <a href="#"><img class="w-[40px]" src="/wp-content/uploads/2024/08/samsung-icon.png" alt=""></a>
                </div>
            </div>
                <div class="border mt-[30px] rounded-xl">
                    <div>
                        <h1 class="text-[24px] font-bold bg-[#5905DA] text-white py-3 px-4 rounded-t-xl">Related Phones</h1>
                    </div>
                    <div class="">
                        <div class="flex p-4 gap-3">
                            <img class="max-w-[18%]" src=/wp-content/uploads/2024/08/Apple-iPhone-13-Pro-Max-512GB-price-200x300-1.png alt="">
                            <div class="content inline-grid content-center">
                                <p class="text-[16px] font-semibold capitalize">vivo iQOO 11 Pro price in Pakistan</p>
                                <p class="text-[16px] font-bold text-orange-400">330,000</p>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
</div>

</article>

        <?php
        // If you want to add comments to the mobile post
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile;
else :
    echo '<p>No mobile found</p>';
endif;


get_footer();
