<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Member2;	      // Eloquent ORM
use App\Models\Action;  
use App\Models\Gubunmy;  
use App\Models\Vacation;  

class VacationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function index()
    {
		$data['tmp'] = $this->qstring();

		
		$text1 = request('text1');
		if(!$text1) $text1 = date("Y-m-d");
		
		$data['text1'] = $text1;
		$data['list'] = $this->getlist($text1);		// 자료 읽기
		return view( 'vacation.index', $data );	// 자료 표시(view/product폴더의 index.blade.php)
	
    }
	
	public function getlist($text1)
	{
		/*
	   $result = Jangbu::leftjoin('products', 'jangbus.products_id42', '=', 'products.id')->
	select('jangbus.*', 'products.name42 as product_name42')->
	          where('jangbus.io42', '=', 1)->
                        where('jangbus.writeday42', '=', $text1)->
                        orderby('jangbus.id','desc')->
                        paginate(5)->appends( ['text1',$text1] );
						*/
						

		

		$result = Vacation::leftjoin('member2s', 'vacations.uids_id42', '=', 'member2s.uid42')->
		select('vacations.*', 'member2s.name42 as product_name42')->
        where('vacations.startwriteday42', '=', $text1)->
        orderby('vacations.id','desc')->
        paginate(5)->appends( ['text1',$text1]);
		
		return $result;
	}
	
	function getlist_gubun()
	{
		 $result=Member2::orderby('name42')->get();
	  return $result;
	}
	

 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data['list'] = $this->getlist_gubun();
      $data['tmp'] = $this->qstring();
        return view('vacation.create', $data);
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $row = new Vacation;       // vacation 모델변수 row 선언
      $this -> save_row($request, $row);      // 저장
      
      $tmp = $this->qstring();
      return  redirect('vacation'. $tmp);      // 목록화면으로 이동
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $data['tmp'] = $this->qstring();   
	
	
        $data['row'] = Vacation::leftjoin('member2s', 'vacations.uids_id42', '=', 'member2s.uid42')->
		select('vacations.*', 'member2s.name42 as gubun_name42')->
	    where('vacations.id', '=', $id)->first();
		
    
    return view('vacation.show', $data ); // 요기로 넣어줘라 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     		$data['list'] = $this->getlist_gubun();
   $data['tmp'] = $this->qstring();
    $data['row'] = Vacation::find( $id );   // 자료 찾기
      return view('vacation.edit', $data );   // 수정화면 호출
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
       
		$row = Vacation::find($id); 		// vacation 모델변수 row 선언
		$this -> save_row($request, $row);		// 저장
		
		$tmp = $this->qstring();
		return  redirect('vacation'.$tmp);		// 목록화면으로 이동
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
      Vacation::find( $id )->delete();
      
      $tmp = $this->qstring();
      return redirect('vacation'.$tmp); // 다시 멤버 클레스로 가라 첫번째 실행은 index라 메인 페이지 보임 

    }
   
   public function save_row(Request $request, $row)
{
         $request->validate( [
    
        'startwriteday42' => 'required|date',
		'endwriteday42' => 'required|date',
			'uids_id42' => 'required',
		
    ] ,
    [
     
		'startwriteday42.required' => '날짜는 필수입력입니다.',
		'endwriteday42.required' => '날짜는 필수입력입니다.',
        'uids_id42.required' => '군번은 필수입력입니다.',
		'startwriteday42.data' => '날짜형식이 잘못되었습니다..',
		'endwriteday42.data' => '날짜형식이 잘못되었습니다..',
    ] );
	
   
   
      

		
     
		$row->startwriteday42 = $request->input("startwriteday42");
		$row->endwriteday42 = $request->input("endwriteday42");
		$row->uids_id42 = $request->input("uids_id42");
		$row->name42 = $request->input("name42");
		$row->rank42 = $request->input("rank42");
		$row->tel42 = $request->input("tel42");
		$row->area42 = $request->input("area42");
		
      $row->save();			// 저장
		
      
}

public function qstring()
{
    $text1 = request("text1") ? request('text1') : "";
    $page = request('page') ? request('page') : "1";
    $tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
    return $tmp;
}


}
