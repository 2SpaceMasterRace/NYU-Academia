<?php
function simple_cipher($contents, $output_file) {
  $arr_contents = str_split($contents);
  $encrypted_text = [];
  foreach ($arr_contents as $char) {
    if (ord($char) >= 97 && ord($char) <=122){
        $encrypted_text[] = chr((ord($char) - 97 + 13)%26 + 97);
    }
    elseif (ord($char) >= 65 && ord($char) <=90){
        $encrypted_text[] = chr((ord($char) - 65 + 13)%26 + 65);
    }
    elseif ($char >= 48 && $char <=57){
        $encrypted_text[] = chr((ord($char) - 48 + 5) % 10 + 48);
    }
    else {
    $encrypted_text[] = $char;
    }
}
  file_put_contents($output_file, $encrypted_text);
}

function caeser_cipher($contents, $output_file){
    /* created a for loop that builds an array of alphabets as key and left shifted 3 of the alphabet as their value */
    $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $plain_text = str_split($letters);
    $cipher_text = [];
    $encrypted_text = [];
    $arr_contents = str_split($contents);
    $shift = 3;
    foreach ($plain_text as $char){
        if (ord($char) >= 97 && ord($char) <=122){
            $cipher_text[$char] = chr((ord($char) - 97 - $shift + 26) % 26 + 97);
    }
        elseif (ord($char) >= 65 && ord($char) <=90){
            $cipher_text[$char] = chr((ord($char) -65 - $shift + 26) % 26 + 65);
    }
    }
    foreach ($arr_contents as $char){
        if (in_array($char, $plain_text)){
            $encrypted_text[] = $cipher_text[$char];
        }
        else{
            $encrypted_text[] = $char;
        }
    }
    file_put_contents($output_file, $encrypted_text);
    
}

function main($argc, $argv) {

/* 
$argv[1] is the first piece of data you typed after the script name (data.txt).
?? (Null Coalescing Operator)
This operator is a "safety shortcut." It checks two things in one go:
1. Does the variable exist? (Is $argv[1] set?)
2. Is it null? */

$cipher_selection = $argv[1] ?? null;
$input_file = $argv[2] ?? null;
$output_file = $argv[3] ?? null;

if ($argc > 4 || $argc < 4){
    die("USAGE: php hvarsha1.php [1/2] [input file.txt] [output file.txt]");
}

if (!$input_file || pathinfo($input_file, PATHINFO_EXTENSION) !== 'txt' || !is_readable($input_file)){
    die("ERROR: Given file is Missing or not a File of format .txt");
}

$contents = file_get_contents($input_file);

if ($contents === false){
    die("ERROR: Unable to read contents of the file");
}

if ($cipher_selection == 1){
    simple_cipher($contents, $output_file);
}
else if($cipher_selection == 2){
    caeser_cipher($contents, $output_file);
} else {
    die("ERROR: Undefined Input. Please select: \n 1 - Simple Cipher \n 2 - Ceaser's Cipher");
}
}

main($argc, $argv);

?>