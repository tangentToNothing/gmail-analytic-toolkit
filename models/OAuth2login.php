<?php

namespace app\models;

use Yii;
use yii\base\Model;

require_once 'autoload.php';

/**
 * OAuth2login handles Google API login
 */
class OAuth2login extends Model
{
	public $authCode;

	if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    
  		$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/?r=site/dashboard';
  		header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
	} else {
		authorize();
	}

	function authorize()
	{
		$client = setClient();
		if (! isset($_GET['code'])) {
  			$auth_url = $client->createAuthUrl();
  			header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
		} else {
  			$client->authenticate($_GET['code']);
  			$_SESSION['access_token'] = $client->getAccessToken();
  			$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/?r=site/dashboard';
  			header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

	}

	function setClient()
	{
		$client = new Google_Client();
		$client->setAuthConfigFile('../assets/client_secret.json');
		$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/?r=site/dashboard');
		$client->addScope('https://www.googleapis.com/auth/gmail.readonly');
		return $client;
	}
}