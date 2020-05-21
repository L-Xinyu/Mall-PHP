<?php
require '../db.connect.php';
require '../tools.func.php';

$id = intval($_GET['id']);
if(empty($id)){
    header('location:products.php');
}

$prefix = getDBPrefix();
$sql = "SELECT id,name,code,description,stock,price,created_at
        FROM {$prefix}product WHERE id=$id";
$current_product = queryOne($sql);
if(empty($current_product)){
    header('location:products.php');
}

if (!empty($_POST['name'])){
    $name = htmlentities($_POST['name']);
    $price = doubleval($_POST['price']);
    $stock = intval($_POST['stock']);
    $description = htmlentities($_POST['description']);

    $sql = "UPDATE {$prefix}product 
            SET name='$name',price='$price',stock='$stock',description='$description'
            WHERE id=$id";

    if(execute($sql)){
        $current_product = array_merge($current_product,$_POST);
        setInfo('Success to modify product information~');
    }else{
        setInfo('Failed to modify product information!');
    }
}

require 'header.php';
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Update product</h4>
                <p class="card-category">change a product information</p>
            </div>
            <div class="card-body">
                <?php if (hasInfo()) echo getInfo(); ?>
                <form action="product_edit.php?id=<?php echo $id;?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Product name</label>
                                <input type="text" name="name"
                                       value="<?php echo $current_product['name'];?>"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Code</label>
                                <input type="text" name="code"
                                       value="<?php echo $current_product['code'];?>"
                                       disabled class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Stock</label>
                                <input type="number" name="stock"
                                       value="<?php echo $current_product['stock'];?>"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Price</label>
                                <input type="number" name="price"
                                       value="<?php echo $current_product['price'];?>"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <div class="form-group bmd-form-group">
                                    <textarea id="description" name="description"
                                              value="<?php echo $current_product['description'];?>"
                                              class="form-control" rows="5"></textarea>
                                </div>
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
