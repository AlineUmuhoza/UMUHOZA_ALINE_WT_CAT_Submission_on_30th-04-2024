<?php
include('database_connection.php');

// Check if EmployeeID is set
if(isset($_REQUEST['EmployeeID'])) {
    $cid = $_REQUEST['EmployeeID'];
    
    $stmt = $connection->prepare("SELECT * FROM employees WHERE EmployeeID=?");
    $stmt->bind_param("i", $Eid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['EmployeeID'];
        $u = $row['FirstName'];
        $y = $row['LastName'];
        $z = $row['Position'];
        $w = $row['BranchID'];
        $q = $row['Telephone'];
        $p = $row['Email'];
    } else {
        echo "Employee not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update new record in employee</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <!-- Update employee form -->
    <h2><u>Update Form of employee</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="fname">FirstName:</label>
        <input type="text" name="fname" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="lname">LastName:</label>
        <input type="text" name="lname" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for=pos>Position:</label>
        <input type="text" name="pos" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="bid">BranchID:</label>
        <input type="number" name="bid" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="tel">Telephone:</label>
        <input type="text" name="tel" value="<?php echo isset($q) ? $q : ''; ?>">
        <br><br>

        <label for="em">Email:</label>
        <input type="text" name="em" value="<?php echo isset($p) ? $p : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $FirstName = $_POST['fname'];
    $LastName = $_POST['lname'];
    $Position = $_POST['pos'];
    $BranchID = $_POST['bid'];
    $Telephone = $_POST['tel'];
    $Email = $_POST['em'];
    
    // Update the employees in the database
    $stmt = $connection->prepare("UPDATE employees SET FirstName=?, LastName=?, Position=?, BranchID=?, Telephone=?, Email=? WHERE EmployeeID=?");
    $stmt->bind_param("ssdissi", $FirstName, $LastName, $Position, $BranchID,$Telephone, $Email,  $Eid);
    $stmt->execute();
    
    // Redirect to employees.php
    header('Location: employees.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
