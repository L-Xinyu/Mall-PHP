<?php
require '../tools.func.php';
require '../db.connect.php';
require 'auth.php';

$prefix = getDBPrefix();
$sql = "SELECT id,adminuser,created_at,login_at,login_ip
        FROM {$prefix}admin ORDER BY created_at DESC";
$data = query($sql);
require 'header.php';
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">All Administrators</h4>
                <p class="card-category"> list of all admin in the console</p>
            </div>
            <div class="card-body">
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
                            Created time
                        </th>
                        <th>
                            Last login time
                        </th>
                        <th>
                            Last login IP
                        </th>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $admin): ?>
                        <tr>
                            <td>
                                <?php echo $admin['id']; ?>
                            </td>
                            <td>
                                <?php echo $admin['adminuser']; ?>
                            </td>
                            <td>
                                <?php echo $admin['created_at']; ?>
                            </td>
                            <td>
                                <?php echo $admin['login_at']; ?>
                            </td>
                            <td>
                                <?php echo long2ip($admin['login_ip']); ?>
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