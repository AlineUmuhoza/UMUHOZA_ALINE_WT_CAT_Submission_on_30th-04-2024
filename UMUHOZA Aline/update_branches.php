<?php
include('database_connection.php');

// Check if BranchID is set
if(isset($_REQUEST['BranchID'])) {
    $bid = $_REQUEST['BranchID'];
    
    $stmt = $connection->prepare("SELECT * FROM branches WHERE BranchID=?");
    $stmt->bind_param("i", $bid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['BranchID'];
        $u = $row['BranchName'];
        $y = $row['Location'];
    } else {
        echo "Branch not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update new record in branches</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <!-- Update branches form -->
    <h2><u>Update Form of branches</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="bname">BranchName:</label>
        <input type="text" name="bname" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="loc">Location:</label>
        <input type="text" name="loc" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $BranchName = $_POST['bname'];
    $Location = $_POST['loc'];
    
    
    // Update the branch in the database
    $stmt = $connection->prepare("UPDATE branches SET BranchName=?, Location=? WHERE BranchID=?");
    $stmt->bind_param("ssd", $BranchName, $Location, $bid);
    $stmt->execute();
    
    // Redirect to branches.php
    header('Location: branches.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
