<?php defined('SYSPATH') OR die('No direct access allowed.');

abstract class Kohana_OAuth_v2_Token extends OAuth_Token {

	/**
	 * Create a new token object.
	 *
	 *     $token = OAuth_v2_Token::factory($name);
	 *
	 * @param   string  token type
	 * @param   array   token options
	 * @return  OAuth_v2_Token
	 */
	public static function factory($name, array $options = NULL)
	{
		$class = 'OAuth_v2_Token_'.$name;

		return new $class($options);
	}

}