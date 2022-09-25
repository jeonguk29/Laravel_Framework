<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Member;	      // Eloquent ORM


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
	$data['list'] = $this->getlist();		// 자료 읽기
    return view( 'member.index', $data );	// 자료 표시(view/member폴더의 index.blade.php)
	
    }
	
	public function getlist()
	{
		//$sql = 'select * from members order by name';                    // Raw Query
         //$result = DB::select($sql);
		//$result = DB::table('member')->orderby('name')->get();      // Query Builder
		$result = Member::orderby('name42')->get();                            // Eloquent ORM
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
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate( [
        'uid42' => 'required|max:20',
        'pwd42' => 'required|max:20',
        'name42' => 'required|max:20',
    ] ,
    [
        'uid42.required'  => '아이디는 필수입력입니다.',
        'pwd42.required' => '암호는 필수입력입니다.',
        'name42.required' => '이름은 필수입력입니다.',
        'uid42.max'  => '20자 이내입니다.',
        'pwd42.max' => '20자 이내입니다.',
        'name42.max' => '20자 이내입니다.',
    ] );
	
        $tel1= $request->input("tel1");
		$tel2= $request->input("tel2");
		$tel3= $request->input("tel3");
		$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);	// 전화번호 합치기
		$row = new Member; 		// member 모델변수 row 선언
		
		$row->uid42 = $request->input("uid42");	// 값 입력 
		$row->pwd42 = $request->input("pwd42");
		$row->name42 = $request->input("name42");
		$row->tel42 = $tel;
		$row->rank42 = $request->input("rank42");
		$row->save();			// 저장
		return  redirect('member');		// 목록화면으로 이동
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $data['row'] = Member::find($id);     //find는 id만 검색할수있는 함수임   //Eloquent ORM
	 return view('member.show', $data ); // 요기로 넣어줘라 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data['row'] = Member::find( $id );	// 자료 찾기
		return view('member.edit', $data );	// 수정화면 호출
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
        $request->validate( [
        'uid42' => 'required|max:20',
        'pwd42' => 'required|max:20',
        'name42' => 'required|max:20',
    ] ,
    [
        'uid42.required'  => '아이디는 필수입력입니다.',
        'pwd42.required' => '암호는 필수입력입니다.',
        'name42.required' => '이름은 필수입력입니다.',
        'uid42.max'  => '20자 이내입니다.',
        'pwd42.max' => '20자 이내입니다.',
        'name42.max' => '20자 이내입니다.',
    ] );
	
        $tel1= $request->input("tel1");
		$tel2= $request->input("tel2");
		$tel3= $request->input("tel3");
		$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);	// 전화번호 합치기
		$row = Member::find($id); 		// member 모델변수 row 선언
		
		$row->uid42 = $request->input("uid42");	// 값 입력 
		$row->pwd42 = $request->input("pwd42");
		$row->name42 = $request->input("name42");
		$row->tel42 = $tel;
		$row->rank42 = $request->input("rank42");
		$row->save();			// 저장
		return  redirect('member');		// 목록화면으로 이동
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
		Member::find( $id )->delete();
		return redirect('member'); // 다시 멤버 클레스로 가라 첫번째 실행은 index라 메인 페이지 보임 

    }
}
