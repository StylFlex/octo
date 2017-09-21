<?php
class ColourController extends Controller
{

    private $color = ['black','grey','blue','brown','green','orange','purple'];
    public function actionIndex() {

		if(isset($_POST['Colour']))
		{
                   	  //  $model->attributes=$_POST['Colour'];
                      //  $model->groupNo=Yii::app()->user->groupNo;
                      //  $model->save();

		}
		$this->render('index',['color'=>$this->color]);
   }
   public function actionDelete() {

                $model=$this->loadModel();
		if ($model != null) $model->deleteByPk($model->id);
                $this->redirect(array('index'));


   }
    public function actionMenu() {

                $model=$this->loadModel();

                if ($model===null) {
                    $model=new Colour;

                }

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Colour']))
		{
                   	$model->attributes=$_POST['Colour'];
                        $model->groupNo=Yii::app()->user->groupNo;
                        $model->save();

		}
		$this->render('menu',array('model'=>$model));
   }

	public function loadModel()
	{

		return(Colour::model()->findByAttributes(array('groupNo'=>Yii::app()->user->groupNo)));
        }
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='logo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

        public function actionPreview($id)   {
            echo $this->renderPartial('_example',array('id'=>$id));
        }
        public function actioniconspreview($id)   {

            $this->icons=$id;
            $this->renderPartial('_icons');

        }

}
?>
