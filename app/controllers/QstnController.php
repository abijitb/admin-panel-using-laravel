<?php


class QstnController extends BaseController {

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

	public function addSubjectLayout() {
		if(Auth::user()->role != '1') {
			return View::make('error.forbidden');
		}
		return View::make('subjects.add');
	}

	public function addSubject() {
		$input = Input::all();
		$values = array(
					'subject_code' => 'required|unique:subjects,subject_code',
					'subject_name' => 'required'
				);

		$msg = [
				'subject_code.required' => 'Enter Subject Code!',
				'subject_code.unique' => 'Subject Code Already Exist!',
				'subject_name.required' => 'Enter Subject Name'
		];
		$validator = Validator::make($input,$values,$msg);

		if($validator->fails()) {
			return Redirect::to('/subjects/add')->withErrors($validator)->withInput();
		}
		else {

			$subject = new Subject();
			$subject->subject_code = $input['subject_code'];
			$subject->subject_name = $input['subject_name'];
			$subject->ip_address = $this->getIp();
			$subject->save();


			Session::flash('add_message', 'Subject Added Successfully!');
			return Redirect::to('/subjects/add');
		}
	}

	public function viewSubjectLayout() {
		if(Auth::user()->role != '1') {
			return View::make('error.forbidden');
		}
		$subject = Subject::all();
		if(!$subject) {
			return View::make('error.404');
		}
		return View::make('subjects.view')->with('subject',$subject);
	}

	public function viewYearLayout() {
		if(Auth::user()->role != '1') {
			return View::make('error.forbidden');
		}
		$year = Year::all();
		if(!$year) {
			return View::make('error.404');
		}
		return View::make('years.view')->with('year',$year);
	}

	public function addYearLayout() {
		if(Auth::user()->role != '1') {
			return View::make('error.forbidden');
		}
		return View::make('years.add');
	}

	public function addYear() {
		$input = Input::all();
		$values = array(
					'year' => 'required|unique:years,year|numeric'
				);

		$msg = [
				'year.required' => 'Enter Year!',
				'year.unique' => 'Year Already Exist!',
				'year.numeric' => 'Year Must Be Numeric!'
		];
		$validator = Validator::make($input,$values,$msg);

		if($validator->fails()) {
			return Redirect::to('/years/add')->withErrors($validator)->withInput();
		}
		else {

			$year = new Year();
			$year->year = $input['year'];
			$year->ip_address = $this->getIp();
			$year->save();


			Session::flash('add_message', 'Year Added Successfully!');
			return Redirect::to('/years/add');
		}
	}

	public function addMcqLayout() {

		$subject = Subject::all();
		$year = Year::all();
		return View::make('mcq.add')->with('subject',$subject)->with('year',$year);
	}

	public function addMcq() {
		
		$input = Input::all();
		$values = array(
					'subject_code' => 'required',
					'year' => 'required',
					'question' => 'required|unique:mcq_questions,question',
					'option1' => 'required',
					'option2' => 'required',
					'option3' => 'required',
					'option4' => 'required',
					'answer' => 'required'
				);

		$msg = [
				'subject_code.required' => 'Choose Subject!',
				'year.required' => 'Choose Year!',
				'question.required' => 'Enter Question!',
				'question.unique' => 'Question Already Exist!',
				'option1.required' => 'Enter Option1!',
				'option2.required' => 'Enter Option2!',
				'option3.required' => 'Enter Option3!',
				'option4.required' => 'Enter Option4!',
				'answer.required' => 'Enter Answer!'
		];
		$validator = Validator::make($input,$values,$msg);

		if($validator->fails()) {
			return Redirect::to('/mcq/add')->withErrors($validator)->withInput();
		}
		else {

			$mcq_qstn = new McqQstn();

			$mcq_qstn->user_id = Auth::user()->id;
			$mcq_qstn->subject_code = $input['subject_code'];
			$mcq_qstn->year = $input['year'];
			$mcq_qstn->question = $input['question'];
			$mcq_qstn->option1 = $input['option1'];
			$mcq_qstn->option2 = $input['option2'];
			$mcq_qstn->option3 = $input['option3'];
			$mcq_qstn->option4 = $input['option4'];
			$mcq_qstn->answer = $input['answer'];

			if(Auth::user()->role == '1') {
				$mcq_qstn->status = '1';
			}
			else {
				$mcq_qstn->status = '0';
			}

			$mcq_qstn->ip_address = $this->getIp();
			$mcq_qstn->save();

			Session::flash('add_message', 'Question And Answer Added Successfully!');
			return Redirect::to('/mcq/add');
		}
	}

	public function addBroadLayout() {

		$subject = Subject::all();
		$year = Year::all();
		return View::make('broad.add')->with('subject',$subject)->with('year',$year);
	}

