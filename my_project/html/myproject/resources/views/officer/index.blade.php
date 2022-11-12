@extends('main')
@section('content')
   

  <div class="container-fluid">
  
<br>
  <h1 class="h3 mb-2 text-gray-800">간부</h1>


<script>
    function find_text()
    {
        form1.action="{{route('officer.index')}}";
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
				<div class="input-group  input-group-sm">
					<span class="input-group-text">이름</span>
					<input type="text" name="text1" value="{{$text1}}" class="form-control" placeholder="찾을 이름?"  onKeydown="if (event.keyCode == 13) { find_text(); }" >
					<button class="btn mycolor1" type="button"  onClick="find_text();">검색</button>
				</div>

        </div>
        <div class="col-9" align="right">           
               <a href="{{ route('officer.create') }}{{$tmp}}" class="btn btn-sm mycolor1">추가</a>
        </div>
    </div>
	  
</form>
 </div>


    <div class="card-body">
    <div class="table-responsive">
<table class="table table-bordered" id="dataTable">
    <tr class="mycolor2">
        <td width="20%">군번</td>
        <td width="10%">이름</td>
        <td width="10%">계급</td>
        <td width="20%">소대</td>
		<td width="20%">보직</td>
		<td width="20%">전화번호</td>
    </tr>
	
  @foreach ($list as $row)       
<?// // 연관배열 list를 row를 통해 출력.  List 11페이지 이름이랑 같아야함 				//$data['list'] = $this->getlist();

        $tel1 = trim(substr($row->tel42,0,3));  // list는 50명 자료 row가 한사람 자료 
        $tel2 = trim(substr($row->tel42,3,4));
        $tel3 = trim(substr($row->tel42,7,4));
        $tel = $tel1 . "-" . $tel2 . "-" . $tel3;

?>
    <tr>
		  <td>{{ $row->uid42 }}</td>
		  <td><a href="{{ route('officer.show',$row->id)}}{{$tmp}}">{{ $row->name42 }}</a>
		  </td>
		  <td>{{ $row->rank42 }}</td>
		  <td>{{ $row->gubun_name42 }}</td>
		  <td>{{ $row->position42 }}</td>
		  <td>{{ $tel }}</td>

    </tr>
    @endforeach

  
</table>


<div class="row">
	<div class="col">
		{{$list->links('mypagination')}}
		</div>
	</div>
</div>
</div>
</div>


@endsection


