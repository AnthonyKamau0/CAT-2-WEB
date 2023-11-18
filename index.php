<?php
include('configs/constants.php');
include('configs/DbConn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Author Details Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Author Details Form</h2>
    <form action="processes/AutRegistration.php" method="post" onsubmit="return validateForm()">
      <div class="form-group">
        <label for="authorFullName">Author Full Name:</label>
        <input type="text" class="form-control" id="authorFullName" name="authorFullName" required>
      </div>

      <div class="form-group">
        <label for="authorEmail">Author Email:</label>
        <input type="email" class="form-control" id="authorEmail" name="authorEmail" required>
      </div>

      <div class="form-group">
        <label for="authorAddress">Author Address:</label>
        <input type="text" class="form-control" id="authorAddress" name="authorAddress">
      </div>

      <div class="form-group">
        <label for="authorBiography">Author Biography:</label>
        <textarea class="form-control" id="authorBiography" name="authorBiography" rows="4"></textarea>
      </div>

      <div class="form-group">
        <label for="authorDateOfBirth">Author Date of Birth:</label>
        <input type="date" class="form-control" id="authorDateOfBirth" name="authorDateOfBirth">
      </div>

      <div class="form-group">
        <label for="authorSuspended">Author Suspended:</label>
        <select class="form-control" id="authorSuspended" name="authorSuspended">
          <option value="False">No</option>
          <option value="True">Yes</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script>
      function validateForm() {
        var fullName = document.getElementById('authorFullName').value;
        var email = document.getElementById('authorEmail').value;
        var address = document.getElementById('authorAddress').value;
        var Biography = document.getElementById('authorBiography').value;
        var DateOfBirth = document.getElementById('authorDateOfBirth').value;
        var Suspended = document.getElementById('authorSuspended').value;
        if (fullName === '' || email === ''||address === '' || Biography === ''||DateOfBirth === '' || Suspended === '') {
          alert('Please fill in all required fields.');
          return false; // Prevent form submission
        }

        // Add more validation logic if needed

        return true; // Allow form submission
      }
    </script>
  </div>
</body>
</html>
