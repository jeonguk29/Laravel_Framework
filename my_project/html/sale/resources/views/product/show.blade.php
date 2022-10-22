@extends('main')
@section('content')


   
<br>
<div class="alert mycolor1" role="alert"> 제품</div>

<form name="form1" method="post" action="">
<table class="table table-bordered table-sm mymargin5">

    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left">{{$row -> id}}</td>
    </tr>
    
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 구분명</td>
        <td width="80%" align="left">{{$row -> gubun_name42}}</td>
    </tr>
	
	   <tr>
        <td width="20%" class="mycolor2">제품명</td>
        <td width="80%" align="left">{{$row->name42}}</td>
    </tr>
	
		   <tr>
        <td width="20%" class="mycolor2">단가</td>
        <td width="80%" align="left">{{$row->price42}}</td>
    </tr>
	
		   <tr>
        <td width="20%" class="mycolor2">재고</td>
        <td width="80%" align="left">{{$row->jaego42}}</td>
    </tr>
	
		   <tr>
        <td width="20%" class="mycolor2">사진</td>
        <td width="80%" align="left">
		
				<b>파일이름</b> : <?=$row->pic42 ?> <br>
	
			@if($row->pic42)   
			   <img src="{{ asset('storage/product_img/' . $row->pic42) }}"
					 width="200" class="img-fluid img-thumbnail margin5">
			@else        
				<img src=" " width="200" height="150" class="img-fluid img-thumbnail margin5">
			@endif
		</td>
    </tr>
			   
	
</table>


<div align="center">
    <a href="{{ route( 'product.edit', $row->id ) }}{{$tmp}}" class="btn btn-sm mycolor1">수정</a>
	<form action="{{ route('product.destroy', $row->id) }}"> <!-- 보안 공격 방지--> 
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm mycolor1" 
              onClick="return confirm('삭제할까요 ?');">삭제</button> &nbsp;
</form>

    <input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
</div>
</form>

   
@endsection


