<?php

namespace App\Providers\MyFatoorah\Support;

use Illuminate\Support\Arr;

class BasicData
{
	protected $data;


	public function __construct( array $data )
	{
		$this->data = $data;
	}


	public function set( string $key, $value )
	{
		Arr::set( $this->data, $key, $value );

		return $this;
	}


	public function get( string $key )
	{
		return Arr::get( $this->data, $key );
	}


	public function has( string $key )
	{
		return Arr::has( $this->data, $key );
	}


	public function all()
	{
		return $this->data;
	}
}
