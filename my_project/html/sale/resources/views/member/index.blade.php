
@extends('main')
@section('content')
   



<br>
<div class="alert mycolor1" role="alert">사용자</div>

<script>
    function find_text()
    {
        form1.action="#";
        form1.submit();
    }
</script>


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
               <a href="{{ route('member.create') }}" class="btn btn-sm mycolor1">추가</a>
        </div>
    </div>
</form>


<table class="table  table-bordered  table-sm  table-hover mymargin5">
    <tr class="mycolor2">
        <td width="10%">번호</td>
        <td width="20%">아이디</td>
        <td width="20%">암호</td>
        <td width="20%">이름</td>
        <td width="20%">전화</td>
        <td width="10%">등급</td>
    </tr>
	
  @foreach ($list as $row)       
<?// // 연관배열 list를 row를 통해 출력.  List 11페이지 이름이랑 같아야함 				//$data['list'] = $this->getlist();

        $tel1 = trim(substr($row->tel42,0,3));  // list는 50명 자료 row가 한사람 자료 
        $tel2 = trim(substr($row->tel42,3,4));
        $tel3 = trim(substr($row->tel42,7,4));
        $tel = $tel1 . "-" . $tel2 . "-" . $tel3;
        $rank = $row->rank42==0 ? '직원' : '관리자';    // 0->직원, 1->관리자 
?>
    <tr>
        <td>{{ $row->id }}</td>
		  <td><a href="{{ route('member.show',$row->id)}}">{{ $row->name42 }}</a>
		  </td>
        <td>{{ $row->uid42 }}</td>
		  <td>{{ $row->pwd42 }}</td>
		  <td>{{ $tel }}</td>
		  <td>{{ $rank}}</td>
    </tr>
    @endforeach

  
</table>


<nav aria-label="Page navigation example">
  <ul class="pagination pagination-sm justify-content-center mymargin5">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">◀</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">▶</span>
      </a>
    </li>
  </ul>
</nav>

 
@endsection


