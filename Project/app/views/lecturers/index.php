<?php 
$title = "Lecturers List";
include 'app/views/layouts/header.php'; 
?>

<h2>Lecturers List</h2>
<a href="index.php?controller=lecturer&action=create" class="btn btn-primary mb-3">Add New Lecturer</a>

<table class="table table-striped table-bordered">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>NAME</th>
      <th>NIDN</th>
      <th>PHONE</th>
      <th>JOIN DATE</th>
      <th>DEPARTMENT</th> <th>ACTIONS</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $lecturers->fetch_assoc()) { ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo htmlspecialchars($row['name']); ?></td>
      <td><?php echo htmlspecialchars($row['nidn']); ?></td>
      <td><?php echo htmlspecialchars($row['phone']); ?></td>
      <td><?php echo $row['join_date']; ?></td>
      <td><?php echo htmlspecialchars($row['department_name'] ?? 'N/A'); ?></td>
      <td>
        <a class'btn btn-success btn-sm' href='index.php?controller=lecturer&action=edit&id=<?php echo $row['id']; ?>'>Edit</a>
        <a class='btn btn-danger btn-sm' href='index.php?controller=lecturer&action=delete&id=<?php echo $row['id']; ?>' onclick="return confirm('Are you sure?')">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php include 'app/views/layouts/footer.php'; ?>