

<?php

//echo print_r($_POST);

   $some_data = array(
    'userSecretKey'=>'', // your secret key here in accout
    //'catname' => 'toyyibPay General 2',
    //'catdescription' => 'toyyibPay General Category, For toyyibPay Transactions 2',
    'categoryCode'=>'ndp79143',
    'billName'=>$_POST['billName'],
    'billDescription'=>$_POST['billDescription'],
    'billPriceSetting'=>0,
    'billPayorInfo'=>0,
    'billAmount'=>$_POST['billAmount'] * 100,
    'billReturnUrl'=>'http://localhost/projects/segment-code/toyyibpay/payment_status.php', //tukar link disini
    'billCallbackUrl'=>'http://bizapp.my/paystatus',
    'billExternalReferenceNo' => 'AFR341DFI', // reference number sendiri bukan toyyyipay punya macam number resit
    'billTo'=>$_POST['billTo'],
    'billEmail'=>$_POST['billEmail'],
    'billPhone'=>$_POST['billPhone'],
    'billSplitPayment'=>0,
    'billSplitPaymentArgs'=>'',
    'billPaymentChannel'=>'0',
    'billContentEmail'=>'Thank you for purchasing our product!',
    'billExpiryDate'=>'17-12-2020 17:00:00',
    'billChargeToCustomer'=>'',
    'billExpiryDays'=>1
  );  

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createBill');  //PROVIDE API LINK HERE
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

  
  $result = curl_exec($curl);
  $info = curl_getinfo($curl);  
  curl_close($curl);
  $obj = json_decode($result);
  echo print_r($obj);

  echo $obj[0]->BillCode;

  header('location:http://dev.toyyibpay.com/'.$obj[0]->BillCode.'');


 

?>