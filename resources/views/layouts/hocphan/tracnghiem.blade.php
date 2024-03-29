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
				array_push($a, $ds);
			}
	foreach($cauhoinho as $row2)
			{
				$i++;
				$ds = new Cauhoinho();
				$ds->id =$row2->id;
				$ds->idchl= $row2->id_cauhoilon;
				$ds->noidung=$row2->noidung;
				$ds->hinhanh=$row2->hinhanh;
				array_push($b, $ds);
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
				array_push($c, $ds);
			}
?>
<div class="container " id= "content">
	<div class="row  mx-auto">
		<div class=" col-md-3 py-lg-5 py-md-4 py-1 px-3 number">Điểm: 
			<span id="scores">0</span>
		</div>
		<div class="start col-md-2 py-lg-5 py-md-4 py-1 px-3" id="play">
          	<i class="fa fa-play" aria-hidden="true" ></i>Start
        </div>
	    <div class="review" id="review" style="display: none;">Review</div>
	    <div onclick="goBack()" class="back" id="back" style="display: none;"> 
	    	Back 
		</div>
		<div>
	   		<audio class="" id ="myAudio"></audio>
			<div class="" id="reviewContent" style="display: none;"></div>
   		</div>
    	<div class="container noidung" id="showQuestionID">

		</div>
	</div>
</div>
	<div class="container" id="ketqua" style="display: none;" >
		<div class="col-md-6 mx-auto congratulation"> 
			<h4>Congratulation!</h4>
			<p id="ketqua-text"></p>
			<div class="review" id="result" style="display: none;">Result</div>
			<button onclick="goBack()" class="btn-back"> OK </button>
		</div>
	</div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
	let sourceData = {
		big: <?php echo json_encode($a); ?>,
		small: <?php echo json_encode($b); ?>,
		answer: <?php echo json_encode($c); ?>
	}
	var question = {};
	var scores = 0;
question.randomNumber = (min, max) => Math.floor(Math.random() * max) + min;
question.fillArray = () => {
	let arrs = [];
	let length = Object.keys(sourceData).length;
	for (i = 0; i < length; i++) arrs.push(i);
	return arrs;
}
question.getBigData = () => {
	let chl= [];
	for(i = 0; i < sourceData.big.length; i++)
	{	
		let tamchl = [];
		tamchl.push(sourceData.big[i]['id']);
		tamchl.push(sourceData.big[i]['noidung']);
		tamchl.push(sourceData.big[i]['amthanh']);
		tamchl.push(sourceData.big[i]['loai']);
		tamchl.push(sourceData.big[i]['hinhanh']);
		chl.push(tamchl);
	}
	return chl;
}
question.getSmallData= () => {
	let chn =[];
	for(i=0; i < sourceData.big.length;i++)
	{	
		for(j=0; j< sourceData.small.length;j++)
		{
			if(sourceData.big[i]['id'] == sourceData.small[j]['idchl'])
			{	
				let tamchn = [];
				tamchn.push(sourceData.small[j]['id']);
				tamchn.push(sourceData.small[j]['idchl']);
				tamchn.push(sourceData.small[j]['noidung']);
				tamchn.push(sourceData.small[j]['hinhanh']);
				chn.push(tamchn);
			}	
		}
	}
	return chn;
}
question.getAnswerData = (chn) => {
	let da = [];
	for(i=0;i<chn.length;i++)
	{
		for(j=0;j<sourceData.answer.length;j++)
		{
			if(chn[i][0]==sourceData.answer[j]['idchn'])
			{
				let tamda =[];
				tamda.push(sourceData.answer[j]['idchn']);
				tamda.push(sourceData.answer[j]['noidung']);
				tamda.push(sourceData.answer[j]['hinhanh']);
				tamda.push(sourceData.answer[j]['trangthai']);
				tamda.push(j);
				da.push(tamda);
			} 
		}
	}
	return da;
}

question.playTrue = () => {
	var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', 'sounds/amthanhkhac/chondung.mp3');   
	audioElement.play();
}

question.playFalse = () => {
	var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', 'sounds/amthanhkhac/chonsai.mp3');   
	audioElement.play();
}

question.playAudio = (text) => {
	var audioElement = document.getElementById('myAudio');
    audioElement.setAttribute('src', 'sounds/' + text);   
	audioElement.play();
	return audioElement;
}

question.pauseAudio = (audioElement) => {
	audioElement.pause();
	audioElement.controls = true;
	audioElement.currentTime = 0;	
}

question.mixData = (datas) => {
	var currentIndex = datas.length, temporaryValue, randomIndex;
	while (0 !== currentIndex) {
		let randomIndex = Math.floor(Math.random() * currentIndex);
		currentIndex -= 1;
		temporaryValue = datas[currentIndex];
		datas[currentIndex] = datas[randomIndex];
		datas[randomIndex] = temporaryValue;
	}
	return datas;
}

