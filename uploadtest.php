<!DOCTYPE html>
<html>
<head>
    <style>
        img {
            margin: auto;
        }
    </style>
<title>Redirect</title>
</head>
<body>
<img src="loading.gif" alt="HTML5 Icon" width="128" height="128">

</body>
</html>

<?php  
$name1=explode('.',$_FILES['fileToUpload']['name']);
if($name1[count($name1)-1]=='csv'||$name1[count($name1)-1]=='xlsx')
{
        $target_path = "uploadstesting/";
        $target_location = $target_path . basename($_FILES['fileToUpload']['name']);
        $_SESSION['target_location'] = $target_location;
        $newfilename = 'heart_failure_clinical_records_dataset.' . end($name1);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploadstesting/". $newfilename);
        $uploadedStatus = 1;
        $message = "Upload Success. You will be directed shortly.";
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
                <script type='text/javascript'>
                    function generate_tree(){
                        $.ajax({
                        url: \"heart_failure_mk3_predict_datas.py\",
                        context: document.body
                        }).done(function() {
                            alert('$message');
                            setTimeout(function () {
                                window.location.href = 'testingupload.php'; }, 2000);
                        });
                    }
                    generate_tree()
                </script>";
}
else{
    $message = "Wrong File Format";
    echo "<script type='text/javascript'>alert('$message');window.location.href = 'testingupload.php';</script>";
}
?>