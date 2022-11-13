@extends('main')
@section('content')

<br>

   <div class="card-body">
    <div class="table-responsive">
	
  <h1 class="h3 mb-2 text-gray-800">병사</h1>

<script>
	$(function() {
		
		$('#writeday42').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
		});

		$("#dday42") .datetimepicker({ 
			locale: "ko",
			format: "YYYY-MM-DD",
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
		  
<form name="form1" method="post" action="{{route('member.store')}}{{$tmp}}"
enctype="multipart/form-data">
@csrf
<table class="table table-bordered table-sm mymargin5">
 <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 군번</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="uid42" size="20" maxlength="20" value="{{ old('uid42') }}"
                         class="form-control form-control-sm">
            </div>
			@error("uid42") {{ $message }} @enderror
        </td>
    </tr>
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 주민번호</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="pwd42" size="20" maxlength="20" value="{{ old('pwd42') }}"
                         class="form-control form-control-sm">
            </div>
			@error("pwd42") {{ $message }} @enderror
        </td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 총기번호</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="gun42" size="20" maxlength="20" value="{{ old('gun42') }}"
                         class="form-control form-control-sm">
            </div>
			@error("gun42") {{ $message }} @enderror
        </td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 이름</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="name42" size="20" maxlength="20" value="{{ old('name42') }}"
                         class="form-control form-control-sm">
            </div>
			@error("name42") {{ $message }} @enderror
        </td>
    </tr>	
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 계급</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="rank42" size="20" maxlength="20" value="{{ old('rank42') }}"
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
					@foreach ($list as $row)
						@if ( $row->id == old('gubuns_id42') )
							<option value="{{ $row->id }}" selected>{{ $row->name42 }}</option>
						@else
							<option value="{{ $row->id }}">{{ $row->name42 }}</option>
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
                <input  type="text" name="position42" size="20" maxlength="20" value="{{ old('position42') }}"
                         class="form-control form-control-sm">
            </div>
			@error("position42") {{ $message }} @enderror
        </td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2">전화</td>
        <td width="80%" align="left">
            <div class="d-inline-flex">
                <input  type="text" name="tel1" size="3" maxlength="3" value="" class="form-control form-control-sm">-
				<input  type="text" name="tel2" size="4" maxlength="4" value="" class="form-control form-control-sm">-
				<input  type="text" name="tel3" size="4" maxlength="4" value="" class="form-control form-control-sm">
            </div>
        </td>
    </tr>
	

 
	
<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 생일</td>
        <td width="80%" align="left">
            <div class="form-inline">
				<div class="input-group input-group-sm date" id="writeday42">
					<input type="text" name="writeday42" size="10" value="{{old('writeday42')}}" class="form-control form-control-sm">
					<div class="input-group-append">
						<div class="input-group-text">
							<div class="input-group-addon">
								<i class="far fa-calendar-alt fa-lg"></i>
							</div>
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
            <div class="form-inline">
				<div class="input-group input-group-sm date" id="dday42">
					<input type="text" name="dday42" size="10" value="{{old('dday42')}}" class="form-control form-control-sm">
					<div class="input-group-append">
						<div class="input-group-text">
							<div class="input-group-addon">
								<i class="far fa-calendar-alt fa-lg"></i>
							</div>
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
                <input  type="text" name="juso42" size="20" maxlength="20" value="{{ old('juso42') }}"
                         class="form-control form-control-sm">
            </div>
			@error("juso42") {{ $message }} @enderror
        </td>
    </tr>
	
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 사진</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="file" name="pic42" size="20" maxlength="20" value=""
                         class="form-control form-control-sm">
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
    </div>


	    </div>
 	    </div>
@endsection


