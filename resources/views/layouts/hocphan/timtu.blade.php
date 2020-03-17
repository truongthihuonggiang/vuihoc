@extends('layouts.index')
@section('content')
		<?php
	class Tuvung
	{
		public $id;
		public $noidung;
		public $hinhanh;
		public $amthanh;
	}
	$a = array();
	$i = 0;
	foreach($tuvung as $row)
		if($_GET['bai']==$row->idbai)
			{
				$ds = new Tuvung();
				$ds->id = $row->id;
				$ds->noidung=$row->noidung;
				$ds->hinhanh=$row->hinhanh;
				$ds->amthanh=$row->amthanh;
				array_push($a,$ds);
				$i++;
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
    </div>
    <div class="timtu">
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
var config = {'maximum_questions': 0,'scores_for_each_question': 100};
var sourceData = <?php echo json_encode($a); ?>;
var question = {};
var scores = 0;
console.log(sourceData);
question.randomNumber = (min, max) => Math.floor(Math.random() * max) + min;
question.getData=()=> { 
	let tam=[];
	for (var i = 0; i < sourceData.length; i++) 
	{
			let t=[];
			t.push(sourceData[i]['id']);
			t.push(sourceData[i]['noidung']);
			t.push(sourceData[i]['hinhanh']);
			t.push(sourceData[i]['amthanh']);
			tam.push(t);
	}
	return tam;
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
question.get10Ques = (mang) =>{
	let result = [];
	if(mang.length>10)
	{
		for(i=0; i< 10; i++)
		{
			result[i]=mang[i];
		}
		return result;
	}
	else
	{
		for(i=0; i< mang.length; i++)
		{
			result[i]=mang[i];
		}
		return result;
	}
	
}
question.get20Ques = (mang) => {
	let result = [];
	let mangchu = [];
	let manghinh = [];
	for (i=0; i<mang.length;i++)
	{
		let tam = [];
		tam.push(mang[i][0]);
		tam.push(mang[i][1]);
		tam.push('');
		tam.push(mang[i][3]);
		mangchu.push(tam);
	}
	for (i=0; i<mang.length;i++)
	{
		let tam = [];
		tam.push(mang[i][0]);
		tam.push('');
		tam.push(mang[i][2]);
		tam.push(mang[i][3]);
		manghinh.push(tam);
	}
	result = mangchu.concat(manghinh);
	return result;

}
$('#play').click(function (){
	let str='';
	let tam=[];
	tam=question.getData();
	tam= question.get10Ques(tam);
	tam = question.get20Ques(tam);
	tam = question.disturbPositionChar(tam);
	console.log(tam);
	for(i=0;i<tam.length;i++)
	{
		if(tam[i][2]!=='')
		{
			str += '<div class="timtu-box"><img class="timtu-box hh'+tam[i][0]+'" id ="hh'+tam[i][0]+'" src="images/hinh/'+tam[i][2]+'" style="display: none;"><img class="timtu-box ha'+tam[i][0]+'" id ="ha'+tam[i][0]+'" src="images/g1.jpg"></div>';
		}
		
	}
	$('.timtu').html(str);
	
});
$('.timtu').on('click', 'img', function(){
	let click = 1;
	let danhdau=[];
	tam=question.getData();
	let Clicked = this.id;
	console.log(Clicked);
	$('.hinhan-'+Clicked).css('display','none');
	$('.hinh'+Clicked).css('display','block');
	danhdau.push(Clicked);

});
</script>
@endsection