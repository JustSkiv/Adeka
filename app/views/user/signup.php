<?php
/**
 * created by: Nikolay Tuzov
 */

/**
 * @var array $errors
 * @var \app\models\User $user
 * */
?>

<div class="row">
    <div class="col-md-6">
        <?php if (!empty($success)): ?>
            <div class="alert alert-success">
                <?= $success; ?>
            </div>
        <?php endif; ?>
        <form method="post" action="/user/signup">
            <div class="form-group">
                <label for="exampleInputLogin">Login</label>
                <?= $user->showErrors('login'); ?>
                <input name="login" class="form-control" id="exampleInputLogin"
                       placeholder="Enter login" value="<?= $user->login; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <?= $user->showErrors('password'); ?>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                       placeholder="Password" value="<?= $user->password; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <?= $user->showErrors('email'); ?>
                <input name="email" type="" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp"
                       placeholder="Enter email" value="<?= $user->email; ?>">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                </small>
            </div>
            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <?= $user->showErrors('name'); ?>
                <input name="name" class="form-control" id="exampleInputName" aria-describedby="emailHelp"
                       placeholder="Enter name" value="<?= $user->name; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>