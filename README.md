# laravel7-myfootorah

# Laravel 7 Package for Myfatoorah Payment Gateway REST API

Myfatoorah Payment Gateway for Laravel 7*


## Installation 
Upload this Directory to app/Providers

Now open up `/config/app.php` and add the service provider to your `providers` array.
```php
'providers' => [
	App\Providers\MyFatoorah\MyFatoorahServiceProfider::class,
]
```

Now add the alias.
```php
'aliases' => [
	'MyFatoorah' => App\Providers\MyFatoorah\Facade\MyFatoorah::class,
]
```

## Usage

``` php
public function payment(Request $request){
        try{
            $token = MyFatoorah::requestAccessToken();
            MyFatoorah::setAccessToken([
                "access_token" => $token->getToken(),
                ".expires" => $token->isExpired(),
            ]);
        } catch( \Exception $exception ){

        }

        try{
            $payment = MyFatoorah::createApiInvoiceIso();
            $payment->setCustomerName( "John Doe" );
            $payment->setDisplayCurrencyIsoAlpha( "KWD" );
            $payment->setCountryCodeId( 1 );
            $payment->setCallBackUrl( env('APP_URL')."/account/checkpayment );
            $payment->setErrorUrl( env('APP_URL')."/account/errorpayment );
            $payment->addProduct( "STANDARD PLAN", 199, 1 );
            $payment->make();
            return redirect($payment->make()['RedirectUrl']);

        } catch( \Exception $exception ){

        }

    }
```

``` php
     public function checkpayment( Request $request )
    {
        if($request->get("paymentId")){
            $id = (int)$request->get("paymentId");
        }}
        try{
            $token = MyFatoorah::requestAccessToken();
            MyFatoorah::setAccessToken([
                "access_token" => $token->getToken(),
                ".expires" => $token->isExpired(),
            ]);
        } catch( \Exception $exception ){

        }
        $invoice = MyFatoorah::findInvoice( $id );
        
       $invoice->isPaid(); // check if invoice is paid
       $invoice->isUnpaid(); // check if invoice is unpaid
       $invoice->isFailed(); // check if invoice is failed
    }
```

## License

The MIT License (MIT). Please see [License File](https://github.com/dnoegel/php-xdg-base-dir/blob/master/LICENSE) for more information.
