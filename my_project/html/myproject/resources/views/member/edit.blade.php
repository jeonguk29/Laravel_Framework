@extends('main')
@section('content')

<br>
<div class="alert mycolor1" role="alert">병사</div>

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
<form name="form1" method="post" action="{{route('member.update', $row->id)}}{{$tmp}}">
@csrf
@method('PATCH')

<table class="table table-bordered table-sm mymargin5">

    <tr>
        <td width="20%" class="mycolor2"> 군번</td>
        <td width="80%" align="left">{{$row->uid42}}</td>
    </tr>
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 주민번호</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="pwd42" size="20" maxlength="20" value="{{$row -> pwd42}}"
                         class="form-control form-control-sm">
            </div>
			@error("pwd42") {{ $message }} @enderror
        </td>
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
        <td width="20%" class="mycolor2"><font color="red">*</font> 계급</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="rank42" size="20" maxlength="20" value="{{$row -> rank42}}"
                         class="form-control form-control-sm">
            </div>
			@error("rank42") {{ $message }} @enderror
        </td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 소대</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="division42" size="20" maxlength="20" value="{{$row -> division42}}"
                         class="form-control form-control-sm">
            </div>
			@error("division42") {{ $message }} @enderror
        </td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 보직</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="position42" size="20" maxlength="20" value="{{$row -> position42}}"
                         class="form-control form-control-sm">
            </div>
			@error("position42") {{ $message }} @enderror
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
        <td width="20%" class="mycolor2"><font color="red">*</font> 생일</td>
        <td width="80%" align="left">
		   <div class="d-inline-flex">
						<div class="input-group  input-group-sm date" id="writeday42">
							 <input type="text" name="writeday42" size="10" value="{{$row->writeday42}}"
					 class="form-control form-control-sm">
			
					<div class="input-group-text">
						<div class="input-group-addon">
							<i class="far fa-calendar-alt fa-lg"></i>
						</div>
					</div>
					</div>
				</div>
			@error("writeday42") {{ $message }} @enderror
        </td>
    </tr>
	
	 <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 전역일</td>
        <td width="80%" align="left">
		   <div class="d-inline-flex">
						<div class="input-group  input-group-sm date" id="dday42">
							 <input type="text" name="dday42" size="10" value="{{$row->dday42}}"
					 class="form-control form-control-sm">
			
					<div class="input-group-text">
						<div class="input-group-addon">
							<i class="far fa-calendar-alt fa-lg"></i>
						</div>
					</div>
					</div>
				</div>
			@error("dday42") {{ $message }} @enderror
        </td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 주소</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="position42" size="20" maxlength="20" value="{{$row -> juso42}}"
                         class="form-control form-control-sm">
            </div>
			@error("juso42") {{ $message }} @enderror
        </td>
    </tr>
	
			   <tr>
        <td width="20%" class="mycolor2">사진</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="file" name="pic42" size="20" maxlength="20" value=""
                         class="form-control form-control-sm">
            </div>
			<br><br>
		<b>파일이름</b> : <?=$row->pic42 ?> <br>
	
			@if($row->pic42)   
			   <img src="{{ asset('storage/product_img/' . $row->pic42) }}"
					 width="200" class="img-fluid img-thumbnail margin5">
			@else        
				<img src=" " width="200" height="150" class="img-fluid img-thumbnail margin5">
			@endif
	</tr>
	
</table>


<div align="center">
	<input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
    <input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
</div>
</form>

    </div>


 
@endsection


