<?php

include('../configs/constants.php');
include('../configs/DbConn.php');

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data #author
    $authorFullName = $_POST['authorFullName'];
    $authorEmail = $_POST['authorEmail'];
    $authorAddress = $_POST['authorAddress'];
    $authorBiography = $_POST['authorBiography'];
    $authorDateOfBirth = $_POST['authorDateOfBirth'];
    
    // Convert boolean to string
    $authorSuspended = isset($_POST['authorSuspended']) ? 'True' : 'False';

    // Validate form data
    if (empty($authorFullName)) {
        $errors[] = 'Author Full Name is required.';
    }

    if (empty($authorEmail)) {
        $errors[] = 'Author Email is required.';
    }

    if (empty($errors)) {
        try {
            // Insert data into the database
            $stmt = $DbConn->prepare("INSERT INTO Authorstb (AuthorFullName, AuthorEmail, AuthorAddress, AuthorBiography, AuthorDateOfBirth, AuthorSuspended) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $authorFullName);
            $stmt->bindParam(2, $authorEmail);
            $stmt->bindParam(3, $authorAddress);
            $stmt->bindParam(4, $authorBiography);
            $stmt->bindParam(5, $authorDateOfBirth);
            $stmt->bindParam(6, $authorSuspended);

            $stmt->execute();

            echo "Author registration successful";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo "Form submission prevented due to validation errors.";
    }
} else {
    echo "Invalid request method";
}

?>
