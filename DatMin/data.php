<?php
session_start();
$title = 'Data List';
require_once 'include/header.php';
require_once 'dbconnect.php';
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
                <li class="nav-item active">
                    <a class="nav-link" href="data.php">Data <span class="sr-only">(current)</span></a>
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
    <div class="myDiv2">
    <h1>List Data</h1>
    <?php
        $query = "SELECT * FROM datas";
        $result = mysqli_query($connect, $query);
        echo"
            <table class=table><tr>
                <th>Age</th> 
                <th>Anaemia</th>
                <th>Creatine</th>
                <th>Diabetes</th> 
                <th>Ejection</th>
                <th>High Blood Pressure</th>
                <th>Platelets</th> 
                <th>Serum Creatinine</th>
                <th>Serum Sodium</th>
                <th>Sex</th> 
                <th>Smoking</th>
                <th>Time</th>
                <th>Death Event</th>
            </tr>
            ";
        while($row = mysqli_fetch_array($result)){
            if($row['anaemia'] == 1){
                $anaemia = "Yes";
            }
            else{
                $anaemia = "No";
            }
            if($row['diabetes'] == 1){
                $diabetes = "Yes";
            }
            else{
                $diabetes = "No";
            }
            if($row['high_blood_pressure'] == 1){
                $bloodpress = "Yes";
            }
            else{
                $bloodpress = "No";
            }
            if($row['smoking'] == 1){
                $smoking = "Yes";
            }
            else{
                $smoking = "No";
            }
            if($row['DEATH_EVENT'] == 1){
                $death = "High Risk";
            }
            else{
                $death = "Low Risk";
            }
            if($row['sex'] == 1){
                $sex= "Male";
            }
            else{
                $sex = "Female";
            }
              echo "<tr><td>$row[age]</td><td>$anaemia</td><td>$row[creatinine_phosphokinase]</td><td>$diabetes</td><td>$row[ejection_fraction]</td><td>$bloodpress</td><td>$row[platelets]</td><td>$row[serum_creatinine]</td><td>$row[serum_sodium]</td><td>$sex</td><td>$smoking</td><td>$row[time]</td><td>$death</td></tr>
              ";
              }
            echo "</table>";
    ?>
    </div>
<?php
require_once 'include/footer.php';
?>