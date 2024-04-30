<?php
include('database_connection.php');

// Check if CustomerID is set
if(isset($_REQUEST['CustomerID'])) {
    $cid = $_REQUEST['CustomerID'];
    
    $stmt = $connection->prepare("SELECT * FROM customer WHERE CustomerID=?");
    $stmt->bind_param("i", $cid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['CustomerID'];
        $u = $row['fname'];
        $y = $row['lname'];
        $z = $row['Adress'];
        $w = $row['ContactNmbr'];
        $q = $row['Email'];
        $p = $row['gender'];
    } else {
        echo "Customer not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update new record in Customer</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <!-- Update customer form -->
    <h2><u>Update Form of Customer</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="fnm">FirstName:</label>
        <input type="text" name="fnm" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="lnm">LastName:</label>
        <input type="text" name="lnm" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for=adr>Address:</label>
        <input type="text" name="adr" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="cnmbr">ContactNumber:</label>
        <input type="number" name="cnmbr" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="eml">Email:</label>
        <input type="text" name="eml" value="<?php echo isset($q) ? $q : ''; ?>">
        <br><br>

       <label for="gend">Gender:</label>
          <select name="gend">
                <option <?php if(isset($p) && $p == 'Male') echo 'selected'; ?>>Male</option>
                <option <?php if(isset($p) && $p == 'Female') echo 'selected'; ?>>Female</option>
            </select>
        
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $fname = $_POST['fnm'];
    $lname = $_POST['lnm'];
    $Adress = $_POST['adr'];
    $ContactNmbr = $_POST['cnmbr'];
    $Email = $_POST['eml'];
    $gender = $_POST['gend'];
    
    // Update the customer in the database
    $stmt = $connection->prepare("UPDATE customer SET fname=?, lname=?, Adress=?, ContactNmbr=?, Email=?, gender=? WHERE CustomerID=?");
    $stmt->bind_param("sssdddi", $fname, $lname, $Adress, $ContactNmbr,$Email, $gender,  $cid);
    $stmt->execute();
    
    // Redirect to customer.php
    header('Location: customer.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
