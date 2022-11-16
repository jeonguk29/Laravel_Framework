<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Officer;	      // Eloquent ORM
use App\Models\Gubunmy;  

use Image;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			if(session()->get("position42")!="중대장")return redirect("/");

		$data['tmp'] = $this->qstring();

		
		$text1 = request('text1');
		$data['text1'] = $text1;
        
	$data['list'] = $this->getlist($text1);		// 자료 읽기
    return view( 'officer.index',$data);	// 자료 표시(view/officer폴더의 index.blade.php)
	
    }
	
	public function getlist($text1)
	{

		   $result = Officer::leftjoin('gubunmies', 'officers.division42', '=', 'gubunmies.id')->
	select('officers.*', 'gubunmies.name42 as gubun_name42')->
	    where('officers.name42', 'like', '%' . $text1 . '%')->
	    orderby('officers.name42', 'asc')->
	    paginate(5)->appends(['text1'=>$text1]);
    return $result;
	}
	
		function getlist_gubun()
	{
		 $result=Gubunmy::orderby('name42')->get();
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
        return view('officer.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $row = new Officer;       // officer 모델변수 row 선언
      $this -> save_row($request, $row);      // 저장
      
      $tmp = $this->qstring();
      return  redirect('officer'. $tmp);      // 목록화면으로 이동
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
	
	
        $data['row'] = Officer::leftjoin('gubunmies', 'officers.division42', '=', 'gubunmies.id')->
	select('officers.*', 'gubunmies.name42 as gubun_name42')->
	    where('officers.id', '=', $id)->first();
		
    
    return view('officer.show', $data ); // 요기로 넣어줘라 

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
    $data['row'] = Officer::find( $id );   // 자료 찾기
      return view('officer.edit', $data );   // 수정화면 호출
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
       
		$row = Officer::find($id); 		// officer 모델변수 row 선언
		$this -> save_row($request, $row);		// 저장
		
		$tmp = $this->qstring();
		return  redirect('officer'.$tmp);		// 목록화면으로 이동
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
      Officer::find( $id )->delete();
      
      $tmp = $this->qstring();
      return redirect('officer'.$tmp); // 다시 멤버 클레스로 가라 첫번째 실행은 index라 메인 페이지 보임 

    }
   
   public function save_row(Request $request, $row)
{
       $request->validate( [
        'uid42' => 'required|max:11',
        'pwd42' => 'required|max:14',
        'name42' => 'required|max:20',
    ] ,
    [
        'uid42.required'  => '군번은 필수입력입니다.',
        'pwd42.required' => '주민등록번호는 필수입력입니다.',
        'name42.required' => '이름은 필수입력입니다.',
        'uid42.max'  => '10자 이내입니다.',
        'pwd42.max' => '14자 이내입니다.',
        'name42.max' => '20자 이내입니다.',
    ] );
   
        $tel1= $request->input("tel1");
      $tel2= $request->input("tel2");
      $tel3= $request->input("tel3");
      $tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);   // 전화번호 합치기
      
   
      
      $row->uid42 = $request->input("uid42");   // 값 입력 
      $row->pwd42 = $request->input("pwd42");
      $row->name42 = $request->input("name42");
	  
	  $row->article42 = $request->input("article42");
	  $row->articles42 = $request->input("articles42");
			
      $row->gun42 = $request->input("gun42");
      $row->division42 = $request->input("gubuns_id42");
      $row->position42 = $request->input("position42");
      $row->tel42 = $tel;
      $row->rank42 = $request->input("rank42");
      $row->writeday42 = $request->input("writeday42");
      $row->dday42 = $request->input("dday42");
      $row->juso42 = $request->input("juso42");
	
	if ($request->hasFile('pic42'))            // upload할 파일이 있는 경우
         {
            $pic42 = $request->file('pic42');
            $pic_name42 = $pic42->getClientOriginalName();             // 파일이름
            $pic42->storeAs('public/product_img', $pic_name42);        // 파일저장
            
            $img = Image::make($pic42)
               ->resize(null, 200, function($constraint){ $constraint->aspectRatio();})
               ->save('storage/product_img/thumb/' .$pic_name42);
            
            $row->pic42 = $pic_name42;                     // pic 필드에 파일이름 저장
         }
         
      $row->save();         // 저장
      
      return  redirect('officer');      // 목록화면으로 이동
      
}

public function qstring()
{
    $text1 = request("text1") ? request('text1') : "";
    $page = request('page') ? request('page') : "1";
    $tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
    return $tmp;
}


}
