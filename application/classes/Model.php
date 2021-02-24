<?php

namespace application\classes;

use appliaction\models\Users;

abstract class Model {
	
	public $attributes = [];
	public $errors = [];
	public $rules = [];

	public function __construct() {
		//
	}

	public function load ($data){
		foreach($this->attributes as $name => $value){
			if (isset($data[$name])){
				$this->attributes[$name] = $data[$name];
			}
		}
	}

	public function validate($data){
		$validate = new Validate();
		$validate->rules($this->rules);
		if ($validate->validate()){
			return true;
		}else{
			$this->errors = $validate->errors();
			return false;
		}

	}
}