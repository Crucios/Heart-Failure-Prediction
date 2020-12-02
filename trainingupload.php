<?php
$title = 'Training Upload';
require_once 'include/header.php';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form.php">Check</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data.php">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="testingupload.php">Testing</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="trainingupload.php">Training <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

<form action="uploadtrain.php" method="post" enctype="multipart/form-data">
    <div class="myDiv3">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
            <h2>Upload Training</h2>

                Select CSV to upload:<br>
                <input type="file" name="fileToUpload" id="fileToUpload"><br>
                <label for="quantity">How many percentage for Training data?(50-90)</label>
                <input type="number" id="quantity" name="quantity" min="50" max="90"> % <br><br>
                <input type="submit" value="Upload CSV" name="submit">
            </div>
        </div>
    </div>
</form>
<?php
require_once 'include/footer.php';
?>