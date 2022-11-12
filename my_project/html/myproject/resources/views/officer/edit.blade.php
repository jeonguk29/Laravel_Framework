@extends('main')
@section('content')

<br>
    <div class="card-body">
    <div class="table-responsive">
	
  <h1 class="h3 mb-2 text-gray-800">간부</h1>


<script>
	$(function() {
		$('#writeday42').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
	});
	});
	
		   	$(function() {
		$('#dday42').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
	});
	});
	
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

       <div class="card shadow mb-4">
          <div class="card-header py-3">
		  
<form name="form1" method="post" action="{{route('officer.update', $row->id)}}{{$tmp}}"
enctype="multipart/form-data">
@csrf
@method('PATCH')

<table class="table table-bordered table-sm mymargin5">

 <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 군번</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="uid42" size="20" maxlength="20" value="{{$row -> uid42}}"
                         class="form-control form-control-sm">
            </div>
			@error("uid42") {{ $message }} @enderror
        </td>
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
        <td width="20%" class="mycolor2"><font color="red">*</font> 총기번호</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="gun42" size="20" maxlength="20" value="{{$row -> gun42}}"
                         class="form-control form-control-sm">
            </div>
			@error("gun42") {{ $message }} @enderror
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
        <td width="20%" class="mycolor2">출신 구분</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
			@if($row->article42==0)
                <input  type="radio" name="article42" value="0" checked>&nbsp;장교&nbsp;&nbsp;
                <input  type="radio" name="article42" value="1">&nbsp;부사관
			@else
				 <input  type="radio" name="article42" value="0">&nbsp;장교&nbsp;&nbsp;
                <input  type="radio" name="article42" value="1" checked>&nbsp;부사관
            @endif
			</div>
        </td>
    </tr>
	
		<tr>
        <td width="20%" class="mycolor2">장/단기 구분</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
			@if($row->articles42==0)
                <input  type="radio" name="articles42" value="0" checked>&nbsp;장기&nbsp;&nbsp;
                <input  type="radio" name="articles42" value="1">&nbsp;단기
			@else
				 <input  type="radio" name="articles42" value="0">&nbsp;장기&nbsp;&nbsp;
                <input  type="radio" name="articles42" value="1" checked>&nbsp;단기
            @endif
			</div>
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
                         <select name="gubuns_id42" class="form-control form-control-sm">
							<option value="" selected>선택하세요.</option>
							@foreach ($list as $row1)
								@if ( $row->gubuns_id42 == $row1->id )
									<option value="{{ $row1->id }}" selected>{{ $row1->name42 }}</option>
								@else
									<option value="{{ $row1->id }}">{{ $row1->name42 }}</option>
								@endif
							@endforeach
					</select>
            </div>
			@error("gubuns_id42") {{ $message }} @enderror
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
                <input  type="text" name="juso42" size="20" maxlength="20" value="{{$row -> juso42}}"
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
  </div>
    </div>

 
@endsection


