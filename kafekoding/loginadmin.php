<?php

include "koneksi.php";

$error = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($kon,
        "SELECT * FROM admin WHERE username='$username' AND password='$password'"
    );

    $data = mysqli_fetch_assoc($query);

    if($data){
        $_SESSION['admin'] = $data['username'];

        header("location: index.php?page=dashboard");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body style="background:#f4f6f9;">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card shadow p-4">

                <h3 class="text-center mb-3">Login Admin</h3>

                <?php if($error != "") { ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php } ?>

                <form method="post">

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" name="login" class="btn btn-primary btn-block">
                        Login
                    </button>

                </form>

                    <div class="text-center mt-3">
                        <a href="index.php?page=home" class="btn btn-secondary btn-sm">Kembali</a>
                    </div>

            </div>

        </div>
    </div>

</div>

</body>
</html>