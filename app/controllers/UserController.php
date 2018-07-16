<?php


class UserController extends BaseController {

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

	}

	public function index() {

		if(Auth::user()->role != 1) {
			$mcq = McqQstn::where('status','=','0')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->take(10)->get();
			$broad = LongQstn::where('status','=','0')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->take(10)->get();
		}
		else {
			$mcq = McqQstn::where('status','=','0')->orderBy('id','desc')->take(10)->get();
			$broad = LongQstn::where('status','=','0')->orderBy('id','desc')->take(10)->get();
		}

		$mcq_count = McqQstn::count();
		$broad_count = LongQstn::count();

		$user = User::where('role','=','2')->count();
		$subject = Subject::count();

		return View::make('index')
					->with('user',$user)
					->with('subject',$subject)
					->with('mcq',$mcq)
					->with('broad',$broad)
					->with('mcq_count',$mcq_count)
					->with('broad_count',$broad_count);
	}

	public function getLogout() {
		Auth::logout();
    	return Redirect::to('/login');
	}

}