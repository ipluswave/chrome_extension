<?php 
	$loan_purpose = $_POST['loan_purpose'];
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];
	$mobile_number = $_POST['mobile_number'];
	$birthday = $_POST['birthday'];
	$residential_adress = $_POST['residential_adress'];
	$suburb = $_POST['suburb'];
	$city = $_POST['city'];
	$resident = $_POST['resident'];
	$id_confination = $_POST['id_confination'];
	$driver_license_number = $_POST['driver_license_number'];
	$version = $_POST['version'];
	$driver_licence_expiry = $_POST['driver_licence_expiry'];
	$company_name = $_POST['company_name'];
	$company_address = $_POST['company_address'];
	$job_title = $_POST['job_title'];
	$employed_since = $_POST['employed_since'];
	$income_after_tax = $_POST['income_after_tax'];
	$bank_name = $_POST['bank_name'];
	$branch = $_POST['branch'];
	$branch_address = $_POST['branch_address'];
	$bank_account = $_POST['bank_account'];
	$email_address = $_POST['email_address'];

	$servername = "localhost";
    $username = "root";
    $password = "";
    $db = "gmail_extension";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

   	$bank_account_query = "SELECT * FROM gmail_extension_info WHERE bank_account = '$bank_account'";
   	$result = mysqli_query($conn, $bank_account_query);
   	//var_dump($bank_account_query);
   	$flagofsamebankaccount = 0;
   	//var_dump($result);
	if(isset($result->num_rows)) {
		if($result->num_rows!=0) {
		$flagofsamebankaccount = 1;
		//header("Location: http://gmailextension-leopard.com/");
		}
	}


	if($flagofsamebankaccount) {
		echo '<div style="width: 270px; height: 270px; box-sizing: border-box; padding-top: 100px;"><p style="text-align: center; color: Red; font-size: 18px;">Failed! Same Identity detected!</p></div>';
	}
	else {
		$query = "
	  	INSERT INTO gmail_extension_info (loan_purpose,first_name,middle_name,last_name,mobile_number,birthday,residential_adress,suburb,city,resident,id_confination,driver_license_number,version,driver_licence_expiry,company_name,company_address,job_title,employed_since,income_after_tax,bank_name,branch,branch_address,bank_account,email_address)
		VALUES ('$loan_purpose','$first_name','$middle_name','$last_name','$mobile_number','$birthday','$residential_adress','$suburb','$city','$resident','$id_confination','$driver_license_number','$version','$driver_licence_expiry','$company_name','$company_address','$job_title','$employed_since','$income_after_tax','$bank_name','$branch','$branch_address','$bank_account','$email_address')";
  		mysqli_query($conn, $query);
  		echo '<div style="width: 270px; height: 270px; box-sizing: border-box; padding-top: 100px;"><p style="text-align: center; color: blue; font-size: 18px;">Congraturation! Successfully Saved the account information!</p></div>';
	}
  	
  	mysqli_close($conn);
  	// header("Location: http://gmailextension-leopard.com/");
?>