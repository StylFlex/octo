<?php
class photoForm extends CFormModel
{
	public $photo;

	public function attributeLabels()
	{
		return ['photo' => 'Photos'];
	}
/**
* Declares the validation rules.
*/
	public function rules()
	{
		return [
			// photo is required
			['photo', 'required', 'on'=>'checkInput','message'=>'Photo is mandantory'],
		];
	}
}
