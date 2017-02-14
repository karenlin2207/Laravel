<?php echo $__env->make('vendor.ueditor.assets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">編輯車款</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                 <div class="Compose-Message">               
            <div class="panel panel-success">
                <div class="panel-heading">
                    編輯車款
                </div>
                <form method="POST" action="/addmin/products/<?php echo e($product->id); ?>" enctype="multipart/form-data"> 
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>

                <div class="panel-body">
                    <label>名稱 : </label>
                    <input type="text" class="form-control" name="name" value="<?php echo e($product->name); ?>" />
                    <label>市價 : </label>
                    <input type="text" class="form-control" name="market_price" value="<?php echo e($product->market_price); ?>" />
                    <label>售價 : </label>
                    <input type="text" class="form-control" name="sale_price" value="<?php echo e($product->sale_price); ?>" />
                    <label>商品圖片 :  <img src="<?php echo e($product->img_uri); ?>" style="width: 30px;"></label>
                    <input type="file" class="form-control" id="user_icon_file" name="user_icon_file" placeholder="上傳圖片">
                    <label>商品介紹 : </label>
                        <script id="container" name="describe" type="text/plain">
                        <?php echo $product->describe; ?>

                        </script>

                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('container');
                                ue.ready(function() {
                                ue.execCommand('serverparam', '_token', '<?php echo e(csrf_token()); ?>');
                            });
                        </script>
                    <label><input type="checkbox" name="is_show" value='1' checked>是否顯示</label>
                    <hr />
                    <button class="btn btn-success" type="submit">Submit</button>
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