<?php
$title = 'Form';
require_once 'include/header.php';
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="form.php">Check <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data.php">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="testingupload.php">Testing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="trainingupload.php">Training</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="myDiv">
        <h2>Form Fill</h2>
        <form>
            <div class="form-group row">
                <label for="inputAge" class="col-sm-2 col-form-label">Age</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputAge">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputAnemia" class="col-sm-2 col-form-label">Anemia</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineYes" value="1">
                        <label class="form-check-label" for="inlineYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineNo" value="0">
                        <label class="form-check-label" for="inlineNo">No</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputCreatinine" class="col-sm-2 col-form-label">Creatinine</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputCreatinine">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputDiabetes" class="col-sm-2 col-form-label">Diabetes</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineYes" value="1">
                        <label class="form-check-label" for="inlineYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineNo" value="0">
                        <label class="form-check-label" for="inlineNo">No</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEjection" class="col-sm-2 col-form-label">Ejection</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEjection">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputHigh" class="col-sm-2 col-form-label">High Blood Pressure</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineYes" value="1">
                        <label class="form-check-label" for="inlineYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineNo" value="0">
                        <label class="form-check-label" for="inlineNo">No</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPlatelets" class="col-sm-2 col-form-label">Platelets</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPlatelets">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSerumC" class="col-sm-2 col-form-label">Serum Creatinine</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputSerumC">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSerumS" class="col-sm-2 col-form-label">Serum Sodium</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputSerumS">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputGender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="inlineYes" value="option1">
                        <label class="form-check-label" for="inlineYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="inlineYes" value="option2">
                        <label class="form-check-label" for="inlineNo">No</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSmoking" class="col-sm-2 col-form-label">Smoking</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="inlineYes" value="option1">
                        <label class="form-check-label" for="inlineYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions5" id="inlineYes" value="option2">
                        <label class="form-check-label" for="inlineNo">No</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputTime" class="col-sm-2 col-form-label">Time</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputTime">
                </div>
            </div>
            <a href="result.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Check Results</a>
            <br>
        </form>
    </div>
<?php
require_once 'include/footer.php';
?>