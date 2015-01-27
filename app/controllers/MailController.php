<?php

class MailController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function send()
	{

		$data = Input::all();

		// Send email confirmation to info@codeup.com with attached resume.
		Mail::send('emails.message', $data, function($message) use ($data) {
	    	$message->from('info@codeup.com' , 'Codeup');
			
			// Get applicant info from form.
			$message->to($data['email'], $data['name']);
			$message->subject($data['subject']);

			// if ($data['application']['resume_path']) {
			// 	$message->attach($data['application']['resume_path']);
			// }
		});

		Session::flash('message', 'Message Sent!');
		return Redirect::back()->with('message', 'Message Sent!');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
