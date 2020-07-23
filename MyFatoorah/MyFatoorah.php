<?php

namespace App\Providers\MyFatoorah;

use Illuminate\Support\Facades\Config;
use App\Providers\MyFatoorah\Services\Auth;
use App\Providers\MyFatoorah\Services\CreateApiInvoiceIso;
use App\Providers\MyFatoorah\Services\FindApiInvoice;

class MyFatoorah
{

	public static function requestAccessToken()
	{
		$auth = new Auth();

		return $auth->make();
	}


    public static function createApiInvoiceIso() // была не статичная
	{
		return new CreateApiInvoiceIso();
	}


	public static function findInvoice( $id )
	{
		$invoice = new FindApiInvoice( $id );

		return $invoice->make();
	}


	public static function setAccessToken( array $token )
	{
		Config::set( 'myfatoorah.auth.token', $token );
	}
}
