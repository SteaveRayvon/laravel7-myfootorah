<?php

namespace App\Providers\MyFatoorah\Services;

use App\Providers\MyFatoorah\Response\FindApiInvoice as Response;

class FindApiInvoice extends AbstractService
{
	protected $endpoint = "ApiInvoices/Transaction";

	protected $id;

	protected $requiresAccessToken = true;


	public function __construct( $id )
	{
		parent::__construct();
		$this->id = $id;
	}


	function make()
	{
		// dd( $this->headers->get( "Authorization" ) );
		$resp = $this->client->get(
			$this->getRequestUrl( $this->endpoint . '/' . $this->id ), [
				"headers" => $this->headers->all(),
			]
		)->getBody()->getContents();
print_r($resp);
		return new Response(
			json_decode(
				$resp,
				true
			)
		);
	}
}
