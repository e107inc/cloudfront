<?php

class cloudfront_module
{
	function __construct()
	{
		$pref = e107::pref('cloudfront');

		if(empty($pref['active']) || empty($pref['cdn']))
		{
			return;
		}

		$cdn = 'https://'.rtrim($pref['cdn'], '/');
		e107::getParser()->setStaticUrl($cdn.'/');
	//	header('Access-Control-Allow-Origin: '.$cdn);
	//	header('Referrer-Policy: no-referrer, strict-origin-when-cross-origin');
	//	define('X-FRAME-SAMEORIGIN', false);
	}

	
}

new cloudfront_module;
