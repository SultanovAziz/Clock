<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ошибка</title>
</head>
<body>
<h1>Произошла ошибка</h1>
<p><b>Код ошибки: </b> <?=$throw; ?></p>
<p><b>Текст ошибки: </b> <?=$message; ?></p>
<p><b>Файл в котором произошла ошибка: </b> <?=$file; ?></p>
<p><b>Строка, в которой произошла ошибка: </b> <?=$line; ?></p>
</body>
</html>
