
@extends('main')
@section('content')
   


  <div class="container-fluid">
<br>
  <h1 class="h3 mb-2 text-gray-800">작전명</h1>

<script>
    function find_text()
    {
        form1.action="{{route('action.index')}}";
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


          <div class="card shadow mb-4">
          <div class="card-header py-3">	
		  
<form name="form1"  method="get" action="" >
    <div class="row">
        <div class="col-3" align="left">
			<div class="d-inline-flex" >			
				<div class="input-group  input-group-sm date" id="text1">
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
               <a href="{{ route('action.create') }}{{$tmp}}" class="btn btn-sm mycolor1">추가</a>
        </div>
    </div>
</form>
 </div>


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
        <td width="20%">소대명</td>
		  <td width="30%">작전명</td>
		    <td width="10%">암구호</td>
			  <td width="15%">작전위치</td>
			   <td width="10%">담당간부</td>
    </tr>
	
  @foreach ($list as $row)       
  


    <tr>
        <td>{{ $row->writeday42 }}</td>
		<td align="left">
		<a  href="{{route('action.show', $row->id)}}{{$tmp}}" >
			{{ $row->product_name42 }}
			</a>
		</td>
	
			<td align="center">{{ $row->operation42 }}</td>
				<td align="center">{{ $row->code42 }}</td>
					<td align="center">{{ $row->location42 }}</td>
						<td align="center">{{ $row->manager42}}</td>
    </tr>
    @endforeach

  
</table>


<div class="row">
	<div class="col">
		{{$list->links('mypagination')}}
		</div>
	</div>
  </div>
@endsection


