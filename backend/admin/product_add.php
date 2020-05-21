<?php
require '../db.connect.php';
require '../tools.func.php';

if(!empty($_POST['name'])){
    $name = htmlentities($_POST['name']);
    $code = htmlentities($_POST['code']);
    $price = doubleval($_POST['price']);
    $stock = intval($_POST['stock']);
    $description = htmlentities($_POST['description']);
    $created_at = date('Y-m-d H:i:s');

    $prefix = getDBPrefix();
    $sql = "INSERT INTO {$prefix}product(name,code,price,stock,description,created_at)
            VALUES ('$name','$code','$price','$stock','$description','$created_at')";

    if (execute($sql)){
        setInfo('Success to add product!');
    }else{
        setInfo('Failed to add product!');
    }
}

require 'header.php';
?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add product</h4>
                <p class="card-category">add a new product</p>
            </div>
            <div class="card-body">
                <?php if(hasInfo()) echo getInfo();?>
                <form action="product_add.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Product name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Price</label>
                                <input type="number" name="price" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Stock</label>
                                <input type="number" name="stock" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Product code</label>
                                <input type="text" name="code" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <div class="form-group bmd-form-group">
                                    <textarea name="description" class="form-control" rows="5">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Add product</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php
require 'footer.php';
?>