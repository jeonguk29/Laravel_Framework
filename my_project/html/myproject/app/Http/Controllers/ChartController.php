<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Member2;	      // Eloquent ORM
use App\Models\Action;  
use App\Models\Gubunmy;  

class ChartController extends Controller
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
		
		$list = $this->getlist($text1,$text2);		// 자료 읽기
		
		$str_label="";
		$str_data="";
		foreach($list as $row)
		{
			$str_label .= "'$row->gubun_name42',";
			$str_data .= $row->cnumo42.',';
		}
		$data["str_label"] = $str_label;
		$data["str_data"] = $str_data;
		
		return view( 'chart.index', $data );	// 자료 표시(view/product폴더의 index.blade.php)
	
    }
	
	public function getlist($text1,$text2)
	{

		$result = Action::leftjoin('gubunmies','actions.divisions_id42','=','gubunmies.id')->
		select('gubunmies.name42 as gubun_name42', DB::raw('count(actions.divisions_id42) as cnumo42 '))->
		wherebetween('actions.writeday42',array($text1,$text2))->
		orderby('cnumo42','desc')->
		groupby('gubunmies.name42')->
		limit(4)->
		paginate(14)->appends(['text1'=>$text1,'text2'=>$text2]);
    
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
