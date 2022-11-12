@extends('main')
@section('content')

<br>
    <div class="card-body">
    <div class="table-responsive">
	
<h1 class="h3 mb-2 text-gray-800">작전명</h1>
<div class="card shadow mb-4">
   <div class="card-header py-3">	
   
<script>
    	$(function() {
		$('#writeday42').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
	});
	});
	
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
			form1.prices42.value=Number(form1.price42.value) * Number(form1.numi42.value);
		}
	}
	
	function cal_prices()
	{
		form1.prices42.value=Number(form1.price42.value) * Number(form1.numi42.value);
		form1.bigo42.focus();
	}
</script>


<form name="form1" method="post" action="{{route('action.update', $row->id)}}{{$tmp}}"
  enctype="multipart/form-data">
@csrf
@method('PATCH')

<table class="table table-bordered table-sm mymargin5">

    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 날짜</td>
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
        <td width="20%" class="mycolor2"><font color="red">*</font> 소대명</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                         <select name="divisions_id42" class="form-control form-control-sm">
							<option value="" selected>선택하세요.</option>
							@foreach ($list as $row1)
								@if ( $row->divisions_id42 == $row1->id )
									<option value="{{ $row1->id }}" selected>{{ $row1->name42 }}</option>
								@else
									<option value="{{ $row1->id }}">{{ $row1->name42 }}</option>
								@endif
							@endforeach
					</select>
            </div>
			@error("divisions_id42") {{ $message }} @enderror
        </td>
    </tr>
	
    <tr>
        <td width="20%" class="mycolor2">작전명</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="operation42" size="20" value="{{$row -> operation42}}"
                         class="form-control form-control-sm" >
            </div>
			@error("operation42") {{ $message }} @enderror
        </td>
    </tr>
	   <tr>
        <td width="20%" class="mycolor2">암구호</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="code42" size="20" maxlength="20" value="{{$row -> code42}}"
                         class="form-control form-control-sm">
            </div>
        </td>
    </tr>
	   <tr>
        <td width="20%" class="mycolor2">작전위치</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="location42" size="20" maxlength="20" value="{{$row -> location42}}"
                         class="form-control form-control-sm" >
            </div>
        </td>
    </tr>
		   <tr>
        <td width="20%" class="mycolor2">담당 간부</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="manager42" size="20" maxlength="20" value="{{$row -> manager42}}"
                         class="form-control form-control-sm" >
            </div>
        </td>
    </tr>
		   <tr>
        <td width="20%" class="mycolor2">상세 작전계획</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="bigo42" size="20" maxlength="20" value="{{$row -> bigo42}}"
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


