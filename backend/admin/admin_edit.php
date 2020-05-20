<?php
require '../tools.func.php';
require '../db.connect.php';
require 'auth.php';

$current_user = getSession('admin');

//1 is POST ?
if (!empty($_POST['adminpsw'])){
    //2 new psw = confirm psw?
    $adminpsw = md5(htmlentities($_POST['adminpsw']));
    $newpass = htmlentities($_POST['newpass']);
    $confirmpass = htmlentities($_POST['confirmpass']);
    if($newpass != $confirmpass){
        setInfo('Passwords entered twice are inconsistent!');
    }else {
        //3 old psw is correct?
        $prefix = getDBPrefix();
        $sql = "SELECT id FROM {$prefix}admin
                WHERE id = '{$current_user['id']}'
                AND adminpsw = '$adminpsw'";
        $res = queryOne($sql);
        //4 update mall_admin->adminpsw->new psw
        if ($res) {
            $pass = md5($newpass);
            $sql = "UPDATE {$prefix}admin
            SET adminpsw = '$pass'
            WHERE id = '{$current_user['id']}'";
            if (execute($sql)) {
                setInfo('Success to change password~');
            } else {
                setInfo('Password change failed!');
            }
        } else {
            setInfo("Old password is wrong!");
        }
    }
    //5 show page
}

require 'header.php';
?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Change Password</h4>
                <p class="card-category">modify the current admin password</p>
            </div>
            <div class="card-body">
                <?php if(hasInfo()) echo getInfo();?>
                <form action="admin_edit.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Username</label>
                                <input type="text" disabled name="adminuser"
                                       value="<?php echo $current_user['adminuser']?>"
                                       class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Old password</label>
                                <input type="password" name="adminpsw" class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">New password</label>
                                <input type="password" name="newpass" class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Confirm password</label>
                                <input type="password" name="confirmpass" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Edit</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php
require 'footer.php';
?>
