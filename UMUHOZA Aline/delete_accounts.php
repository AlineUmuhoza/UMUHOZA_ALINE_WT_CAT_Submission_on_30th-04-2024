<?php
include('database_connection.php');

// Check if AccountID is set
if(isset($_REQUEST['AccountID'])) {
    $aid = $_REQUEST['AccountID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM accounts WHERE AccountID=?");
    $stmt->bind_param("i", $aid);
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
            <input type="hidden" name="aid" value="<?php echo $aid; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($stmt->execute()) {
        echo "Record deleted successfully.
        <a href='accounts.php'>Yes</a>";
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
    echo "AccountID is not set.";
}

$connection->close();
?>
