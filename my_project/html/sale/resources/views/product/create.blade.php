@extends('main')
@section('content')

<br>
<div class="alert mycolor1" role="alert">제품</div>

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
<form name="form1" method="post" action="{{route('product.store')}}{{$tmp}}"
    enctype="multipart/form-data">
@csrf
<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left"></td>
    </tr>
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 구분명</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                  <select name="gubuns_id42" class="form-control form-control-sm">
					<option value="" selected>선택하세요.</option>
					@foreach ($list as $row)
						@if ( $row->id == old('gubuns_id42') )
							<option value="{{ $row->id }}" selected>{{ $row->name42 }}</option>
						@else
							<option value="{{ $row->id }}">{{ $row->name42 }}</option>
						@endif
					@endforeach
							</select>
            </div>
			@error("gubuns_id42") {{ $message }} @enderror
        </td>
    </tr>
	 <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 제품명</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="name42" size="20" maxlength="20" value="{{ old('name42') }}"
                         class="form-control form-control-sm">
            </div>
			@error("name42") {{ $message }} @enderror
        </td>
    </tr>
	    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 단가</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="price42" size="20" maxlength="20" value="{{ old('price42') }}"
                         class="form-control form-control-sm">
            </div>
			@error("price42") {{ $message }} @enderror
        </td>
    </tr>
	    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 재고</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="jaego42" size="20" maxlength="20" value=""
                         class="form-control form-control-sm">
            </div>
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
</body>
</html>

 
@endsection


