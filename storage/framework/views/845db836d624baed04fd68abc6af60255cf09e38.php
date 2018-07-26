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
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="">
                            <td><?php echo e($category_row->id); ?></td>
                            <td><?php echo e($category_row->Category_name); ?></td>
                            <td><?php echo e($category_row->Category_Description); ?></td>
                            <td><?php echo e($category_row->Category_Status); ?></td>
                            <td>

                                <?php if($category_row->Category_Status == 1): ?>
                                    <a href="<?php echo e(URL::to('/publish_category/'.$category_row->id)); ?>">
                                        <button class="btn btn-success"><i class="material-icons" style="font-size:20px">thumb_up</i>
                                        </button>
                                    </a>

                                <?php else: ?>
                                    <a href="<?php echo e(URL::to('/publish_category/'.$category_row->id)); ?>">
                                        <button class="btn btn-warning"><i class="material-icons" style="font-size:20px">thumb_down</i>
                                        </button>
                                    </a>

                                <?php endif; ?>
                                    <a href="<?php echo e(URL::to('/delete_category/'.$category_row->id)); ?>">
                                    <button class="btn btn-danger"><i class="material-icons" style="font-size:20px">delete_forever</i>
                                    </button>
                                </a>
                                    <a href="<?php echo e(URL::to('/edit_category/'.$category_row->id)); ?>">
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