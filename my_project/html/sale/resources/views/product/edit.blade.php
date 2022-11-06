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


<form name="form1" method="post" action="{{route('product.update', $row->id)}}{{$tmp}}"
  enctype="multipart/form-data">
@csrf
@method('PATCH')

<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left">{{$row->id}}</td>
    </tr>
	
	   <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 구분명</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                         <select name="gubuns_id42" class="form-control form-control-sm">
							<option value="" selected>선택하세요.</option>
							@foreach ($list as $row1)
								@if ( $row->gubuns_id42 == $row1->id )
									<option value="{{ $row1->id }}" selected>{{ $row1->name42 }}</option>
								@else
									<option value="{{ $row1->id }}">{{ $row1->name42 }}</option>
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
                <input  type="text" name="name42" size="30" maxlength="20" value="{{$row -> name42}}"
                         class="form-control form-control-sm">
            </div>
			@error("name42") {{ $message }} @enderror
        </td>
    </tr>
	   <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 단가</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="price42" size="20" maxlength="20" value="{{$row -> price42}}"
                         class="form-control form-control-sm">
            </div>
			@error("price42") {{ $message }} @enderror
        </td>
    </tr>
	   <tr>
        <td width="20%" class="mycolor2">재고</td>
        <td width="80%" align="left">
            <div class="fd-inline-flex">
                <input  type="text" name="jaego42" size="20" maxlength="20" value="{{$row -> jaego42}}"
                         class="form-control form-control-sm">
            </div>
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
</body>
</html>

 
@endsection


