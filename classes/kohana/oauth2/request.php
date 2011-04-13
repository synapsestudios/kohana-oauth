<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * OAuth v2 Request
 *
 * @package    Kohana/OAuth
 * @category   Request
 * @author     Kohana Team
 * @copyright  (c) 2010 Kohana Team
 * @license    http://kohanaframework.org/license
 * @since      3.0.7
 */
abstract class Kohana_OAuth_v2_Request extends OAuth_Request {

	/**
	 * @static
	 * @param  string $type
	 * @param  string $method
	 * @param  string $url
	 * @param  array  $params
	 * @return OAuth_v2_Request
	 */
	public static function factory($type, $method, $url = NULL, array $params = NULL)
	{
		$class = 'OAuth_v2_Request_'.$type;
		return new $class($method, $url, $params);
	}

	/**
	 * @var string  OAuth complaince version
	 */
	protected $_version = '2.0';

	/**
	 * @var  boolean  send Authorization header?
	 */
	protected $_send_header = FALSE;
}
