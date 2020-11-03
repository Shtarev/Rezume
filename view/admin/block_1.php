<div class="col-md-8 col-sm-12">
  <div class="media">
	<img id="ich" class="mr-3" src="images/<?= fileSuch('images', 'ich'); ?>" alt="Generic placeholder image" onClick="fotoChoice(this)">
	<div class="media-body">
	  <h5 class="mt-0"><input class="adminInput" style="width: 100%" id="block_1" value="<?= $block_1[0]; ?>" ></h5>
	  <div id="block_1_2" onClick="editor(this)" contenteditable="true"><?= $block_1[1]; ?></div>
	</div>
  </div>
</div>