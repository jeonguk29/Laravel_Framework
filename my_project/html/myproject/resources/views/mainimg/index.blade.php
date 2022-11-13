
@extends('main')
@section('content')
   



  <div class="container-fluid">
  
<br>
  <h1 class="h3 mb-2 text-gray-800">부대 소개</h1>



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

     <div class="container-fluid">

                    <!-- Page Heading -->

                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">필사즉생 골육지정 백골부대</h6>
                                </div>
                                <div class="card-body">
                                <iframe width="500" height="315" src="https://www.youtube.com/embed/XQhmdIt2yVk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


                                </div>
                            </div>

                            <!-- Brand Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">역사</h6>
                                </div>
                                <div class="card-body">
                                    <p>
1947년 12월 1일 부산광역시에서 제5, 6, 9연대와 이응준 보병대령을 초대 여단장으로 해 조선경비대 '제3보병여단'으로 창설되었으며, 이후 1949년 5월 12일 최덕신 대령을 초대 사단장으로 하여 '제3보병사단'으로 승격되었다.

또한 해당 사단의 핵심부대인 18연대(진백골연대)는 3여단 창설에 맞춰 창설되기도 했으며, 자원 입대한 서북청년회 회원들이 중심이 된 부대였다. 따라서 극도의 반공 성향과 전투적 기질[4] 을 자랑했다. 그리고 자신들의 철모 좌우에 "죽어 백골이 되어서라도 고향 땅을 되찾겠다."라는 의미로 백골(白骨) 마크를 그려넣었다고 한다.
</p>
                                   
                                    <a href="https://namu.wiki/w/%EC%A0%9C3%EB%B3%B4%EB%B3%91%EC%82%AC%EB%8B%A8" class="btn btn-google btn-block"><i class="fab fa-google fa-fw"></i>
                                        백골부대 역사 더보기</a>
                                    <a href="https://www.facebook.com/KoreaArmy3division" class="btn btn-facebook btn-block"><i
                                            class="fab fa-facebook-f fa-fw"></i>백골부대 페이스북 바로가기</a>

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">이번달 백골부대 소식 </h6>
                                </div>
                                <div class="card-body">
                                  
                                   
                               
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-intval="4000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('/my/img/main2.png')}}" height="500" class="d-block w-100" >
    </div>
    <div class="carousel-item">
      <img src="{{asset('/my/img/main3.png')}}" height="550" class="d-block w-100" >
    </div>
    <div class="carousel-item">
      <img src="{{asset('/my/img/main1.png')}}" height="400" class="d-block w-100" >
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>	
				 </div>

			






<br>

 
@endsection


