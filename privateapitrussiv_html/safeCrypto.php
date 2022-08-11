<?php
const method = 'aes-256-cbc';

function decryp($text,$token){
     $key = ($token[12].$token[3].$token[21]
        .$token[12].$token[23].$token[21].$token[23].$token[31].$token[31].$token[23].$token[12]
        .$token[3].$token[23].$token[5].$token[30].$token[8].$token[05].$token[10].$token[17]
        .$token[23].$token[7].$token[28].$token[7].$token[5].$token[2].$token[28].$token[30]
        .$token[13].$token[7].$token[9].$token[2].$token[2]); // 32 chars
 $iv = ($token[6].$token[3].$token[7].$token[5].$token[25].$token[9].
        $token[8].$token[3].$token[9].$token[5].$token[9].$token[0].$token[1]
        .$token[18].$token[4].$token[6]); // 16 chars
  return openssl_decrypt($text, method, $key, 0, $iv);
}

function encryp($text,$token){
         $key = ($token[12].$token[3].$token[21]
        .$token[12].$token[23].$token[21].$token[23].$token[31].$token[31].$token[23].$token[12]
        .$token[3].$token[23].$token[5].$token[30].$token[8].$token[05].$token[10].$token[17]
        .$token[23].$token[7].$token[28].$token[7].$token[5].$token[2].$token[28].$token[30]
        .$token[13].$token[7].$token[9].$token[2].$token[2]); // 32 chars
 $iv = ($token[6].$token[3].$token[7].$token[5].$token[25].$token[9].
        $token[8].$token[3].$token[9].$token[5].$token[9].$token[0].$token[1]
        .$token[18].$token[4].$token[6]); // 16 chars
  //   $text should be String
  return openssl_encrypt($text, method, key, 0, iv);
}

?>