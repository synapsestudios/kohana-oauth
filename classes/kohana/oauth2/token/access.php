<?php defined('SYSPATH') OR die('No direct access allowed.');

abstract class Kohana_OAuth_v2_Token_Access extends OAuth_v2_Token {

	protected $_name = 'access';

	protected $_required = array(
		'token'
	);
}