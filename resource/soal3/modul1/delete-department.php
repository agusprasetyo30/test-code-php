<?php
    include_once(__DIR__ . '/../../../app/data/Department.php');
	$department = new Department();

	$id = $_GET['id'];

    $message = $department->deleteDepartment($id);

    if ($message == "success") {
		echo "
			<script>
				alert('Delete department successfully');
				window.location.href = '" . $department->getUrl() . "'" .
			"</script>";
	} else {
		echo "
			<script>
    			alert('". $message ."');
                window.location.href = '" . $department->getUrl() . "'" .
			"</script>";

        var_dump($department->conn->error);
	}

?>
