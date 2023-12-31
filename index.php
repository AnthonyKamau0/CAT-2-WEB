<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Details Form</title>
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
    <div class="container py-5">
      <form action="processes/AutRegistration.php" method="post" onsubmit="return validateForm()">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="authorFullName">Author Full Name:</label>
              <input type="text" class="form-control" id="authorFullName" name="authorFullName" required>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="authorEmail">Author Email:</label>
              <input type="email" class="form-control" id="authorEmail" name="authorEmail" required>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="authorAddress">Author Address:</label>
              <input type="text" class="form-control" id="authorAddress" name="authorAddress">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="authorSuspended">Author Suspended:</label>
              <select class="form-control" id="authorSuspended" name="authorSuspended">
                <option value="False">False</option>
                <option value="True">True</option>
              </select>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label for="authorBiography">Author Biography:</label>
              <textarea class="form-control" id="authorBiography" name="authorBiography" rows="4"></textarea>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="authorDateOfBirth">Author Date of Birth:</label>
              <input type="date" class="form-control" id="authorDateOfBirth" name="authorDateOfBirth">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <script>
      function validateForm() {
        var fullName = document.getElementById('authorFullName').value;
        var email = document.getElementById('authorEmail').value;
        var address = document.getElementById('authorAddress').value;
        var Biography = document.getElementById('authorBiography').value;
        var DateOfBirth = document.getElementById('authorDateOfBirth').value;
        var Suspended = document.getElementById('authorSuspended').value;
        if (fullName === '' || email === '' || address === '' || Biography === '' || DateOfBirth === '' || Suspended === '') {
          alert('Please fill in all required fields.');
          return false; // Prevent form submission
        }
        return true; // Allow form submission
      }
    </script>
    <!-- Bootstrap JS and Popper.js dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
  </body>
  </body>
</html>