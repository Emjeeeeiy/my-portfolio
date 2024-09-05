<?php
include 'pdoconn.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <title>My CRUD PHP PDO and MYSQL</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <div class="container">
		<div class="row mt-3">
			<div class="col-sm-6 mx-auto">
				<nav aria-label="breadcrumb">
                    
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
						</ol>
					</nav>
                    
				</nav>
                <h2>Delete User</h2>
                <?php
                //kuhain natin yun id string sa url. ?id=(id ng record na ieedit)
                $id = !empty($_GET['id']) ? $_GET['id'] : '';//check nyo sa module yun ternary operator kung nagtataka kayo dito

                //sql statement para makuha ang member sa database na may id na equal kay var $id
                $sql = 'delete from mjfm_users where id = ?';

                //prepared statement natin
                $stmt = $con->prepare($sql);

                //execute na natin dito
                $stmt->execute(array($id));

                if($stmt->rowCount() > 0) { ?>
                    <div class="alert alert-success" role="alert">User Data Deleted successfully</div>
                <?php } else { ?>
                    <div class="alert alert-danger" role="alert">Oopss, something went wrong!</div>
                <?php
                }
                ?>
                <a href="create.php" class="btn btn-primary" role="button">Add New</a>&nbsp;<a href="retrieve.php" class="btn btn-primary" role="button">Updated User List</a>
           
            </div>

        <main></main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
    </body>
</html>
