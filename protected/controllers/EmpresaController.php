<?php

class EmpresaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('@'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$empresa = new Empresa();
               
                $direccion = new Direccion();
               
                $transaction = Yii::app()->db->beginTransaction();
                try {                                  
                    if(isset($_POST['Empresa'])) $empresa->attributes=$_POST['Empresa'];
                    if(isset($_POST['Direccion'])) $direccion->attributes=$_POST['Direccion'];
                  
                    if(isset($_POST['Direccion'])){                        
                    $direccion->attributes=$_POST['Direccion'];   
                                        
                    if ($direccion->validate()){ 
                        //Me fijo si ya existe para no guardar dos veces la misma direccion;
                        $direccion_aux = Direccion::model()->findByAttributes(array(//Si NO existe => GUARDO                            
                            'calleNro'=>$direccion{'calleNro'},                            
                        ));   
                        
                        if($direccion_aux==null){$direccion->save();                          
                        }  else {$direccion=$direccion_aux;}
                        
                        $empresa->attributes=$_POST['Empresa'];                                                             
                        $empresa->razonSocial=  strtoupper($empresa{'razonSocial'});
                        /*FK1*/ $empresa->id_dir = $direccion{'id'};   
                        if($empresa->validate()){                                    
                            $aux = Empresa::model()->findByAttributes(array('cuit'=>$empresa{'cuit'}));                                
                            if( ($aux == NULL)){
                                $empresa->insert(); 
                                Yii::app()->user->setFlash('success', "<strong>Excelente!</strong> Nueva empresa creada con exito ");                                                
                                 $transaction->commit();  
                                 $this->render('create',
                                    array(
                                        'empresa'=>new Empresa(),  
                                        'direccion'=>new Direccion(),                            
                                        ));
                            }else {$transaction->rollback (); Yii::app()->user->setFlash('error', "<strong>Error!</strong> Ya existe la empresa con el mismo CUIT");                                }                                                                       
                           
                           }else {$transaction->rollback (); Yii::app()->user->setFlash('error', "<strong>Error!</strong> Campos vacios");}                                                
                        }else {$transaction->rollback (); Yii::app()->user->setFlash('error', "<strong>Error!</strong> Campos vacios o incorrectos");}                        
                    }
                    }  
                    catch (Exception $ex) {
                    Yii::app()->user->setFlash('error', "<strong>Error!</strong> " .  $ex->getMessage());                  
                }
                              
                $this->render('create',
                        array(
                            'empresa'=>new Empresa(),  
                            'direccion'=>new Direccion(),                            
                            ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Empresa']))
		{
			$model->attributes=$_POST['Empresa'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Empresa');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Empresa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Empresa']))
			$model->attributes=$_GET['Empresa'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Empresa the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Empresa::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Empresa $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='empresa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
