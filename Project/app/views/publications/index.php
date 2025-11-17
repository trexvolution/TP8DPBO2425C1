<?php 
$title = "Publications List";
include 'app/views/layouts/header.php'; 
?>

<h2>Publications List</h2>
<a href="index.php?controller=publication&action=create" class="btn btn-primary mb-3">Add New Publication</a>

<table class="table table-striped table-bordered">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>TITLE</th>
      <th>JOURNAL</th>
      <th>YEAR</th>
      <th>LECTURER</th>
      <th>ACTIONS</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $publications->fetch_assoc()) { ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo htmlspecialchars($row['title']); ?></td>
      <td><?php echo htmlspecialchars($row['journal']); ?></td>
      <td><?php echo $row['year']; ?></td>
      <td><?php echo htmlspecialchars($row['lecturer_name'] ?? 'N/A'); ?></td>
      <td>
        <a class='btn btn-success btn-sm' href='index.php?controller=publication&action=edit&id=<?php echo $row['id']; ?>'>Edit</a>
        <a class='btn btn-danger btn-sm' href='index.php?controller=publication&action=delete&id=<?php echo $row['id']; ?>' onclick="return confirm('Are you sure?')">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php include 'app/views/layouts/footer.php'; ?>