	public function addBroad() {
		
		$input = Input::all();
		$values = array(
					'subject_code' => 'required',
					'year' => 'required',
					'question' => 'required|unique:long_questions,question',
					'suggestion' => 'required',
					'answer' => 'required'
				);

		$msg = [
				'subject_code.required' => 'Choose Subject!',
				'year.required' => 'Choose Year!',
				'question.required' => 'Enter Question!',
				'question.unique' => 'Question Already Exist!',
				'suggestion.required' => 'Enter Suggestion!',
				'answer.required' => 'Enter Answer!'
		];
		$validator = Validator::make($input,$values,$msg);

		if($validator->fails()) {
			return Redirect::to('/broad/add')->withErrors($validator)->withInput();
		}
		else {

			$broad_qstn = new LongQstn();

			$broad_qstn->user_id = Auth::user()->id;
			$broad_qstn->subject_code = $input['subject_code'];
			$broad_qstn->year = $input['year'];
			$broad_qstn->question = $input['question'];

			$broad_qstn->suggestion = nl2br($input['suggestion']);

			$broad_qstn->answer = $input['answer'];

			if(Auth::user()->role == '1') {
				$broad_qstn->status = '1';
			}
			else {
				$broad_qstn->status = '0';
			}

			$broad_qstn->ip_address = $this->getIp();
			$broad_qstn->save();

			Session::flash('add_message', 'Question And Answer Added Successfully!');
			return Redirect::to('/broad/add');
		}
	}

/*	public function enterMcqQuestionIdLayout() {
		if(Auth::user()->role != '1') {
			return View::make('error.forbidden');
		}
		return View::make('mcq.enter-qstn-id');
	}

	public function enterMcqQuestionId() {
		$input = Input::all();
		$values = array(
					'id' => 'required|numeric'
				);

		$msg = ['id.required' => 'Enter Question ID!',
				'id.numeric' => 'Numerics Only!'
		];
		$validator = Validator::make($input,$values,$msg);

		if($validator->fails()) {
			return Redirect::to('/mcq/enter-qstn-id')->withErrors($validator);
		}
		else {

			$mcq = McqQstn::where('id','=',$input['id'])->first();

			if(!$mcq) {
				Session::flash('not_found', 'Invalid Question Id!');
				return Redirect::to('/mcq/enter-qstn-id');
			}

			return Redirect::to('/mcq/edit/'.$input['id']);
		}
	}*/

	public function editMcqLayout($id) {
		if(Auth::user()->role != '1') {
			return View::make('error.forbidden');
		}
		$subject = Subject::all();
		$year = Year::all();
		$mcq = McqQstn::where('id','=',$id)->first();
		if(!$mcq) {
			return View::make('error.404');
		}
		return View::make('mcq.edit')->with('subject',$subject)->with('year',$year)->with('mcq',$mcq);
	}

	public function editMcq($id) {
		$input = Input::all();
		$values = array(
					'subject_code' => 'required',
					'year' => 'required',
					'question' => 'required',
					'option1' => 'required',
					'option2' => 'required',
					'option3' => 'required',
					'option4' => 'required',
					'answer' => 'required',
					'status' => 'required|numeric'
				);

		$msg = [
				'subject_code.required' => 'Choose Subject!',
				'year.required' => 'Choose Year!',
				'question.required' => 'Enter Question!',
				'option1.required' => 'Enter Option1!',
				'option2.required' => 'Enter Option2!',
				'option3.required' => 'Enter Option3!',
				'option4.required' => 'Enter Option4!',
				'answer.required' => 'Enter Answer!',
				'status.required' => 'Select A Status!',
				'status.numeric' => 'Status can be only Numeric!'
		];
		$validator = Validator::make($input,$values,$msg);

		if($validator->fails()) {
			return Redirect::to('/mcq/edit/'.$id)->withErrors($validator)->withInput();
		}
		else {

			$mcq = new McqQstn();

			$mcq->where('id', '=', $id)
				->update(array('subject_code' => $input['subject_code'],
								'year' => $input['year'],
								'question' => $input['question'],
								'option1' => $input['option1'],
								'option2' => $input['option2'],
								'option3' => $input['option3'],
								'option4' => $input['option4'],
								'answer' => $input['answer'],
								'status' => $input['status'],
								));

			Session::flash('edit_message', 'Question And Answer Successfully Edited!');
			return Redirect::to('/mcq/edit/'.$id);
		}
	}

/*	public function enterBroadQuestionIdLayout() {
		if(Auth::user()->role != '1') {
			return View::make('error.forbidden');
		}
		return View::make('broad.enter-qstn-id');
	}

	public function enterBroadQuestionId() {
		$input = Input::all();
		$values = array(
					'id' => 'required|numeric'
				);

		$msg = ['id.required' => 'Enter Question ID!',
				'id.numeric' => 'Numerics Only!'
		];
		$validator = Validator::make($input,$values,$msg);

		if($validator->fails()) {
			return Redirect::to('/broad/enter-qstn-id')->withErrors($validator);
		}
		else {

			$broad = LongQstn::where('id','=',$input['id'])->first();

			if(!$broad) {
				Session::flash('not_found', 'Invalid Question Id!');
				return Redirect::to('/broad/enter-qstn-id');
			}

			return Redirect::to('/broad/edit/'.$input['id']);
		}
	}*/

