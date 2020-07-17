<?php

namespace App\Providers\MyFatoorah\Services;

use GuzzleHttp\Client;
use App\Providers\MyFatoorah\Contracts\Service;
use App\Providers\MyFatoorah\Support\AccessToken;
use App\Providers\MyFatoorah\Support\BasicData;

/**
 * Class ServiceAbstract
 *
 * @package MyFatoorah\Services
 */
abstract class AbstractService implements Service
{
	/**
	 * @var \GuzzleHttp\Client
	 */
	protected $client;

	protected $mode;

	protected $basePath;

	protected $endpoint;

	protected $headers = [];

	protected $requestData = [];

	protected $requiresAccessToken = false;


	public function __construct()
	{
		$this->requestData = new BasicData( $this->requestData );
		$this->headers = new BasicData( $this->headers );

		$this->setMode( config( 'myfatoorah.mode', 'live' ) );

		$this->headers->set( 'Content-Type', 'application/json' );

		if ( $this->requiresAccessToken )
			$this->setAccessToken();

		$this->client = new Client();
	}


	protected function setBasePath()
	{
		$this->basePath = $this->mode == "test" ? "https://apidemo.myfatoorah.com/" : "https://apikw.myfatoorah.com/";
	}


	protected function getRequestUrl( $endpoint = null )
	{
		$endpoint = $endpoint ?: $this->endpoint;

		return $this->basePath . $endpoint;
	}


	protected function setClient( $client )
	{
		$this->client = $client;
	}


	function getClient()
	{
		return $this->client;
	}


	public function setMode( $mode )
	{
		$this->mode = $mode;
		$this->setBasePath();
	}


	public function setAccessToken( $token = null )
	{
		if ( is_null( $token ) )
			$token = config( 'myfatoorah.auth.token' );

		$token = new AccessToken( $token );

		$this->headers->set( 'Authorization', 'Bearer ' . $token->getToken() );
	}
}
