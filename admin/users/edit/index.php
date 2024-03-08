<?php

require_once('../../../config/db.php');

if (isset($_POST['update'])) {
    // edit operation

    $userId = intval($_REQUEST['id']);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = intval($_POST['address']);

    $sql = "UPDATE users SET firstname=:firstname, lastname=:lastname, email=:email, phone=:phone, address=:address WHERE id=:id";
    $query = $conn->prepare($sql);

    $query->bindParam(':id', $userId, PDO::PARAM_STR);

    $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->bindParam(':address', $address, PDO::PARAM_STR);

    $query->execute();

    echo "<script>alert('record updated successfully');</script>";
    echo "<script>window.location.href='index.php?id=" . $userId . "'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../../layout/head.php"); ?>
    <title>Edit User</title>
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

                    <?php
                    $userId = intval($_GET['id']);
                    $sql = "SELECT id, firstname, lastname, email, phone, address, created_at FROM users WHERE id=:id";
                    $query = $conn->prepare($sql);
                    $query->bindParam(":id", $userId, PDO::PARAM_STR);
                    $query->execute();
                    $result = $query->fetch();
                    ?>

                    <!-- start Edit user form -->
                    <form method="post" class="mt-4">

                        <!-- name -->
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo htmlentities($result['firstname']); ?>">
                        </div>

                        <!-- last name -->
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo htmlentities($result['lastname']); ?>">
                        </div>

                        <!-- email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlentities($result['email']); ?>">
                        </div>

                        <!-- phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlentities($result['phone']); ?>">
                        </div>

                        <!-- address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3"><?php echo htmlentities($result['address']); ?></textarea>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Edit User" name="update">

                    </form>
                    <!-- end Edit user form -->
                </div>
            </div>
        </main>
    </div>
</body>

</html>