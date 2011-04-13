<?php defined('SYSPATH') OR die('No direct access allowed.');

abstract class Kohana_OAuth2_Token_Access extends OAuth2_Token {

	protected $_name = 'access';

	protected $_required = array(
		'token'
	);
}