<style>
    .container {
        margin: 5% 18%;
        width: 80%;
    }

    td,
    th {
        padding: 30px !important;
    }
</style>
<title>Product</title>
<div class="row">
    <div class="container">
        <h3 class="bg-dark text-white py-4 px-4 fw-bold text-center d-flex justify-content-evenly align-items-center">
            <span>PRODUCTS</span>
            <button class="btn btn-light fw-bold" data-bs-toggle="modal" data-bs-target="#crtPro">ADD RECORD</button>
        </h3>
        <input id="searchProductWise" type="text" class="form-control my-3" placeholder="Filter By :    category Name">




        <!-- upload_products -->
        <!-- Modal -->
        <form action="../connection.php" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="crtPro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title px-2 text-dark fw-bold" id="staticBackdropLabel">
                                CREATE RECORD
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="p_name" class="form-control mb-3" placeholder="Product Name">
                            <input type="text" name="p_desc" class="form-control mb-3" placeholder="Description">
                            <input type="number" name="p_qty" class="form-control mb-3" placeholder="Quantity">
                            <input type="text" name="p_price" class="form-control mb-3" placeholder="Price">
                            <select class="form-control mb-3" name="p_status" id="<?php echo $data['Id'] ?>">
                                <option value="Active">Active</option>
                                <option value="In Active">In Active</option>
                            </select>
                            <select class="form-control mb-3" name="p_type" id="<?php echo $data['Id'] ?>">
                                <option value="present">Present</option>
                                <option value="out of stock">Out of Stock</option>
                            </select>
                            <input type="text" name="p_category" class="form-control mb-3" placeholder="Category">
                            <input type="file" name="p_image" class="form-control mb-3" placeholder="Image">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="uploadProducts" class="btn btn-dark">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- upload_products -->





        <div id="showProducts"></div>
        <table class="table table-striped table-light" id="hidePro">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Price</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Category</th>
                    <th scope="col">Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = Select("products");
                foreach ($query as $data) {
                ?>
                    <tr>
                        <td><?php echo $data["Id"] ?></td>
                        <td><?php echo $data["p_name"] ?></td>
                        <td><?php echo $data["p_desc"] ?></td>
                        <td><?php echo $data["p_qty"] ?></td>
                        <td><?php echo $data["p_price"] ?></td>
                        <td><?php echo $data["p_type"] ?></td>
                        <td><?php echo $data["p_status"] ?></td>
                        <td><?php echo $data["p_category"] ?></td>
                        <td>
                            <img style="width:30%" src="data:image/;base64,<?php echo $data["p_image"] ?>" alt="">
                        </td>
                        <td class="d-flex gap-4">
                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#del<?php echo $data["Id"] ?>">Delete</button>
                        </td>
                    </tr>



                    <!-- Delete_button -->
                    <form action="../connection.php" method="post">
                        <div class="modal fade" id="del<?php echo $data["Id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <input type="hidden" name="Id" value="<?php echo $data["Id"]; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title px-2 text-dark fw-bold" id="staticBackdropLabel">
                                            DELETE RECORD
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <span class="text-danger fw-bold">Are you sure you want to delete this data ?</span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="deleteProducts" class="btn btn-dark">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</div>