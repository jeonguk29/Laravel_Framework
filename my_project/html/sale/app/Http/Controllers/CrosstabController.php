<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Product;	      // Eloquent ORM
use App\Models\Jangbu;	 


class CrosstabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {


		$text1 = $request -> input('text1');
		if(!$text1) $text1 = date("Y");
		
		$data['text1'] = $text1;
		$data['list'] = $this->getlist($text1);		// 자료 읽기
		

		return view( 'crosstab.index', $data );	// 자료 표시(view/product폴더의 index.blade.php)
	
    }
	
	public function getlist($text1)
	{

		$result = Jangbu::leftjoin('products','jangbus.products_id42','=','products.id')->
		select('products.name42 as product_name42',
		DB::raw('sum( if(month(jangbus.writeday42)=1, jangbus.numo42, 0) ) as s1,
		sum( if(month(jangbus.writeday42)=2, jangbus.numo42, 0) ) as s2,
		sum( if(month(jangbus.writeday42)=3, jangbus.numo42, 0) ) as s3,
		sum( if(month(jangbus.writeday42)=4, jangbus.numo42, 0) ) as s4,
		sum( if(month(jangbus.writeday42)=5, jangbus.numo42, 0) ) as s5,
		sum( if(month(jangbus.writeday42)=6, jangbus.numo42, 0) ) as s6,
		sum( if(month(jangbus.writeday42)=7, jangbus.numo42, 0) ) as s7,
		sum( if(month(jangbus.writeday42)=8, jangbus.numo42, 0) ) as s8,
		sum( if(month(jangbus.writeday42)=9, jangbus.numo42, 0) ) as s9,
		sum( if(month(jangbus.writeday42)=10, jangbus.numo42, 0) ) as s10,
		sum( if(month(jangbus.writeday42)=11, jangbus.numo42, 0) ) as s11,
		sum( if(month(jangbus.writeday42)=12, jangbus.numo42, 0) ) as s12'))->
		where(DB::raw('year(jangbus.writeday42)'),'=',$text1)-> 
		where('jangbus.io42','=',1)->
		orderby('products.name42')->
		groupby('products.name42')->
		paginate(5)->appends($text1);
		
	
	
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
