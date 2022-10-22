@extends('main')
@section('content')

<br>
<div class="alert mycolor1" role="alert">매출</div>

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
			form1.prices42.value=Number(form1.price42.value) * Number(form1.numo42.value);
		}
	}
	
	function cal_prices()
	{
		form1.prices42.value=Number(form1.price42.value) * Number(form1.numo42.value);
		form1.bigo42.focus();
	}
	
		
	function find_product()
	{
		window.open("{{route('findproduct.index')}}","",
		"resizable=yes,scrollbars=yes, width=500,height=600");
	}
	
</script>


<form name="form1" method="post" action="{{route('jangbuo.update', $row->id)}}{{$tmp}}"
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
        <td width="20%" class="mycolor2"><font color="red">*</font> 제품명</td>
        <td width="80%" align="left">
		<div class="d-inline-flex">
		<input type="hidden" name="products_id42" value="{{$row->products_id42}}">
       <input type="text" name="product_name42" value="{{$row->product_name42}}" class="form-control form-control-sm" readonly>&nbsp;
				<input type="button" value="제품찾기" onClick="find_product();"   class="btn btn-sm mycolor1">		
            </div>
			@error("products_id42") {{ $message }} @enderror
        </td>
    </tr>
	
    <tr>
        <td width="20%" class="mycolor2">단가</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="price42" size="20" value="{{$row -> price42}}"
                         class="form-control form-control-sm" onChange="cal_prices();">
            </div>
			@error("price42") {{ $message }} @enderror
        </td>
    </tr>
	   <tr>
        <td width="20%" class="mycolor2">수량</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="numo42" size="20" maxlength="20" value="{{$row -> numo42}}"
                         class="form-control form-control-sm" onChange= "cal_prices();">
            </div>
        </td>
    </tr>
	   <tr>
        <td width="20%" class="mycolor2">금액</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="prices42" size="20" maxlength="20" value="{{$row -> prices42}}"
                         class="form-control form-control-sm" readonly>
            </div>
        </td>
    </tr>
		   <tr>
        <td width="20%" class="mycolor2">비고</td>
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
</body>
</html>

 
@endsection


