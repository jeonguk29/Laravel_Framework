<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Gubun;	      // Eloquent ORM
use Response;

class AjaxController extends Controller
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
		$data['text1'] = $text1;
        
	$data['list'] = $this->getlist($text1);		// 자료 읽기
    return view( 'ajax.index', $data );	// 자료 표시(view/gubun폴더의 index.blade.php)
	
    }
	
	public function getlist($text1)
	{
		//$sql = 'select * from gubuns order by name';                    // Raw Query
         //$result = DB::select($sql);
		//$result = DB::table('gubun')->orderby('name')->get();      // Query Builder
		$result = Gubun::where('name42', 'like', '%' .$text1. '%')->orderby('name42','asc')->paginate(5)->appends(['text1' => $text1]);                            // Eloquent ORM
		// 필드이름 내번호 넣기 
    return $result;
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

		$row = new Gubun; 		// gubun 모델변수 row 선언
		$this -> save_row($request, $row);		// 저장
		

		return  response()->json($row);
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
       
		$row = Gubun::find($id); 		// gubun 모델변수 row 선언
		$this -> save_row($request, $row);		// 저장
		
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
		Gubun::find( $id )->delete();
		
    }
	
	public function save_row(Request $request, $row)
{
       $request->validate( [
    
        'name42' => 'required|max:20',
    ] ,
    [
     
        'name42.required' => '이름은 필수입력입니다.',
        'name42.max' => '20자 이내입니다.',
    ] );
	
        
		$row->name42 = $request->input("name42");
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
