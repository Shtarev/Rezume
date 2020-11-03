<h2><input id="block_8" class="adminInput" style="width: 100%" value="<?=$block_8[0]?>"></h2>
<hr>
<?php
array_shift($block_8);
$block_8 = array_chunk($block_8, 9);
foreach($block_8 as $key=>$value){
	echo '<div class="row text-center">
			  <div class="col-sm-4 col-12 p-0" style="margin-bottom: 20px"><a href="images/'.$block_8[$key][0].'" target="_blank"><img class="img-thumbnail"  src="images/'.$block_8[$key][1].'" alt=""></a><p>'.$block_8[$key][2].'
			  <br><form action="src/fotorobot.php" method="post">
				<input type="hidden" name="del" value="'.$block_8[$key][0].'">
				<input type="button" value="Löschen" onClick="beispielLoschen(this)">
			  </form>
			  </p></div>';
			  
			  if($block_8[$key][3]){
			  echo
			  '<div class="col-sm-4 col-12 p-0" style="margin-bottom: 20px"><a href="images/'.$block_8[$key][3].'" target="_blank"><img class="img-thumbnail"  src="images/'.$block_8[$key][4].'" alt=""></a><p>'.$block_8[$key][5].'
			  <br><form action="src/fotorobot.php" method="post">
				<input type="hidden" name="del" value="'.$block_8[$key][3].'">
				<input type="button" value="Löschen" onClick="beispielLoschen(this)">
			  </form>
			  </p></div>';
			  }
			  if($block_8[$key][6]){
			  echo
			  '<div class="col-sm-4 col-12 p-0" style="margin-bottom: 20px"><a href="images/'.$block_8[$key][6].'" target="_blank"><img class="img-thumbnail"  src="images/'.$block_8[$key][7].'" alt=""></a><p>'.$block_8[$key][8].'
			  <br><form action="src/fotorobot.php" method="post">
				<input type="hidden" name="del" value="'.$block_8[$key][6].'">
				<input type="button" value="Löschen" onClick="beispielLoschen(this)">
			  </form>
			  </p></div>';
			  }
			echo 
			'</div>';
}
?>
<h3>Neue Beispiele</h3>
<form action="src/fotorobot.php" method="post" enctype="multipart/form-data">
	<input type="text" name="beschreibung" value="" placeholder="Beschreibung"><br><br>
	<input type="file" name="beispiel"><br><br>
	<input type="submit" value="Wahlen">
</form>