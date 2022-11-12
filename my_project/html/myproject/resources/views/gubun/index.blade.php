
@extends('main')
@section('content')
   


  <div class="container-fluid">
<br>
  <h1 class="h3 mb-2 text-gray-800">소대</h1>

<script>
    function find_text()
    {
        form1.action="{{route('gubun.index')}}";
        form1.submit();
    }
</script>


          <div class="card shadow mb-4">
          <div class="card-header py-3">
		  
<form name="form1"  method="get" action="" >
    <div class="row">
        <div class="col-3" align="left">            
				<div class="input-group  input-group-sm">
					<span class="input-group-text">검색</span>
					<input type="text" name="text1" value="{{$text1}}" class="form-control" placeholder="찾을 소대?"  onKeydown="if (event.keyCode == 13) { find_text(); }" >
					<button class="btn mycolor1" type="button"  onClick="find_text();">검색</button>
				</div>

        </div>
        <div class="col-9" align="right">           
               <a href="{{ route('gubun.create') }}{{$tmp}}" class="btn btn-sm mycolor1">추가</a>
        </div>
    </div>
</form>
 </div>

   	
		  
<table class="table  table-bordered  table-sm  table-hover mymargin5">
    <tr class="mycolor2">
        <td width="10%">번호</td>
        <td width="20%">소대명</td>
    </tr>
	
  @foreach ($list as $row)       

    <tr>
        <td>{{ $row->id }}</td>
		  <td><a href="{{ route('gubun.show',$row->id)}}{{$tmp}}">{{ $row->name42 }}</a>
		  </td>
    </tr>
    @endforeach

  
</table>
 </div>

<div class="row">
	<div class="col">
		{{$list->links('mypagination')}}
		</div>
	</div>
  
@endsection


