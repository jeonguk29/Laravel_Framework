<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Product;	      // Eloquent ORM
use App\Models\Jangbu;	 

require "../vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class GiganController extends Controller
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
		
		$text3 = $request -> input('text3');
		if(!$text3) $text3=0;
		
		$data['text1'] = $text1;
		$data['text2'] = $text2;
		$data['text3'] = $text3;
		$data['list'] = $this->getlist($text1,$text2,$text3);		// 자료 읽기
		
		$data['list_product'] = $this->getlist_product();	
		return view( 'gigan.index', $data );	// 자료 표시(view/product폴더의 index.blade.php)
	
    }
	
	public function getlist($text1,$text2,$text3)
	{
		if($text3==0) //제품이 전체인 경우
		$result = Jangbu::leftjoin('products','jangbus.products_id42','=','products.id')->
        select('jangbus.*','products.name42 as product_name42')->
             wherebetween( 'jangbus.writeday42', array($text1,$text2) )->
           orderby('jangbus.id','desc')->
           paginate(5)->appends( ['text1'=>$text1,'text2'=>$text2,'text3'=>$text3] );
		else
		$result = Jangbu::leftjoin('products','jangbus.products_id42','=','products.id')->
        select('jangbus.*','products.name42 as product_name42')->
             wherebetween( 'jangbus.writeday42', array($text1,$text2) )->
             where('jangbus.products_id42', "=", $text3)->
           orderby('jangbus.id','desc')->
            paginate(5)->appends( ['text1'=>$text1,'text2'=>$text2,'text3'=>$text3] );
		
	
	  return $result;
	}
	
	public function getlist_all($text1,$text2,$text3)
	{
		if($text3==0) //제품이 전체인 경우
		$result = Jangbu::leftjoin('products','jangbus.products_id42','=','products.id')->
        select('jangbus.*','products.name42 as products_name42')->
             wherebetween( 'jangbus.writeday42', array($text1,$text2))->
           orderby('jangbus.id','desc')->get();
		else
		$result = Jangbu::leftjoin('products','jangbus.products_id42','=','products.id')->
        select('jangbus.*','products.name42 as products_name42')->
             wherebetween( 'jangbus.writeday42', array($text1,$text2) )->
             where('jangbus.products_id42', "=", $text3)->
           orderby('jangbus.id','desc')->get();
		   
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
	
	public function excel()
	{
		$text1=request('text1');
		$text2=request('text2');
		$text3=request('text3');
		$list = $this -> getlist_all($text1,$text2,$text3);
		
	
		$sheet = new Spreadsheet();
		// 각 열의 너비, 정렬 
		$sheet -> getActiveSheet()->getColumnDimension("A")->setWidth(12);
		$sheet -> getActiveSheet()->getColumnDimension("B")->setWidth(25);
		$sheet -> getActiveSheet()->getColumnDimension("C")->setWidth(12);
		$sheet -> getActiveSheet()->getColumnDimension("D")->setWidth(12);
		$sheet -> getActiveSheet()->getColumnDimension("E")->setWidth(12);
		$sheet -> getActiveSheet()->getColumnDimension("F")->setWidth(12);
		$sheet -> getActiveSheet()->getColumnDimension("G")->setWidth(12);



		$sheet -> getActiveSheet()->getStyle("A")->getAlignment()->setHorizontal("center");		
		$sheet -> getActiveSheet()->getStyle("B")->getAlignment()->setHorizontal("left");	
		$sheet -> getActiveSheet()->getStyle("C:F")->getAlignment()->setHorizontal("right");	
		$sheet -> getActiveSheet()->getStyle("G")->getAlignment()->setHorizontal("left");	
		
		// 제목 (글자크기, 굵게)
		$sheet -> setActiveSheetIndex(0)->setCellValue("A1", "매출입장");			
		$sheet -> getActiveSheet()->getStyle("A1")->getFont()->setSize(13);	
		$sheet -> getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
	
		// 기간(정렬)
		$sheet -> setActiveSheetIndex(0)->setCellValue("G1", "기간: $text1 - $text2");			
		$sheet -> getActiveSheet()->getStyle("G1")->getAlignment()->setHorizontal("right");	
		
		// 헤더 정렬, 배경색 
		$sheet->getActiveSheet()->getStyle("A2:G2")->getAlignment()->setHorizontal("center");
		// 헤더 배경색(밝은 회색)
		$sheet->getActiveSheet()->getStyle("A2:G2")->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()->setARGB('FFCCCCCC');
		// 헤더 글자 출력
		$sheet->setActiveSheetIndex(0) 
			->setCellValue("A2", "날짜")
			->setCellValue("B2", "제품명")
			->setCellValue("C2", "단가")
			->setCellValue("D2", "매입수량")
			->setCellValue("E2", "매출수량")
			->setCellValue("F2", "금액")
			->setCellValue("G2", "비고");
			
		$i=3;
		foreach ( $list as $row )    // 3행부터 자료 출력
		{
			$sheet->setActiveSheetIndex(0)
				->setCellValue("A$i",$row->writeday42)
				->setCellValue("B$i",$row->products_name42)
				->setCellValue("C$i",$row->price42 ? $row->price42 : "")
				->setCellValue("D$i",$row->numi42 ? $row->numi42 : "")
				->setCellValue("E$i",$row->numo42 ? $row->numo42 : "")
				->setCellValue("F$i",$row->prices42 ? $row->prices42 : "")
				->setCellValue("G$i",$row->bigo42);
			$i++;
		}
		$sheet->setActiveSheetIndex(0);
		$fname="매출입장($text1 - $text2).xlsx";     // 파일이름 생성
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Content-Disposition: attachment;filename=$fname");
		header("Cache-Control: max-age=0");
		
		$writer = IOFactory::createWriter($sheet, "Xlsx"); // xlsx형식
		$writer->save("php://output");
		
	}
	
    


}
