@extends('main')
@section('content')


   <div class="container-fluid">
<br>
  <h1 class="h3 mb-2 text-gray-800">소대</h1>
    <div class="card shadow mb-4">
   <div class="card-header py-3">	

<form name="form1" method="post" action="">
<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left">{{$row -> id}}</td>
    </tr>
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 소대 이름</td>
        <td width="80%" align="left">{{$row -> name42}}</td>
    </tr>
	    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 소대장</td>
        <td width="80%" align="left">{{$row -> leader42}}</td>
    </tr>
	    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 분대장</td>
        <td width="80%" align="left">{{$row -> subleader42}}</td>
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

</div>
</div>

<div align="center">
    <a href="{{ route( 'gubun.edit', $row->id ) }}{{$tmp}}" class="btn btn-sm mycolor1">수정</a>
	<form action="{{ route('gubun.destroy', $row->id) }}"> <!-- 보안 공격 방지--> 
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm mycolor1" 
              onClick="return confirm('삭제할까요 ?');">삭제</button> &nbsp;
</form>

    <input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
</div>
</form>
</div>

   
@endsection


