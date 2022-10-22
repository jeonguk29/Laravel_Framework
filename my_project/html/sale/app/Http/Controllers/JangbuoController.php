<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Product;	      // Eloquent ORM
use App\Models\Jangbu;	 

class JangbuoController extends Controller
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
		return view( 'jangbuo.index', $data );	// 자료 표시(view/product폴더의 index.blade.php)
	
    }
	
	public function getlist($text1)
	{
		   $result = Jangbu::leftjoin('products', 'jangbus.products_id42', '=', 'products.id')->
	select('jangbus.*', 'products.name42 as product_name42')->
	          where('jangbus.io42', '=', 1)->
                        where('jangbus.writeday42', '=', $text1)->
                        orderby('jangbus.id','desc')->
                        paginate(5)->appends( ['text1',$text1] );
    return $result;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		   $data['list'] = $this->getlist_product();
		   
			$data['tmp'] = $this->qstring();
			return view('jangbuo.create', $data );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	 
	function getlist_product()
	{
		 $result=Product::orderby('name42')->get();
	  return $result;
	}
	
    public function store(Request $request)
    {

		$row = new Jangbu; 		// jangbuo 모델변수 row 선언
		$this -> save_row($request, $row);		// 저장
		
		$tmp = $this->qstring();
		return  redirect('jangbuo'. $tmp);		// 목록화면으로 이동
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
	
    $data['row'] = Jangbu::leftjoin('products', 'jangbus.products_id42', '=', 'products.id')->
	select('jangbus.*', 'products.name42 as product_name42')->
	    where('jangbus.id', '=', $id)->first();
    return view('jangbuo.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		
    $data['list'] = $this->getlist_product();
	$data['tmp'] = $this->qstring();
	  $data['row'] = Jangbu::leftjoin('products', 'jangbus.products_id42', '=', 'products.id')->
	select('jangbus.*', 'products.name42 as product_name42')->
	    where('jangbus.id', '=', $id)->first();
		return view('jangbuo.edit', $data );	// 수정화면 호출
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
       
		$row = Jangbu::find($id); 		// jangbuo 모델변수 row 선언
		$this -> save_row($request, $row);		// 저장
		
		$tmp = $this->qstring();
		return  redirect('jangbuo'.$tmp);		// 목록화면으로 이동
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
		Jangbu::find( $id )->delete();
		
		$tmp = $this->qstring();
		return redirect('jangbuo'.$tmp); // 다시 멤버 클레스로 가라 첫번째 실행은 index라 메인 페이지 보임 

    }
	
	public function save_row(Request $request, $row)
{
       $request->validate( [
    
        'writeday42' => 'required|date',
		'products_id42' => 'required',
    ] ,
    [
     
		'writeday42.required' => '날짜는 필수입력입니다.',
        'products_id42.required' => '제품명은 필수입력입니다.',
		'writeday42.data' => '날짜형식이 잘못되었습니다..',
    ] );
	
	
		
        $row->io42		 = 1;
		$row->writeday42 = $request->input("writeday42");
		$row->products_id42 = $request->input("products_id42");
		$row->price42 = $request->input("price42");
		$row->numi42 = 0;
		$row->numo42 = $request->input("numo42");
		$row->prices42 = $request->input("prices42");
		$row->bigo42 = $request->input("bigo42");

		
						
				
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
