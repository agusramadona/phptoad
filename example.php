<?php
include_once "bspLdap.php";

//Supplied Username and Password or from submit form
$userName = "agus.ramadona";
$password = "Forced2000";

$connUser = new LdapProcess();
$connUser->ConnectionProcessing($userName,$password);

//Get Connection/Authentication Status
$resStatus = $connUser->ConnectionStatus();
echo "Login Success: ".$resStatus."<br>";

//Get User Call Name
$resCallName = $connUser->userCallName();
echo $resCallName;
echo "<br>";

//Get User First Name
$resFirstName = $connUser->userFirstName();
echo $resFirstName;
echo "<br>";


//Get User Last Name
$resLastName = $connUser->userLastName();
echo $resLastName;
echo "<br>";

//Get User Jabatan
$resJabatan = $connUser->userJabatan();
echo $resJabatan;
echo "<br>";

//Get User Display Name
$resDisplayName = $connUser->userDisplayName();
echo $resDisplayName;
echo "<br>";

//Get User Country
$resCountry = $connUser->userCountry();
echo $resCountry;
echo "<br>";

//Get User Company
$resCompany = $connUser->userCompany();
echo $resCompany;
echo "<br>";

//Get User Department
$resDepartment = $connUser->userDepartment();
echo $resDepartment;
echo "<br>";

//Get User Department
$resEmail = $connUser->userMailAddress();
echo $resEmail;
echo "<br>";

//Get User Login
$resLogin = $connUser->userLogin();
echo $resLogin;
echo "<br>";

$info1 = $connUser->userData();
/*
var_dump($info1);
echo "==============================<br>";
echo $info1[0]["cn"][0];
echo "<br>";
echo $info1[0]["sn"][0];
echo "<br>";
echo $info1[0]["title"][0];
echo "<br>";
echo $info1[0]["givenname"][0];
echo "<br>";
echo $info1[0]["displayname"][0];
echo "<br>";
echo $info1[0]["co"][0];
echo "<br>";
echo $info1[0]["department"][0];
echo "<br>";
echo $info1[0]["company"][0];
echo "<br>";
echo $info1[0]["samaccountname"][0];
echo "<br>";
echo $info1[0]["mail"][0];
*/
?>