@extends('layouts.index')
@section('content')
<?php
			class Danhsach
			{
				public $id;
				public $ketqua;
				public $noidung;
				public $amthanh;
				public $hinhanh;
			}
			$a = array();
			$i =0;
			foreach($tuvung as $row)
				if($_GET['bai']==$row->idbai)
					{
						$i++;
						$ds = new Danhsach();
						$ds->id =$i;
						$ds->ketqua=$row->ketqua;
						$ds->noidung=$row->noidung;
						$ds->hinhanh= $row->hinhanh;
						$ds->amthanh=$row->amthanh;
						array_push($a,$ds);
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
				<i class="fa fa-undo" aria-hidden="true"></i> 
				Replay
			</div>
		</h6>
		<div class="row text-center" id="questionContainer" style="display: none;">
			<div class="col-md-4 vocabulary-nghetu tu py-lg-5 py-md-4 py-1 px-3" id="first"></div>
        	<div class="col-md-4 vocabulary-nghetu tu py-lg-5 py-md-4 py-1 px-3" id="second"></div>
        	<div class="col-md-4 vocabulary-nghetu tu py-lg-5 py-md-4 py-1 px-3" id="third"></div>
		</div>
		<div id="audio" class="audio">
		</div>
	</div>
	<div class="container" id="ketqua" style="display: none;" >
		<div class="col-md-6 mx-auto congratulation"> 
			<h4>Congratulation!</h4>
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
	var isDup = true;
	var first = questions[question.randomNumber(0, questions.length)];
	questions.splice(questions.indexOf(first), 1);
	let second = question.randomNumber(0, sizeOfData);
	while (second == first) second = question.randomNumber(0, sizeOfData);
	let third = question.randomNumber(0, sizeOfData);
	while (isDup) {
		if (third == first || third == second) third = question.randomNumber(0, sizeOfData);
		else isDup = false;
	}
	return [first, second, third];
}

question.arrangePosition = (questions) => {
	let first = sourceData[questions[0]]['hinhanh'];
	let firstAudio = sourceData[questions[0]]['amthanh'];
	let second = sourceData[questions[1]]['hinhanh'];
	let third = sourceData[questions[2]]['hinhanh'];
	let position = question.randomNumber(1, 3);
	if (position == 1) question.show(first, second, third);
	else if (position == 2) question.show(second, first, third);
	else question.show(second, third, first);
	question.playAudio(firstAudio);
	return position; 
}

question.playAudio = (text) => {
	var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', 'sounds/' + text);   
	audioElement.play();
}

question.show = (first, second, third) => {
	$('#first').html('<img src="images/hinh/' + first + '"  class="img-thumbnail image" /><input type="hidden" value=' + first + '>');
	$('#second').html('<img src="images/hinh/' + second + '"  class="img-thumbnail image" /><input type="hidden" value=' + second + '>');
	$('#third').html('<img src="images/hinh/' + third + '"  class="img-thumbnail image" /><input type="hidden" value=' + third + '>');
}

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

$('.tu').click(function () {
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
			$('#ketqua-text').html('Số điểm của bạn là: ' + scores + '/'+ sourceData.length *100);
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
