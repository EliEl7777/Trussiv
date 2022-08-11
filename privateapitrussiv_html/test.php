<?php
// This refers to the previous code block.
require "safeCrypto.php"; 

// Do this once then store it somehow:
$key = 'W6Ghp4KWPcgopjiTi1TUb0EjkcAK6ERY';
$message = 'We are all living in a yellow submarine';

$ciphertext = safeEncrypt($message, $key);
$plaintext = safeDecrypt($ciphertext, $key);

var_dump($ciphertext);
var_dump($plaintext);