<?php
class CBootstrapDataColumn extends CDataColumn {
	public function getFilterCellContent()
	{
		if(is_string($this->filter))
			return $this->filter;
		elseif($this->filter!==false && $this->grid->filter!==null && $this->name!==null && strpos($this->name,'.')===false)
		{
			if(is_array($this->filter))
				return CHtml::activeDropDownList($this->grid->filter, $this->name, $this->filter, array('id'=>false,'prompt'=>'', 'class' => 'form-control form-control-sm'));
			elseif($this->filter===null)
				return CHtml::activeTextField($this->grid->filter, $this->name, array('id'=>false, 'class' => 'form-control form-control-sm'));
		}
		else
			return parent::getFilterCellContent();
	}
	
}