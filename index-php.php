<?php


   $some_data = array(
    'userSecretKey'=>'w5x7srq7-rx5r-3t89-2ou2-k7361x2jewhn',
    'categoryCode'=>'gcbhict9',
    'billName'=>$_POST[''],
    'billDescription'=>$_POST[''],
    'billPriceSetting'=>0,
    'billPayorInfo'=>1,
    'billAmount'=>$_POST[''] * 100,
    'billReturnUrl'=>'http://bizapp.my',
    'billCallbackUrl'=>'http://bizapp.my/paystatus',
    'billExternalReferenceNo' => 'AFR341DFI', // reference number sendiri bukan toyyyipay punya macam number resit
    'billTo'=>$_POST[''],
    'billEmail'=>$_POST[''],
    'billPhone'=>$_POST[''],
    'billSplitPayment'=>0,
    'billSplitPaymentArgs'=>'',
    'billPaymentChannel'=>'2',
    'billContentEmail'=>'Thank you for purchasing our product!',
    'billChargeToCustomer'=>'',
    'billExpiryDays'=>1
  );  

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createCategory');  //PROVIDE API LINK HERE
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

  $result = curl_exec($curl);

  $info = curl_getinfo($curl);  
  curl_close($curl);

  $obj = json_decode($result);
  echo $result;

  header('https://dev.toyyibpay.com/'. $obj->Billcode);