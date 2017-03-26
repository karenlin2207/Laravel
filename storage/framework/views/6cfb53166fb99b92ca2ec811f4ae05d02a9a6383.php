<?php $__env->startSection('content'); ?>
<div id="main" class="container">
	<div class="row">
		<div class="col-sm-offset-2">
			<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<div class="inner">
				<div class="col-sm-10">
					<div class="col-sm-12 title">
						<div class="col-sm-9">
						<h1 clss="bold"><?php echo e($article->title); ?></h1>
						</div>
						<div class="col-sm-3">
						<h1><?php echo e($article->article_time); ?></h1>
						</div>
					</div>
					<div class="col-sm-12">
						<img src="/uploads/<?php echo e($article->img_uri); ?>">
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>