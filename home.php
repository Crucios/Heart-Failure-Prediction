<?php
$title = 'Heart Failure Prediction';
require_once 'include/header.php';
require_once 'dbconnect.php';
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
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
                <li class="nav-item">
                    <a class="nav-link" href="trainingupload.php">Training</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="myDiv4">
        <div>
            <h1>Heart Failure Prediction</h1>
            <h3>
                <span>Prediction Rate: &nbsp;</span>
                <span id="prediction_rate"></span>
                <?php 
                $query = "SELECT predict FROM prediction_rate";
                $result = mysqli_query($connect, $query);
                while($row = mysqli_fetch_array($result)){
                echo "$row[predict] %";
                }
                ?>
            </h3>
            <img id="correlation"></img>
        </div>
        <br>
        <h2>Facts About Heart Failures</h2><br>
        <div class="myDiv5">
        <h3>Age of Vulnerability</h3>
        <div class="textDiv">
            <p>Heart failure affects people of all ages, from children and young adults to the middle-aged and the elderly. Mostly, prople in the age of 60-69 years are more vulnerable to have heart failures.</p> 
        </div>
        <h3>Ejection Fractions</h3>
        <div class="textDiv">
            <p>Normal Level Volume of Ejection Fractions for adults over 20 years of age is rounded to around 53 to 73 percent. For women, having lower than 53 percent is considered low and for men, having lower than 52 percent is considered low. Also, with a Ratio Volume of Ejection Fraction lower than 45 percent have a potential indicator to heart issues. </p> 
        </div>
        <h3>Range of Blood Sodium Levels</h3>
        <div class="textDiv">
            <p>The normal range for blood sodium levels is 135 to 145 milliequivalents per liter.</p>
        </div>
        <h3>Serum Creatinine</h3>
        <div class="textDiv">
            <p>The increased creatinine levels during hospitalization are a marker of poor cardiac output, leading to diminished renal blood flow and reduced ability to tolerate inpatient heart failure treatment.</p>
        </div>
        <h3>Platelet Count</h3>
        <div class="textDiv">
            <p>Thrombocytosis is a condition in which there is an excessive number of platelets in the blood. Too many platelets can lead to certain conditions, including stroke, heart attack, or a clot in the blood vessels.</p>
            <p>The normal number of platelets in the blood is 150,000 to 400,000 platelets per microliter (mcg/L).</p>
        </div>
        <h3>Creatine Phosphokinase Levels</h3>
        <div class="textDiv">
            <p>The normal levels of Creatine Phosphokinase for an adult is roughly at 10 to 120 micrograms per liter (mcg/L).</p>
        </div>
        <h3>Blood Pressure Levels</h3>
        <div class="textDiv">
            <p>The normal levels of Blood Pressure for an adult is between 90/60mmHg and 120/80mmHg (Lore: 90/60 means systolic pressure of 90mmHg while 60 means diastolic pressure of 60mmHg). 140/90mmHg or higher pressure is considered as High Blood Pressure whereas 90/60mmHg or lower is considered as Low Blood Pressure.</p>
        </div>
        <h3>Sodium Levels</h3>
        <div class="textDiv">
            <p>The normal range for blood sodium levels is 135 to 145 milliequivalents per liter (mEq/L).</p>
        </div> 
</div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type='text/javascript'>
    $(document).ready(function(){
        refreshHome();
        function refreshHome(){
            $.ajax({
                url: "heart_failure_pandas_profiling.py",
                type: "POST",
                dataType: "html",
                success: function(html){
                    $("#correlation").attr('src','pearson_correlation.png');
                }
            });
        }
    });
</script>
<?php
require_once 'include/footer.php';
?>