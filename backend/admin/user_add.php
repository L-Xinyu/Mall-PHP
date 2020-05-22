<?php
require '../tools.func.php';
require 'auth.php';
require '../db.connect.php';

if (!empty($_POST['username'])){
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    $confirmpass = htmlentities($_POST['confirmpass']);
    $name = htmlentities($_POST['name']);
    $age = htmlentities($_POST['age']);
    $email = htmlentities($_POST['email']);
    $phone = htmlentities($_POST['phone']);
    $created_at = date('Y-m-d H:i:s');

    $prefix = getDBPrefix();

    if($password != $confirmpass){
        setInfo('Passwords entered twice are inconsistent!');
    }else{
        $password = md5($password);
        $sql = "INSERT INTO {$prefix}user(username,password,age,name,email,phone,created_at)
                VALUES ('$username','$password','$age','$name','$email','$phone','$created_at')";
        if (execute($sql)){
            setInfo('Success to add new user');
        }else{
            setInfo('Failed to add new user');
        }
    }
}


require 'header.php';
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add users</h4>
                <p class="card-category">Add a new user</p>
            </div>
            <div class="card-body">
                <?php if (hasInfo()) echo getInfo(); ?>
                <form action="user_add.php" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Confirm Password</label>
                                <input type="password" name="confirmpass" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Age</label>
                                <input type="number" name="age" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Phone number</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">E-mail</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Add user</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php
require 'footer.php';
?>