<?php
class ItscUser extends BaseUser {
	protected function beforeSave() {
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->id = new CDbExpression("replace(uuid(), '-', '')");
				$this->created_at = date('Y-m-d h:i:s');
				$this->password = CPasswordHelper::hashPassword($this->password);
			}
			return true;
		} else {
			return false;
		}
	}
}