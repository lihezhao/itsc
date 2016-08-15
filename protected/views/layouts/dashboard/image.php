<?php $this->beginContent('//layouts/dashboard/main') ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
					<li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
					<li><a href="#">Reports</a></li>
					<li><a href="#">Analytics</a></li>
					<li><a href="#">Export</a></li>
				</ul>
			</div>
			<div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
				<?php echo $content ?>
			</div>
		</div>
	</div>
<?php $this->endContent(); ?>