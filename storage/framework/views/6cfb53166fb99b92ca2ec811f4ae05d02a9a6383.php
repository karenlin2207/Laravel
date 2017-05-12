<?php $__env->startSection('content'); ?>
    <div id="main" class="container">
        <div class="row">
            <div class="col-sm-offset-1">
                <div class="col-sm-12">
                    <div class="title">
                        <i class="fa fa-newspaper-o fa-fw" aria-hidden="true"></i>&nbsp;<?php echo e($type); ?>

                    </div>
                </div>

                <?php for($i=0;$i<4;$i++): ?>
                    <div class="col-sm-3">
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php if($loop->index%4===$i): ?>
                                <div class="panel-default article">
                                    <a href="/articles/<?php echo e($article->id); ?>">
                                        
                                            
                                                
                                                 
                                            
                                        
                                        <div class="panel-content">
                                            <p><?php echo e($article->short_describe); ?></p>
                                            <img class="title_img" src="<?php echo e($article->img_uri); ?>">
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                <?php endfor; ?>
            </div>
            <div class="col-md-12 text-center">
                <div class="pagination"> <?php echo e($articles->links()); ?> </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>