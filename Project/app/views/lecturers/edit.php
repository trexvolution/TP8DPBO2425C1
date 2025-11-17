<?php 
$title = "Update Lecturer";
include 'app/views/layouts/header.php'; 
?>

<div class="col-lg-6 m-auto">
  <form method="post" action="index.php?controller=lecturer&action=edit&id=<?php echo $lecturer['id']; ?>">
    <br><br>
    <div class="card">
      <div class="card-header bg-warning">
        <h1 class="text-white text-center">Update Lecturer</h1>
      </div><br>

      <label> NAME: </label>
      <input type="text" name="name" value="<?php echo htmlspecialchars($lecturer['name']); ?>" class="form-control" required> <br>

      <label> NIDN: </label>
      <input type="text" name="nidn" value="<?php echo htmlspecialchars($lecturer['nidn']); ?>" class="form-control" required> <br>

      <label> PHONE: </label>
      <input type="text" name="phone" value="<?php echo htmlspecialchars($lecturer['phone']); ?>" class="form-control" required> <br>

      <label> JOIN DATE: </label>
      <input type="date" name="join_date" value="<?php echo $lecturer['join_date']; ?>" class="form-control" required> <br>

      <label> DEPARTMENT: </label>
      <select name="department_id" class="form-control" required>
          <option value="">-- Select Department --</option>
          <?php while ($row = $departments->fetch_assoc()) { 
              $selected = ($row['id'] == $lecturer['department_id']) ? 'selected' : '';
          ?>
              <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>>
                  <?php echo htmlspecialchars($row['department_name']); ?>
              </option>
          <?php } ?>
      </select><br>

      <button class="btn btn-success" type="submit" name="submit">Update</button><br>
      <a class="btn btn-info" href="index.php?controller=lecturer&action=index">Cancel</a><br>

    </div>
  </form>
</div>

<?php include 'app/views/layouts/footer.php'; ?>