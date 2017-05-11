<?php $__env->startSection('content'); ?>
<div id="main" class="container">
	<div class="row">
		<div class="col-sm-offset-1">
			<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<div class="panel-default col-sm-4">
				<a href="/articles/<?php echo e($article->id); ?>">
				<div class="panel-heading">
					<h1 class="panel-title pull-left"><?php echo e($article->title); ?></h1>
					<h6 class="panel-title pull-right"><?php echo e($article->article_time); ?></h6>
				</div>
				<div class="panel-content">
					<?php echo e($article->short_describe); ?>

					<img class="title_img" src="<?php echo e($article->img_uri); ?>">
				</div>
				</a>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</div>
		<div class="col-md-12 text-center">
			<div class="pagination"> <?php echo e($articles->links()); ?> </div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>