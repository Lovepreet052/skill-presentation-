<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "DFS";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$title = "";
$distance = "";
$price = "";
$description = "";


$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST["title"];
    $distance = $_POST["distance"];
    $price = $_POST["price"];
    $description = $_POST["description"];
   

    do {
        if (empty($title) || empty($distance) || empty($price) || empty($description) ) {
            // Redirect to error page with missingInfo parameter
            header("location: /DFS/error.php?missingInfo=true");
            exit;
        }

        // Add new employee to the database
        $sql = "INSERT INTO dfs_trucks (title, distance, price, description ) " .
            "VALUES ('$title', '$distance', '$price', '$description' )";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $title = "";
        $distance = "";
        $price = "";
        $description = "";
        

        $successMessage = "info added correctly";

        header("location: /DFS/index.php");
        exit;
    } while (false);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truck</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
          body {
            background-image: url('/DFS/txt.jpeg'); /* Specify the path to your image */
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
        
        .highlight-text {
            background-color: lightyellow;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }
  </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Highlighted text -->
        <div class="highlight-text">
        <h2>new info</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">distance</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="distance" value="<?php echo $distance; ?>">
                </div>
            </div>
            <div class="row mb-3">
            <label class="col-sm-3 col-form-label" for="price">price</label>
            <div class="col-sm-6">
           <input type="price" class="form-control" name="price" id="price" required >
      </div>    
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" value="<?php echo $description; ?>">
                </div>
            </div>
          
            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset alert-success alert-dismissible fade show' role='alert'>
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/DFS/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
     <!-- Footer -->
     <footer class="container mt-5 text-center">
        <!-- lightBlue-colored table -->
     <div class="footer-table">
     <p>Designed by lovepreet Singh</p>
        <p>Student ID: 202108313</p>
    </div>
    </footer>
    <!-- End of Footer -->
</body>

</html>
