<?php

namespace App\Providers\MyFatoorah\Contracts;

interface Service
{
	function make();


	function setMode( $mode );


	function getClient();


	function setAccessToken();
}
