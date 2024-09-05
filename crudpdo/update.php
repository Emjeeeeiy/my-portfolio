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

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
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
				<?php
				//check muna natin kung nasubmit ang form using isset() function
				if(isset($_POST['submit'])) {

					//kunin natin ang inputs na nilagay ni user sa ating input elements
					$id = $_POST['id'];
                    $mjfm_last_name = $_POST['lname'];
					$mjfm_first_name = $_POST['fname'];
                    $mjfm_email = $_POST['email'];
                    $mjfm_gender = $_POST['gender'];
                    $mjfm_address = $_POST['address'];

					//sql statement mo. yun ? ay placeholder meaning by default waiting pa sya sa magiging values
					$sql = 'update mjfm_users set mjfm_last_name = ?, mjfm_first_name = ?, mjfm_email = ?, mjfm_gender = ?, mjfm_address = ? where id = ?';

					//ito na yun prepared statements natin
					$stmt = $con->prepare($sql);

					//ito yung ilalagay mong values sa placeholder na ? mark
					$stmt->execute(array($mjfm_last_name, $mjfm_first_name, $mjfm_email, $mjfm_gender, $mjfm_address,$id));//yun $username at $password ay yung variable sa taas, un kinuha from inputs

					//yung rowCount() dito ay pancheck kung may affected rows after magexecute.meaning kpag meron ay successful ang execution
					if($stmt->rowCount() > 0) { ?>
						<div class="alert alert-success" role="alert">Saved Successfully</div>
					<?php } else { ?>
						<div class="alert alert-danger" role="alert">Oopss, something went wrong!</div>
					<?php
					}
				}
				?>
				<h2>Add New Users</h2>
                <?php
                //kuhain natin yun id string sa url. ?id=(id ng record na ieedit)
                $id = !empty($_GET['id']) ? $_GET['id'] : '';//check nyo sa module yun ternary operator kung nagtataka kayo dito

                //sql statement para makuha ang member sa database na may id na equal kay var $id
                $sql = 'select * from mjfm_users where id = ?';

                //prepared statement natin
                $stmt = $con->prepare($sql);

                //execute na natin dito
                $stmt->execute(array($id));

                //fetchAll() function ay para makuha lahat
                $mjfm_users = $stmt->fetch();
                ?>
				  <form action="" method="POST">

                  <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" placeholder="Enter your Last Name" name="lname" autocomplete="off" value="<?php echo $mjfm_users['mjfm_last_name'];?>">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" placeholder="Enter your First Name" name="fname" autocomplete="off" value="<?php echo $mjfm_users['mjfm_first_name'];?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" placeholder="Enter your Email" name="email" autocomplete="off" value="<?php echo $mjfm_users['mjfm_email'];?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <input type="text" class="form-control" placeholder="Enter your Gender" name="gender" autocomplete="off" value="<?php echo $mjfm_users['mjfm_gender'];?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" placeholder="Enter your Address" name="address" autocomplete="off" value="<?php echo $mjfm_users['mjfm_address'];?>">
                </div>
				    <button type="submit" name="submit" class="btn btn-primary">Update</button>&nbsp;<a href="retrieve.php" class="btn btn-primary" role="button">Update List</a>
				  </form>
			</div>
		</div>
	</div>

        <main></main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
    </body>
</html>
