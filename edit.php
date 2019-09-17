<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$gender=$_POST['gender'];
	$birthdate=$_POST['birthdate'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];		
	
	// checking empty fields
	if(empty($fname) || empty($lname) || empty($gender) || empty($birthdate) || empty($address) | empty($contact))  {	
			
		if(empty($fname)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		if(empty($lname)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		if(empty($gender)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($birthdate)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($address)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if(empty($contact)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$sql = "UPDATE users SET name=:name, description=:description, price=:price, quantity=:quantity WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':name', $name);
		$query->bindparam(':description', $description);
		$query->bindparam(':price', $price);
		$query->bindparam(':quantity', $quantity);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':price' => $price, ':description' => $description, ':quantity' => $quantity));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM users WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$fname = $row['fname'];
	$lname = $row['lname'];
	$gender = $row['gender'];
	$birthdate = $row['birthdate'];
	$address = $row['address'];
	$contact = $row['contack'];

}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" fname="fname" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><input type="text" lname="lname" value="<?php echo $;?>"></td>
			</tr>
			<tr> 
				<td>Price</td>
				<td><input type="text" gender="gerder" value="<?php echo $price;?>"></td>
			</tr>
			<tr> 
				<td>Quantity</td>
				<td><input type="text" birthdate="birthdate" value="<?php echo $quantity;?>"></td>
			</tr>
			<tr> 
				<td>Quantity</td>
				<td><input type="text" address="address" value="<?php echo $quantity;?>"></td>
			</tr>
			<tr> 
				<td>Quantity</td>
				<td><input type="text" contact="contact" value="<?php echo $quantity;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>