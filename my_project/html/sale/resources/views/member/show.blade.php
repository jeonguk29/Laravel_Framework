@extends('main')
@section('content')

<?// // 연관배열 list를 row를 통해 출력.  List 11페이지 이름이랑 같아야함 				//$data['list'] = $this->getlist();

        $tel1 = trim(substr($row->tel42,0,3));  // list는 50명 자료 row가 한사람 자료 
        $tel2 = trim(substr($row->tel42,3,4));
        $tel3 = trim(substr($row->tel42,7,4));
        $tel = $tel1 . "-" . $tel2 . "-" . $tel3;
        $rank = $row->rank42==0 ? '직원' : '관리자';    // 0->직원, 1->관리자 
?>
   
<br>
<div class="alert mycolor1" role="alert">사용자</div>

<form name="form1" method="post" action="">
<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left">{{$row -> id}}</td>
    </tr>
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 이름</td>
        <td width="80%" align="left">{{$row -> name42}}</td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 아이디</td>
        <td width="80%" align="left">{{$row -> uid42}}</td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 암호</td>
        <td width="80%" align="left">{{$row -> pwd42}}</td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2">전화</td>
        <td width="80%" align="left">{{$tel}}</td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2">등급</td>
        <td width="80%" align="left">{{$rank}}</td>
    </tr>
	
</table>


<div align="center">
    <a href="{{ route( 'member.edit', $row->id ) }}{{$tmp}}" class="btn btn-sm mycolor1">수정</a>
	<form action="{{ route('member.destroy', $row->id) }}"> <!-- 보안 공격 방지--> 
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm mycolor1" 
              onClick="return confirm('삭제할까요 ?');">삭제</button> &nbsp;
</form>

    <input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
</div>
</form>

   
@endsection


