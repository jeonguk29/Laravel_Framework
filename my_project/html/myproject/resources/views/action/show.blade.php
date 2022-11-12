@extends('main')
@section('content')


    <div class="container-fluid">
<br>
  <h1 class="h3 mb-2 text-gray-800">작전명</h1>
  
  <div class="card shadow mb-4">
   <div class="card-header py-3">	

<form name="form1" method="post" action="">
<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font>  날짜</td>
        <td width="80%" align="left">{{$row -> writeday42}}</td>
    </tr>
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 소대명</td>
        <td width="80%" align="left">{{$row -> product_name42}}</td>
    </tr>
	   <tr>
        <td width="20%" class="mycolor2">작전명</td>
        <td width="80%" align="left">{{$row -> operation42}}</td>
    </tr>
		   <tr>
        <td width="20%" class="mycolor2">암구호</td>
        <td width="80%" align="left">{{$row -> code42}}</td>
    </tr>
		   <tr>
        <td width="20%" class="mycolor2">작전위치</td>
        <td width="80%" align="left">{{$row -> location42}}</td>
    </tr>
			   <tr>
        <td width="20%" class="mycolor2">담당간부</td>
        <td width="80%" align="left">{{$row -> manager42}}</td>
    </tr>
		   <tr>
        <td width="20%" class="mycolor2">상세 작전 계획</td>
        <td width="80%" align="left">{{$row -> bigo42}}
	
		</td>
    </tr>
	
	
</table>

</div>
</div>

<div align="center">
    <a href="{{ route( 'action.edit', $row->id ) }}{{$tmp}}" class="btn btn-sm mycolor1">수정</a>
	<form action="{{ route('action.destroy', $row->id) }}"> <!-- 보안 공격 방지--> 
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


