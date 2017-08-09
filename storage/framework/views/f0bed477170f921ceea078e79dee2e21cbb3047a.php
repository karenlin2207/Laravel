<?php echo $__env->make('vendor.ueditor.assets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">新增首頁導覽圖</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                 <div class="Compose-Message">               
            <div class="panel panel-success">
                <div class="panel-heading">
                    新增
                </div>
                <form method="POST" action="/admin/sliders/" enctype="multipart/form-data"> 
                     <?php echo e(csrf_field()); ?>

                <div class="panel-body">
                    <label>名稱 : </label>
                    <input type="text" class="form-control" name="name"/>
                    <label>圖片 :  </label>
                    <input type="file" class="form-control" id="user_icon_file" name="user_icon_file" placeholder="上傳圖片">
                    <label>超連結網址 :  </label>
                    <input type="text" class="form-control" name="link" value="http://"/>
                    <label>超連結文字描述 : </label>
                    <textarea class="form-control" name="describe"></textarea>
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