<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Member2;	      // Eloquent ORM
use App\Models\Action;  
use App\Models\Gubunmy;  
use App\Models\Vacation;  

class FindproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$text1 = $request -> input('text1');
		$data['text1'] = $text1;
       
	$data['list'] = $this->getlist($text1);		// 자료 읽기
    return view( 'findproduct.index', $data );	// 자료 표시(view/product폴더의 index.blade.php)
	
    }
	
	public function getlist($text1)
	{
/*
		   $result = Member2::leftjoin('gubunmies', 'member2s.division42', '=', 'gubunmies.id')->
	select('member2s.*', 'gubunmies.name42 as gubun_name42')->
	    where('member2s.name42', 'like', '%' . $text1 . '%')->
	    orderby('member2s.name42', 'asc')->
	    paginate(5)->appends(['text1'=>$text1]);
		
		
		   $result = Product::leftjoin('gubuns', 'products.gubuns_id42', '=', 'gubuns.id')->
	select('products.*', 'gubuns.name42 as gubun_name42')->
	    where('products.name42', 'like', '%' . $text1 . '%')->
	    orderby('products.name42', 'asc')->
	    paginate(5)->appends(['text1'=>$text1]);
		
		*/
		
		 $result = Member2::leftjoin('gubunmies', 'member2s.division42', '=', 'gubunmies.id')->
	select('member2s.*', 'gubunmies.name42 as gubun_name42')->
	    where('member2s.name42', 'like', '%' . $text1 . '%')->
	    orderby('member2s.name42', 'asc')->
	    paginate(5)->appends(['text1'=>$text1]);
		
    return $result;
	}


  


}
