<?php
return array(

	/*
	 * DATABASE CONNECTION
	 * -------------------------------------------------------------------
	 * Server : - null ( localhost:27107 )
	 * 			- DSN ( mongodb://[dbUser]:[dbPassword]@[dbHost]:[dbPort]/[dbName] )
	 */
	'connection' => array(
			    		 'server' => null,
			    		 'options' => array( 'username' => null,
			    							 'password' => null,
			    							 'db' 	    => 'ccrm')
	    			  	  ),


	'dir' => array(
		'proxy'    => storage_path().'/cache',
		'hydrator' => storage_path().'/cache',
		'document' => app_path().'/models'
	),
	   
);