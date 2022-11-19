@extends('main')
@section('content')

   <div class="card-body">
    <div class="table-responsive">
	
  <h1 class="h3 mb-2 text-gray-800">병사 출타자 신청</h1>

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
	
	/*
	function select_product()
	{
		var str;
		str = form1.sel_products_id42.value;
		if(str=="")
		{
			form1.products_id42.value="";
			form1.price42.value="";
			form1.prices42.value="";
		}
		else
		{
			str = str.split("^^");
			form1.products_id42.value=str[0];
			form1.price42.value=str[1];
			form1.prices42.value=Number(form1.price42.value) * Number(form1.numo42.value);
		}
	}
	*/
	
	function find_product()
	{
		window.open("{{route('findproduct.index')}}","",
		"resizable=yes,scrollbars=yes, width=1200,height=1200");
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
		  
<form name="form1" method="post" action="{{route('vacation.store')}}{{$tmp}}"
    enctype="multipart/form-data">
@csrf
<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left"></td>
    </tr>
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 출발날짜</td>
        <td width="80%" align="left">
            <div class="d-inline-flex">
					<div class="input-group input-group-sm date" id="startwriteday42">
					<input type="text" name="startwriteday42" size="10" value="{{old('startwriteday42')}}"
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
        <td width="20%" class="mycolor2"><font color="red">*</font> 도착날짜</td>
        <td width="80%" align="left">
            <div class="d-inline-flex">
					<div class="input-group input-group-sm date" id="endwriteday42">
					<input type="text" name="endwriteday42" size="10" value="{{old('endwriteday42')}}"
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
				<input type="text" name="uids_id42" value="{{old('uids_id42')}}" class="form-control form-control-sm" readonly>
				<!--<input type="text" name="product_name42" value="" class="form-control form-control-sm" readonly>&nbsp;-->
				<input type="button" value="제품찾기" onClick="find_product();"   class="btn btn-sm mycolor1" >					
            </div>
			@error("uids_id42") {{ $message }} @enderror
        </td>
    </tr>
	
	    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 이름</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="name42" size="20" maxlength="20" value="{{ old('name42') }}"
                         class="form-control form-control-sm" readonly>
            </div>
			@error("name42") {{ $message }} @enderror
        </td>
    </tr>
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 계급</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="rank42" size="20" maxlength="20" value="{{ old('rank42') }}"
                         class="form-control form-control-sm" readonly>
            </div>
        </td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 번호</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="tel42" size="20" maxlength="20" value="{{ old('tel42') }}"
                         class="form-control form-control-sm" readonly>
            </div>
        </td>
    </tr>
	    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 출타 지역</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="area42" size="20" maxlength="20" value="{{ old('area42') }}"
                         class="form-control form-control-sm">
            </div>
				@error("area42") {{ $message }} @enderror
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


