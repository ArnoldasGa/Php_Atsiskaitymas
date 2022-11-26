<?php


/*
5. Sukurkite forma, kuri leistų pridėti failą ir vėliau jį išsaugotų serveryje su formoje nurodytu failo pavadinimu (name). (3 balai)
*/

//    File forma: 
//    Name: [laboras.txt]
//    File: [browse]

?>

<html>

<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="filename"><br>
        <input type="file" name="my_file"><br>
        <input type="submit" value="Upload">
    </form>
</body>

</html>