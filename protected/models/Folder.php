<?php

class Folder extends BaseFolder {
	protected function beforeSave() {
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->created_at = date('Y-m-d h:i:s');
			} else {
				$this->updated_at = date('Y-m-d h:i:s');
			}
			return true;
		} else {
			return false;
		}
	}
}