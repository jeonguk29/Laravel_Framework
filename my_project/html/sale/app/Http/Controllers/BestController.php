<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Product;	      // Eloquent ORM
use App\Models\Jangbu;	 


class BestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {


		
		$text1 = $request -> input('text1');
		if(!$text1) $text1 = date("Y-m-d", strtotime("-1 month"));
		
		$text2 = $request -> input('text2');
		if(!$text2) $text2 = date("Y-m-d");
		
		
		
		$data['text1'] = $text1;
		$data['text2'] = $text2;
		
		$data['list'] = $this->getlist($text1,$text2);		// 자료 읽기
		

		return view( 'best.index', $data );	// 자료 표시(view/product폴더의 index.blade.php)
	
    }
	
	public function getlist($text1,$text2)
	{

		$result = Jangbu::leftjoin('products','jangbus.products_id42','=','products.id')->
		select('products.name42 as product_name42',DB::raw('count(jangbus.numo42) as cnumo42'))-> 
             wherebetween( 'jangbus.writeday42', array($text1,$text2) )->
           orderby('cnumo42','desc')->
		   groupby('product_name42')->
           paginate(5)->appends( ['text1'=>$text1,'text2'=>$text2] );
		
	
	
	  return $result;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
	function getlist_product()
	{
		 $result=Product::orderby('name42')->get();
	  return $result;
	}
	
	
    


}
