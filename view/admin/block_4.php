<div class="col-md-6 col-sm-12">
  <h2><input id="block_4" class="adminInput" style="width: 100%" value="<?=$block_4[0]?>"></h2>
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
	  echo '<div class="progress mt-4"><button class="knop" onClick="progressLoschen(\''.$block_4[$i+1].'\')">Löschen</button>&#160;&#160;
			  <div class="progress-bar bg-'.$proz.'" role="progressbar" aria-valuenow="'.$block_4[$i].'" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="'.$block_4[++$i].'"></div>
			</div>';
  }
  ?>
  <br>
  <p>Neu Skill Set</p>
  <form method="post" action="">
	  <input type="text" name="nachweis" value="" placeholder="Skill Nachweis">
	  <input type="text" name="prozent" value="" placeholder="Skill Prozent">
	  <input type="button" value="Wahlen" onClick="skilTest(this)">
  </form>
  <form id="skillDel" method="post" action="">
	  <input type="hidden" name="skillDel" value="">
  </form>
</div>