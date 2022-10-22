
@extends('main')
@section('content')
   



<br>
<div class="alert mycolor1" role="alert">매출장</div>

<script>
    function find_text()
    {
        form1.action="{{route('jangbuo.index')}}";
        form1.submit();
    }
	
	$(function() {
		$('#text1').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
	});
	
		$("#text1").on("dp.change", function(e) {
			find_text();
		});
	});
	
</script>


<form name="form1"  method="get" action="" >
    <div class="row">
        <div class="col-3" align="left">
			<div class="d-inline-flex" >			
				<div class="input-group input-group-sm date" id="text1">
					<span class="input-group-text">날짜</span>
					<input type="text" name="text1" size="10" value="{{$text1}}" class="form-control" onKeydown="if (event.keyCode == 13) { find_text(); }" >
					<span class="input-group-text">
					<div class="input-group-addon">
						<i class="far fa-calendar-alt fa-lg"></i>
					</div>
					</span>
				</div>
        </div>
		 </div>
        <div class="col-9" align="right">           
               <a href="{{ route('jangbuo.create') }}{{$tmp}}" class="btn btn-sm mycolor1">추가</a>
        </div>
    </div>
</form>


<!--
<form name="form1"  method="get" action="" >
    <div class="row">
        <div class="col-3" align="left">  
			<div class="d-inline-flex" >		
					<div class="input-group  input-group-sm date" id="text1">
					
					<input type="text" name="text1" size="10" value="{{$text1}}" class="form-control"  onKeydown="if (event.keyCode == 13) { find_text(); }" >
					<div class="input-group-addon">
						<i class="far fa-calender-alt fa-lg"></i>
					</div>
				</div>
				</div>
        </div>
    </div>
</form>
-->

<table class="table  table-bordered  table-sm  table-hover mymargin5">
    <tr class="mycolor2">
        <td width="15%">날짜</td>
        <td width="30%">제품명</td>
		  <td width="10%">단가</td>
		    <td width="10%">수령</td>
			  <td width="15%">금액</td>
			   <td width="20%">비고</td>
    </tr>
	
  @foreach ($list as $row)       

    <tr>
        <td>{{ $row->writeday42 }}</td>
		<td align="left">
		<a href="{{route('jangbuo.show', $row->id)}}{{$tmp}}">
			{{ $row->product_name42 }}
			</a>
		</td>
	
			<td align="right">{{ number_format($row->price42)}}</td>
				<td align="right">{{ number_format($row->numo42)}}</td>
					<td align="right">{{ number_format($row->prices42)}}</td>
						<td align="left">{{ $row->bigo42}}</td>
    </tr>
    @endforeach

  
</table>


<div class="row">
	<div class="col">
		{{$list->links('mypagination')}}
		</div>
	</div>
 
@endsection


