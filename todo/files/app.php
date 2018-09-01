<?php  include('task.php');  
if (isset($_GET['del_task'])) {
	$id = $_GET['del_task'];

	mysqli_query($db, "DELETE FROM task WHERE id=".$id);
	header('location: app.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>ToDo List</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="bg">
	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ADD TASK BELOW</h2>
	</div>
	<form method="post" action="app.php" class="input_form">
		<?php if (isset($errors)) { ?>
	<p><?php echo $errors; ?></p>
<?php } ?>
		<input type="text" name="task" class="task_input" placeholder="ENTER THE TASK" autocomplete="off">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>
	<table>
	<thead>
		<tr>
			<th>NO.</th>
			<th>TASKS</th>
			<th style="width: 60px;">DELETE</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM task");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['tasks']; ?> </td>
				<td class="delete"> 
					<a href="app.php?del_task=<?php echo $row['id'] ?>">x</a> 
				</td>
			</tr>
		<?php $i++; } ?>	
	</tbody>
</table>
</div>
</body>
</html>