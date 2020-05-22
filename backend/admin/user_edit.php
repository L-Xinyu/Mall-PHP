<?php
require '../db.connect.php';
require '../tools.func.php';
require 'auth.php';

//1 get id
$id = intval($_GET['id']);
if (empty($id)){
    header('location: users.php');
}
//2 according to id select user
$prefix = getDBPrefix();
$sql = "SELECT id,username,age,name,email,phone 
        FROM {$prefix}user WHERE id='$id'";
$current_user = queryOne($sql);
if (empty($current_user)){
    header('location: users.php');
}
//3 put data into form
//4 is Post?
if (!empty($_POST['name'])){
    //5 receive post data
    $name = htmlentities($_POST['name']);
    $age = htmlentities($_POST['age']);
    $phone = htmlentities($_POST['phone']);
    $email = htmlentities($_POST['email']);
    //6 update data and show
    $sql = "UPDATE {$prefix}user 
            SET name= '$name',age='$age',phone='$phone',email='$email'
            WHERE id='$id'";
    if (execute($sql)){
        $current_user = array_merge($current_user,$_POST);
        setInfo('Success to update user~');
    }else{
        setInfo('Filed to update user!');
    }
}


require 'header.php';
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Update information</h4>
                <p class="card-category">update a user's information</p>
            </div>
            <div class="card-body">
                <?php if (hasInfo()) echo getInfo(); ?>
                <form action="user_edit.php?id=<?php echo $id;?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Username</label>
                                <input type="text" name="username"
                                       value="<?php echo $current_user['username'];?>"
                                       disabled class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" name="name"
                                       value="<?php echo $current_user['name'];?>"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Age</label>
                                <input type="number" name="age"
                                       value="<?php echo $current_user['age'];?>"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Phone number</label>
                                <input type="text" name="phone"
                                       value="<?php echo $current_user['phone'];?>"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">E-mail</label>
                                <input type="email" name="email"
                                       value="<?php echo $current_user['email'];?>"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">UPDATE</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php
require 'footer.php';
?>