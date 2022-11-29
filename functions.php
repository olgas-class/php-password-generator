<?php
session_start();

/**
 * Controlla la lunghezza della password inserita e genera la passwrod se è compresa tra 8 e 35 oppure genera un messaggio d'errore 
 * @param number $passwd_length
 * @param boolean $allow_repeat
 * 
 * @return [string]
 */
function generatePassword($passwd_length, $allow_repeat, $allowed_chars) {

    $full_chars = generateBaseChars($allowed_chars);

    $result = "";

    if ($passwd_length >= 8 && $passwd_length <= 35) {
        $password = "";
        // Finchè la password non abbia la lunghezza di length caratteri:
        // Genero un numero casuale compreso tra 0 e ultimo indice della stringa e prelevo un carattere in base a questo numero
        while (strlen($password) < $passwd_length) {
            $index = rand(0, (strlen($full_chars) - 1));
            $char = $full_chars[$index];
            // Se !allow_repeate
            // Se il carattere non c'è già  stringa
            // Aggiungo carattere
            // Altrimenti 
            // Aggiungo carattere
            // if (!$allow_repeat) {
            //     if (!str_contains($password, $char)) {
            //         $password .= $char;
            //     }
            // } else {
            //     $password .= $char;
            // }

            // Se allow_repeat è false E il carattere è già presente nella stringa
            // Non faccio niente
            // Altrimenti
            // Aggiungo il carattere
            if ($allow_repeat || !str_contains($password, $char)) {
                $password .= $char;
            }
        }
        // $result = $password;
        $_SESSION["password"] = $password;
        header("Location: ./success.php");
    } else {
        // Errore di input
        $result = "La password deve essere di lunghezza minima di 8 caratteri e massima di 35 caratteri";
    }
    return $result;
}


/**
 * Genera la stringa di caratteri in base ai parametri passati.
 * @param Array $allowed_chars array vuoto o con uno o più dei simboli: "L" per lettere, "N" per numeri, "S" per simboli
 * 
 * @return [type]
 */
function generateBaseChars($allowed_chars) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';
    $symbols = '!?&%$<>^+-*/()[]{}@#_=';

    // Se l'array non è vuoto
    // Se Esiste "L" nell'array, aggiungo le lettere minscole e maiuscole
    // Se esiste "N" aggiungo numeri
    // Se esiste "S" aggiungo simboli
    // Altrimenti
    // Concateno tutto insieme

    $full_chars = "";
    if (count($allowed_chars) > 0) {
        if (in_array("L", $allowed_chars)) {
            $full_chars .= $alphabet;
            $full_chars .= strtoupper($alphabet);
        }

        if (in_array("N", $allowed_chars)) {
            $full_chars .= $numbers;
        }

        if (in_array("S", $allowed_chars)) {
            $full_chars .= $symbols;
        }
    } else {
        $full_chars = $alphabet . strtoupper($alphabet) . $numbers . $symbols;
    }
    return $full_chars;
}
