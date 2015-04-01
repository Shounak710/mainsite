<?php

function ldap_auth($ldap_id, $ldap_password){
	$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
	if($ldap_id=='') die("You have not entered any LDAP ID. Please go back and fill it up.");
	if($ldap_password=='') die("You have not entered any password. Please go back and fill it up.");
	$sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$ldap_id)");
	$info = ldap_get_entries($ds, $sr);
        $roll = $info[0]["employeenumber"][0];
        //print_r($info);
	$ldap_id = $info[0]['dn'];
	if(@ldap_bind($ds,$ldap_id,$ldap_password)){
		return var_dump($info);
	}
	else
	{
		return "NONE";
	}

}
//echo ldap_auth($_GET['user'],$_GET['pass']);


class ITSPController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

/*	public function urls()
	{
	    Route::get('register',array('as'=>'events.ITSP.form','uses'=>'ITSPController@form'));
	}*/

	public function form()
	{
		return View::make('events.ITSP_2015.form');
	}

	public function index()
	{
		return View::make('events.ITSP_2015.index');
	}

	public function faq()
	{
		return View::make('events.ITSP_2015.faq');
	}

	public function timeline()
	{
		return View::make('events.ITSP_2015.timeline');
	}

	public function about()
	{
		return View::make('events.ITSP_2015.about');
	}

	public function abs()
	{
		return View::make('events.ITSP_2015.abstract');
	}

	public function auth()
	{	
		$id=Input::get("id");
		$team=Input::get("team");
		$club=Input::get("club");
		$roll=Input::get("roll");
		$pdf=Input::file("pdf");
		if(false)// && $id!="" && $team!="" && $club!="" && $roll!="" )
		{	
			$pdf=Input::file('pdf');
			$extension = Input::file('pdf')->getClientOriginalExtension();
			if($extension=="pdf"){
				$fileName=$club."_".$team."_".$roll."_".pdf;
				$destinationPath=public_path()."media/ITSP2015/qwrerttfaytfdyagadsaghgadugye2363613b/abstract/";
				Input::file('pdf')->move($destinationPath, $fileName);
			}
			return "sid";
		}
		$fileName=$club."_".$team."_".$roll.".pdf";
		$destinationPath=public_path()."/media/ITSP2015/qwrerttfaytfdyagadsaghgadugye2363613b/abstract/";
		echo $destinationPath;		
		$pdf->move($destinationPath, $fileName);
		return $pdf;


	}

	/*public function signup(Request $request)
	{

		$gpoid=Input::get("gpoEmail");
		$gpopw=Input::get("gpoPasswd");
		$gpoid=Input::get("teamId");
		$gpoid=Input::get("passwd");

		Schema


		

		$sstep_pass = DB::table('env')->where('id' , '=', 'sstep_pass')->first();
		
		if($password==$sstep_pass->val)
		{
			Session::put('admin', '1');
		}

		$messageBag = new MessageBag;
		$messageBag->add('message', "Password Error");
		return Redirect::back()
			->with('messages', $messageBag);

	}*/
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
