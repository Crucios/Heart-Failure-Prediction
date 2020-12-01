<?php
$title = 'Prediction Results';
session_start();
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
                <li class="nav-item">
                    <a class="nav-link" href="form.php">Check</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data.php">Datas</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1>Results</h1>
    <div id="result">
        <?php echo $_GET["result"] ?>
    </div>
    <a href="home.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back to Home</a>
<?php
require_once 'include/footer.php';
?>