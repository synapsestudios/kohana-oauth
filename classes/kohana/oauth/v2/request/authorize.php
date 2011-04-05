<?php defined('SYSPATH') OR die('No direct access allowed.');

abstract class Kohana_OAuth_v2_Request_Authorize extends OAuth_v2_Request {

	public function execute(array $options = NULL)
	{
		Request::$initial->redirect($this->_url.'?'.$this->as_query());
	}
}