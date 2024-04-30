<?php
include('database_connection.php');

// Check if LoanID is set
if(isset($_REQUEST['LoanID'])) {
    $cid = $_REQUEST['LoanID'];
    
    $stmt = $connection->prepare("SELECT * FROM loan WHERE LoanID=?");
    $stmt->bind_param("i", $cid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['LoanID'];
        $u = $row['CustomerID'];
        $y = $row['LoanType'];
        $z = $row['Amount'];
        $w = $row['InterestRate'];
        $q = $row['StartDate'];
    } else {
        echo "Loan not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update new record in loan</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <!-- Update loan form -->
    <h2><u>Update Form of loan</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="cid">CustomerID:</label>
        <input type="number" name="cid" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="lonty">LoanType:</label>
        <input type="text" name="lonty" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for=amnt>Amount:</label>
        <input type="text" name="amnt" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="intr">InterestRate:</label>
        <input type="number" name="intr" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="strdt">StartDate:</label>
        <input type="text" name="strdt" value="<?php echo isset($q) ? $q : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $CustomerID = $_POST['cid'];
    $LoanType = $_POST['lonty'];
    $Amount = $_POST['amnt'];
    $InterestRate = $_POST['intr'];
    $StartDate = $_POST['strdt'];
    
    // Update the loan in the database
    $stmt = $connection->prepare("UPDATE loan SET CustomerID=?, LoanType=?, Amount=?, InterestRate=?, StartDate=? WHERE LoanID=?");
    $stmt->bind_param("ssdii", $CustomerID, $LoanType, $Amount, $InterestRate,$StartDate, $Lid);
    $stmt->execute();
    
    // Redirect to loan.php
    header('Location: loan.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
