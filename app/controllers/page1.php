<?php
class page1 extends BaseController{
	public $restful=true;
	public function get_page1(){
		session_start();
		return View::make('page1');
	}
	public function login(){
		session_start();
		$error='';
		$user=Input::get('username');
		$pass=Input::get('password');
		$check=table1::where('username',$user)->where('password',md5($pass))->get();
		if(count($check)==1){
			$_SESSION['username']=$user;
			header('location: '.url('page2'));
			die;
		}
		else{
			$error='Invalid username and password';
			return View::make('page1')->with('error',$error);
		}
	}
}
?>