;
<?php $__env->startSection('portfolio_section'); ?>
<div id="templatemo_content">

    <div>
        <img src="<?php echo e(asset('public/assets/')); ?>/images/abhi.jpg" style="height:200px;width: 200px">
    </div>
    <br>
    <div >
        <h3>Md.Mominuz Zaman</h3>
    </div>
</div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>