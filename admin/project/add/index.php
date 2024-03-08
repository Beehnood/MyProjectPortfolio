<?php

require_once('../../../config/db.php');

if (isset($_POST['insert'])) {
    // add operation

    $title = $_POST['title'];
    $description = $_POST['description'];
    $skills_used = $_POST['skills_used'];
    $image_url = $_POST['image_url'];
    $project_url = $_POST['project_url'];
    $github_url = $_POST['github_url'];

    $sql = "INSERT INTO projects(title, description, skills_used, project_url, github_url, image_url) VALUES (:title, :description, :skills_used, :project_url, :github_url, :image_url)";
    $query = $conn->prepare($sql);

    $query->bindParam(':title', $title, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->bindParam(':skills_used', $skills_used, PDO::PARAM_STR);
    $query->bindParam(':project_url', $project_url, PDO::PARAM_STR);
    $query->bindParam(':github_url', $github_url, PDO::PARAM_STR);
    $query->bindParam(':image_url', $image_url, PDO::PARAM_STR);
    $query->execute();

    $lastInsertId = $conn->lastInsertId();

    if ($lastInsertId) {
        echo "<script>alert('record inserted successfully');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('ERROR : failed to insert error !!!');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../../layout/head.php"); ?>
    <title>Add Project</title>
</head>

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

                    <!-- start add user form -->
                    <form method="post" class="mt-4">

                        <!-- title-->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                        </div>

                        <!-- description -->
                        <div class="form-floating">
                            <textarea name="description" class="form-control" placeholder="Leave a comment here"
                                id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Description</label>
                        </div>

                        <!-- skills -->
                        <div class="mb-3">
                            <label for="skills_used" class="form-label">Skills Used</label>
                            <input type="text" class="form-control" id="skills_used" name="skills_used"
                                placeholder="example@mail.com">
                        </div>

                        <!-- image -->

                        <!-- <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div> -->

                        <div class="mb-3">
                            <label for="image_url" class="form-label">Image</label>
                            <input type="text" class="form-control" id="image_url" name="image_url" placeholder="Image">
                        </div>

                        <!-- Project -->
                        <div class="mb-3">
                            <label for="project_url" class="form-label">Project</label>
                            <input type="text" class="form-control" id="project_url" name="project_url"
                                placeholder="project">
                        </div>

                        <!-- github -->
                        <div class="mb-3">
                            <label for="github_url" class="form-label">Github</label>
                            <input type="text" class="form-control" id="github_url" name="github_url"
                                placeholder="09123456789">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Add Project" name="insert">

                    </form>
                    <!-- end add user form -->
                </div>
            </div>
        </main>
    </div>
</body>

</html>