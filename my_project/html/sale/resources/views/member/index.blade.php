
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
               <a href="#" class="btn btn-sm mycolor1">추가</a>
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
    <tr>
        <td>1</td>
        <td>admin</td>
        <td>1234</td>
        <td>관리자</td>
        <td>010-1111-1111</td>
        <td>관리자</td>
    </tr>
  
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
