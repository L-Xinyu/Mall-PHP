<?php


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
                        <tr>

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