<?php defined('SYSPATH') OR die('No direct access allowed.');

abstract class Kohana_OAuth_v2_Request_Token extends OAuth_v2_Request {

	protected $_name = 'token';

	public function execute(array $options = NULL)
	{
		return OAuth_Response::factory(parent::execute($options));
	}
}