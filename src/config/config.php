<?php
return array(

	/*
	 * DATABASE CONNECTION
	 * -------------------------------------------------------------------
	 * Server : - null ( localhost:27107 )
	 * 			- DSN ( mongodb://[dbUser]:[dbPassword]@[dbHost]:[dbPort]/[dbName] )
	 *
	 *		array(
	 *		    		 'server' => null,
	 *		    		 'options' => array( 'username' => null,
	 *		    							 'password' => null,
	 *		    							 'db' 	    => null)
	 *   			  	  ),
	 * 
	 */
	'connection' => array(
			    		 'server' => null,
			    		 'options' => array( 'db' => null )
	    			  	  ),


	'dir' => array(
		'proxy'    => storage_path().'/doctrine/proxies',
		'hydrator' => storage_path().'/doctrine/hydrators',
		'document' => app_path().'/models'
	),
	   
);