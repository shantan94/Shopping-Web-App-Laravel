<?php
class page2 extends BaseController{
	public $restful=true;
	public function get_page2(){
		session_start();
		return View::make('page2');
	}
	public function search(){
		session_start();
		$search=[];
		if(isset($_GET['author'])){
			$title=Input::get('search');
			$search=DB::select(DB::raw("select * from Book b join WrittenBy wb on b.ISBN=wb.ISBN join Author a on wb.ssn=a.ssn join Stocks s on wb.ISBN=s.ISBN where a.name='$title'"));
		}
		if(isset($_GET['booktitle'])){
			$title=Input::get('search');
			$search=DB::select(DB::raw("select * from Book b join WrittenBy wb on b.ISBN=wb.ISBN join Author a on wb.ssn=a.ssn join Stocks s on wb.ISBN=s.ISBN where b.title='$title'"));
		}
		if(isset($_GET['prevsearch'])&&isset($_GET['search'])&&isset($_SESSION['previous'])){
			foreach($_SESSION['previous'] as $value1=>$value){
				$search[$value1]=DB::select(DB::raw("select * from Book b join WrittenBy wb on b.ISBN=wb.ISBN join Author a on wb.ssn=a.ssn join Stocks s on wb.ISBN=s.ISBN where b.title='$value' or a.name='$value'"));
			}
		}
		return View::make('page2')->with('search',$search);
	}
}
?>