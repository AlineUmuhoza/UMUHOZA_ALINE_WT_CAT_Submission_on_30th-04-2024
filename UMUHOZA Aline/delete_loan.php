<?php
include('database_connection.php');

// Check if LoanID is set
if(isset($_REQUEST['LoanID'])) {
    $Lid = $_REQUEST['LoanID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM loan WHERE LoanID=?");
    $stmt->bind_param("i", $Lid);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="Lid" value="<?php echo $Lid; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }
}
?>
</body>
</html>
<?php

    $stmt->close();
} else {
    echo "LoanID is not set.";
}

$connection->close();
?>
