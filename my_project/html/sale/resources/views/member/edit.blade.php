@extends('main')
@section('content')

<br>
<div class="alert mycolor1" role="alert">사용자</div>

<script>
    function find_text()
    {
        form1.action="#";
        form1.submit();
    }
</script>

<!--

<form name="form1" method="post" action="" >
    <div class="row">
        <div class="col-3" align="left">            
				<div class="input-group  input-group-sm">
					<span class="input-group-text">이름</span>
					<input type="text" name="text1" value="" class="form-control" placeholder="찾을 이름?"  onKeydown="if (event.keyCode == 13) { find_text(); }" >
					<button class="btn mycolor1" type="button"  onClick="find_text();">검색</button>
				</div>

        </div>
        <div class="col-9" align="right">           
               <a href="#" class="btn btn-sm mycolor1">추가</a>
        </div>
    </div>
</form>

-->
<form name="form1" method="post" action="{{route('member.update', $row->id)}}">
@csrf
@method('PATCH')

<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left">{{$row->id}}</td>
    </tr>
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 이름</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="name42" size="20" maxlength="20" value="{{$row -> name42}}"
                         class="form-control form-control-sm">
            </div>
			@error("name42") {{ $message }} @enderror
        </td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 아이디</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="uid42" size="20" maxlength="20" value="{{$row -> uid42}}"
                         class="form-control form-control-sm">
            </div>
			@error("uid42") {{ $message }} @enderror
        </td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 암호</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="pwd42" size="20" maxlength="20" value="{{$row -> pwd42}}"
                         class="form-control form-control-sm">
            </div>
			@error("pwd42") {{ $message }} @enderror
        </td>
    </tr>
	<?
	$tel1 = trim(substr($row->tel42,0,3));
	$tel2 = trim(substr($row->tel42,3,4));
	$tel3 = trim(substr($row->tel42,7,4));
	
	?>
	
	<tr>
        <td width="20%" class="mycolor2">전화</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="tel1" size="3" maxlength="3" value="{{$tel1}}"
                         class="form-control form-control-sm">
				<input  type="text" name="tel2" size="4" maxlength="4" value="{{$tel2}}"
                         class="form-control form-control-sm">
				<input  type="text" name="tel3" size="4" maxlength="4" value="{{$tel3}}"
                         class="form-control form-control-sm">
            </div>
        </td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2">등급</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
			@if($row->rank42==0)
                <input  type="radio" name="rank42" value="0" checked>&nbsp;직원&nbsp;&nbsp;
                <input  type="radio" name="rank42" value="1">&nbsp;관리자
			@else
				 <input  type="radio" name="rank42" value="0">&nbsp;직원&nbsp;&nbsp;
                <input  type="radio" name="rank42" value="1" checked>&nbsp;관리자
            @endif
			</div>
        </td>
    </tr>
	
</table>


<div align="center">
	<input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
    <input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
</div>
</form>

    </div>
</body>
</html>

 
@endsection


