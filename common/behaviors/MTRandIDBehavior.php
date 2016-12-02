<?php
class MTRandIDBehavior extends CActiveRecordBehavior {
	public $idAttribute = 'id';
	
	public function beforeSave($event) {
		if ($this->getOwner()->getIsNewRecord() && ($this->idAttribute !== null)) {
			$this->getOwner()->{$this->idAttribute} = $this->getMTRandID();
		}
	}
	
	protected function getMTRandID() {
		do {
			$id = mt_rand();
			$record = $this->getOwner()->model()->findByPk($id);
		} while ($record != null);
		return $id;
	}
}