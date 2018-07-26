<?php $__env->startSection('daseboard'); ?>
    <!-- BEGIN EXAMPLE TABLE widget-->

    <div class="widget purple">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Editable Table</h4>
            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
        </div>
        <div class="widget-body">
            <div>
                <div class="clearfix">
                    <div class="btn-group">
                        <button id="editable-sample_new" class="btn green">
                            Add New <i class="icon-plus"></i>
                        </button>
                    </div>
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#">Print</a></li>
                            <li><a href="#">Save as PDF</a></li>
                            <li><a href="#">Export to Excel</a></li>
                        </ul>
                    </div>
                </div>
                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                    <thead>
                    <tr>
                        <th>Blog ID</th>
                        <th>Blog Name</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $post_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($post->id); ?></td>
                        <td><?php echo e($post->post_title); ?></td>
                        <td><?php echo e($post->publication_status); ?></td>
                        <td>

                            <?php if( $post->publication_status== 1): ?>
                                <a href="<?php echo e(URL::to('/publish_blog/'.$post->id)); ?>">
                                    <button class="btn btn-success"><i class="material-icons" style="font-size:20px">thumb_up</i>
                                    </button>
                                </a>

                            <?php else: ?>
                                <a href="<?php echo e(URL::to('/publish_blog/'.$post->id)); ?>">
                                    <button class="btn btn-warning"><i class="material-icons" style="font-size:20px">thumb_down</i>
                                    </button>
                                </a>

                            <?php endif; ?>
                            <a href="<?php echo e(URL::to('/delete_blog/'.$post->id)); ?>" onclick=" return check_delete()">
                                <button class="btn btn-danger"><i class="material-icons" style="font-size:20px">delete_forever</i>
                                </button>
                            </a>
                            <a href="<?php echo e(URL::to('/edit_blog/'.$post->id)); ?>">
                                <button class="btn btn-primary"><i class="material-icons" style="font-size:20px">edit</i>
                                </button>
                            </a>
                        </td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<!-- END EXAMPLE TABLE widget-->
<?php echo $__env->make('admin/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>