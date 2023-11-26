<?php
include('configs/constants.php');
include('configs/DbConn.php');

// Fetch all authors from the database
$sql = "SELECT * FROM Authorstb ORDER BY AuthorFullName ASC";
$result = $DbConn->query($sql);

if (!$result) {
    echo "Error retrieving authors: " ;
} else {
    $authors = $result->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Authors</title>
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
    <div class="container-fluid py-5">
      <h2 class="d-flex justify-content-between align-items-center"> View Authors </h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Biography</th>
            <th scope="col">DOB</th>
            <th scope="col">Suspended</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody> <?php foreach ($authors as $author) : ?> <tr>
            <td> <?php echo $author['AuthorId']; ?> </td>
            <td> <?php echo $author['AuthorFullName']; ?> </td>
            <td> <?php echo $author['AuthorEmail']; ?> </td>
            <td> <?php echo $author['AuthorAddress']; ?> </td>
            <td> <?php echo $author['AuthorBiography']; ?> </td>
            <td> <?php echo $author['AuthorDateOfBirth']; ?> </td>
            <td><?php echo ($author['AuthorSuspended'] == 0) ? 'False' : 'True'; ?></td>

            <td>
              <!-- Edit button linking to the edit file -->
              <a href="EditAuth.php?id=
											
                <?php echo $author['AuthorId']; ?>" class="btn btn-warning btn-sm">Edit </a>
              <!-- Delete button linking to the delete file -->
              <a href="DelAuth.php?id=
											
            <?php echo $author['AuthorId']; ?>" class="btn btn-danger btn-sm">Delete </a>
            </td>
            </td>
          </tr> <?php endforeach; ?> </tbody>
      </table>
    </div>
  </body>
</html>