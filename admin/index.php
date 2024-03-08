<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./layout/head.php"); ?>
    <title>Dashboard</title>
</head>

<body>
    <div class="container-fluid min-vh-100 d-flex flex-column">
        <div class="container">
            <?php include("./layout/navbar.php"); ?>
        </div>
        <main class="container flex-grow-1">
            <div class="row">
                <div class="col-12">
                    <!-- start breadcrumb -->
                    <div class="card mt-4">
                        <div class="card-body py-2">
                            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end breadcrumb -->

                    <!-- start page title -->
                    <h1 class="mt-4">Dashboard</h1>
                    <!-- end page title -->

                    <!-- start shortcut links -->
                    <div class="list-group mt-4">
                        <a href="/blog/admin/users/list" class="list-group-item list-group-item-action" aria-current="true">
                            Users
                        </a>
                        <a href="/blog/admin/projects/list" class="list-group-item list-group-item-action">Projects</a>
                        <a href="/blog/admin/services/list" class="list-group-item list-group-item-action">Services</a>
                        <a href="/blog/admin/intro" class="list-group-item list-group-item-action">Intro</a>
                    </div>
                    <!-- end shortcut links -->
                </div>
            </div>
        </main>
        <?php include("./layout/footer.php"); ?>