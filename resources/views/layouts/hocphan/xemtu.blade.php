@extends('layouts.index')
@section('content')
<section class="about-vocabulary" id="services">
	<div class="container">

		<div class="row text-center">
		@foreach($tuvung ?? '' as $row)
				@if($_GET['bai']==$row->idbai)
				<div class="col-md-3 vocabulary tu1 py-lg-5 py-md-4 py-1 px-3" id="{{$row->id}}">
            		<img src="images/hinh/{{$row->hinhanh}}" class=" img-thumbnail image ">
                	<div class="text-vocabulary ">
                  		<?php print(strtolower( $row->noidung ))?> 
                  		</br>
                  		<?php print(ucfirst($row->ketqua)) ?>
                	</div>
                	<audio class="audio" controls preload="none">
   							    <source src="sounds/{{$row->amthanh}}" type="audio/mp3">
					        </audio>

				</div>
				@endif
		@endforeach	
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
        $('.vocabulary').click(function() {
            let id = this.id;
            let timeOut = setTimeout(function() {
                $('#' + id + ' .image').css('display','none');
                $('#' + id + ' .audio').trigger('load');
                $('#' + id + ' .audio').trigger('play');
                $('#' + id + ' .text-vocabulary').css('display','block');
            }, 120);
        });
    </script>
		</div>
	</div>
</section>
@endsection
   