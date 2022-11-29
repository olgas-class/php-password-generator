<?php

include __DIR__ . "/functions.php";

if (isset($_GET["length"])) {
    $passwd_legth = intval($_GET["length"]);
    $allow_duplicates = $_GET["allow-duplicates"] === "1" ? true : false;
    $characters = $_GET["characters"] ?? [];
    $result = generatePassword($passwd_legth, $allow_duplicates, $characters);
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

                <div class="col-12 text-center">
                    <h1 class="text-white-50">Strong Password Generator</h1>
                    <h2 class="text-white">Genera una password sicura</h2>
                </div>


                <?php if (isset($result)) { ?>
                    <div class="col-7">
                        <div class="alert alert-info" role="alert">
                            <?php echo $result ?>
                        </div>
                    </div>
                <?php } ?>

                <div class="col-7">
                    <form class="p-3 border border-1 rounded-2 bg-light" action="index.php" method="GET">
                        <div class="row mb-3">
                            <label for="length" class="col-sm-7 col-form-label">Lunghezza password:</label>
                            <div class="col-sm-3">
                                <input type="number" name="length" id="length" class="form-control">
                            </div>
                        </div>
                        <fieldset class="row mb-3">

                            <legend class="col-form-label col-sm-7 pt-0">Consenti ripetizioni di uno o più caratteri:</legend>
                            <div class="col-sm-5">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="allow-duplicates" id="allow-duplicates" checked value="1">
                                    <label class="form-check-label" for="allow-duplicates">
                                        Sì
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="allow-duplicates" id="allow-duplicates" value="0">
                                    <label class="form-check-label" for="allow-duplicates">
                                        No
                                    </label>
                                </div>

                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <div class="col-sm-5 offset-sm-7">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="characters[]" id="characters" value="L">
                                    <label class="form-check-label" for="characters">
                                        Lettere
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="characters[]" id="characters" value="N">
                                    <label class="form-check-label" for="characters">
                                        Numeri
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="characters[]" id="characters" value="S">
                                    <label class="form-check-label" for="characters">
                                        Simboli
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Invia</button>
                            <button type="reset" class="btn btn-secondary">Annulla</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

</body>

</html>