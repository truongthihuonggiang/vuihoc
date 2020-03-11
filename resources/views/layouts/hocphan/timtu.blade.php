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
				$ds->id = $i;
				$ds->noidung=$row->noidung;
				$ds->hinhanh=$row->hinhanh;
				$ds->amthanh=$row->amthanh;
				array_push($a,$ds);
				$i++;
			}
?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
var config = {'maximum_questions': 0,'scores_for_each_question': 100};
var sourceData = <?php echo json_encode($a); ?>;
var question = {};
var scores = 0;
console.log(sourceData);
</script>
@endsection