<?php

class LoginController extends BaseController {

	public function __construct() {
	    $this->beforeFilter('@filterRequests');
	}

	public function filterRequests() {

	    if(Auth::check()) {
	        return Redirect::to('/');
	    }

	}

	public function getIp() {

		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
		$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
		$ipaddress = 'UNKNOWN';
		return $ipaddress;

	}
	
	public function login()
	{
		return View::make('login');
	}

	public function postLogin() {

		$input = Input::all();
		$values = array(
					'_email' => 'required|email',
					'_password' => 'required'
				);

		$msg = [
				'_email.required' => 'Enter Email Id!',
				'_email.email' => 'Enter a valid Email Id!',
				'_password.required' => 'Enter Password!'
		];
		$validate = Validator::make($input, $values,$msg);


		if($validate->fails()) {
			return Redirect::to('/login')->withErrors($validate)->withInput(Input::except('_password'));
		}
		else {
			$remember = (Input::has('remember')) ? true : false;
			$credentials = array('email' => $input['_email'], 'password' => $input['_password']);

			if(Auth::attempt($credentials, $remember)) {

				$user = new User();

				$last_ip_address = $this->getIp();
				$user->where('email', '=', $input['_email'])->update(array('last_ip_address' => $last_ip_address,
																			'last_login' => date('Y-m-d H:m:s')
																	));

				return Redirect::to('/');
			}
			else {
				Session::flash('login_message', 'Email or password is not found!');
				return Redirect::to('/login');
			}
		}
	
			
	}

}
