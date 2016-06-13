<style>
    .dropdown-submenu {
    position: relative;
}
 
.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}
 
.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}
 
.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}
 
.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}
 
.dropdown-submenu.pull-left {
    float: none;
}
 
.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
</style>

<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
       
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/icono.png" type="image/x-icon" /> 
        

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php //echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
        
        <?php
        $this->widget(
            'booster.widgets.TbNavbar',
            array(
                'type' => null, // null or 'inverse'
                'brand' => 'Ferreteria Vera',
                'brandUrl' => array('/site/index'),
                'collapse' => true, // requires bootstrap-responsive.css
                'fixed' => false,
                'fluid' => true,
                'items' => array(
                    array(
                        'class' => 'booster.widgets.TbMenu',
                        'type' => 'navbar',
                        'items' => array(
                            array('label' => 'Facturas a vencer', 'url'=>array('/site/index'), 'active' => true),
                            array('label' => 'Facturas a vencer', 'url' => '#'),
                            array(
                                'label' => 'Dropdown',
                                'url' => '#',
                                'items' => array(
                                    array('label' => 'Action', 'url' => '#'),
                                    array('label' => 'Another action', 'url' => '#'),
                                    array(
                                        'label' => 'Something else here',
                                        'url' => '#'
                                    ),
                                    '---',
                                    array('label' => 'NAV HEADER'),
                                    array('label' => 'Separated link', 'url' => '#'),
                                    array(
                                        'label' => 'One more separated link',
                                        'url' => '#'
                                    ),
                                )
                            ),
                        ),
                    ),
                   // '<form class="navbar-form navbar-left" action=""><div class="form-group"><input type="text" class="form-control" placeholder="Search"></div></form>',
                    array(
                        'class' => 'booster.widgets.TbMenu',
                        'type' => 'navbar',
                        'htmlOptions' => array('class' => 'pull-right'),
                        'items' => array(
                            array('label' => 'Backup', 'url'=>array('/backupbd/create')),
                            '---',
                            array(
                                'label' => 'Configuracion',
                                'url' => '#',
                                'items' => array(
                                   // array('label' => 'Configuracion', 'url' => '#'),
                                    array(
                                        'label' => 'Usuarios', 
                                        'url'=>array('/usuario/create'),                                        
                                        'visible' => Yii::app()->user->name=="admin"),
                                    
                                    '---',
                                    array('label' => 'Generar Backup', 'url'=>array('/backupbd/create')),
                                )
                            ),
                            array(
                            'label' => 'Cerrar sesión (' . Yii::app()->user->name . ')',
                             'visible' => !(Yii::app()->user->name=="Guest"),
                             'icon'=>'user',
                            'url' => array('/site/logout'),
                            ),
                            array(
                            'label' => 'Iniciar Sesion',
                            'visible' => Yii::app()->user->name=="Guest",
                             'icon'=>'user',
                            'url' => array('/site/login'),
                            ),
                            
                        
                        
                    
                        ),
                    ),
                ),
            )
        );
        ?>
        
        <?php
            $this->widget('booster.widgets.TbAlert', array(
                'fade' => true,
                'closeText' => '&times;', // false equals no close link
                'events' => array(),
                'htmlOptions' => array(),
                'userComponentId' => 'user',
                'alerts' => array(// configurations per alert type
                    // success, info, warning, error or danger
                    'success' => array('closeText' => '&times;'),
                    'info', // you don't need to specify full config
                    'warning' => array('closeText' => false),
                    'error' => array('closeText' => false),
                ),
            ));
            ?>
	
       
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Marcos Role.<br/>
                <a href=<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/FerreteriaVera/site/contact"?>>Contátenos.</a> 
		
		
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
