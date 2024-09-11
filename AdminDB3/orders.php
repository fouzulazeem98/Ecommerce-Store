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
<title>Orders</title>
<div class="row">
    <div class="container">
        <h3 class="bg-dark text-white py-4 px-4 fw-bold">
            <span>ORDERS</span>
        </h3>



        <div id="showProducts"></div>
        <table class="table table-striped table-light" >
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Product Id</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Product Qty</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Order Id</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = Select("orders");
                foreach ($query as $data) {
                ?>
                    <tr>
                        <td><?php echo $data["Id"] ?></td>
                        <td><?php echo $data["p_id"] ?></td>
                        <td><?php echo $data["u_id"] ?></td>
                        <td><?php echo $data["p_qty"] ?></td>
                        <td><?php echo $data["status"] ?></td>
                        <td><?php echo $data["date"] ?></td>
                        <td><?php echo $data["Time"] ?></td>
                        <td><?php echo $data["Order_ID"] ?></td>
                        <td class="d-flex gap-4">
                            <button class="border-0 bg-dark text-white px-3 py-1" data-bs-toggle="modal" data-bs-target="#del<?php echo $data["Id"] ?>">Delete</button>
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
                                        <button type="submit" name="deleteOrders" class="btn btn-dark">Delete</button>
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