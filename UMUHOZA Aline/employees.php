<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Our Employee</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;
      background-color: yellow;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1200px; /* Adjust this value as needed */

      padding: 8px;
      
    }
    header{
    background-color:skyblue;
}
    section{
    padding:71px;
    border-bottom: 1px solid #ddd;
    }
    footer{
    text-align: center;
    padding: 15px;
    background-color:skyblue;
    }

  </style>
  <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>
  </head>

  <header>

<body bgcolor="hotpink">
  <form class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
    <img src="./images/logo.png" width="90" height="60" alt="Logo">
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./home.html">HOME</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html">ABOUT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html">CONTACT</a>
  </li>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./Service.html">SERVICE</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./accounts.php">ACCOUNTS</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./branches.php">BRANCHES</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./customer.php">CUSTOMERS</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./employees.php">EMPLOYEES</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./loan.php">LOAN</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./payments.php">PAYMENTS</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./transactions.php">TRANSACTIONS</a>
  </li>
  
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: white; background-color: skyblue; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Login</a>
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
    
    
    
  </ul>

</header>
<section>

    <h1><u> Employees Form </u></h1>
    <form method="post" onsubmit="return confirmInsert();">
            
        <label for="Eid">EmployeeID:</label>
        <input type="number" id="cid" name="cid"><br><br>

        <label for="fname">FirstName:</label>
        <input type="text" id="fname" name="fname"><br><br>

        <label for="lname">LastName:</label>
        <input type="text" id="lname" name="lname" required><br><br>

        <label for=pos>Position:</label>
        <input type="text" id="pos" name="pos" required><br><br>

        <label for="bid">BranchID:</label>
        <input type="number" id="bid" name="bid" required><br><br>

        <label for="tel">Telephone:</label>
        <input type="text" id="tel" name="tel" required><br><br>

         <label for="em">Email:</label>
        <input type="text" id="em" name="em" required><br><br>

        <input type="submit" name="add" value="Insert">
      

    </form>


<?php
include('database_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO employees(FirstName, LastName, Position, BranchID, Telephone, Email) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $fname, $lname, $pos, $bid, $tel, $em);
    // Set parameters and execute
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pos = $_POST['pos'];
    $bid = $_POST['bid'];
    $tel = $_POST['tel'];
    $em = $_POST['em'];
    
    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$connection->close();
?>

<?php
include('database_connection.php');

// SQL query to fetch data from the Employees table
$sql = "SELECT * FROM employees";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of Employees</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Table of Employees</h2></center>
    <table border="5">
        <tr>
            <th>EmployeeID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Position</th>
            <th>BranchID</th>
            <th>Telephone</th>
            <th>Email</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
     include('database_connection.php');

        // Prepare SQL query to retrieve all Employees
        $sql = "SELECT * FROM employees";
        $result = $connection->query($sql);

        // Check if there are any Employees
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $Eid = $row['EmployeeID']; // Fetch the employeesID
                echo "<tr>
                    <td>" . $row['EmployeeID'] . "</td>
                    <td>" . $row['FirstName'] . "</td>
                    <td>" . $row['LastName'] . "</td>
                    <td>" . $row['Position'] . "</td>
                    <td>" . $row['BranchID'] . "</td>
                    <td>" . $row['Telephone'] . "</td>
                    <td>" . $row['Email'] . "</td>
                    <td><a style='padding:4px' href='delete_employees.php?CustomerID=$Eid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_employees.php?CustomerID=$Eid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
</body>

    </section>


  
<footer>
  <center> 
    <marquee behavior='alternate'>
    <b><h2>UR CBE BIT &copy, 2024 &reg, Designer by: @Aline UMUHOZA</h2></b>
  </marquee>
  </center>
</footer>
</body>
</html>