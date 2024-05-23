<?php

/*
	This is the mail class for 
	enode and decode function
*/

namespace Ankit04\Salting;

class Salting
{

	// endode string
	public function encodeSalted($string)
	{
		$prefixStart = 'laravel-salt-rand_start';
		$prefixEnd = 'laravel-salt-rand_end';
		$randomString = self::rand_str(15);
		$newString = $prefixStart . '-' . $randomString . '-' . $prefixEnd;
		return $newString;
	}


	// decode string
	public function decodeSalted($string)
	{
		$stringArray = explode('laravel-salt-rand_start', $string);
		return $stringArray[0];
	}

	// genrate random string
	private static function rand_str($length)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
