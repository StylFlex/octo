<?php
class SiteController extends Controller
{
  private $searchCriteria = ["privacy_filter" => 1, "accuracy" => 1, "content_type" =>1,"extras"=>"url_m,owner_name,description,date_taken","accuracy"=>3];
  public $subTitle;
  public $icon;


  	/**
  	 * @return array action filters
  	 */
  	public function filters()
  	{
  		return array(
  			'accessControl', // perform access control for CRUD operations
  		);
  	}

  	/**
  	 * Specifies the access control rules.
  	 * This method is used by the 'accessControl' filter.
  	 * @return array access control rules
  	 */
  	public function accessRules()
  	{
  		return array(
  			array('allow',  // allow all users to access 'index' and 'view' actions.
  				'actions'=>array('login'),
  				'users'=>array('*'),
  			),
  			array('allow', // allow authenticated users to access all actions
  				'users'=>array('@'),
  			),
  			array('deny',  // deny all users
  				'users'=>array('*'),
  			),
  		);
  	}


  /**
  * This is the default 'index' action that is invoked
  * when an action is not explicitly requested by users.
  */
  public function actionSearch()
  {

    $model = new photoForm();
    $this->icon = "search";
    $this->subTitle = "Search";
    $model->scenario='checkInput';

    $this->render('search',['model'=>$model]);
  }
  public function actionIndex()
{
              if (!Yii::app()->user->isGuest){
                  $this->redirect('index.php?r=site/search');
                  return;
              }
              $this->redirect('index.php?r=site/login');
}
/**
 * Displays the login page
 */
 public function actionLogin()
 {
   $model=new loginForm;
   $this->icon = "lock";
   $this->subTitle = "Login";

   // if it is ajax validation request
   if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
   {
     echo CActiveForm::validate($model);
     Yii::app()->end();
   }

   // collect user input data
   if(isset($_POST['loginForm']))
   {
     $model->attributes=$_POST['loginForm'];
     // validate user input and redirect to the previous page if valid
     if($model->validate() && $model->login())
       $this->redirect(array('site/search'));
   }

   // display the login form
   $this->render('login',array('model'=>$model));
 }
 /**
  * Displays the login page
  */
  public function actionColor()
  {
    $model=new loginForm;
    $this->icon = "lock";
    $this->subTitle = "Login";

    // if it is ajax validation request
    if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
    {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }

    // collect user input data
    if(isset($_POST['loginForm']))
    {
      $model->attributes=$_POST['loginForm'];
      // validate user input and redirect to the previous page if valid
      if($model->validate() && $model->login())
        $this->redirect(array('site/color'));
    }

    // display the login form
    $this->render('login',array('model'=>$model));
  }
 /**
  * Logs out the current user and redirect to homepage.
  */
 public function actionLogout()
 {
   Yii::app()->user->logout();
   $this->redirect(Yii::app()->homeUrl);
 }
  /**
  * This is the action to handle external exceptions.
  */
  public function actionError()
  {
    if($error=Yii::app()->errorHandler->error)
    {
      if(Yii::app()->request->isAjaxRequest)
      echo $error['message'];
      else
      $this->render('error', $error);
    }
  }

  /**
  * Displays photoThumbs;

  */
  public function actionPhotoLists(){

    if (isset($_POST['data'])) {

      $data = json_decode($_POST['data']);
      $flickr = new phpFlickr(Yii::app()->params['apiKey'],Yii::app()->params['secret']);
      $fullSearch = array_merge(["text"=>$data->{'photoForm[photo]'}],$this->searchCriteria);
      $flickrResult = $flickr->request("photos.search",$fullSearch);

      $response = json_decode($flickrResult);
      $listPhotos = $response->photos->photo;

      if (!isset($listPhotos) && count($listPhotos == 0)) $this->renderPartial('_noMatch',['noFound'=>$data->{'photoForm[photo]'}]);
      else  $this->renderPartial('_photoLists',array('listPhotos'=>$listPhotos));

    }
  }

}
