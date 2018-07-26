<?php
?>


<html>
<head></head>
<body>
<?php $__env->startSection('post_section'); ?>

    <?php
    function checkMonth($month_id){
        $month_name = 'null';
        if($month_id == 1){
            $month_name = "Jan";
        }elseif($month_id == 2){
            $month_name = "Feb";
        }elseif($month_id == 3){
            $month_name = "Mar";
        }elseif($month_id == 4){
            $month_name = "Apr";
        }elseif($month_id == 5){
            $month_name = "May";
        }elseif($month_id == 6){
            $month_name = "Jun";
        }elseif($month_id == 7){
            $month_name = "July";
        }elseif($month_id == 8){
            $month_name = "Aug";
        }elseif($month_id == 9){
            $month_name = "Sept";
        }elseif($month_id == 10){
            $month_name = "Oct";
        }elseif($month_id == 11){
            $month_name = "Nov";
        }elseif($month_id == 12){
            $month_name = "Dec";
        }
        return $month_name;
    }
    ?>

    <?php $__currentLoopData = $blog_post_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $date = $post->created_at;
        //echo "<h3>$date</h3>";
        $date2 = explode('-',$date);
        //echo $date;
//                echo '<pre>';
//        print_r($date2);
        //echo $date[1];
        //echo $date2[1];

        $day = explode(' ',$date2[2]);
//        print_r($day);
        $day = $day[0];

        $month_name = checkMonth($date2[1]);
        //print_r($month);


        ?>


        <div class="post_section">

            <div class="post_date">
               <?php echo e($day); ?> <span><?php echo e($month_name); ?></span>
            </div>
            <div class="post_content">

                <h2><a href="blog_post.html"><?php echo e($post->post_title); ?></a></h2>

                <strong>Author:</strong> <?php echo e($post->author_name); ?> | <strong>Category:</strong> <a
                        href="#"><?php echo e($post->category_name); ?></a>

                <a href="http://www.templatemo.com/page/1" target="_parent">
                    <img style="width: 100%;height: 180px;" src="<?php echo e(asset($post->post_image)); ?>" alt="image"/></a>
                <p><?php echo e($post->short_description); ?></p>

                <p><a href="blog_post.html">24 Comments</a> | <a href="<?php echo e(url('/post_detail/'.$post->id)); ?>">Continue reading...</a></p>
            </div>
            <div class="cleaner"></div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
</body>
</html>


<?php echo $__env->make('home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>