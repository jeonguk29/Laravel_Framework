@extends('main')
@section('content')

<br>
<div class="alert mycolor1" role="alert">매입</div>

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
<form name="form1" method="post" action="{{route('jangbui.store')}}{{$tmp}}"
    enctype="multipart/form-data">
@csrf
<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left"></td>
    </tr>
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 날짜</td>
        <td width="80%" align="left">
            <div class="d-inline-flex">
					<div class="input-group  input-group-sm date" id="writeday42">
					<input type="text" name="writeday42" size="10" value="{{old('writeday42')}}"
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
				<input type="hidden" name="products_id42" value="{{old('products_id42')}}">
                  <select name="sel_products_id42" class="form-select form-select-sm" onchange="select_product();">
					<option value="" selected>선택하세요.</option>
					@foreach ($list as $row)
					<?
					 $t1="$row->id^^$row->price42";
					 $t2="$row->name42($row->price42)";
					
					?>
						@if ( $row->id == old('products_id42') )
							<option value="{{ $t1 }}" selected>{{ $t2 }}</option>
						@else
							<option value="{{ $t1 }}">{{$t2}}</option>
						@endif
					@endforeach
							</select>
            </div>
			@error("products_id42") {{ $message }} @enderror
        </td>
    </tr>
	    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 단가</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="price42" size="20" maxlength="20" value="{{ old('price42') }}"
                         class="form-control form-control-sm" onChange="cal_prices();">
            </div>
			@error("price42") {{ $message }} @enderror
        </td>
    </tr>
	    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 수량</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="numi42" size="20" maxlength="20" value="{{ old('numi42') }}"
                         class="form-control form-control-sm" onChange="cal_prices();">
            </div>
        </td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 금액</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="prices42" size="20" maxlength="20" value="{{ old('prices42') }}"
                         class="form-control form-control-sm" readonly>
            </div>
        </td>
    </tr>
	    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 비고</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="bigo42" size="20" maxlength="20" value="{{ old('bigo42') }}"
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


