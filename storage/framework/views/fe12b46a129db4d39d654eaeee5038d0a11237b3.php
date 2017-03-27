<?php $__env->startSection('content'); ?>
<div id="main" class="container">
	<div class="row">
		<div class="col-sm-offset-2">
			<div class="panel-default col-sm-9">
				<div class="panel-heading">
					<h1 class="panel-title pull-left"><?php echo e($article->title); ?></h1>
					<h6 class="panel-title pull-right"><?php echo e($article->article_time); ?></h6>
				</div>
					<div class="col-sm-12">
						<?php echo $article->describe; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>