<?php
include('database_connection.php');

// Check if PaymentID is set
if(isset($_REQUEST['PaymentID'])) {
    $cid = $_REQUEST['PaymentID'];
    
    $stmt = $connection->prepare("SELECT * FROM payments WHERE PaymentID=?");
    $stmt->bind_param("i", $cid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['PaymentID'];
        $u = $row['LoanID'];
        $y = $row['Amount'];
        $z = $row['PaymentDate'];
    } else {
        echo "Payment not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update new record in payments</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <!-- Update payments form -->
    <h2><u>Update Form of payments</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="Lid">LoanID:</label>
        <input type="number" name="Lid" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="Amnt">Amount:</label>
        <input type="number" name="Amnt" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for=Paydt>PaymentDate:</label>
        <input type="date" name="Paydt" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $LoanID = $_POST['Lid'];
    $Amount = $_POST['Amnt'];
    $PaymentDate = $_POST['Paydt'];
    
    // Update the payments in the database
    $stmt = $connection->prepare("UPDATE payments SET LoanID=?, Amount=?, PaymentDate=? WHERE PaymentID=?");
    $stmt->bind_param("issi", $LoanID, $Amount, $PaymentDate, $Pid);
    $stmt->execute();
    
    // Redirect to payments.php
    header('Location: payments.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
