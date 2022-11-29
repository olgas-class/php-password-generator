<?php
session_start();
if (!isset($_SESSION["password"])) {
    header("Location: ./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="wrapper">
        <div class="container mb-3 pt-3">
            <div class="row justify-content-center">
                <div class="col-7">
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION["password"]; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>