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
        echo "<script type='text/javascript'>alert('$message');window.location.href = '/DatMin/testingupload.php';</script>";
}
else{
    $message = "Wrong File Format";
    echo "<script type='text/javascript'>alert('$message');window.location.href = '/DatMin/testingupload.php';</script>";
}
?>

