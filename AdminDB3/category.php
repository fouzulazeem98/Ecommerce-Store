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
<title>Categories</title>
<div class="row">
    <div class="container">
        <h3 class="bg-dark text-white py-4 px-4 fw-bold text-center d-flex justify-content-evenly align-items-center">
            <span>CATEGORIES</span>
            <button class="btn btn-light fw-bold" data-bs-toggle="modal" data-bs-target="#crtPro">ADD RECORD</button>
        </h3>
        <input id="searchCategoryWise" type="text" class="form-control my-3" placeholder="Filter By :    category Name">


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
                            <input type="text" name="c_name" class="form-control mb-3" placeholder="Category Name">
                            <input type="file" name="c_info" class="form-control mb-3" placeholder="Description">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="uploadCategories" class="btn btn-dark">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- upload_products -->





        <div id="showCategories"></div>
        <table class="table table-striped table-light" id="hideCate">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = Select("category");
                foreach ($query as $data) {
                ?>
                    <tr>
                        <td><?php echo $data["Id"] ?></td>
                        <td><?php echo $data["c_name"] ?></td>
                        <td>
                            <img style="width: 15%;" src="data:image/;base64,<?php echo $data["c_info"] ?>" alt="">
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
                                        <button type="submit" name="deleteCategories" class="btn btn-dark">Delete</button>
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