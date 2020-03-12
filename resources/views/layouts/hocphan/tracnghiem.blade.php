@extends('layouts.index')
@section('content')
	<?php
	class Cauhoilon
	{
		public $id;
		public $noidung;
		public $amthanh;
		public $loai;
		public $hinhanh;
	}
	class Cauhoinho
	{
		public $id;
		public $idchl;
		public $noidung;
		public $hinhanh;
	}
	class Dapan
	{
		public $id;
		public $idchn;
		public $noidung;
		public $hinhanh;
		public $trangthai;
	}
	$a = array();
	$b = array();
	$c = array();
	$i = 0;
	foreach($cauhoilon as $row)
		if($_GET['bai']==$row->id_bai)
			{
				$ds = new Cauhoilon();
				$ds->id =$row->id;
				$ds->noidung=$row->hotro;
				$ds->amthanh=$row->amthanh;
				$ds->loai=$row->loai;
				$ds->hinhanh=$row->hinhanh;
				array_push($a,$ds);
			}
	foreach($cauhoinho as $row2)
			{
				$i++;
				$ds = new Cauhoinho();
				$ds->id =$row2->id;
				$ds->idchl= $row2->id_cauhoilon;
				$ds->noidung=$row2->noidung;
				$ds->hinhanh=$row2->hinhanh;
				array_push($b,$ds);
			}
	foreach($dapan as $row3)
			{
				$i++;
				$ds = new Dapan();
				$ds->id =$i;
				$ds->idchn= $row3->id_cauhoinho;
				$ds->noidung=$row3->noidungtl;
				$ds->hinhanh=$row3->hinhanhtl;
				$ds->trangthai=$row3->dung;
				array_push($c,$ds);
			}
?>
<div class="container " id= "content">
	<div class="row text-center  mx-auto">
		<div class=" col-md-3 py-lg-5 py-md-4 py-1 px-3 number">Điểm: 
			<span id="scores">0</span>
		</div>
		<div class="start col-md-2 py-lg-5 py-md-4 py-1 px-3" id="play">
          	<i class="fa fa-play" aria-hidden="true" ></i>Start
        </div>
	    <div class="review" id="review">
	        Review
	    </div>
	    <div class="test" id="test"  style="display: none;">
	        Test
	        </div>
    </div>
</div>
<div class="container noidung" id= "content">

</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
	var bigsourceData = <?php echo json_encode($a); ?>;
	var smallsourceData = <?php echo json_encode($b); ?>;
	var answersourceData = <?php echo json_encode($c); ?>;
	var question = {};
	var scores = 0;
question.fillArray = () => {
	let arrs = [];
	let length = Object.keys(sourceData).length;
	for (i = 0; i < length; i++) arrs.push(i);
	return arrs;
}
var questions = question.fillArray();
question.randomNumber = (min, max) => Math.floor(Math.random() * max) + min;
question.getBigData = () => {
	let chl= [];
	for(i=0; i < bigsourceData.length;i++)
	{	
		let tamchl=[];
		tamchl.push(bigsourceData[i]['id']);
		tamchl.push(bigsourceData[i]['noidung']);
		tamchl.push(bigsourceData[i]['amthanh']);
		tamchl.push(bigsourceData[i]['loai']);
		tamchl.push(bigsourceData[i]['hinhanh']);
		chl.push(tamchl);
	}
	return chl;
}
question.getSmallData= () => {
	let chn =[];
	for(i=0; i < bigsourceData.length;i++)
	{	
		for(j=0; j< smallsourceData.length;j++)
		{
			if(bigsourceData[i]['id'] == smallsourceData[j]['idchl'])
			{	
				let tamchn = [];
				tamchn.push(smallsourceData[j]['id']);
				tamchn.push(smallsourceData[j]['idchl']);
				tamchn.push(smallsourceData[j]['noidung']);
				tamchn.push(smallsourceData[j]['hinhanh']);
				chn.push(tamchn);
			}	
		}
	}
	return chn;
}
question.getAnswerData = (chn) => {
	let da=[];
	for(i=0;i<chn.length;i++)
	{
		for(j=0;j<answersourceData.length;j++)
		{
			if(chn[i][0]==answersourceData[j]['idchn'])
			{
				let tamda =[];
				tamda.push(answersourceData[j]['idchn']);
				tamda.push(answersourceData[j]['noidung']);
				tamda.push(answersourceData[j]['hinhanh']);
				tamda.push(answersourceData[j]['trangthai']);
				da.push(tamda);
			} 
		}
	}
	return da;
}
question.getAudio = (questions) => {
	let Audio = chl[questions[0]][2];
	question.playAudio(Audio);
}
question.showData = (chl,chn,da) => {
	let str='';
	let dem=0;
	if(chl.length==1)
	{
		for (i=0; i< chl.length ; i++)
		{
			str += '<div class="row cauhoilon mx-auto"><div id="audio-tn" class="audio-tn" id="'+i+'"></div><div class="noidungcauhoilon" style="display: none;">'+ chl[i][1]+'</div>';
			for(j=0 ; j< chn.length ; j++)
			{
				str+='</div>';
				if (chl[i][0] == chn[j][1])
				{
					str += '<div class="cauhoinho" id= '+ dem+'><p class="pstyle"><i class="fa fa-question-circle"> </i>'+ chn[j][2]+ '</p>';
					dem++;
					for(k=0;k<da.length;k++)
					{
						if(da[k][0]==chn[j][0])
						{
							if(da[k][2] != '')
							{
								str += '<div class="cautraloi cell-img col-md-4" id="'+k +'""><i class="fa fa-caret-right icon"></i><img src="images/hinhtl/'+ da[k][2] + '"></div>';
							}
							else
							{
								str += '<p class="cautraloi cell" id = "'+k +'""><i class="fa fa-caret-right icon"></i>'+da[k][1] + '</p>';
							}
						}
					}
				}	
			str += '</div>';	
			}
			str+='</br>';
		}
	$('.noidung').html(str);
}
}
question.playTrue = () => {
	var audioElement = document.createElement('audio-tn');
    audioElement.setAttribute('src', 'sounds/amthanhkhac/chondung.mp3');   
	audioElement.play();
}
question.playFalse = () => {
	var audioElement = document.createElement('audio-tn');
    audioElement.setAttribute('src', 'sounds/amthanhkhac/chonsai.mp3');   
	audioElement.play();
}
question.playAudio = (text) => {
	var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', 'sounds/' + text);   
	audioElement.play();
}
let chl= question.getBigData();
let chn =question.getSmallData();
let da = question.getAnswerData(chn);

console.log(chl);
$('#play').click(function (){
	$('#play').css('display', 'none');
	question.showData(chl,chn,da);	
	mainQuestionInfo = question.getWordAudio(selectedQuestion);
});
$('#review').click(function (){
	$('#cauhoilon').css('display', 'inline-block');
	$('#audio-tn').css('display', 'block');
	question.showData(chl,chn,da);	
});
</script>
@endsection