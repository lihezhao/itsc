<?php
class LinkPager extends CLinkPager {
	public $cssFile = false;
	public $header = '';
	public $nextPageCssClass = 'page-item';
	public $firstPageCssClass = 'page-item';
	public $lastPageCssClass = 'page-item';
	public $internalPageCssClass = 'page-item';
	public $previousPageCssClass = 'page-item';
	public $selectedPageCssClass = 'active';
	public $htmlOptions = array('class' => 'pagination m-x-auto');
			
	protected function createPageButton($label,$page,$class,$hidden,$selected)
	{
		if($hidden || $selected)
			$class.=' '.($hidden ? $this->hiddenPageCssClass : $this->selectedPageCssClass);
			return '<li class="'.$class.'">'.CHtml::link($label,$this->createPageUrl($page), array('class' => 'page-link')).'</li>';
	}
}