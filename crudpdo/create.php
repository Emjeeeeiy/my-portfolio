<?php
include 'pdoconn.php';
?>
<!doctype html>
<html lang="en">
<head>
    <title>My CRUD PHP PDO and MySQL</title>
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
                <ol class="breadcrumb">
                    <!-- Breadcrumb can be added here -->
                </ol>
            </nav>
            <?php
            if(isset($_POST['submit'])) {
                // Sanitize and validate user inputs
                $name_ = htmlspecialchars($_POST['name']);
                $description_ = htmlspecialchars($_POST['description']);
                $price_ = filter_var($_POST['price'], FILTER_SANITIZE_EMAIL);
                $quantity_ = htmlspecialchars($_POST['quantity']);
                $created_at_datetime = htmlspecialchars($_POST['created at datetime']);
                $update_at_datetime = htmlspecialchars($_POST['update at datetime']);
                $on_update_at = htmlspecialchars($_POST['on update at']);

                // Ensure email is valid
                if (!filter_var($mjfm_email, FILTER_VALIDATE_EMAIL)) {
                    echo '<div class="alert alert-danger" role="alert">Invalid email format!</div>';
                } else {
                    // SQL statement with named placeholders
                    $sql = 'INSERT INTO Products (name, description, price, quantity, created_at_datetim, update_at_datetime, on_update_at) VALUES (:name, :, :description, :price, :quantity, :create at datetime, :update at datetime, :on update at)';
                    
                    $stmt = $con->prepare($sql);
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':price', $price);
                    $stmt->bindParam(':qauntity', $quantity);
                    $stmt->bindParam(':created at datetime', $create_at_datetime);
                    $stmt->bindParam(':update at datetime', $update_at_datetime);
                    $stmt->bindParam(':on update at', $on_update_at);

                    if($stmt->execute()) {
                        echo '<div class="alert alert-success" role="alert">User Data Saved Successfully</div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Oops, something went wrong!</div>';
                    }
                }
            }
            ?>
            <h2>Add New User</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control"  name="description" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="email" class="form-control"  name="price" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="text" class="form-control"  name="quantityr" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Created at datetime</label>
                    <input type="text" class="form-control"  name="created_at_datetime" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Update at datetime</label>
                    <input type="text" class="form-control"  name="update_at_datetime" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">on update at </label>
                    <input type="text" class="form-control"  name="on up" autocomplete="off" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                <a href="retrieve.php" class="btn btn-secondary" role="button">User List</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
