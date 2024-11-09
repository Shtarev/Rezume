<h2 id="Beispiele"><?=$block_8[0]?></h2>
<hr>
<?php
array_shift($block_8);
$block_8 = array_chunk($block_8, 9);
foreach($block_8 as $key=>$value){
	echo '<div class="row text-center">
			  <div class="col-sm-4 col-12 p-0" style="margin-bottom: 20px"><a href="images/'.$block_8[$key][0].'" target="_blank"><img class="img-thumbnail"  src="images/'.$block_8[$key][1].'" alt=""></a><p>'.$block_8[$key][2].'</p></div>';
			  // TODO: What the fuck did I do here 6 years ago???
			  if(isset($block_8[$key][3])){
			  echo
			  '<div class="col-sm-4 col-12 p-0" style="margin-bottom: 20px"><a href="images/'.$block_8[$key][3].'" target="_blank"><img class="img-thumbnail"  src="images/'.$block_8[$key][4].'" alt=""></a><p>'.$block_8[$key][5].'</p></div>';
			  }
			  if(isset($block_8[$key][6])){
			  echo
			  '<div class="col-sm-4 col-12 p-0" style="margin-bottom: 20px"><a href="images/'.$block_8[$key][6].'" target="_blank"><img class="img-thumbnail"  src="images/'.$block_8[$key][7].'" alt=""></a><p>'.$block_8[$key][8].'</p></div>';
			  }
			echo 
			'</div>';
}
?>