question.showQuestion = (bigQuestion,audio,img, smallQuestion,idsmall, answers, isClean = true) => {
	let div = '';
	let dem =0 ;
	if (bigQuestion !== '' && img === '' && audio ==='') 
		div += `<div class="row cauhoilon mx-auto">
			<div class="noidungcauhoilon">${bigQuestion}</div></div>`; 

	if (bigQuestion !== '' && img !== '' && audio !=='' || bigQuestion === '' && img !== '' && audio !=='' ) 
		div += `<div class="row cauhoilon mx-auto">
			<div class="noidungcauhoilon"></div><img class="titleImg" src="images/hinhchl/${img}"></div>`; 

	if (bigQuestion !== '' && img !== '' && audio ==='') 
		div += `<div class="row cauhoilon mx-auto">
			<div class="noidungcauhoilon">${bigQuestion}</div><img class="titleImg" src="images/hinhchl/${img}"></div>`; 

		div += '<div class="cauhoinho" clicked="NO" id="smallQuestion'+idsmall+'">';
		div += '<p class="pstyle"><i class="fa fa-question-circle"> </i>' + smallQuestion + '</p>';
	for (const answer of answers) 
	{
		isTrue = (answer[3] == 1);
		if (answer[1].trim() != '')
			div += '<div class="cautraloi cell" isClick="false" isTrue="' + isTrue +'" id ="'+idsmall+dem+'"><i class="fa fa-caret-right icon"></i> ' + answer[1] + ' </div>';
		else 
			div += '<div class="cautraloi cell-img col-md-4" isClick="false" isTrue="' + isTrue + '" id ="'+idsmall+dem+'"><i class="fa fa-caret-right icon"></i><img src="images/hinhtl/'+ answer[2] + '" /></div>';
		dem++;
		
	}
	div += '<div style="clear: both;"></div></div>';
	if (isClean) $('.noidung').html(div);
	else $('.noidung').append(div);
}

question.selectQuestion = () => {
	if (chl.length != 1) {
		let bigQuestion = chl[currentQuestion];
		let smallQuestion = [];
		for (smallQuestion of chn) if (bigQuestion[0] == smallQuestion[1]) break;
		let answers = [];
		for (const answer of da) if (answer[0] == smallQuestion[0]) answers.push(answer);
		question.showQuestion(bigQuestion[1],bigQuestion[2],bigQuestion[4], smallQuestion[2],smallQuestion[0], answers);
		if (bigQuestion[3] == "Nghe" && bigQuestion[2]!='') audioElement = question.playAudio(bigQuestion[2]); 
		currentQuestion++;
	} else {
		$('#reviewContent').html('<p>'+chl[0][1]+'</p>');
		for (const smallQuestion of chn) 
		{
			let answers = [];
			for (const answer of da) 
				if (smallQuestion[0] == answer[0]) answers.push(answer);
			question.showQuestion('','','',smallQuestion[2],smallQuestion[0], answers, false);
		}
	}

}
question.next = () => {
	selectedQuestions = [];
	let timeOut = setTimeout(function() 
	{
        selectedQuestions = question.selectQuestion();
    }, 800);
}
question.updateScores = (scores) => {
	$('#scores').text(scores);
}
let chl = question.mixData(question.getBigData());
let chn = question.getSmallData();
if (chl.length > 1) chn = question.mixData(chn);
let da = question.mixData(question.getAnswerData(chn));
let currentQuestion = 0;
let audioElement = '';
let questionRemaining = [];
var numberOfClick = 0;
console.log(chl, chn, da);
let mangtam=[];

$('#play').click(function (){
	if (chl.length == 1) 
	{
		$('#review').css('display', 'flex');
	}
	$('#play').css('display', 'none');
	if (chl.length == 1) audioElement =question.playAudio(chl[0][2]);
	question.selectQuestion();
});
$('#showQuestionID').on('click', '.cautraloi', function () {
	let idanswer = (this.id);
	let idl = document.getElementById(idanswer).parentNode.id;
	
	if ($(this).attr('isClick') == "false")
	{
		if(chl.length>1) //tiếng việt, toán
		{
			if( $(this).attr('isTrue') == "true") 
			{
				$(this).attr('isClick', 'true');
				scores += 100;
				$('#'+idanswer).css('background-color','#42B00A');
				question.playTrue();
				question.updateScores(scores);
				if (chl.length > 1 && currentQuestion < chl.length - 1) question.next();
				else
				{
					$('#content').css('display', 'none');
					$('#ketqua').css('display', 'block');
					$('#ketqua-text').html('Số điểm của bạn là: ' + scores + '/'+ chn.length *100);
				}
			}
			else
			{
				$(this).attr('isClick', 'true');
				$('#'+idanswer).css('background-color','red');
				question.playFalse();
				if (chl.length > 1 && currentQuestion < chl.length - 1) question.next();
				else
				{
					$('#content').css('display', 'none');
					$('#ketqua').css('display', 'block');
					$('#ketqua-text').html('Số điểm của bạn là: ' + scores + '/'+ chn.length *100);
				}
			}
		}
		if(chl.length==1) //tiếng anh
		{
		if($('#'+idl).attr('clicked') == 'NO')
		{
			if( $(this).attr('isTrue') == "true") 
			{
				numberOfClick++;
				$(this).attr('isClick', 'true');
				scores += 100;
				$('#'+idanswer).css('background-color','#42B00A');
				question.playTrue();
				question.updateScores(scores);
				$('#'+ idl).attr('clicked','OK');
			}
			else
			{
				numberOfClick++;
				$(this).attr('isClick', 'true');
				$('#'+idanswer).css('background-color','red');
				question.playFalse();
				$('#'+ idl).attr('clicked','OK');
			}
			if (numberOfClick == chn.length)
				{
					question.pauseAudio(audioElement);
					$('#content').css('display', 'none');
					$('#ketqua').css('display', 'block');
					$('#ketqua-text').html('Số điểm của bạn là: ' + scores + '/'+ chn.length *100);
					$('#result').css('display','flex');
				}
		}
		}
	}
});
$('#review').click(() => {
	$('#reviewContent').css({'display': 'block', 'margin-top': '7px'});
	question.pauseAudio(audioElement);
	$('.noidung').css('display','none');
	$('#review').css('display','none');
	$('#back').css('display','flex');
});
$('#result').click(() => {
	$('#content').css('display', 'block');
	$('#ketqua').css('display', 'none');
	$('#reviewContent').css({'display': 'block', 'margin-top': '7px'});
	$('#review').css('display','none');
	$('#back').css('display','flex');
});
function goBack() {
  window.history.back();
}
</script>
@endsection