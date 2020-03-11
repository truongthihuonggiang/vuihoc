@extends('layouts.index')
@section('content')
<?php
	class Cauhoi
	{
		public $id;
		public $noidung;
	}
	$a = array();
	$i = 0;
	foreach($nghexepcau as $row)
		if($_GET['bai']==$row->idbai)
			{
				$i++;
				$ds = new cauhoi();
				$ds->id =$i;
				$ds->noidung=$row->noidung;
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
	<table class="table">
		<tr class="row text-center inputword-box" style="justify-content: center;" >
			
		</tr>
		<tr class="row text-center word-box" style="display: flex;justify-content: center;margin: 0 20px 40px 20px;">
			
		</tr>
	</table>
		<div id="audio" class="audio"></div>
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
}//mảng đánh dấu
var questions = question.fillArray();

question.randomNumber = (min, max) => Math.floor(Math.random() * max) + min;

question.select = () => {
	var sizeOfData = Object.keys(sourceData).length - 1;
	var first = questions[question.randomNumber(0, questions.length)];
	questions.splice(questions.indexOf(first), 1);
	return [first];
}//chọn từ

question.getSentence = (questions) => {
	let chooseSentence = sourceData[questions[0]]['noidung'];
	question.showBox(chooseSentence);
	question.showCharacter(chooseSentence);
}//hiện từ và ô

question.playTrue = () => {
	var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', 'sounds/amthanhkhac/chondung.mp3');   
	audioElement.play();
}// âm thanh khi đúng
question.playFalse = () => {
	var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', 'sounds/amthanhkhac/chonsai.mp3');   
	audioElement.play();
}//âm thanh khi sai

question.splitString = (string) => {
	let tam =[];
	let length = string.length;
	tam = string.split(' ');
	return tam;
}//cắt chuỗi

question.showBox = (string) => {
	var str = '';
	let ID = 0 ;
	tam = question.splitString(string);
	console.log(tam);
	$('.inputword-box').html('');
	for(i = 0;i < tam.length; i++) 
	{
		if (tam[i] !== ' ') 
		{
			str = '<th class="xeplaicau-box" id="' + ID + '"></th>';
			ID++;
		}
		$('.inputword-box').append(str);
	}
}//hiện ô trống

question.disturbPositionChar = (arrayString) => {
	let result = [];
	while (arrayString.length > 0) {
		let randomNum = question.randomNumber(0, arrayString.length);
		let tempChar = arrayString[randomNum];
		result.push(tempChar);
		arrayString.splice(arrayString.indexOf(tempChar), 1);
	}
	return result;
}

question.showCharacter = (string) => {
	var str = '';
	tam = question.splitString(string.toUpperCase());
	tam = question.disturbPositionChar(tam);
	for(i = 0; i< tam.length; i++)
	{
		if (tam[i] !== ' ') {
			let char = tam[i].toUpperCase();
			str += '<th class="xeplaicau-word " clicked="NO" id="char' + i + '">' + char + '</th>';
		}
		else continue;
	}
	$('.word-box').html(str);
}//hiện từ để chọn

question.updateScores = (scores) => {
	$('#scores').text(scores);
}
question.play = () => {
	$('#play').css('display', 'none');
	$('#replay').css('display', 'inline-block');
	selectedQuestion = question.select();
	mainQuestionInfo = question.getSentence(selectedQuestion);
}
question.next = () => {
	selectedWords = [];
	let timeOut = setTimeout(function() 
	{
        selectedQuestion = question.select();
		mainQuestionInfo = question.getSentence(selectedQuestion);
    }, 900);
}

question.insertWordIntoBox = (word, wordID) => {
	$('#' + selectedWords.length).text(word);
	$('#char'+ wordID).attr('clicked', 'OK');
	$('#char'+ wordID).text('');
	$('#char'+ wordID).css('background-color','#EAFAF1');
	selectedWords.push(word);
}

var selectedQuestion = [];
var mainQuestionInfo = 0;
var numberOfClick = 0;
let selectedWords = [];

$('#play').click(function () { 
	question.play() 
});

$('.word-box').on('click', 'th', function () {
	let  selectedWord  = $('#'+ this.id).text();
	let wordID = (this.id).slice(4);

	if ($('#char' + wordID).attr('clicked') != 'OK') question.insertWordIntoBox(selectedWord, wordID);

	let string = question.splitString(sourceData[selectedQuestion[0]]['noidung'].toUpperCase());
	let str = string.join('');
	let choose = selectedWords.join('');
	i = selectedWords.length;
	if (i == string.length) 
	{
		if (choose == str) 
		{
			scores += config['scores_for_each_question'];
			question.playTrue();
			question.updateScores(scores);
			if (questions.length !== 0) question.next();
			else
			{
				$('#content').css('display', 'none');
				$('#ketqua').css('display', 'block');
				$('#ketqua-text').html('Số điểm của bạn là: ' + scores + '/'+ sourceData.length *100);
			} 
		} 
		else {
			question.playFalse();
			if (questions.length !== 0)
			{
				question.next();
				selectedWord = '';
			} 
			else
			{
				$('#content').css('display', 'none');
				$('#ketqua').css('display', 'block');
				$('#ketqua-text').html('Số điểm của bạn là: ' + scores + '/'+ sourceData.length *100);
			} 
		}
	}
});

function goBack() {
  window.history.back();
}
</script>
</script>
@endsection