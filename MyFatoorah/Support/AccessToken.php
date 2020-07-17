<?php

namespace App\Providers\MyFatoorah\Support;

class AccessToken
{
	/**
	 * @var string
	 */
	protected $token;

	/**
	 * @var \DateTime
	 */
	protected $expires_at;


	public function __construct( array $data )
	{
            $this->token = $data["access_token"];
            $this->expires_at = new \DateTime( $data['.expires'] );
	}


	public function isExpired()
	{
		return ( $this->expires_at < new \DateTime() );
	}


	/**
	 * @return mixed
	 */
	public function getToken()
	{
		return $this->token;
	}
}
