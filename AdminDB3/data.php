<title>Data</title>
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

<div class="row">
    <div class="container">
        <h3 class="bg-dark text-white py-4 px-4 fw-bold text-center d-flex justify-content-evenly">
            <span>ADMIN AND USERS</span>
            <button class="btn btn-light fw-bold" data-bs-toggle="modal" data-bs-target="#crt">ADD RECORD</button>
        </h3>
        <input id="searchUsers" type="text" class="form-control my-3" placeholder="Filter By :      name | email | phone">
        <div id="showdata"></div>
        <table class="table table-striped table-light" id="hide">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = Select("users");
                foreach ($query as $data) {
                ?>
                    <tr>
                        <td><?php echo $data["Id"] ?></td>
                        <td><?php echo $data["name"] ?></td>
                        <td><?php echo $data["email"] ?></td>
                        <td><?php echo $data["role"] ?></td>
                        <td><?php echo $data["phoneNum"] ?></td>
                        <td class="d-flex gap-4">
                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#del<?php echo $data["Id"] ?>">Delete</button>
                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#upd<?php echo $data["Id"] ?>">Update</button>
                        </td>
                    </tr>



                    <!-- create_button -->
                    <!-- Modal -->
                    <form action="../connection.php" method="post">
                        <div class="modal fade" id="crt" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <input type="hidden" name="Id" value="<?php echo $data["Id"]; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title px-2 text-dark fw-bold" id="staticBackdropLabel">
                                            CREATE RECORD
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" name="name" class="form-control mb-3" placeholder="Name">
                                        <input type="email" name="email" class="form-control mb-3" placeholder="Email">
                                        <input type="password" name="password" class="form-control mb-3" placeholder="Password">
                                        <input type="text" name="role" class="form-control mb-3" placeholder="Role">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="createRecord" class="btn btn-dark">Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>






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
                                        <button type="submit" name="deleteRecord" class="btn btn-dark">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>












                    <!-- update_button -->
                    <form action="../connection.php" method="post">
                        <div class="modal fade" id="upd<?php echo $data["Id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <input type="hidden" name="Id" value="<?php echo $data["Id"]; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title px-2 text-dark fw-bold" id="staticBackdropLabel">
                                            UPDATE RECORD
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" name="name" class="form-control mb-3" placeholder="Name" value="<?php echo $data["name"] ?>">
                                        <input type="email" name="email" class="form-control mb-3" placeholder="Email" value="<?php echo $data["email"] ?>">
                                        <input type="password" name="password" class="form-control mb-3" placeholder="Password" value="<?php echo $data["password"] ?>">
                                        <input type="text" name="role" class="form-control mb-3" placeholder="Role" value="<?php echo $data["role"] ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="updateRecord" class="btn btn-dark">Update</button>
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