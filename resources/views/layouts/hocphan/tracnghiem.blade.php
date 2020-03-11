@extends('layouts.index')
@section('content')
	<?php
	class Cauhoilon
	{
		public $id;
		public $noidung;
		public $amthanh;
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
				$ds->noidung=$row->noidung;
				$ds->amthanh=$row->amthanh;
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
<div class="container" id= "content">
	<div class="row bigquestion mx-auto">

	</div>
	<div class="row smallquestion mx-auto">

	</div>
</div>
<script type="text/javascript">
	var bigsourceData = <?php echo json_encode($a); ?>;
	var smallsourceData = <?php echo json_encode($b); ?>;
	var answersourceData = <?php echo json_encode($c); ?>;
	var question = {};
window.onload = function()
{
	let big ='';
	let small ='';
	let chl= [];
	let chn =[];
	let da=[];
	for(i=0; i < bigsourceData.length;i++)
	{	
		let tamchl=[];
		tamchl.push(bigsourceData[i]['id']);
		tamchl.push(bigsourceData[i]['noidung']);
		chl.push(tamchl);
		for(j=0; j< smallsourceData.length;j++)
		{
			if(bigsourceData[i]['id'] == smallsourceData[j]['idchl'])
			{	
				let tamchn = [];
				tamchn.push(smallsourceData[j]['id']);
				tamchn.push(smallsourceData[j]['idchl']);
				tamchn.push(smallsourceData[j]['noidung']);
				chn.push(tamchn);
			}	
		}
	}
	for(i=0;i<smallsourceData.length;i++)
	{
		for(j=0;j<answersourceData.length;j++)
		{
			if(smallsourceData[i][0]==answersourceData[j]['idchn'])
			{
				console.log('id chn' +answersourceData[j]['idchn'] );
				let tamda =[];
				tamda.push(answersourceData[j]['noidung']);
				tamda.push('b');
				da.push(tamda);
			} else console.log('không có');
		}
	}

	for (i=0; i< chl.length ; i++)
	{
		big += '<p>'+ chl[i]+'</p>';
		for(j=0 ; j< chn.length ; j++)
		{
			if (chl[i][0] == chn[j][1])
			{
				small += '<p>'+ chn[j][2]+ '</p>';
			}
		}
	}
	console.log(chl);
	console.log(chn);
	console.log(da);
	$('.bigquestion').html(big);
	$('.smallquestion').html(small);
}
</script>
@endsection