@extends('layouts.index')
@section('content')
<?php
	class Danhsach
	{
		public $id;
		public $ketqua;
		public $amthanh;
	}
	class Bangchucai
	{
		public $id;
		public $chucai;
	}
	$a = array();
	$b = array();
	$i=0;
	foreach($tuvung as $row)
		if($_GET['bai']==$row->idbai)
			{
				$i++;
				$ds = new Danhsach();
				$ds->id =$i;
				$ds->ketqua=$row->ketqua;
				$ds->amthanh=$row->amthanh;
				array_push($a,$ds);
			}
	foreach($tuvung as $row)
		if($row->idbai==8 )
			{
				$i++;
				$ds = new Bangchucai();
				$ds->id =$i;
				$ds->chucai= $row->ketqua;
				array_push($b,$ds);
			}
?>

	<div class="container" id= "content">
		<div class="row text-center  mx-auto">
			<div class=" col-md-3 py-lg-5 py-md-4 py-1 px-3 number">Điểm: 
				<span id="scores">0</span>
			</div>
			<div class="start col-md-2 py-lg-5 py-md-4 py-1 px-3" id="play">
          		<i class="fa fa-play" aria-hidden="true" ></i>Start
        	</div>
    	</div>
		<h6>
			<div class="btn btn-info btn-lg play" id="replay" style="display: none;">
				<i class="fa fa-undo" aria-hidden="true"></i> Listen again
			</div>
		</h6>
		<div class="row text-center input-box" >

		</div>
		<div class="row text-center character-box" >
			
		</div>
		<div id="audio" class="audio">
		</div>
		<div id="audio-ketqua" class="audio">
		</div>
	</div>
	<div class="container" id="ketqua" style="display: none;" >
		<div class="col-md-6 mx-auto congratulation"> 
			<h1>Congratulation!</h1>
			<p id="ketqua-text"></p>
			<button onclick="goBack()" class="btn-back"> OK </button>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
var config = {
	'maximum_questions': 0,
	'scores_for_each_question': 100
};
var sourceData = <?php echo json_encode($a); ?>;
var bangchucai = <?php echo json_encode($b); ?>;
var tam= sourceData.length;
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

question.select = () => {
	var sizeOfData = Object.keys(sourceData).length - 1;
	var first = questions[question.randomNumber(0, questions.length)];
	questions.splice(questions.indexOf(first), 1);
	return [first];
}//chọn từ
question.arrangePosition = (questions) => {
	let chooseWord = sourceData[questions[0]]['ketqua'];
	let Audio = sourceData[questions[0]]['amthanh'];
	question.showBox(chooseWord);
	question.showCharacter(chooseWord);
	question.playAudio(Audio);
}//hiện từ và âm thanh
question.playAudio = (text) => {
	var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', 'sounds/' + text);   
	audioElement.play();
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
question.splitString = (string) => {
	let tam =[];
	let length = string.length;
	for(i=0; i< length; i++)
	{
		tam.push(string[i]);
	}
	return tam;
}//cắt chuỗi
question.showBox = (string) => {
	var str='';
	tam = question.splitString(string);
	console.log(tam);
	for( i=0; i< tam.length; i++)
	{
		str += '<div class="col-md-1 viettu box py-lg-5 py-md-4 py-1 px-3" id="'+i+'"></div>';
	}
	$('.input-box').html(str);
}//hiện ô trống
question.showCharacter = (string) => {
	var str='';
	tam = question.splitString(string);
	dem = tam.length /2;
	for(i=0;i<dem;i++)
	{
		m = question.randomNumber(0, bangchucai.length-1);
		tam.push(bangchucai[m].chucai);
	}
	console.log(tam);
	for( i=0; i< tam.length; i++)
	{
		str += '<div class="col-md-1 character py-lg-5 py-md-4 py-1 px-3" id="'+i+'">'+tam[i].toUpperCase()+'</div>';
	}
	$('.character-box').html(str);
}//hiện kí tự để chọn
question.updateScores = (scores) => {
	$('#scores').text(scores);
}
question.play = () => {
	$('#questionContainer').css('display', 'flex');
	$('#play').css('display', 'none');
	$('#replay').css('display', 'inline-block');
	selectedQuestion = question.select();
	mainQuestionPosition = question.arrangePosition(selectedQuestion);
}

question.next = () => {
	let timeOut = setTimeout(function() 
	{
        selectedQuestion = question.select();
		mainQuestionPosition = question.arrangePosition(selectedQuestion);
    }, 900);
}
var selectedQuestion = [];
var mainQuestionPosition = 0;
var numberOfClick = 0;

$('#play').click(function () { 
	question.play() 
});
$('#replay').click(function () { 
	question.playAudio(sourceData[selectedQuestion[0]]['amthanh'])
});

$('.character').click(function () {
	let answerClicked = this.id;
	if (answerClicked == 'first') answerClicked = 1;
	else if (answerClicked == 'second') answerClicked = 2;
	else answerClicked = 3;
	if (answerClicked == mainQuestionPosition) 
	{
		scores += config['scores_for_each_question'];
		question.playTrue();
		numberOfClick = 0;
		question.updateScores(scores);
		if (questions.length !== 0) question.next();
		else
		{
			$('#content').css('display', 'none');
			$('#ketqua').css('display', 'block');
			$('#ketqua-text').html('Số điểm của bạn là: ' + scores + '/'+ tam*100);
		} 
	} else 
	{
		question.playFalse();
		numberOfClick++;
		if (numberOfClick == 2) 
		{
			numberOfClick = 0;
			question.next();
		}
	}
});
function goBack() {
  window.history.back();
}
</script>

@endsection
