<?php if(session()->has('message')): ?>
    <div class="container index-top">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo e(session('message')); ?>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if(session()->has('warning')): ?>
    <div class="container index-top">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="list-unstyled">
                        <?php $__currentLoopData = session('warning'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li><?php echo $message; ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if(session()->has('error')): ?>
    <div class="container index-top">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo e(session('error')); ?>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="container index-top">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="list-unstyled">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li><?php echo $message; ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>