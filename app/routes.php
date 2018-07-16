<?php

	//---------------------------------------------------------------------
	// USER
	//---------------------------------------------------------------------
	Route::get('/','UserController@index');
	Route::get('/logout','UserController@getLogout');

	//---------------------------------------------------------------------
	// LOG IN
	//---------------------------------------------------------------------
	Route::get('/login','LoginController@login');
	Route::post('/login','LoginController@postLogin');

	//---------------------------------------------------------------------
	// QUESTIONS
	//---------------------------------------------------------------------
	// -- SUBJECTS --
	Route::get('/subjects/add','QstnController@addSubjectLayout');    
	Route::post('/subjects/add','QstnController@addSubject');
	Route::get('/subjects/view','QstnController@viewSubjectLayout');


	// -- YEARS --
	Route::get('/years/add','QstnController@addYearLayout');    
	Route::post('/years/add','QstnController@addYear');
	Route::get('/years/view','QstnController@viewYearLayout');


	// -- MCQ --
	Route::get('/mcq/add','QstnController@addMcqLayout');   // -- ADD --  //
	Route::post('/mcq/add','QstnController@addMcq');

	//Route::get('/mcq/enter-qstn-id','QstnController@enterMcqQuestionIdLayout');  // -- Question ID --  //
	//Route::post('/mcq/enter-qstn-id','QstnController@enterMcqQuestionId');

	Route::get('/mcq/edit/{id}','QstnController@editMcqLayout');	// -- EDIT --  //
	Route::post('/mcq/edit/{id}','QstnController@editMcq');

	//Route::get('/mcq/remove/{id}','QstnController@removeMcqLayout');	// -- REMOVE --  //
	Route::get('/mcq/remove/{id}','QstnController@removeMcq');

	Route::get('/mcq/view','QstnController@viewMcqLayout');	// -- VIEW ALL --  //


	// -- BROAD --
	Route::get('/broad/add','QstnController@addBroadLayout');     // -- ADD -- //
	Route::post('/broad/add','QstnController@addBroad');

	//Route::get('/broad/enter-qstn-id','QstnController@enterBroadQuestionIdLayout');  // -- Question ID --  //
	//Route::post('/broad/enter-qstn-id','QstnController@enterBroadQuestionId');

	Route::get('/broad/edit/{id}','QstnController@editBroadLayout');	// -- EDIT --  //
	Route::post('/broad/edit/{id}','QstnController@editBroad');

	//Route::get('/broad/remove/{id}','QstnController@removeBroadLayout');	// -- REMOVE --  //
	Route::get('/broad/remove/{id}','QstnController@removeBroad');

	Route::get('/broad/view','QstnController@viewBroadLayout');	// -- VIEW ALL --  //


	//---------------------------------------------------------------------
	// STAFF
	//---------------------------------------------------------------------
	Route::get('/staff/add','StaffController@addStaffLayout');
	Route::post('/staff/add','StaffController@addStaff');

	Route::get('/staff/edit/{id}','StaffController@editStaffLayout');
	Route::post('/staff/edit/{id}','StaffController@editStaff');

	Route::get('/staff/view','StaffController@viewStaffLayout');


	//---------------------------------------------------------------------
	// TRASH
	//---------------------------------------------------------------------
	Route::get('/trash','QstnController@trash');

	//---------------------------------------------------------------------
	// Error
	//---------------------------------------------------------------------

	Route::get('/{link1}','HomeController@link1');
	Route::get('/{link1}/{link2}','HomeController@link2');
	Route::get('/{link1}/{link2}/{link3}','HomeController@link3');
	Route::get('/{link1}/{link2}/{link3}/{link4}','HomeController@link4');
	Route::get('/{link1}/{link2}/{link3}/{link4}/{link5}','HomeController@link5');
