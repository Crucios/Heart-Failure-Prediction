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
        $message = "Upload Success";
        echo "<script src=\"http://code.jquery.com/jquery-3.3.1.min.js\"></script>
                <script type='text/javascript'>
                    function generate_tree(){
                        $.ajax({
                        url: \"heart_failure_mk3_tree_predict.py\",
                        context: document.body
                        }).done(function() {
                            alert('$message');
                            window.location.href = '/DatMin/testingupload.php';
                        });
                    }
                    generate_tree()
                </script>";
}
else{
    $message = "Wrong File Format";
    echo "<script type='text/javascript'>alert('$message');window.location.href = '/DatMin/testingupload.php';</script>";
}
?>

