<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Product;	      // Eloquent ORM
use App\Models\Gubun;	 
use Image;

class ProductController extends Controller
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
    return view( 'product.index', $data );	// 자료 표시(view/product폴더의 index.blade.php)
	
    }
	
	public function getlist($text1)
	{
		   $result = Product::leftjoin('gubuns', 'products.gubuns_id42', '=', 'gubuns.id')->
	select('products.*', 'gubuns.name42 as gubun_name42')->
	    where('products.name42', 'like', '%' . $text1 . '%')->
	    orderby('products.name42', 'asc')->
	    paginate(5)->appends(['text1'=>$text1]);
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
			return view('product.create', $data );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	 
	function getlist_gubun()
	{
		 $result=Gubun::orderby('name42')->get();
	  return $result;
	}
	
    public function store(Request $request)
    {

		$row = new Product; 		// product 모델변수 row 선언
		$this -> save_row($request, $row);		// 저장
		
		$tmp = $this->qstring();
		return  redirect('product'. $tmp);		// 목록화면으로 이동
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
	
    $data['row'] = Product::leftjoin('gubuns', 'products.gubuns_id42', '=', 'gubuns.id')->
	select('products.*', 'gubuns.name42 as gubun_name42')->
	    where('products.id', '=', $id)->first();
    return view('product.show', $data);
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
	 $data['row'] = Product::find( $id );	// 자료 찾기
		return view('product.edit', $data );	// 수정화면 호출
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
       
		$row = Product::find($id); 		// product 모델변수 row 선언
		$this -> save_row($request, $row);		// 저장
		
		$tmp = $this->qstring();
		return  redirect('product'.$tmp);		// 목록화면으로 이동
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
		Product::find( $id )->delete();
		
		$tmp = $this->qstring();
		return redirect('product'.$tmp); // 다시 멤버 클레스로 가라 첫번째 실행은 index라 메인 페이지 보임 

    }
	
	public function save_row(Request $request, $row)
{
       $request->validate( [
    
        'gubuns_id42' => 'required|numeric',
		'name42' => 'required|max:50',
		'price42' => 'required|numeric',
    ] ,
    [
     
		'gubuns_id42.required' => '구분명은 필수입력입니다.',
        'name42.required' => '이름은 필수입력입니다.',
		'price42.required' => '단가는 필수입력입니다.',
        'name42.max' => '50자 이내입니다.',
    ] );
	
	
		
        
		$row->gubuns_id42 = $request->input("gubuns_id42");
			$row->name42 = $request->input("name42");
				$row->price42 = $request->input("price42");
					$row->jaego42 = $request->input("jaego42");
	
						
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

      
      $row->save();
      
   
   
   }


public function qstring()
{
    $text1 = request("text1") ? request('text1') : "";
    $page = request('page') ? request('page') : "1";
    $tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
    return $tmp;
}

public function jaego()
{
	DB::statement('drop table if exists temps;');
		DB::statement('create table temps(
		id int not null auto_increment,
		products_id42 int,
		jaego42 int default 0,
		primary key(id) ); ');
	
	DB::statement('update products set jaego42=0;');
	DB::statement('insert into temps (products_id42, jaego42)
	select products_id42, sum(numi42)-sum(numo42)
	from jangbus
	group by products_id42;');
	
	DB::statement('update products join temps 
	on products.id=temps.products_id42
	set products.jaego42=temps.jaego42;');

	return redirect('product');
}
}
