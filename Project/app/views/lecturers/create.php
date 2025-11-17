<?php 
$title = "Create Lecturer";
include 'app/views/layouts/header.php'; 
?>

<div class="col-lg-6 m-auto">
  <form method="post" action="index.php?controller=lecturer&action=create">
    <br><br>
    <div class="card">
      <div class="card-header bg-primary">
        <h1 class="text-white text-center">Create Lecturer</h1>
      </div><br>

      <label> NAME: </label>
      <input type="text" name="name" class="form-control" required> <br>

      <label> NIDN: </label>
      <input type="text" name="nidn" class="form-control" required> <br>

      <label> PHONE: </label>
      <input type="text" name="phone" class="form-control" required> <br>

      <label> JOIN DATE: </label>
      <input type="date" name="join_date" class="form-control" required> <br>

      <label> DEPARTMENT: </label>
      <select name="department_id" class="form-control" required>
          <option value="">-- Select Department --</option>
          <?php while ($row = $departments->fetch_assoc()) { ?>
              <option value="<?php echo $row['id']; ?>">
                  <?php echo htmlspecialchars($row['department_name']); ?>
              </option>
          <?php } ?>
      </select><br>

      <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
      <a class="btn btn-info" href="index.php?controller=lecturer&action=index">Cancel</a><br>

    </div>
  </form>
</div>

<?php include 'app/views/layouts/footer.php'; ?>