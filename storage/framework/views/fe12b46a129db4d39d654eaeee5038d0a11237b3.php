<?php $__env->startSection('content'); ?>
<div id="main">
	<div class="inner">
		<h1><?php echo e($article->title); ?></h1>
		<?php echo $article->describe; ?>

	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>