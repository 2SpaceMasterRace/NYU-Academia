<?php
function simple_cipher($contents) {
    foreach($contents as $char){
        echo $char;
    }
}

/* 
$argv[1] is the first piece of data you typed after the script name (data.txt).
?? (Null Coalescing Operator)
This operator is a "safety shortcut." It checks two things in one go:
1. Does the variable exist? (Is $argv[1] set?)
2. Is it null? */

$cipher_selection = $argv[1] ?? null;
$input_file = $argv[2] ?? null;

if ($argc > 3){
    die("ERROR: Too many arguments");
}

if (!$input_file || pathinfo($input_file, PATHINFO_EXTENSION) !== 'txt' || !is_readable($input_file)){
    die("ERROR: Given file is missing or not a file of format .txt");
}
$contents = file($input_file, FILE_SKIP_EMPTY_LINES);

if ($contents === false){
    die("ERROR: Unable to read contents of the file");
}

if ($cipher_selection == 1){
    simple_cipher($contents);
}
else if($cipher_selection == 2){
    die("To Be Implemented ");
} else {
    die("ERROR: Undefined Input. Please select: \n 1 - Simple Cipher \n 2 - Ceaser's Cipher");
}


?>