	public function editBroadLayout($id) {
		if(Auth::user()->role != '1') {
			return View::make('error.forbidden');
		}
		$subject = Subject::all();
		$year = Year::all();
		$broad = LongQstn::where('id','=',$id)->first();
		if(!$broad) {
			return View::make('error.404');
		}
		return View::make('broad.edit')->with('subject',$subject)->with('year',$year)->with('broad',$broad);
	}

	public function editBroad($id) {
		$input = Input::all();
		$values = array(
					'subject_code' => 'required',
					'year' => 'required',
					'question' => 'required',
					'answer' => 'required',
					'suggestion' => 'required',
					'status' => 'required|numeric'
				);

		$msg = [
				'subject_code.required' => 'Choose Subject!',
				'year.required' => 'Choose Year!',
				'question.required' => 'Enter Question!',
				'answer.required' => 'Enter Answer!',
				'suggestion.required' => 'Enter Suggestion!',
				'status.required' => 'Select A Status!',
				'status.numeric' => 'Status can be only Numeric!'
		];
		$validator = Validator::make($input,$values,$msg);

		if($validator->fails()) {
			return Redirect::to('/broad/edit/'.$id)->withErrors($validator)->withInput();
		}
		else {

			$broad = new LongQstn();

			$suggestion = nl2br($input['suggestion']);

			$broad->where('id', '=', $id)
				->update(array('subject_code' => $input['subject_code'],
								'year' => $input['year'],
								'question' => $input['question'],
								'answer' => $input['answer'],
								'suggestion' => $suggestion,
								'status' => $input['status']
								));

			Session::flash('edit_message', 'Question And Answer Successfully Edited!');
			return Redirect::to('/broad/edit/'.$id);
		}
	}

	/*public function removeMcqLayout($id) {

		return View::make('mcq.remove');
	}*/

	public function removeMcq($id) {

			$mcq = new McqQstn();
			$mcq_check =McqQstn::where('id','=',$id)->first();
			if(!$mcq_check) {
				Session::flash('not_found', 'Question Not Found!');
				return Redirect::to('/mcq/view');
			}
			else {
				if(Auth::user()->role != '1') {
					$mcq_auth_check = McqQstn::where('id','=',$id)->where('user_id','=',Auth::user()->id)->first();
					if(!$mcq_auth_check) {
						Session::flash('not_belong', 'This Question Not Belongs To you!');
						return Redirect::to('/mcq/view');
					}
					else {
						$mcq->where('id', '=', $id)
						->update(array('status' => '2'));

						Session::flash('del_message', 'Question Successfully Moved to Trashed!');
						return Redirect::to('/mcq/view');
					}
				}
				else {
					$mcq->where('id', '=', $id)
						->delete();

					Session::flash('del_message', 'Question Successfully Deleted!');
					return Redirect::to('/mcq/view');
				}
			}
	}

	/*public function removeBroadLayout() {

		return View::make('broad.remove');
	}*/

	public function removeBroad($id) {
		
			$broad = new LongQstn();
			$broad_check = LongQstn::where('id','=',$id)->first();
			if(!$broad_check) {
				Session::flash('not_found', 'Question Id Not Found!');
				return Redirect::to('/broad/view/');
			}
			else {
				if(Auth::user()->role != '1') {
					$broad_auth_check = LongQstn::where('id','=',$id)->where('user_id','=',Auth::user()->id)->first();
					if(!$broad_auth_check) {
						Session::flash('not_belong', 'This Question Does not Belongs to you!');
						return Redirect::to('/broad/view/');
					}
					else {
						$broad->where('id', '=', $id)
						->update(array('status' => '2'));

						Session::flash('del_message', 'Question Successfully Moved to Trashed!');
						return Redirect::to('/broad/view/');
					}
					
				}
				else {
					$broad->where('id', '=', $id)
						->delete();

					Session::flash('del_message', 'Question Successfully Deleted!');
					return Redirect::to('/broad/view/');
				}
			}
	}

	public function viewMcqLayout() {

		if(Auth::user()->role != '1') {
			$mcq = McqQstn::where('user_id','=',Auth::user()->id)->orderBy('subject_code')->paginate(10);
		}
		else {
			$mcq = McqQstn::orderBy('subject_code')->paginate(10);
		}
		return View::make('mcq.view')->with('mcq',$mcq);
	}

	public function viewBroadLayout() {

		if(Auth::user()->role != '1') {
			$broad = LongQstn::where('user_id','=',Auth::user()->id)->orderBy('subject_code')->paginate(10);
		}
		else {
			$broad = LongQstn::orderBy('subject_code')->paginate(10);
		}
		return View::make('broad.view')->with('broad',$broad);
	}

	public function trash() {

		if(Auth::user()->role != '1') {
			$mcq = McqQstn::where('status','=','2')->where('user_id','=',Auth::user()->id)->orderBy('subject_code')->get();
			$broad = LongQstn::where('status','=','2')->where('user_id','=',Auth::user()->id)->orderBy('subject_code')->get();
		}
		else {
			$mcq = McqQstn::where('status','=','2')->orderBy('subject_code')->get();
			$broad = LongQstn::where('status','=','2')->orderBy('subject_code')->get();
		}
		return View::make('trash')->with('mcq',$mcq)->with('broad',$broad);
	}

}