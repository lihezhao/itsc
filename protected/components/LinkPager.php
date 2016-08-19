<?php
class LinkPager extends CLinkPager {
	protected function createPageButton($label,$page,$class,$hidden,$selected)
	{
		if($hidden || $selected)
			$class.=' '.($hidden ? $this->hiddenPageCssClass : $this->selectedPageCssClass);
			return '<li class="'.$class.'">'.CHtml::link($label,$this->createPageUrl($page), array('class' => 'page-link')).'</li>';
	}
}