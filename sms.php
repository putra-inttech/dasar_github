<?php
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
// ini adalah tempat kita memilih file autoload
require 'vendor/autoload.php';

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;


// ini adalah tempat kita memilih file autoload 2
// ini adalah tempat kita memilih file autoload 2


// ini adalah tempat kita memilih file autoload 3
// ini adalah tempat kita memilih file autoload 3

// ini adalah tempat kita memilih file autoload 4
// ini adalah tempat kita memilih file autoload 4

// ini adalah tempat kita memilih file autoload 5
// ini adalah tempat kita memilih file autoload 5
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $array_fields['phone_number'] = $_POST['nohp']; // set nohp
  $array_fields['message'] = $_POST['pesan']; // set pesan
  $array_fields['device_id'] = 115989; // set device id. cek di dashboard web smsgateway.me


  // token didapat dari smsgateway.me
  $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU4MzY2ODQwNCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjc4MTkwLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.ZnUdgYLXvVoQxMgWgnbc3cShYb8BAol8rkS-UCB6b8U";

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://smsgateway.me/api/v4/message/send",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "[  " . json_encode($array_fields) . "]",
    CURLOPT_HTTPHEADER => array(
      "authorization: $token",
      "cache-control: no-cache"
    ),
  ));
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }
} else {
?>
  <form method="POST">

    <label>NOHP</label><br>
    <input type="text" name="nohp" /><br>


    <label>Pesan</label><br>
    <textarea name="pesan"></textarea><br>

    <button type="submit">Kirim</button>
  </form>
<?php
}

?>