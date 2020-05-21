<?php
require '../db.connect.php';
require '../tools.func.php';

$prefix = getDBPrefix();
$sql = "SELECT id,username,password,age,name,email,phone,created_at
        FROM {$prefix}user ORDER BY created_at ASC";

$res = query($sql);

require 'header.php';
?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title ">All Users</h4>
                        <p class="card-category">list of users</p>
                    </div>
                    <div class="col-2">
                        <a href="user_add.php" class="btn btn-round btn-info" style="margin-left: 20px;">Add user</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p><?php if(hasInfo()) echo getInfo();?></p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class=" text-primary">
                        <th>
                            Id
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Age
                        </th>
                        <th>
                            E-mail
                        </th>
                        <th>
                            Phone number
                        </th>
                        <th>
                            Registered time
                        </th>
                        <th>
                            Operation
                        </th>
                        </thead>
                        <tbody>
                        <?php foreach ($res as $user): ?>
                        <tr>
                            <td>
                                <?php echo $user['id']; ?>
                            </td>
                            <td>
                                <?php echo $user['username']; ?>
                            </td>
                            <td>
                                <?php echo $user['name']; ?>
                            </td>
                            <td>
                                <?php echo $user['age']; ?>
                            </td>
                            <td>
                                <?php echo $user['email']; ?>
                            </td>
                            <td>
                                <?php echo $user['phone']; ?>
                            </td>
                            <td>
                                <?php echo $user['created_at']; ?>
                            </td>
                            <td>
                                <a href="user_edit.php?id=<?php echo $user['id']; ?> ">
                                    Edit</a>
                                |
                                <a href="user_del.php?id=<?php echo $user['id']; ?>">
                                    Delete</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>