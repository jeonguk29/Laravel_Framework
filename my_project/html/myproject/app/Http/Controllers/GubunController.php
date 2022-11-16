<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Gubunmy;	      // Eloquent ORM
use Image;

class GubunController extends Controller
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
    return view( 'gubun.index', $data );	// 자료 표시(view/gubun폴더의 index.blade.php)
	
    }
	
	public function getlist($text1)
	{
		//$sql = 'select * from gubuns order by name';                    // Raw Query
         //$result = DB::select($sql);
		//$result = DB::table('gubun')->orderby('name')->get();      // Query Builder
		$result = Gubunmy::where('name42', 'like', '%' .$text1. '%')->orderby('name42','asc')->paginate(5)->appends(['text1' => $text1]);                            // Eloquent ORM
		// 필드이름 내번호 넣기 
    return $result;
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data['tmp'] = $this->qstring();
        return view('gubun.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

		$row = new Gubunmy; 		// gubun 모델변수 row 선언
		$this -> save_row($request, $row);		// 저장
		
		$tmp = $this->qstring();
		return  redirect('gubun'. $tmp);		// 목록화면으로 이동
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
		
     $data['row'] = Gubunmy::find($id);     //find는 id만 검색할수있는 함수임   //Eloquent ORM
	 return view('gubun.show', $data ); // 요기로 넣어줘라 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
	$data['tmp'] = $this->qstring();
	 $data['row'] = Gubunmy::find( $id );	// 자료 찾기
		return view('gubun.edit', $data );	// 수정화면 호출
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
       
		$row = Gubunmy::find($id); 		// gubun 모델변수 row 선언
		$this -> save_row($request, $row);		// 저장
		
		$tmp = $this->qstring();
		return  redirect('gubun'.$tmp);		// 목록화면으로 이동
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
		Gubunmy::find( $id )->delete();
		
		$tmp = $this->qstring();
		return redirect('gubun'.$tmp); // 다시 멤버 클레스로 가라 첫번째 실행은 index라 메인 페이지 보임 

    }
	
	public function save_row(Request $request, $row)
{
       $request->validate( [
    
        'name42' => 'required|max:20',
		'leader42' => 'required|max:20',
		'subleader42' => 'required|max:20',
    ] ,
    [
     
        'name42.required' => '이름은 필수입력입니다.',
		'leader42.required' => '소대장이름은 필수입력입니다.',
		'subleader42.required' => '분대장이름은 필수입력입니다.',
        'name42.max' => '20자 이내입니다.',
    ] );
	
        
		$row->name42 = $request->input("name42");
				$row->leader42 = $request->input("leader42");
						$row->subleader42 = $request->input("subleader42");
		
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
