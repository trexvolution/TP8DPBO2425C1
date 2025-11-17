<?php 
$title = "Update Publication";
include 'app/views/layouts/header.php'; 
?>

<div class="col-lg-6 m-auto">
  <form method="post" action="index.php?controller=publication&action=edit&id=<?php echo $publication['id']; ?>">
    <div class="card">
      <div class="card-header bg-warning">
        <h1 class="text-white text-center">Update Publication</h1>
      </div><br>

      <label> TITLE: </label>
      <input type="text" name="title" value="<?php echo htmlspecialchars($publication['title']); ?>" class="form-control" required> <br>

      <label> JOURNAL: </label>
      <input type="text" name="journal" value="<?php echo htmlspecialchars($publication['journal']); ?>" class="form-control"> <br>
      
      <label> YEAR: </label>
      <input type="number" name="year" value="<?php echo $publication['year']; ?>" class="form-control" required> <br>

      <label> LECTURER (AUTHOR): </label>
      <select name="lecturer_id" class="form-control" required>
          <option value="">-- Select Lecturer --</option>
          <?php while ($row = $lecturers->fetch_assoc()) { 
              $selected = ($row['id'] == $publication['lecturer_id']) ? 'selected' : '';
          ?>
              <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>>
                  <?php echo htmlspecialchars($row['name']); ?> (<?php echo htmlspecialchars($row['nidn']); ?>)
              </option>
          <?php } ?>
      </select><br>

      <button class="btn btn-success" type="submit" name="submit">Update</button><br>
      <a class="btn btn-info" href="index.php?controller=publication&action=index">Cancel</a><br>
    </div>
  </form>
</div>

<?php include 'app/views/layouts/footer.php'; ?>