<?php
include('database_connection.php');

// Check if TransactionID is set
if(isset($_REQUEST['TransactionID'])) {
    $tid = $_REQUEST['TransactionID'];
    
    $stmt = $connection->prepare("SELECT * FROM transactions WHERE TransactionID=?");
    $stmt->bind_param("i", $tid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['TransactionID'];
        $u = $row['AccountID'];
        $y = $row['TransactionType'];
        $z = $row['Amount'];
        $w = $row['TransactionDate'];
    } else {
        echo "Transaction not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update new record in transactions</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <!-- Update transactions form -->
    <h2><u>Update Form of transactions</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="aid">AccountID:</label>
        <input type="number" name="aid" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="trtyp">TransactionType:</label>
        <input type="text" name="trtyp" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for=mnt>Amount:</label>
        <input type="text" name="mnt" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="trdt">TransactionDate:</label>
        <input type="date" name="trdt" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $AccountID = $_POST['aid'];
    $TransactionType = $_POST['trtyp'];
    $Amount = $_POST['mnt'];
    $TransactionDate = $_POST['trdt'];
    
    // Update the transactions in the database
    $stmt = $connection->prepare("UPDATE transactions SET AccountID=?, TransactionType=?, Amount=?, TransactionDate=? WHERE TransactionID=?");
    $stmt->bind_param("isssi", $AccountID, $TransactionType, $Amount, $TransactionDate, $tid);
    $stmt->execute();
    
    // Redirect to transactions.php
    header('Location: transactions.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
