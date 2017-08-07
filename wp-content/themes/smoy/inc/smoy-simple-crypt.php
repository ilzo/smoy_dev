<?php
if(isset($_POST['user_email']) && !empty($_POST['user_email'])) {
    $email = $_POST['user_email'];
    $params = getEncrypted($email);
    echo json_encode($params);
}

/**
 * Simple encrypt and decrypt
 * 
 * @author Nazmul Ahsan <n.mukto@gmail.com>
 * @link http://nazmulahsan.me/simple-two-way-function-encrypt-decrypt-string/
 *
 * @param string $string string to be encrypted/decrypted
 * @param string $action what to do with this? e for encrypt, d for decrypt
 */
function smoy_simple_crypt( $string, $action = 'e' ) {
    // you may change these values to your own
    $secret_key = 'ov5xplh5ohkjrbe';
    $secret_iv = 'za911p9anr2egbi';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}

function getEncrypted ($email) {
    $encrypted = smoy_simple_crypt($email, 'e');
    $params = array('enc' => $encrypted);
    return $params;
}




 