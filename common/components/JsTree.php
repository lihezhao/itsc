<?php
class JsTree extends CTreeView {
	public $core;
	public $plugins;
	public $checkbox;
	
	public function init() {
		if(isset($this->htmlOptions['id']))
			$id=$this->htmlOptions['id'];
		else
			$id=$this->htmlOptions['id']=$this->getId();
		if($this->core['data']['url']!==null)
			$this->core['data']['url']=new CJavaScriptExpression("function(node)
			{
					return '" . CHtml::normalizeUrl($this->core['data']['url']) . "';}");
		$cs=Yii::app()->getClientScript();
		$cs->registerCoreScript('jstree');
		$options=$this->getClientOptions();
		$options=$options===array()?'{}' : CJavaScript::encode($options);
		$cs->registerScript('JsTree#'.$id,"jQuery(\"#{$id}\").jstree($options);");

		echo CHtml::tag('div',$this->htmlOptions,false,false)."\n";
		echo self::saveDataAsHtml($this->data);
	}
	
	public function run()
	{
		echo "</div>";
	}
	
	protected function getClientOptions() {
		$options = $this->options;
		foreach (array('core', 'plugins', 'checkbox') as $name) {
			if ($this->$name !== null)
				$options[$name] = $this->$name;
		}
		return $options;
	}
}