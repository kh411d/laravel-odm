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
			    							 'db' 	    => 'appdummies')
	    			  	  ),


	'dir' => array(
		'proxy'    => realpath('./../').'/app/storage/cache',
		'hydrator' => realpath('./../').'/app/storage/cache',
		'document' => realpath('./../').'/app/models'
	),
	   
);