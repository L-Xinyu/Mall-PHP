<?php
require '../db.connect.php';
require '../tools.func.php';

if(!empty($_POST['adminuser'])){
    //POST
    $prefix = getDBPrefix();
    $adminuser = htmlentities($_POST['adminuser']);
    $adminpsw = md5(htmlentities($_POST['adminpsw']));
    $sql = "SELECT id,adminuser FROM {$prefix}admin
            WHERE adminuser = '$adminuser'
            AND adminpsw = '$adminpsw'";
    $res = queryOne($sql);
    if($res){
        //no error
        //Session
        setSession('admin',
            ['adminuser' => $adminuser,'id' => $res['id']]
        );
        $login_at = date('Y-m-d H:i:s');
        $ip = $_SERVER['REMOTE_ADDR'] == '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
        $login_ip = ip2long($ip);
        $sql = "UPDATE {$prefix}admin
                SET login_at = '$login_at',login_ip = '$login_ip'
                WHERE  id='{$res['id']}";
        execute($sql);
        //jump to index.php
        header('location:index.php');
    }else{
        //error
        setInfo('Wrong username or password...');
    }
}
?>

<!doctype html>
<html>

<head>
  <title>Mall</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="assets/css/googlefonts.css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
</head>

<body>
  <div class="wrapper ">
    <div>
      <div>
        <div class="container" style="width: 50%;margin-top: 250px;">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Login</h4>
                    <p class="card-category">Login to the background as an administrator</p>
                  </div>
                  <div class="card-body">
                      <p><?php if(hasInfo()) echo getInfo(); ?></p>
                      <form action="login.php" method="post">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Username</label>
                            <input type="text" name="adminuser" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Password</label>
                            <input type="password" name="adminpsw" class="form-control">
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary pull-right">Login</button>
                      <div class="clearfix"></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
</body>

</html>