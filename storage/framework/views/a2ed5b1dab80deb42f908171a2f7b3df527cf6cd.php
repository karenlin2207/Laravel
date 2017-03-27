<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="/assets/css/main.css">
<div id="main" class="container">
	<div class="row">
		<div class="col-sm-offset-2">
			<div class="tiles">
				<article class="style1">
					<span class="image">
						<img src="<?php echo e($product->img_uri); ?>" alt="">
					</span>
					<a href="generic.html">
						<h2><?php echo e($product->name); ?></h2>
						<div class="content">
							{!$product->describe!}
						</div>
					</a>
				</article>
			</div>	
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>