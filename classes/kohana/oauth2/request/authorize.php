<?php defined('SYSPATH') OR die('No direct access allowed.');

abstract class Kohana_OAuth2_Request_Authorize extends OAuth2_Request {

	public function execute(array $options = NULL)
	{
		Request::$initial->redirect($this->_url.'?'.$this->as_query());
	}
}