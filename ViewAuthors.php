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
    <div class="container">
        <h2 class="d-flex justify-content-between align-items-center">
            View Authors
            <!-- Add a link to index.php with Bootstrap classes -->
            <a href="index.php" class="btn btn-primary">Go to Author Form</a>
        </h2>
                
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Author ID</th>
                    <th scope="col">Author Full Name</th>
                    <th scope="col">Author Email</th>
                    <th scope="col">AuthorAddress</th>
                    <th scope="col">AuthorBiography</th>
                    <th scope="col">AuthorDateOfBirth</th>
                    <th scope="col">AuthorSuspended</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($authors as $author) : ?>
                    <tr>
                        <td><?php echo $author['AuthorId']; ?></td>
                        <td><?php echo $author['AuthorFullName']; ?></td>
                        <td><?php echo $author['AuthorEmail']; ?></td>
                        <td><?php echo $author['AuthorAddress']; ?></td>
                        <td><?php echo $author['AuthorBiography']; ?></td>
                        <td><?php echo $author['AuthorDateOfBirth']; ?></td>
                        <td><?php echo $author['AuthorSuspended']; ?></td>
                        <td>
                            <!-- Edit button linking to the edit file -->
                            <a href="EditAuth.php?id=<?php echo $author['AuthorId']; ?>" class="btn btn-warning">Edit</a>

                            <!-- Delete button linking to the delete file -->
                            <a href="DelAuth.php?id=<?php echo $author['AuthorId']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
