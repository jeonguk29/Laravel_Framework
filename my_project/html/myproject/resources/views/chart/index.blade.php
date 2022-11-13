
@extends('main')
@section('content')
   



  <div class="container-fluid">
  
<br>
  <h1 class="h3 mb-2 text-gray-800">소대 작전할당 분포도</h1>



<script>
    function find_text()
    {
        form1.action="{{route('chart.index')}}";
        form1.submit();
    }
	
	$(function() {
		$('#text1').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD'
	});
		$('#text2').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD'
	});
			
	
		$("#text1").on("change.datetimepicker", function(e) {
			find_text();
		});
		$("#text2").on("change.datetimepicker", function(e) {
			find_text();
		});
	});
	
</script>

        <div class="card shadow mb-4">
          <div class="card-header py-3">	
<form name="form1"  method="get" action="" >
    <div class="row">
        <div class="col-12" align="left">
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
		
			<div class="d-inline-flex" >			
				<div class="input-group  input-group-sm date" id="text2">
					<input type="text" name="text2" size="10" value="{{$text2}}" class="form-control" onKeydown="if (event.keyCode == 13) { find_text(); }" >
					<span class="input-group-text">
					<div class="input-group-addon">
						<i class="far fa-calendar-alt fa-lg"></i>
					</div>
					</span>
				</div>
        </div>
	</div>
 </div>
</form>
</div>

<br>

<script src="{{asset('my/js/chart.min.js')}}"></script>
<div style="width:40%">
	<canvas id="myChart"></canvas>
</div>
	</div>
	</div>


<script>
    const ctx = document.getElementById('myChart'); 
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
           labels:[{!! $str_label !!}], 
           datasets: [{
               data: [{{$str_data}}],
               backgroundColor: [ 
			   "rgba(255,99,132,0.8)",
			   	"rgba(255,159,64,0.8)",
				"rgba(255,205,86,0.8)",
				"rgba(75,192,192,0.8)",
				"rgba(153,102,255,0.8)",
				"rgba(201,203,207,0.8)",
				"rgba(54,162,235,0.8)",
															   
				"rgba(255,99,132,0.5)",
			    "rgba(255,159,64,0.5)",
				"rgba(255,205,86,0.5)",
				"rgba(75,192,192,0.5)",
				"rgba(153,102,255,0.5)",
				"rgba(201,203,207,0.5)",
				"rgba(54,162,235,0.5)"
			   ],
            }],
         },
    });
</script>

 
@endsection


