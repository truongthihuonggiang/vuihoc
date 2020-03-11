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
				$ds->ketqua=$row->noidung;
				$ds->amthanh=$row->amthanh;
				array_push($a,$ds);
			}
	foreach($tuvung as $row)
		if($row->idbai==8 )
			{
				$i++;
				$ds = new Bangchucai();
				$ds->id =$i;
				$ds->chucai= $row->noidung;
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
	<table class="table">
		<tr class="row text-center input-box" style="justify-content: center;" >
			
		</tr>
		<tr class="row text-center character-box" style="display: flex;justify-content: center;margin: 0 20px 40px 20px;">
			
		</tr>
	</table>
		<div id="audio" class="audio"></div>
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
	'scores_for_each_question': 100
};
var sourceData = <?php echo json_encode($a); ?>;
var bangchucai = <?php echo json_encode($b); ?>;
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
question.getWordAudio = (questions) => {
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
	var str = '';
	let ID = 0 ;
	tam = question.splitString(string);
	$('.input-box').html('');
	for(i = 0;i < tam.length; i++) {
		if (tam[i] !== ' ') {
			str = '<th class="viettu box" id="' + ID + '"></th>';
			ID++;
		}
		else str = '<th class="viettu box" id="boxOfSpace" style="background-color: #EAFAF1";></th>';
		$('.input-box').append(str);
	}
}//hiện ô trống
question.cleanAlphabet = (arrayString) => {
	let tempArr = [];
	for (let char in bangchucai) {
		let element = bangchucai[char]['chucai'];
		element = element.toLowerCase();
		if (arrayString.indexOf(element) === -1) tempArr.push(bangchucai[char]);
	}
	return tempArr;
}
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
	tam = question.splitString(string.toLowerCase());
	bangchucai = question.cleanAlphabet(tam);
	for (i = 0 ;i < 2; i++) {
		m = question.randomNumber(0, bangchucai.length-1);
		tam.push(bangchucai[m].chucai);
	}
	tam = question.disturbPositionChar(tam);
	for(i = 0; i< tam.length; i++)
	{
		if (tam[i] !== ' ') {
			let char = tam[i].toUpperCase();
			str += '<th class="character box " clicked="NO" id="char' + char.toUpperCase() + i + '">' + char + '</th>';
		}
		else continue;
	}
	$('.character-box').html(str);
}//hiện kí tự để chọn
question.updateScores = (scores) => {
	$('#scores').text(scores);
}
question.play = () => {
	$('#play').css('display', 'none');
	$('#replay').css('display', 'inline-block');
	selectedQuestion = question.select();
	mainQuestionInfo = question.getWordAudio(selectedQuestion);
}
question.next = () => {
	selectedChars = [];
	let timeOut = setTimeout(function() 
	{
        selectedQuestion = question.select();
		mainQuestionInfo = question.getWordAudio(selectedQuestion);
    }, 900);
}

question.insertCharIntoBox = (char, charID) => {
	$('#' + selectedChars.length).text(char);
	$('#char'+ char + charID).attr('clicked', 'OK');
	$('#char'+ char + charID).text('');
	$('#char'+ char + charID).css('background-color','#EAFAF1');
	selectedChars.push(char);

}

var selectedQuestion = [];
var mainQuestionInfo = 0;
var numberOfClick = 0;
let selectedChars = [];

$('#play').click(function () { 
	question.play() 
});
$('#replay').click(function () { 
	question.playAudio(sourceData[selectedQuestion[0]]['amthanh'])
});

$('.character-box').on('click', 'th', function () {
	let selectedChar = (this.id).slice(4, 5);
	let charID = (this.id).slice(5);
	if ($('#char' + selectedChar + charID).attr('clicked') != 'OK') question.insertCharIntoBox(selectedChar, charID);
	i = selectedChars.length;
	if (i == (sourceData[selectedQuestion[0]]['ketqua'].replace(/\s/g, '')).length) {
		if (selectedChars.join('') == (sourceData[selectedQuestion[0]]['ketqua'].toUpperCase()).replace(/\s/g, '')) {
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
		} else {
			question.playFalse();
			question.next();
			selectedChar = '';
		}
	}
});

function goBack() {
  window.history.back();
}
</script>

@endsection
