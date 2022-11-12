@extends('main')
@section('content')

<br>

   <div class="card-body">
    <div class="table-responsive">
	
 <h1 class="h3 mb-2 text-gray-800">소대</h1>

<script>
    function find_text()
    {
        form1.action="#";
        form1.submit();
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
<div class="card shadow mb-4">
          <div class="card-header py-3">
		  
<form name="form1" method="post" action="{{route('gubun.store')}}{{$tmp}}" enctype="multipart/form-data">
@csrf
<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 소대</td>
        <td width="80%" align="left"></td>
    </tr>
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 소대 이름</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="name42" size="20" maxlength="20" value="{{ old('name42') }}"
                         class="form-control form-control-sm">
            </div>
			@error("name42") {{ $message }} @enderror
        </td>
    </tr>
	
	    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 소대장 </td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="leader42" size="20" maxlength="20" value="{{ old('leader42') }}"
                         class="form-control form-control-sm">
            </div>
			@error("leader42") {{ $message }} @enderror
        </td>
    </tr>
	
	    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 분대장 </td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="subleader42" size="20" maxlength="20" value="{{ old('subleader42') }}"
                         class="form-control form-control-sm">
            </div>
			@error("subleader42") {{ $message }} @enderror
        </td>
    </tr>
	
	    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 사진</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="file" name="pic42" size="20" maxlength="20" value=""
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
 
@endsection


