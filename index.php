<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <div class="container">
    <h1>TailorNet GUI</h1>
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <form id="tailornetForm">
            <div class="mb-3">
              <label for="genderSelect" class="form-label">Gender</label>
              <select name="gender" class="form-control" id="genderSelect">
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="garmentSelect" class="form-label">Garment</label>
              <select name="garment" class="form-control" id="garmentSelect">
                <option>Pant</option>
                <option>Short-Pant</option>
                <option>Shirt</option>
                <option>T-Shirt</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="styleSelect" class="form-label">Style</label>
              <select name="style" class="form-control" id="styleSelect">
                <?php for ($i = 0; $i < 8; $i++): ?>
                <option>00<?php echo $i ?></option>
                <?php endfor?>
              </select>
            </div>
            <div class="mb-3">
              <label for="shapeSelect" class="form-label">Shape</label>
              <select name="shape" class="form-control" id="shapeSelect">
                <option>tallthin</option>
                <option>shortfat</option>
                <option>mean</option>
                <option>somethin</option>
                <option>somefat</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="poseSelect" class="form-label">Pose Sequence</label>
              <select name="pose" class="form-control" id="poseSelect">
                <?php
$pose_ids = ['01_08', '01_14', '05_02', '05_04', '05_05', '05_06', '05_07', '86_07'];
foreach ($pose_ids as $pose_id) {
    echo '<option>' . $pose_id . '</option>';
}
?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary" id="submit">
              <span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"
                style="display: none;"></span>
              <span class="status">Submit</span>
            </button>
          </form>
        </div>

      </div>
      <div class="col-md-6">
        <p class="mb-3" id="statusText"></p>
        <video id="render">
        </video>
      </div>
    </div>
  </div>
  <script src="./index.js"></script>
</body>

</html>