<?php
?>
<?php echo CHtml::hiddenField('doStorageUrl', CHtml::normalizeUrl(array('image/doStorage')))?>
<?php echo CHtml::hiddenField('path', $path)?>
<div id="progressMessage"><?php echo yii::t('itsc', 'Initialize the image storage process...')?></div>
<progress class="progress" value="0" max="100" aria-describedby="progressMessage">
	<div class="progress">
		<span class="progress-bar"></span>
	</div>
</progress>