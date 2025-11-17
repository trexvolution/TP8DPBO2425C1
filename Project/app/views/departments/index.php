<?php 
$title = "Departments List";
include 'app/views/layouts/header.php'; 
?>

<h2>Departments List</h2>
<a href="index.php?controller=department&action=create" class="btn btn-primary mb-3">Add New Department</a>

<table class="table table-striped table-bordered">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>DEPARTMENT NAME</th>
      <th>FACULTY</th>
      <th>ACTIONS</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $departments->fetch_assoc()) { ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo htmlspecialchars($row['department_name']); ?></td>
      <td><?php echo htmlspecialchars($row['faculty']); ?></td>
      <td>
        <a class='btn btn-success btn-sm' href='index.php?controller=department&action=edit&id=<?php echo $row['id']; ?>'>Edit</a>
        <a class='btn btn-danger btn-sm' href='index.php?controller=department&action=delete&id=<?php echo $row['id']; ?>' onclick="return confirm('Are you sure?')">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php include 'app/views/layouts/footer.php'; ?>