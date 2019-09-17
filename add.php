<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$birthdate = $_POST['birthdate'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
		
	// checking empty fields
	if(empty($fname) || empty($lname) || empty($birthdate) || empty($address) || empty($contact)) {
				
		if(empty($fname)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($lname)) {
			echo "<font color='red'>description field is empty.</font><br/>";
		}
		
		if(empty($birthdate)) {
			echo "<font color='red'>price field is empty.</font><br/>";
		}

		if(empty($address)) {
			echo "<font color='red'>quantity field is empty.</font><br/>";
		}
		
		if(empty($contact)) {
			echo "<font color='red'>quantity field is empty.</font><br/>";
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO users(name, description, price, quantity) VALUES(:name, :description, price quantity:)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':fname', $fname);
		$query->bindparam(':lname', $lname);
		$query->bindparam(':birthdate', $birthdate);
		$query->bindparam(':address', $address);
		$query->bindparam(':contact', $contact);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':price' => $price, ':description' => $description));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>