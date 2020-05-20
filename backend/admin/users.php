<?php
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
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                zhangsan
                            </td>
                            <td>
                                sansan
                            </td>
                            <td>
                                30
                            </td>
                            <td>
                                86267659@qq.com
                            </td>
                            <td>
                                18888888888
                            </td>
                            <td>
                                2019-01-01 20:20:00
                            </td>
                            <td>
                                <a href="user_edit.php">Edit</a>
                                |
                                <a href="">Delete</a>
                            </td>
                        </tr>
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