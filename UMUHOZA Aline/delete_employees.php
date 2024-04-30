<?php
include('database_connection.php');

// Check if EmployeeID is set
if(isset($_REQUEST['EmployeeID'])) {
    $cid = $_REQUEST['EmployeeID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM employees WHERE EmployeeID=?");
    $stmt->bind_param("i", $Eid);
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
            <input type="hidden" name="Eid" value="<?php echo $Eid; ?>">
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
    echo "EmployeeID is not set.";
}

$connection->close();
?>
