<?php
/*--------------------------------
Modul Autentikasi Active Directory
Created by: Agus Ramadona
Version 1.0
03/Nov/2022
Fincance&Information Tech.
---------------------------------
*/

//Server Variable || Silahkan Ubah disini
$domain = "@bsp.co.id";
$ldapServer = "ldap://10.20.7.40"; //BSP AD Zamrud
$port = 389;

class LdapProcess {

	public $AdProcessing;

	//Methods Set To Assemble Connection
	function ConnectionProcessing($userName,$password) {
		//Load Global 
		global $ldapServer;
		global $domain;
		global $port;
		
		//Assemble Username
		$ldapRdn = $userName.$domain;

		//Connection String
		$ldap = ldap_connect($ldapServer,$port);

		//Set LDAP Option
		ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

		//Bind user to AD
		$bind = ldap_bind($ldap,$ldapRdn,$password);

		if ($bind) {
			$filter = "(sAMAccountName=$userName)";
			$result = ldap_search($ldap,"dc=bsp,dc=co,dc=id",$filter);
			//@ldap_sort($ldap, $result, "sn");
			$info = ldap_get_entries($ldap, $result);
			if (count($info) > 0){
				$status = "True";
				$userData = $info;
				
				//AD User Informations
				$callName = $userData[0]["cn"][0];
				$firstName = $userData[0]["givenname"][0];
				$lastName = $userData[0]["sn"][0];
				$jabatan = $userData[0]["title"][0];
				$displayName = $userData[0]["displayname"][0];
				$country = $userData[0]["co"][0];
				$company = $userData[0]["company"][0];
				$department = $userData[0]["department"][0];
				$email = $userData[0]["mail"][0];
				$login = $userData[0]["samaccountname"][0];

			}
			else{
				$status = "False";
			}

		}
		else {
			$status = "Connection Error";
		}

		//Close LDAP Connection
		ldap_close($ldap);

		$this->status = $status; //Login Status
		$this->userData = $userData; //Complete Array Value
		
		//AD Information
		$this->callName = $callName;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->jabatan = $jabatan;
		$this->displayName = $displayName;
		$this->country = $country;
		$this->company = $company;
		$this->department = $department;
		$this->email = $email;
		$this->login = $login;

	}

	//Methods Get Connection Result
	
	//Return Authentication Status
	function ConnectionStatus(){
		return $this->status; //Login Status
	}
	//Return Bulk of AD Data
	function userData(){
		return $this->userData; //Complete Array Value
	}

	//Return Call Name
	function userCallName(){
		return $this->callName;
	}

	//Return First Name
	function userFirstName(){
		return $this->firstName;
	}

	//Return Last Name
	function userLastName(){
		return $this->lastName;
	}

	//Return Jabatan
	function userJabatan(){
		return $this->jabatan;
	}

	//Return Display Name
	function userDisplayName(){
		return $this->displayName;
	}

	//Return Country
	function userCountry(){
		return $this->country;
	}

	//Return Company
	function userCompany(){
		return $this->company;
	}

	//Return Department
	function userDepartment(){
		return $this->department;
	}

	//Return Mail Address
	function userMailAddress(){
		return $this->email;
	}

	//Return User Login
	function userLogin(){
		return $this->login;
	}


}

?>