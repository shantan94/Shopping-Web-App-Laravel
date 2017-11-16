<?php
class page4 extends BaseController{
	public $restful=true;
	public function get_page4(){
		return View::make('page4');
	}
	public function get_register(){
		$user=Input::get('username');
		$pass=Input::get('password');
		$email=Input::get('email');
		$phone=Input::get('phone');
		$address=Input::get('address');
		$query=DB::statement("insert into customer values('$user','$address','$email','$phone',md5('$pass'))");
		if($query==0){
			$error='Username exists';
			return View::make('page4')->with('error',$error);
		}
		else{
			$error='Registration Complete';
			return View::make('page4')->with('error',$error);
		}
	}
}
?>