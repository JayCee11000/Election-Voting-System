<?php
// Include the database configuration file
require_once('../connect.php');

// Check if the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $department = $_POST['department'];
    $yearlevel = $_POST['yearlevel'];
    $age = $_POST['age'];
    $barangay = $_POST['barangay'];
    $street = $_POST['street'];
    $municipality = $_POST['municipality'];
    $housenumber = $_POST['housenumber'];
    $nationality = $_POST['nationality'];
    $imagepath = ''; // Initialize the image path variable

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

        $imageDir = 'DB/images/'; // Specify the directory to save uploaded images
        $imageName = $_FILES['image']['name'];
        $imagepath = $imageDir . $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $imagepath);

        // Insert the user data into the database
        $sql = "INSERT INTO users (firstname, lastname, middlename, department, yearlevel, age, barangay, street, municipality, housenumber, nationality, imagepath) 
                VALUES ('$firstname', '$lastname', '$middlename', '$department', $yearlevel, $age, '$barangay', '$street', '$municipality', housenumber, '$nationality', '$imagepath')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful, redirect to login page
            header("Location: dashboard.html");
            exit();
        } else {
            // Error occurred, handle accordingly
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <style>
    /* Custom Button Styles */
    .btn-olive {
      background-color: olive;
      border-color: olive;
    }

    .btn-olive:hover,
    .btn-olive:focus,
    .btn-olive:active {
      background-color: #D1E2C4;
      border-color: #D1E2C4;
    }

    .form-group {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Register</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="middlename">Middle Name:</label>
            <input type="text" id="middlename" name="middlename" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="department">Department:</label>
            <input type="text" id="department" name="department" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="yearlevel">Year Level:</label>
            <input type="number" id="yearlevel" name="yearlevel" class="form-control" required>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="barangay">Barangay:</label>
            <input type="text" id="barangay" name="barangay" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="street">Street:</label>
            <input type="text" id="street" name="street" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="municipality">Municipality:</label>
            <input type="text" id="municipality" name="municipality" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="housenumber">House Number:</label>
            <input type="text" id="housenumber" name="housenumber" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="nationality">Nationality:</label>
            <input type="text" id="nationality" name="nationality" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="image">Image Upload:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-olive btn-block">Register</button>
    </form>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
