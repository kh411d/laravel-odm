<?php 
namespace LaravelOdm;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;


class LaravelOdmServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('kh411d/laravel-odm');
		$this->app['config']->package('kh411d/laravel-odm', __DIR__.'/../config');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		

		$this->app->bind('odm.documentmanager', function ($app) {
			$conn = Config::get('laravel-odm::connection');	
			return DocumentManager::create(new Connection($conn['server'],$conn['options']), App::make('odm.config'));
		});

		$this->app->bind('odm.config', function ($app){	
			$conn = Config::get('laravel-odm::connection');	
			$dir = Config::get('laravel-odm::dir');
			$config = new Configuration();
			$config->setProxyDir($dir['proxy']);
			$config->setProxyNamespace('Proxies');
			$config->setHydratorDir($dir['hydrator']);
			$config->setHydratorNamespace('Hydrators');
			$config->setMetadataDriverImpl(App::make('odm.annotation'));
			$config->setDefaultDB($conn['options']['db']);
			return $config;
		});

		$this->app->bind('odm.annotation', function($app) {
			$dir = Config::get('laravel-odm::dir');
			AnnotationDriver::registerAnnotationClasses();
			$reader = new AnnotationReader();
			return new AnnotationDriver($reader, $dir['document']);
		});
		
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}