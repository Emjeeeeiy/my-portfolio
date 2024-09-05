<?php
include 'pdoconn.php';
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <title>My CRUD PHP PDO and MYSQL</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
</head>
<body>
    <header>
        <!-- place navbar here -->
    </header>
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-6 mx-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"></ol>
                </nav>

                <h2>User List</h2>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Created at datetime</th>
                            <th>Updat at datetime</th>
                            <th>On update at</th>
                            <th>Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mj_users as $user): ?>
                            <tr>
                                <td><?php echo $user['name']; ?></td>
                                <td><?php echo $user['description']; ?></td>
                                <td><?php echo $user['price']; ?></td>
                                <td><?php echo $user['quantity']; ?></td>
                                <td><?php echo $user['created_at_datetime']; ?></td>
                                <td><?php echo $user['update_at_datetime']; ?></td>
                                <td><?php echo $user['on_updated_at']; ?></td>
                                <td>
                                    <a class="btn btn-primary" role="button" href="update.php?id=<?php echo $user['name']; ?>">Update</a>
                                    <a class="btn btn-danger" role="button" href="delete.php?id=<?php echo $user['name']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="create.php" class="btn btn-primary" role="button">Add New</a>
            </div>
        </div>
    </div>
</body>
</html>
