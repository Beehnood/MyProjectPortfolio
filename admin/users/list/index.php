<head>
    <?php include("../../layout/head.php"); ?>
    <title>Users List</title>
</head>
<?php
// require_once('http://localhost:8080/blog/config/db.php');

require_once('../../../config/db.php');

if (isset($_REQUEST['del'])) {
    // delete operation
    $userId = intval($_GET['del']);
    $sql = "DELETE FROM users WHERE id=:id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $userId, PDO::PARAM_STR);
    $query->execute();

    echo "<script>alert('record deleted successfully');</script>";
    echo "<script>window.location.href='index.php'</script>";
}
?>

<body>
    <div class="container-fluid">
        <div class="container">
            <?php include("../../layout/navbar.php"); ?>
        </div>
        <main class="container">
            <div class="row">
                <div class="col-12">
                    <?php include("./breadcrumb.php"); ?>

                    <?php include("./pageTitle.php"); ?>

                    <!-- start users list -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped caption-top">
                            <caption>List of users</caption>
                            <thead>
                                <th>id</th>
                                <th>first name</th>
                                <th>last name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>address</th>
                                <th>created date</th>
                                <th>actions</th>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                $sql = "SELECT id, firstname, lastname, email, phone, address, created_at FROM users";
                                $query = $conn->prepare($sql);
                                $query->execute();
                                $result = $query->fetchAll(PDO::FETCH_OBJ);

                                if ($query->rowCount() > 0) {
                                    $counter = 1;

                                    foreach ($result as $row) {
                                ?>
                                        <tr>
                                            <td><?php echo $counter; ?></td>
                                            <td><?php echo htmlentities($row->firstname); ?></td>
                                            <td><?php echo htmlentities($row->lastname); ?></td>
                                            <td><?php echo htmlentities($row->email); ?></td>
                                            <td><?php echo htmlentities($row->phone); ?></td>
                                            <td><?php echo htmlentities($row->address); ?></td>
                                            <td><?php echo htmlentities($row->created_at); ?></td>
                                            <td class="d-flex align-items-center gap-1">
                                                <a href="/blog/admin/users/edit?id=<?php echo htmlentities($row->id); ?>" class="btn btn-warning">
                                                    Edit
                                                </a>
                                                <a href="index.php?del=<?php echo htmlentities($row->id); ?>" class="btn btn-danger" onClick="return confirm('Are you sure to delete this item ?')">Delete</a>
                                            </td>
                                        </tr>
                                <?php
                                        $counter++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end users list -->
                </div>
            </div>
        </main>
    </div>
</body>

</html>