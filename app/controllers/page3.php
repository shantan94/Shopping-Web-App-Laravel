<?php
class page3 extends BaseController{
	public $restful=true;
	public function get_page3(){
		session_start();
		$shopping=[];
		if(isset($_SESSION['val'])&&isset($_SESSION['val1'])){
			foreach($_SESSION['val'] as $value1=>$value){
				$shopping[$value1]=DB::select(DB::raw("select * from Book b join WrittenBy wb on b.ISBN=wb.ISBN join Author a on wb.ssn=a.ssn join Stocks s on wb.ISBN=s.ISBN where b.ISBN='$value'"));
			}
		}
		if(isset($_POST['buy'])){
			foreach($_SESSION['val'] as $value1=>$value){
				$get=$_SESSION['val1'][$value1];
				echo $get;
				if($get<=$shopping[$value1][0]->number){
					$user=$_SESSION['username'];
					$ISBN=$shopping[$value1][0]->ISBN;
					$code=$shopping[$value1][0]->warehouseCode;
					DB::statement("update Stocks set number=number-'$get' where ISBN='$ISBN'");
					DB::statement("insert into ShoppingBasket values(null,'$user')");
					DB::statement("insert into Contains values('$ISBN',null,'$get')");
					DB::statement("insert into ShippingOrder values('$ISBN','$code','$user','$get')");
				}
			}
		}
		return View::make('page3')->with('shopping',$shopping);
	}
}
?>