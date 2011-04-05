<?php defined('SYSPATH') OR die('No direct access allowed.');

abstract class Kohana_OAuth_v2_Provider_Github extends OAuth_v2_Provider {

	public $name = 'github';

	public function url_authorize()
	{
		return 'https://github.com/login/oauth/authorize';
	}

	public function url_access_token(array $params = NULL)
	{
		return 'https://github.com/login/oauth/access_token';
	}

	public function url_verify_credentials(array $params = NULL)
	{
		return 'https://github.com/api/v2/json/user/show';
	}

	public function verify_credentials(OAuth_v2_Token_Access $token, OAuth_Consumer $consumer)
	{
		$request = OAuth_v2_Request::factory('credentials', 'GET', $this->url_verify_credentials(), array(
			'access_token'        => $token->token(),
		));

		return json_decode($request->execute());
	}
}