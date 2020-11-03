<div class="col-md-6 col-sm-12">
  <h2><?=$block_4[0]?></h2>
  <hr>
  <?php
  function bg($proz){
	  if($proz <= 25){
		  return 'danger';
	  }
	  elseif($proz > 25 && $proz <= 50) {
		  return 'warning';
	  }
	  elseif($proz > 50 && $proz <= 75) {
		  return 'info';
	  }
	  else {
		  return 'success';
	  }
  }
  $kolvo = count($block_4);
  $kolvo = $kolvo-1;
  for($i = 1; $i < $kolvo; $i++) {
	  $proz = bg($block_4[$i]);
	  echo '<div class="progress mt-4">
			  <div class="progress-bar bg-'.$proz.'" role="progressbar" aria-valuenow="'.$block_4[$i].'" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="'.$block_4[++$i].'"></div>
			</div>';
  }
  ?>
</div>