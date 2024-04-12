<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "DFS";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if ID is provided in the URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $dfs_trucks_id = $connection->real_escape_string($_GET['id']);

    // Query to retrieve dfs_trucks details
    $sql = "SELECT * FROM dfs_trucks WHERE id = $dfs_trucks_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $dfs_trucks = $result->fetch_assoc();
    } else {
        echo "dfs_trucks not found.";
        exit;
    }
} else {
    echo "dfs_trucks ID not provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truck Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('/DFS/ld.jpeg'); /* Specify the path to your image */
            background-size: cover; /* Cover the entire background */
            background-position: center; /* Center the background image */
            background-repeat: no-repeat; /* Do not repeat the background image */
            min-height: 100vh; /* Set minimum height of the body to full viewport height */
            margin: 0; /* Reset default margin */
            padding: 0; /* Reset default padding */
            display: flex; /* Use flexbox */
            flex-direction: column; /* Set flex direction to column */
        }

         /* Define the styles for the blue-colored table */
         .footer-table {
            width: 100%;
            background-color: lightBlue; /* Set the background color */
            color: black; /* Set the text color */
            padding: 10px 0; /* Add some padding for spacing */
            margin-top: 50px; /* Adjust the top margin to separate from footer */
            text-align: center; /* Center-align text */
            
        }

        /* Center the text within the table */
        .footer-table p {
            margin: 0;
           
        }

        /* Style the footer */
        footer.container {
            z-index: 1; /* Ensure the footer is above the blue table */
            margin-top: auto; /* Push the footer to the bottom */
            position: relative; /* Position relative for absolute positioning of footer */
            bottom: 0; /* Stick to the bottom */
        }
        
        
    </style>
   
</head>
<style>
    .btn-custom-red {
            background-color: red;
            color: white;
        }

        .btn-custom-blue {
            background-color: blue;
            color: white;
        }

        .confirmation-box {
            border: 1px solid #ccc;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }

         /* Add space above the header */
         .confirmation-box h2 {
            margin-top: 20px;
        }

        /* Center align the "dfs_trucksDetail" */
        .dfs_trucks-detail {
            text-align: center;
            margin-bottom: 20px;
        }
         /* Custom class to highlight text */
         .highlight-text {
            background-color: lightblue; /* Set the background color */
            padding: 5px; /* Add padding for spacing */
            border-radius: 5px; /* Add border radius for rounded corners */
        }
        
        </style>
<body>
    <div class="container">
    <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="confirmation-box">
      <!-- Highlighted text -->
    <h2 class="text-center mb-4 highlight-text">dfs_trucks Details</h2>
    <form method="post">
    <table class="table">
        <tbody>
            <tr>
            <div class="row">
                        <div class="col-md-6">
                <td>ID</td>
                <td><?php echo $dfs_trucks['ID']; ?></td>
</div>
</div>
            </tr>
            <tr>
            <div class="row">
                        <div class="col-md-6">
                <td>Title</td>
                <td><?php echo $dfs_trucks['Title']; ?></td>
</div>
</div>
            </tr>
            <tr>
            <div class="row">
                        <div class="col-md-6">
                <td>distance</td>
                <td><?php echo $dfs_trucks['Distance']; ?></td>
</div>
</div>
            </tr>
            <tr>
            <div class="row">
                        <div class="col-md-6">
                <td>Price</td>
                <td><?php echo $dfs_trucks['Price']; ?></td>
</div>
</div>
            </tr>
            <tr>
            <div class="row">
                        <div class="col-md-6">
                <td>Description</td>
                <td><?php echo $dfs_trucks['Description']; ?></td>
</div>
</div>
            </tr>
        
        </tbody>
    </table>
</form>
</div>
</div>
</div>
    </div>
    <!-- Footer -->
    <footer class="container mt-5 text-center">
        <!-- lightBlue-colored table -->
     <div class="footer-table">
     <p>Designed by Lovepreet Singh</p>
        <p>Student ID: 202107929</p>
    </div>
    </footer>
    <!-- End of Footer -->
</body>
</html>