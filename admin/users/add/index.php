<?php

require_once('../../../config/db.php');

if (isset($_POST['insert'])) {
    // add operation

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = intval($_POST['phone']);
    $address = $_POST['address'];

    $sql = "INSERT INTO users(firstname, lastname, email, phone, address) VALUES (:firstname, :lastname, :email, :phone, :address)";
    $query = $conn->prepare($sql);

    $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->bindParam(':address', $address, PDO::PARAM_STR);

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
    <title>Add User</title>
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

                        <!-- name -->
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="John">
                        </div>

                        <!-- last name -->
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Doe">
                        </div>

                        <!-- email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@mail.com">
                        </div>

                        <!-- phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="09123456789">
                        </div>

                        <!-- address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Add User" name="insert">

                    </form>
                    <!-- end add user form -->
                </div>
            </div>
        </main>
    </div>
</body>

</html>