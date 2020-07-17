<?php

namespace App\Providers\MyFatoorah\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \MyFatoorah\Support\AccessToken requestAccessToken()
 * @method static \MyFatoorah\Services\CreateApiInvoiceIso createApiInvoiceIso()
 * @method static \MyFatoorah\Response\FindApiInvoice findInvoice()
 * @method static void setAccessToken( $token )
 *
 * @package MyFatoorah\Facade
 */
class MyFatoorah extends Facade
{
	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'myfatoorah'; }
}
