@extends('main')
@section('content')

<br>
    <div class="card-body">
    <div class="table-responsive">
	
  <h1 class="h3 mb-2 text-gray-800">간부 출타자 확인/신청</h1>
<script>
	$(function() {
		
		$('#startwriteday42').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
		});

		$("#endwriteday42") .datetimepicker({ 
			locale: "ko",
			format: "YYYY-MM-DD",
			defaultDate: moment()
		});
		
	});
	
	function select_product()
	{
		var str;
		str = form1.uids_id42.value;
		if(str=="")
		{
			form1.uids_id42.value="";
			form1.name42.value="";
			form1.rank42.value="";
			form1.tel42.value="";
		}
		else
		{
			str = str.split("^^");
			form1.uids_id42.value=str[0];
			form1.name42.value=str[1];
			form1.rank42.value=str[2];
			form1.tel42.value=str[3];
		}
	}
	
		
	function find_product()
	{
		window.open("{{route('findofficer.index')}}","",
		"resizable=yes,scrollbars=yes, width=1200,height=1200");
	}
	
</script>
      <div class="card shadow mb-4">
          <div class="card-header py-3">

<form name="form1" method="post" action="{{route('officervacation.update', $row->id)}}{{$tmp}}"
  enctype="multipart/form-data">
@csrf
@method('PATCH')

<table class="table table-bordered table-sm mymargin5">

    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 도착날짜</td>
        <td width="80%" align="left">
		   <div class="d-inline-flex">
						<div class="input-group  input-group-sm date" id="startwriteday42">
							 <input type="text" name="startwriteday42" size="10" value="{{$row->startwriteday42}}"
					 class="form-control form-control-sm">
			
					<div class="input-group-text">
						<div class="input-group-addon">
							<i class="far fa-calendar-alt fa-lg"></i>
						</div>
					</div>
					</div>
				</div>
			@error("startwriteday42") {{ $message }} @enderror
        </td>
    </tr>
	
	   <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 복귀날짜</td>
        <td width="80%" align="left">
		   <div class="d-inline-flex">
						<div class="input-group  input-group-sm date" id="endwriteday42">
							 <input type="text" name="endwriteday42" size="10" value="{{$row->endwriteday42}}"
					 class="form-control form-control-sm">
			
					<div class="input-group-text">
						<div class="input-group-addon">
							<i class="far fa-calendar-alt fa-lg"></i>
						</div>
					</div>
					</div>
				</div>
			@error("endwriteday42") {{ $message }} @enderror
        </td>
    </tr>

	   <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 군번</td>
        <td width="80%" align="left">
		<div class="d-inline-flex">
		<input type="text" name="uids_id42" value="{{$row->uids_id42}}" class="form-control form-control-sm" readonly>
				<input type="button" value="제품찾기" onClick="find_product();"   class="btn btn-sm mycolor1">		
            </div>
			@error("uids_id42") {{ $message }} @enderror
        </td>
    </tr>
	
    <tr>
        <td width="20%" class="mycolor2">이름</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="name42" size="20" value="{{$row -> name42}}"
                         class="form-control form-control-sm" readonly>
            </div>
			@error("name42") {{ $message }} @enderror
        </td>
    </tr>
	    <tr>
        <td width="20%" class="mycolor2">계급</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="rank42" size="20" value="{{$row -> rank42}}"
                         class="form-control form-control-sm" readonly>
            </div>
			@error("rank42") {{ $message }} @enderror
        </td>
    </tr>
	
	   <tr>
        <td width="20%" class="mycolor2">전화번호</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="tel42" size="20" maxlength="20" value="{{$row -> tel42}}"
                         class="form-control form-control-sm" readonly>
            </div>
        </td>
    </tr>
		   <tr>
        <td width="20%" class="mycolor2">출타 지역</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="area42" size="20" maxlength="20" value="{{$row -> area42}}"
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


 
@endsection


