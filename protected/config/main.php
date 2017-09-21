<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

	// preloading 'log' component
	'preload'=>array('log', 'bootstrap',),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
	),
	// application components
	'components'=>array(
		'bootstrap' => array(
				'class' => 'ext.bootstrap.components.Bootstrap',
				'responsiveCss' => false,
		),
				'flickr' => array(
						'class' => 'application.components.phpFlickr',
				),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
							'site' => 'OCTO Development Test',
              'apiKey' => '2e624dfc241403670e2f100001382a39',
							'secret' => 'dfe003c30dc10434'

	),
);
