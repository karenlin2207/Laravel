<?php echo $__env->make('vendor.ueditor.assets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">編輯文章</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                 <div class="Compose-Message">               
            <div class="panel panel-success">
                <div class="panel-heading">
                    編輯
                </div>
                <form method="POST" action="/admin/articles/<?php echo e($article->id); ?>" enctype="multipart/form-data">
                     <?php echo e(csrf_field()); ?>

                     <?php echo e(method_field('PUT')); ?>

                <div class="panel-body">
                    <input type="hidden" name="type" value="<?php echo e($article->type); ?>">
                    <label>文章標題 : </label>
                    <input type="text" class="form-control" name="title" value="<?php echo e(empty(old('title'))?$article->title:old('title')); ?>"/>
                    <label>文章縮圖 : <img src="<?php echo e($article->img_uri); ?>" style="width:30px;"></label>
                    <input type="file" class="form-control" id="user_icon_file" name="user_icon_file" placeholder="上傳圖片">
                    <label>文章tags : </label>
                    <input type="text" class="form-control" name="tags"
                    value="<?php $__currentLoopData = $article->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?><?php if($tag): ?><?php echo e($tag->name); ?>,<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>" />
                    <label>文章內容 : </label>
                        <script id="container" name="describe" type="text/plain">
                        <?php echo $article->describe; ?>

                        </script>

                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('container');
                                ue.ready(function() {
                                ue.execCommand('serverparam', '_token', '<?php echo e(csrf_token()); ?>');
                            });
                        </script>
                    <label><input type="checkbox" name="is_show" value='1' <?php if($article->is_show==1): ?> checked <?php endif; ?>>是否顯示</label>
                    <hr />
                    <button class="btn btn-default" type="submit"><i class=" fa fa-refresh "></i> Update</button>
                </div>
                </form>
                <div class="panel-footer text-muted">
                    
                </div>
            </div>
                 </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>