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
abstract class Kohana_OAuth2_Request extends OAuth_Request {

	/**
	 * @static
	 * @param  string $type
	 * @param  string $method
	 * @param  string $url
	 * @param  array  $params
	 * @return OAuth2_Request
	 */
	public static function factory($type, $method, $url = NULL, array $params = NULL)
	{
		$class = 'OAuth2_Request_'.$type;

		return new $class($method, $url, $params);
	}

	/**
	 * @var  boolean  send Authorization header?
	 */
	public $send_header = TRUE;

	/**
	 * Convert the request parameters into an `Authorization` header.
	 *
	 *     $header = $request->as_header();
	 *
	 * [!!] This method implements [OAuth 2.0 Spec 6.1](http://tools.ietf.org/html/draft-ietf-oauth-v2-07#section-6.1).
	 *
	 * @return  string
	 */
	public function as_header()
	{
		return 'token '.Arr::get($this->params, 'access_token');
	}

	/**
	 * Convert the request parameters into a query string, suitable for GET and
	 * POST requests.
	 *
	 *     $query = $request->as_query();
	 *
	 * [!!] This method implements [OAuth 1.0 Spec 5.2 (2,3)](http://oauth.net/core/1.0/#rfc.section.5.2).
	 *
	 * @param   boolean   include oauth parameters?
	 * @param   boolean   return a normalized string?
	 * @return  string
	 */
	public function as_query($include_oauth = NULL, $as_string = TRUE)
	{
		if ($include_oauth === NULL)
		{
			// If we are sending a header, OAuth parameters should not be
			// included in the query string.
			$include_oauth = ! $this->send_header;
		}

		if ($include_oauth)
		{
			$params = $this->params;
		}
		else
		{
			$params = array();
			foreach ($this->params as $name => $value)
			{
				if (strpos($name, 'oauth_') !== 0 AND $name !== 'access_token')
				{
					// This is not an OAuth parameter
					$params[$name] = $value;
				}
			}
		}

		return $as_string ? OAuth::normalize_params($params) : $params;
	}

}
