<html>

<body>
    <button onclick="history.back()">Go Back</button> <br>
</body>

</html>


<?php

$file = $_FILES['my_file'];
$error = $file['error'];
$fileName = $_POST['filename'];


if ($error !== UPLOAD_ERR_OK) {
    echo 'File upload error!';
    die();
}

$fileTmpPath = $file['tmp_name'];
$fileStoragePath = 'exercises5/' . $fileName;

move_uploaded_file($fileTmpPath, $fileStoragePath);


?>