<?php
include 'header.php';
?>

    <h2>Login</h2>
    <hr>

<?php if (isset($error) && $error): ?>
    <div class="alert alert-warning" role="alert">
        <strong>Invalid credentials</strong>
    </div>
<?php endif; ?>

    <form action="./?controller=login&action=loginPost" method="post">
        <div class="form-group row">
            <label for="inputUser" class="col-sm-2 col-form-label">Login</label>
            <div class="col-sm-10">
                <input type="text" name="login" class="form-control" id="inputUser" placeholder="Login"
                       required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPass" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="inputPass" placeholder="Password"
                       required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-success"><i class="fa fa-key" aria-hidden="true"></i> Login
                </button>
            </div>
        </div>
    </form>
<?php
include 'footer.php';