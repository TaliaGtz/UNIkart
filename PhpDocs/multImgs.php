<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Múltiples imágenes</title>
</head>
<body>
    <form method="POST" action="../PhpDocs/multImgs2.php" enctype="multipart/form-data">
        <input type="file" name="archivo[]" id="archivo[]" multiple="">
        <br><br>
        <button type="submit">Cargar</button>

    </form>
</body>
</html>