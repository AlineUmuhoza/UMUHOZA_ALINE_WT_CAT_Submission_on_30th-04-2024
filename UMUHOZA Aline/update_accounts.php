<?php
include('database_connection.php');

// Check if Account_Id is set
if(isset($_REQUEST['AccountID'])) {
    $aid = $_REQUEST['AccountID'];
    
    $stmt = $connection->prepare("SELECT * FROM accounts WHERE AccountID=?");
    $stmt->bind_param("i", $aid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['AccountID'];
        $u = $row['CustomerID'];
        $y = $row['AccountType'];
        $z = $row['Balance'];
        $w = $row['OpenDate'];
    } else {
        echo "Account not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update new record in accounts</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <!-- Update accounts form -->
    <h2><u>Update Form of accounts</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="cid">CustomerID:</label>
        <input type="number" name="cid" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="ctype">AccountType:</label>
        <input type="text" name="ctype" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="bal">Balance:</label>
        <input type="number" name="bal" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="opdate">OpenDate:</label>
        <input type="date" name="opdate" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $CustomerID = $_POST['cid'];
    $AccoutType = $_POST['ctype'];
    $Balance = $_POST['bal'];
    $OpenDate = $_POST['opdate'];
    
    // Update the product in the database
    $stmt = $connection->prepare("UPDATE accounts SET CustomerID=?, AccountType=?, Balance=?, OpenDate=? WHERE AccountID=?");
    $stmt->bind_param("ssdii", $CustomerID, $AccoutType, $Balance, $OpenDate, $aid);
    $stmt->execute();
    
    // Redirect to Accounts.php
    header('Location: accounts.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
