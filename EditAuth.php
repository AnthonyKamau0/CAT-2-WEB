<?php
include('configs/constants.php');
include('configs/DbConn.php');

// Check if the author ID is provided in the URL
if (isset($_GET['id'])) {
    $authorID = $_GET['id'];

    // Fetch details of the selected author
    $sql = "SELECT * FROM Authorstb WHERE AuthorId = :authorID";
    $stmt = $DbConn->prepare($sql);
    $stmt->bindParam(':authorID', $authorID, PDO::PARAM_INT);
    $stmt->execute();

    // Check if the author exists
    if ($stmt->rowCount() > 0) {
        $author = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Author not found. Author ID: " . $authorID;
        exit; // Stop execution if the author is not found
    }
} else {
    echo "Author ID not provided in the URL.";
    exit; // Stop execution if no author ID is provided
}

// Check if the form is submitted for updating
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect updated form data
    $updatedFullName = $_POST['updatedFullName'];
    $updatedEmail = $_POST['updatedEmail'];
    $updatedAddress = $_POST['updatedAddress'];
    $updatedBiography = $_POST['updatedBiography'];
    $updatedDateOfBirth = $_POST['updatedDateOfBirth'];
    $updatedSuspended = isset($_POST['updatedSuspended']) ? True : False;

    try {
        // Update author's information in the database
        $updateSql = "UPDATE Authorstb SET
            AuthorFullName = :updatedFullName,
            AuthorEmail = :updatedEmail,
            AuthorAddress = :updatedAddress,
            AuthorBiography = :updatedBiography,
            AuthorDateOfBirth = :updatedDateOfBirth,
            AuthorSuspended = :updatedSuspended
            WHERE AuthorID = :authorID";

        $updateStmt = $DbConn->prepare($updateSql);
        $updateStmt->bindParam(':updatedFullName', $updatedFullName);
        $updateStmt->bindParam(':updatedEmail', $updatedEmail);
        $updateStmt->bindParam(':updatedAddress', $updatedAddress);
        $updateStmt->bindParam(':updatedBiography', $updatedBiography);
        $updateStmt->bindParam(':updatedDateOfBirth', $updatedDateOfBirth);
        $updateStmt->bindParam(':updatedSuspended', $updatedSuspended);
        $updateStmt->bindParam(':authorID', $authorID, PDO::PARAM_INT);

        $updateStmt->execute();

        echo "Author updated successfully";
    } catch (PDOException $e) {
        echo "Error updating author: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Author Details</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Add Author</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ViewAuthors.php">View Authors</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <h2>Edit Author</h2>
      <form action="" method="post">
        <div class="form-group">
          <label for="updatedFullName">Author Full Name:</label>
          <input type="text" class="form-control" id="updatedFullName" name="updatedFullName" value="
									<?php echo $author['AuthorFullName']; ?>" required>
        </div>
        <div class="form-group">
          <label for="updatedEmail">Author Email:</label>
          <input type="email" class="form-control" id="updatedEmail" name="updatedEmail" value="
										<?php echo $author['AuthorEmail']; ?>" required>
        </div>
        <div class="form-group">
          <label for="updatedAddress">Author Address:</label>
          <input type="text" class="form-control" id="updatedAddress" name="updatedAddress" value="
											<?php echo $author['AuthorAddress']; ?>">
        </div>
        <div class="form-group">
          <label for="updatedBiography">Author Biography:</label>
          <textarea class="form-control" id="updatedBiography" name="updatedBiography" rows="4">
												<?php echo $author['AuthorBiography']; ?>
											</textarea>
        </div>
        <div class="form-group">
          <label for="updatedDateOfBirth">Author Date of Birth:</label>
          <input type="date" class="form-control" id="updatedDateOfBirth" name="updatedDateOfBirth" value="
												<?php echo $author['AuthorDateOfBirth']; ?>">
        </div>
        <div class="form-group">
          <label for="updatedSuspended">Author Suspended:</label>
          <select class="form-control" id="updatedSuspended" name="updatedSuspended">
            <option value="0" <?php echo ($author['AuthorSuspended'] == 0) ? 'selected' : ''; ?>>False </option>
            <option value="1" <?php echo ($author['AuthorSuspended'] == 1) ? 'selected' : ''; ?>>True </option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Author</button>
      </form>
    </div>
  </body>
</html>