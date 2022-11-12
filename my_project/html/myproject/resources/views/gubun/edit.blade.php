@extends('main')
@section('content')

<br>
    <div class="card-body">
    <div class="table-responsive">
	
<h1 class="h3 mb-2 text-gray-800">소대</h1>
<div class="card shadow mb-4">
   <div class="card-header py-3">	

<script>
    function find_text()
    {
        form1.action="#";
        form1.submit();
    }
</script>


<form name="form1" method="post" action="{{route('gubun.update', $row->id)}}{{$tmp}}" enctype="multipart/form-data">
@csrf
@method('PATCH')

<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left">{{$row->id}}</td>
    </tr>
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 소대 이름</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="name42" size="20" maxlength="20" value="{{$row -> name42}}"
                         class="form-control form-control-sm">
            </div>
			@error("name42") {{ $message }} @enderror
        </td>
    </tr>
	    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 소대장</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="leader42" size="20" maxlength="20" value="{{$row -> leader42}}"
                         class="form-control form-control-sm">
            </div>
			@error("leader42") {{ $message }} @enderror
        </td>
    </tr>
	    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 분대장</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="subleader42" size="20" maxlength="20" value="{{$row -> subleader42}}"
                         class="form-control form-control-sm">
            </div>
			@error("subleader42") {{ $message }} @enderror
        </td>
    </tr>
				   <tr>
        <td width="20%" class="mycolor2">사진</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="file" name="pic42" size="20" maxlength="20" value=""
                         class="form-control form-control-sm">
            </div>
			<br><br>
		<b>파일이름</b> : <?=$row->pic42 ?> <br>
	
			@if($row->pic42)   
			   <img src="{{ asset('storage/product_img/' . $row->pic42) }}"
					 width="200" class="img-fluid img-thumbnail margin5">
			@else        
				<img src=" " width="200" height="150" class="img-fluid img-thumbnail margin5">
			@endif
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


