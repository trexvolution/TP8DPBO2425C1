<?php 
$title = "Create Department";
include 'app/views/layouts/header.php'; 
?>

<div class="col-lg-6 m-auto">
  <form method="post" action="index.php?controller=department&action=create">
    <div class="card">
      <div class="card-header bg-primary">
        <h1 class="text-white text-center">Create Department</h1>
      </div><br>

      <label> DEPARTMENT NAME: </label>
      <input type="text" name="department_name" class="form-control" required> <br>

      <label> FACULTY: </label>
      <input type="text" name="faculty" class="form-control" required> <br>

      <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
      <a class="btn btn-info" href="index.php?controller=department&action=index">Cancel</a><br>
    </div>
  </form>
</div>

<?php include 'app/views/layouts/footer.php'; ?>