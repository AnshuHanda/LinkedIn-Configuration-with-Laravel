<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$data = Session::get('data');
		return View::make('user')->with('data', $data);
	}

	public function login()
	{
		$provider = new Linkedin(Config::get('social.linkedin'));
		if ( !Input::has('code'))
		{
			// If we don't have an authorization code, get one
			$provider->authorize();
		} 
		else 
		{
			try 
			{
				// Try to get an access token (using the authorization code grant)
				$t = $provider->getAccessToken('authorization_code', array('code' => Input::get('code')));
				try 
				{
					// We got an access token, let's now get the user's details
					$userDetails = $provider->getUserDetails($t);
					$resource = '/v1/people/~:(firstName,lastName,pictureUrl,positions,location,publicProfileUrl)';
					$params = array('oauth2_access_token' => $t->accessToken, 'format' => 'json');
					$url = 'https://api.linkedin.com' . $resource . '?' . http_build_query($params);
					$context = stream_context_create(array('http' => array('method' => 'GET')));
					$response = file_get_contents($url, false, $context);
					$data = json_decode($response);
							
					UserName::create([
						'FirstName'=>$data->firstName,
						'LastName'=>$data->lastName,
						'URL'=>$data->publicProfileUrl,
						'Location'=>$data->location->name
						]);
					
					return Redirect::to('/')->with('data',$data);
				}
				catch (Exception $e) 
				{
					return 'Unable to get user details';
				}
			} 
			catch (Exception $e) 
			{
				return 'Unable to get access token';
			}
		}
	}
}
