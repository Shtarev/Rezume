<div>
    <form class="form-row">
      <div class="col-8">
          <h1><input type="text" id="header" name="header" class="adminInput" style="width: 100%" value="<?= $header[0]; ?>"></h1>
      </div>
      <div class="col-4">
          <label for="exampleInputFile">Lebenslauf download</label>
          <input type="file" id="resume" name="resume">
      </div>
    </form>
    <div id="result"></div>
</div>
