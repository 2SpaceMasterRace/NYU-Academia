<?php
function simple_cipher($contents, $output_file) {
  $encrypted_text = "";
  for($i=0; $i < strlen($contents);$i++) {
    $char = $contents[$i];
    if (ord($char) >= 97 && ord($char) <=122){
        $encrypted_text .= chr((ord($char) - 97 + 13)%26 + 97);
    }
    else if (ord($char) >= 65 && ord($char) <=90){
        $encrypted_text .= chr((ord($char) - 65 + 13)%26 + 65);
    }
    else if ($char >= 48 && $char <=57){
        $encrypted_text .= chr((ord($char) - 48 + 5) % 10 + 48);
    }
    else {
    $encrypted_text .= $char;
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
    die("To Be Implemented ");
} else {
    die("ERROR: Undefined Input. Please select: \n 1 - Simple Cipher \n 2 - Ceaser's Cipher");
}
}

main($argc, $argv);

?>