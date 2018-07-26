<?php
/**
 * Created by PhpStorm.
 * User: momin
 * Date: 7/8/2018
 * Time: 1:02 PM
 */
?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>আমার ব্লগ</title>
    <meta name="keywords" content="Red Blog Theme, Free CSS Templates" />
    <meta name="description" content="Red Blog Theme - Free CSS Templates by templatemo.com" />
    <link href="<?php echo e(asset('public/assets')); ?>/templatemo_style.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="templatemo_top_wrapper">
    <div id="templatemo_top">

        <div id="templatemo_menu">

            <ul>
                <li><a href="<?php echo e(url('/')); ?>" class="current">Home</a></li>
                <li><a href="<?php echo e(url('/portfolio')); ?>">Author Info</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="<?php echo e(url('/contact')); ?>">Contact Us</a></li>
            </ul>

        </div> <!-- end of templatemo_menu -->


    </div>
</div>

<div id="templatemo_header_wrapper">
    <div id="templatemo_header">

        <div id="site_title">
            <h1><a href="#" target="_parent"><strong>আমার ব্লগ</strong><span>সাম্প্রতিক বিস্ময়নের প্রতিচ্ছবি</span></a></h1>
        </div>

    </div>
</div>

<div id="templatemo_main_wrapper">
    <div id="templatemo_main">
        <div id="templatemo_main_top">

            <div id="templatemo_content">


                <!--kata hoyeche   -->
                <?php echo $__env->yieldContent('post_section'); ?>

            </div>

                <?php echo $__env->yieldContent('portfolio_section'); ?>

            <div id="templatemo_sidebar">

                <h4>Categories</h4>
                <ul class="templatemo_list">
                    <?php
                        $categorys=DB::table('category')
                        ->get();

                    ?>
                        <li><a href="<?php echo e(URL::to('/popular_post')); ?>">Popular</a></li>

                    <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(URL::to('/category_post/'.$category->id)); ?>"><?php echo e($category->Category_name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                <div class="cleaner_h40"></div>


                <div id="ads">
                    <a href="#"><img src="<?php echo e(asset('public/assets')); ?>/images/templatemo_200x100_banner.jpg" alt="banner 1" /></a>

                    <a href="#"><img src="<?php echo e(asset('public/assets')); ?>/images/templatemo_200x100_banner.jpg" alt="banner 2" /></a>
                </div>

            </div>

            <div class="cleaner"></div>

        </div>

    </div>

    <div id="templatemo_main_bottom"></div>

</div>

<div id="templatemo_footer">

    Copyright © Md.Mominuz Zaman
</div>

</body>
</html>