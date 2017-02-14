<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line"><?php echo e($type); ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                 <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>縮圖</th>
                                <th>標題</th>
                                <th>內容</th>
                                <th>是否顯示</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr id="list">
                                <td><img src="/uploads/<?php echo e($article->img_uri); ?>" style="width:30px;"></td>
                                <td><?php echo e($article->title); ?></td>
                                <td><?php echo $article->describe; ?></td>
                                <td><label class="label label-success">顯示</label></td>
                                <td>
                                    <form action="<?php echo e($article->id); ?>" method="POST">
                                    <a href="edit/<?php echo e($article->id); ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>編輯</a>
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('delete')); ?>    
                                    <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-pencil"></i>刪除</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>