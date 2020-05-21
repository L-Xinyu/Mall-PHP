<?php
require '../db.connect.php';
require '../tools.func.php';

$prefix = getDBPrefix();
$sql = "SELECT id,name,code,price,stock,description,created_at
        FROM {$prefix}product ORDER BY created_at ASC";
$res = query($sql);

require 'header.php';
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title ">All products</h4>
                        <p class="card-category">list of all products</p>
                    </div>
                    <div class="col-2">
                        <a href="product_add.php" class="btn btn-round btn-info" style="margin-left: 20px;">Add product</a>
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
                            Product code
                        </th>
                        <th>
                            Product name
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Stock
                        </th>
                        <th>
                            Price
                        </th>
                        <th>
                            Created time
                        </th>
                        <th>
                            Operation
                        </th>
                        </thead>
                        <tbody>
                        <?php foreach ($res as $product): ?>
                        <tr>
                            <td>
                                <?php echo $product['id'];?>
                            </td>
                            <td>
                                <?php echo $product['code'];?>
                            </td>
                            <td>
                                <?php echo $product['name'];?>
                            </td>
                            <td>
                                <?php echo substr($product['description'],0,22);?>...
                            </td>
                            <td>
                                <?php echo $product['stock'];?>
                            </td>
                            <td>
                                <?php echo $product['price'];?>
                            </td>
                            <td>
                                <?php echo $product['created_at'];?>
                            </td>
                            <td>
                                <a href="product_edit.php?id=<?php echo $product['id']?>">
                                    Edit
                                </a>
                                |
                                <a href="product_del.php">Delete</a>
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