<?php 
$title = "Create Publication";
include 'app/views/layouts/header.php'; 
?>

<div class="col-lg-6 m-auto">
  <form method="post" action="index.php?controller=publication&action=create">
    <div class="card">
      <div class="card-header bg-primary">
        <h1 class="text-white text-center">Create Publication</h1>
      </div><br>

      <label> TITLE: </label>
      <input type="text" name="title" class="form-control" required> <br>

      <label> JOURNAL: </label>
      <input type="text" name="journal" class="form-control"> <br>
      
      <label> YEAR: </label>
      <input type="number" name="year" class="form-control" required> <br>

      <label> LECTURER (AUTHOR): </label>
      <select name="lecturer_id" class="form-control" required>
          <option value="">-- Select Lecturer --</option>
          <?php while ($row = $lecturers->fetch_assoc()) { ?>
              <option value="<?php echo $row['id']; ?>">
                  <?php echo htmlspecialchars($row['name']); ?> (<?php echo htmlspecialchars($row['nidn']); ?>)
              </option>
          <?php } ?>
      </select><br>

      <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
      <a class="btn btn-info" href="index.php?controller=publication&action=index">Cancel</a><br>
    </div>
  </form>
</div>

<?php include 'app/views/layouts/footer.php'; ?>