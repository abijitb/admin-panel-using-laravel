<?php

class StaffController extends BaseController {

	public function __construct() {
		   $this->beforeFilter('@filterRequests');
	}

	public function filterRequests() {

		   if(!Auth::check()) {
		      return Redirect::to('/login');
		   }
		   if(Auth::user()->status == '0') {
		   		Auth::logout();
		   		return View::make('error.block');
		   }
		   if(Auth::user()->role != '1') {
				return View::make('error.forbidden');
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

	public function addStaffLayout() {
		return View::make('staff.add');
	}

	public function addStaff() {
		$input = Input::all();
		$values = array(
					'first_name' => 'required|min:3',
					'last_name' => 'required|min:2',
					'email' => 'required|email|unique:users,email',
					'password' => 'required|min:8',
					're_password' => 'required|min:8|same:password',
					'phone_no' => 'required|min:10|numeric'
				);

		$msg = [
				'first_name.required' => 'Enter First Name!',
				'first_name.min' => 'Name Too Short!',
				'last_name.required' => 'Enter Last Name!',
				'last_name.min' => 'Name Too Short!',
				'email.required' => 'Enter Email Id!',
				'email.email' => 'Enter a Valid Email Id!',
				'email.unique' => 'Email Id Already Taken!',
				'password.required' => 'Enter Password!',
				'password.min' => 'Password Must Be Atleast 8 Character Long!',
				're_password.required' => 'Re Enter Your Password!',
				're_password.min' => 'Password Must Be Atleast 8 Character Long!',
				're_password.same' => 'Password Mismatch!',
				'phone_no.required' => 'Enter Phone Number!',
				'phone_no.min' => 'Enter a Valid Phone Number!',
				'phone_no.numeric' => 'Phone Number Must Be Numeric!'
		];
		$validator = Validator::make($input,$values,$msg);

		if($validator->fails()) {
			return Redirect::to('/staff/add')->withErrors($validator)->withInput();
		}
		else {
			
			$email = explode('@',trim($input['email']));

			if($email[1] != 'gmail.com') {
				Session::flash('gmail_message','Only Gmail Id Will Be Accepted!');
				return Redirect::to('/staff/add');
			}
			else {
				$staff = new User();

				$staff->role = '2';
				$staff->first_name = $input['first_name'];
				$staff->last_name = $input['last_name'];
				$staff->email = $input['email'];

				$staff->password = Hash::make($input['password']);
				$staff->user_name = $email[0];

				$staff->phone_no = $input['phone_no'];
				$staff->ip_address = $this->getIp();
				$staff->status = '1';

				$staff->save();

				Session::flash('add_message','Staff Added Successfully!');
				return Redirect::to('/staff/add');
			}

		}
	}

	public function editStaffLayout($id) {
		
		$staff = User::where('id','=',$id)->where('role','=','2')->first();
		if(!$staff) {
			return View::make('error.404');
		}
		return View::make('staff.edit')->with('staff',$staff);
	}

	public function editStaff($id) {
		$input = Input::all();
		$values = array(
					'first_name' => 'required|min:3',
					'last_name' => 'required|min:2',
					'email' => 'required|email',
					'phone_no' => 'required|min:10|numeric',
					'role' => 'required|numeric',
					'status' => 'required|numeric'
				);

		$msg = [
				'first_name.required' => 'Enter First Name!',
				'first_name.min' => 'Name Too Short!',
				'last_name.required' => 'Enter Last Name!',
				'last_name.min' => 'Name Too Short!',
				'email.required' => 'Enter Email Id!',
				'email.email' => 'Enter a Valid Email Id!',
				'phone_no.required' => 'Enter Phone Number!',
				'phone_no.min' => 'Enter a Valid Phone Number!',
				'phone_no.numeric' => 'Phone Number Must Be Numeric!',
				'role.required' => 'Select Role!',
				'role.numeric' => 'Role Should be Numeric!',
				'status.required' => 'Select Status!',
				'status.numeric' => 'Status Should be Numeric!'
		];
		$validator = Validator::make($input,$values,$msg);

		if($validator->fails()) {
			return Redirect::to('/staff/edit/'.$id)->withErrors($validator)->withInput();
		}
		else {
			$staff = new User();

			$staff->where('id', '=', $id)
				->update(array('first_name' => $input['first_name'],
								'last_name' => $input['last_name'],
								'email' => $input['email'],
								'phone_no' => $input['phone_no'],
								'status' => $input['status'],
								'role' => $input['role']
								));

			Session::flash('edit_message', 'Staff Successfully Edited!');
			return Redirect::to('/staff/view/');
		}
	}

	public function viewStaffLayout() {
		
		$staff = User::where('role','=','2')->get();
		if(!$staff) {
			return View::make('error.404');
		}
		return View::make('staff.view')->with('staff',$staff);
	}

}