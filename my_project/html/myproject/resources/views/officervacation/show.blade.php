@extends('main')
@section('content')

     <div class="container-fluid">
	 
<br>
  <h1 class="h3 mb-2 text-gray-800">간부 출타자 확인/신청</h1>

   <div class="card shadow mb-4">
   <div class="card-header py-3">	

<form name="form1" method="post" action="">
<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 출발날짜</td>
        <td width="80%" align="left">{{$row -> startwriteday42}}</td>
    </tr>
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 복귀날짜</td>
        <td width="80%" align="left">{{$row -> endwriteday42}}</td>
    </tr>
	   <tr>
        <td width="20%" class="mycolor2">군번</td>
        <td width="80%" align="left">{{$row -> uids_id42}}</td>
    </tr>
		   <tr>
        <td width="20%" class="mycolor2">이름</td>
        <td width="80%" align="left">{{$row -> name42}}</td>
    </tr>
		   <tr>
        <td width="20%" class="mycolor2">계급</td>
        <td width="80%" align="left">{{$row -> rank42}}</td>
    </tr>
		   <tr>
        <td width="20%" class="mycolor2">휴대폰번호</td>
        <td width="80%" align="left">{{$row -> tel42}}
	
		</td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2">출타 지역</td>
        <td width="80%" align="left">{{$row -> area42}}
		</td>
    </tr>
	
	
</table>
</div>
</div>

<div align="center">
    <a href="{{ route( 'officervacation.edit', $row->id ) }}{{$tmp}}" class="btn btn-sm mycolor1">수정</a>
	<form action="{{ route('officervacation.destroy', $row->id) }}"> <!-- 보안 공격 방지--> 
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


