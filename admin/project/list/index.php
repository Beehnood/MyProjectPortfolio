<head>
    <?php include("../../layout/head.php"); ?>
    <title>Projects List</title>
</head>
<?php
// require_once('http://localhost:8080/blog/config/db.php');

require_once('../../../config/db.php');

if (isset($_REQUEST['del'])) {
    // delete operation
    $projectId = intval($_GET['del']);
    $sql = "DELETE FROM projects WHERE id=:id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $projectId, PDO::PARAM_STR);
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

                    <!-- start projects list -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped caption-top">
                            <caption>List of projects</caption>
                            <thead>
                                <th>id</th>
                                <th>title</th>
                                <th>description</th>
                                <th>skils</th>
                                <th>project</th>
                                <th>guithub</th>
                                <th>image</th>
                                <th>created date</th>
                                <th>actions</th>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                $sql = "SELECT id,title, description, skills_used, image_url, project_url, github_url, created_at FROM projects";
                                $query = $conn->prepare($sql);
                                $query->execute();
                                $result = $query->fetchAll(PDO::FETCH_OBJ);

                                if ($query->rowCount() > 0) {
                                    $counter = 1;

                                    foreach ($result as $row) {
                                ?>
                                        <tr>
                                            <td><?php echo $counter; ?></td>
                                            <td><?php echo htmlentities($row->title); ?></td>
                                            <td><?php echo htmlentities($row->description); ?></td>
                                            <td><?php echo htmlentities($row->skills_used); ?></td>
                                            <td><?php echo htmlentities($row->project_url); ?></td>
                                            <td><?php echo htmlentities($row->github_url); ?></td>
                                            <td><?php echo htmlentities($row->image_url); ?></td>
                                            <td><?php echo htmlentities($row->created_at); ?></td>
                                            <td class="d-flex align-items-center gap-1">
                                                <a href="/myprojectportfolio/admin/project/edit?id=<?php echo htmlentities($row->id); ?>" class="btn btn-warning">
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
                    <!-- end projects list -->
                </div>
            </div>
        </main>
    </div>
</body>

</html>