<?php  
$name1=explode('.',$_FILES['fileToUpload']['name']);
if($name1[count($name1)-1]=='csv'||$name1[count($name1)-1]=='xlsx')
{
        $target_path = "uploadstraining/";
        $target_location = $target_path . basename($_FILES['fileToUpload']['name']);
        $_SESSION['target_location'] = $target_location;
        $newfilename = 'heart_failure_clinical_records_dataset.' . end($name1);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploadstraining/". $newfilename);
        $uploadedStatus = 1;
        $quantity = $_POST['quantity'];
        $message = "Upload Success";
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
                <script type='text/javascript'>
                    let quantity = $quantity;
                    function generate_tree(){
                        $.ajax({
                            url: \"heart_failure_mk3_tree_predict.py\",
                            type: 'POST',
                            data: {
                                n_train: quantity
                            },
                            datatype: 'html',
                            success(html) {
                                alert('$message');
                                window.location.href = '/DatMin/trainingupload.php';
                            }
                        });
                    }
                    generate_tree()
                </script>";
}
else{
    $message = "Wrong File Format";
    echo "<script type='text/javascript'>alert('$message');window.location.href = '/DatMin/trainingupload.php';</script>";
}
?>