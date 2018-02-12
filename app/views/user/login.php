<?php
/**
 * created by: Nikolay Tuzov
 * @var string $success
 * @var string $error
 * */
?>

<div class="row">
    <div class="col-md-6">
        <?php if ($error): ?>
            <div class="alert alert-danger">
                <?= $error; ?>
            </div>
        <?php endif; ?>
        <form method="post" action="/user/login">
            <div class="form-group">
                <label for="exampleInputLogin">Login</label>
                <input name="login" class="form-control" id="exampleInputLogin"
                       placeholder="Enter login">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                       placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
