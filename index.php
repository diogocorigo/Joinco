<?php
    session_start();
    if($_SESSION['codUser'] == '' && $_SESSION['type'] == '') {
        header('Location: login.php');
    }
    $db = mysqli_connect("localhost", "root", "", "joinco");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Joinco</title>
    <link rel="icon" href="img/joinco_icon.png" />
    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"/>
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css"/>
    <link href="css/style-main.css" rel="stylesheet" type="text/css"/>
    <!-- USER PERMISSIONS -->
    <?php
        include('includes/_entranceValidation.php')
        ?>
</head>
<body>
    <script src="js/main.js" type="text/javascript"></script>
    <script src="js/supplierCreation.js" type="text/javascript"></script>
    <div class="container">
        <!-- NAV -->
        <div class="row navRow">
            <div class="col-sm">
                <img src="img/joinco-logo.png" alt="Logotipo" class="logotipo" />
            </div>
            <div class="col-sm profileSection">
                <i class="iconType far fa-user" ><label class="typeUser active" id="default">Default</label></i>
                <i class="iconType fas fa-user-tie"><label class="typeUser" id="admin">Admin</label></i>
                <i class="iconType fas fa-users-cog"><label class="typeUser" id="super">Super</label></i>
            <div class="col-lg-2">
                <i class="fas fa-sign-out-alt iconType" id="logOut"></i>
            </div>
            </div>
        </div>

        <!-- DEFAULT -->
        <div class="" id="defaultScreen">
            <table id="tb_suppliers" class="display">
                <thead>
                    <tr>
                        <th>Cod</th>
                        <th>Name</th>
                        <th>Categories</th>
                        <th>Notes</th>
                        <th>Country</th>
                        <th>Img</th>
                        <th>Info</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $findSuppliers="SELECT * FROM suppliers";
                        $result=mysqli_query($db,$findSuppliers); 
                        foreach ($result as $res) {
                            echo '<tr>';
                            echo '<td width="2%">'.$res['codSup'].'</td>';
                            echo '<td width="15%">'.$res['name'].'</td>';
                            $codSupplier = $res['codSup'];
                            $categories = ""; 
                            $getCorrespondentSupplierAndCategory = "SELECT codCat FROM supcat WHERE codSup = $codSupplier";
                            $codCategoryPerSupplier = mysqli_query($db, $getCorrespondentSupplierAndCategory);
                            if(mysqli_num_rows($codCategoryPerSupplier) > 0) {
                                while($row=mysqli_fetch_assoc($codCategoryPerSupplier)) {
                                    $getSupplierCategories = "SELECT name FROM categories WHERE codCat = ".$row['codCat']."";
                                    $result_ = mysqli_query($db,$getSupplierCategories);
                                    if(mysqli_num_rows($result_) > 0) {
                                        while($row_=mysqli_fetch_assoc($result_)) {
                                            $categories .= "<label class='catLabel'>".$row_['name']."</label>";
                                        }
                                    }
                                }
                            }
                            echo '<td width="25%">'.$categories.'</td>';
                            echo '<td width="40%">'.$res['notes'].'</td>';
                            echo '<td width="15%">'.$res['address'].'</td>';
                            echo '<td width="2%"><i class="far fa-image iconType_"></i></td>';
                            echo '<td width="2%"><i class="fas fa-info-circle iconType_"></i></td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- ADMIN -->
        <div class="hidden" id="adminScreen">
            <div class="container">
                <div class="spacer"></div>
                <div class="row">
                    <button class="btnDefault col-sm" id="btnUserList">Create/View Users</button>
                    <button class="btnDefault_ col-sm" id="btnCategoriesValidation">Validate Categories</button>
                </div>
                <div class="spacer"></div>          
            </div>
            <!-- USERS CREATION TABLE -->
            <div id="tbUsers" class="">
                <table id="tb_defaults" class="display">
                    <thead>
                        <tr>
                            <th>Cod</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            $findUsers="SELECT * FROM users WHERE type=1";
                            $result = mysqli_query($db,$findUsers); 
                            foreach ($result as $res) {
                                echo '<tr>';
                                echo '<td width="5%">'.$res['codUser'].'</td>';
                                echo '<td width="55%">'.$res['name'].'</td>';
                                echo '<td width="25%">'.$res['email'].'</td>';
                                echo '<td width="15%">'.$res['contact'].'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- CATEGORY VALIDATION TABLE -->
            <div id="tbCats" class="hidden">
                <table id="tb_validate_supplier" class="display">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Accept</th>
                            <th>Refuse</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $findCategory= "SELECT users.name AS name, categories.name AS catName, categories.notes AS notes FROM categories INNER JOIN users ON users.codUser=categories.codUser WHERE valid=0";
                            $result=mysqli_query($db,$findCategory); 
                            foreach ($result as $res) {
                                echo '<tr>';
                                echo '<td width="25%">'.$res['name'].'</td>';
                                echo '<td width="25%">'.$res['catName'].'</td>';
                                echo '<td width="40%">'.$res['notes'].'</td>';
                                echo '<td width="5%"><i class="fas fa-check-circle iconType_"></i></td>';
                                echo '<td width="5%"><i class="fas fa-times-circle iconType_"></i></td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- SUPER -->
        <div class="hidden" id="superScreen">
            <table id="tb_admin" class="display">
                <thead>
                    <tr>
                        <th>Cod</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $findAdmins="SELECT * FROM users WHERE type=2";
                        $result=mysqli_query($db,$findAdmins); 
                        foreach ($result as $res) {
                            echo '<tr>';
                            echo '<td width="5%">'.$res['codUser'].'</td>';
                            echo '<td width="35%">'.$res['name'].'</td>';
                            echo '<td width="45%">'.$res['email'].'</td>';
                            echo '<td width="15%">'.$res['contact'].'</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- DEFAULT MODALS -->
    <!-- SUPPLIER CREATION -->
    <div class="customModal hidden" id="supplierModal">
        <div class="subModal" id="gefferson">
            <div class="topRow">
                <label>Create Supplier</label>
                <i class="fas fa-times" id="exitSupplierCreation"></i>  
            </div>
            <div class="container-fluid mainModalDiv">
                <div class="col-sm-6 claudio">
                    <input type="text" class="CustomInput" placeholder="Name" id="cr_supplierName">
                    <input type="text" class="CustomInput" placeholder="Contact" id="cr_supplierContact">
                    <input type="text" class="CustomInput" placeholder="Address" id="cr_supplierAddress">
                    <select class="CustomInput" id="cr_supplierCountry">
                        <option value="" disabled selected>Country</option>
                        <?php
                            $getCountry = "SELECT name FROM countries";
                            $result = mysqli_query($db, $getCountry);
                            if(mysqli_num_rows($result) > 0) {
                                while($row=mysqli_fetch_assoc($result)) {
                                    echo '<option>'.$row["name"].'</option>';
                                }
                            }
                        ?>
                    </select>
                    <div class="imageDiv">
                        <button class="cardFront btnDefault" id="cr_cardFront">Card Front</button>
                        <button class="cardBack btnDefault" id="cr_cardBack">Card Back</button>
                        <button class="uploadImage btnDefault" id="cr_uploadImage">Upload Image</button>
                        <button class="viewImages btnDefault" id="cr_viewImages">View Images</button>
                    </div>
                    <textarea class="CustomInput" placeholder="Notes" id="cr_supplierNotes"></textarea>
                </div>
                <div class="col-sm-6 claudio">
                    <div class="addDiv">
                        <input type="email" class="CustomInput_" placeholder="Email" id="cr_supplierEmail">
                        <i class="fas fa-plus CustomInput_" id="addEmail"></i>
                    </div>
                    <table id="emailList">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Default</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <div class="addDiv">
                        <select class="CustomInput_" id="cr_supplierCategory">
                            <option value="" disabled selected>Category</option>
                            <?php
                                $getCategories = "SELECT name, notes FROM categories WHERE valid=1";
                                $result = mysqli_query($db, $getCategories);
                                if(mysqli_num_rows($result) > 0) {
                                    while($row=mysqli_fetch_assoc($result)) {
                                        echo '<option>'.$row["name"].' - '.$row["notes"].'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <i class="fas fa-plus CustomInput_" id="addCategory"></i>
                    </div>
                    <table id="catList">
                        <thead>
                            <tr>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm">
                <button class="btnDefault" id="newSupplierCreation">Create</button>
                <button class="btnDefault_" id="newCategoryCreation">Create Category</button>
                <label id="supplierCreationError"></label>
            </div>
        </div>
    </div>
    <!-- CATEGORY CREATION -->
    <div class="customModal hidden" id="categoryModal">
        <div class="subModal" id="">
            <div class="topRow">
                <label>Create Category</label>
                <i class="fas fa-times" id="exitCategoryCreation"></i>  
            </div>
            <input type="text" class="CustomInput" placeholder="Name" id="cr_categoryName">
            <textarea type="text" class="CustomInput" placeholder="Notes" id="cr_categoryName"></textarea>
            <button class="btnDefault" id="newCategoryCreation">Create</button>
            <label id="categoryCreationError"></label>
        </div>
    </div>
    <!-- ADMIN MODALS -->
    <div class="customModal hidden" id="userModal">
        <div class="subModal">
            <label>Create User</label><br>
            <input type="text" class="CustomInput" placeholder="Name" id="cr_userName"><br>
            <input type="email" class="CustomInput" placeholder="Email" id="cr_userEmail"><br>
            <input type="text" class="CustomInput" placeholder="Contact" id="cr_userContact"><br>
            <input type="password" class="CustomInput" placeholder="Password" id="cr_userPassword"><br>
            <input type="password" class="CustomInput" placeholder="Repeat Password" id="cr_userPassword"><br>
            <button class="btnDefault" id="newUserCreation">Create</button>
            <button class="btnDefault btnDefault_" id="exitUserCreation">Exit</button>
            <label id="userCreationError"></label>
        </div>
    </div>
    <!-- SUPER MODALS -->
    <div class="customModal hidden" id="adminModal">
        <div class="subModal">
            <label>Create User</label><br>
            <input type="text" class="CustomInput" placeholder="Name" id="cr_adminName"><br>
            <input type="email" class="CustomInput" placeholder="Email" id="cr_adminEmail"><br>
            <input type="text" class="CustomInput" placeholder="Contact" id="cr_adminContact"><br>
            <input type="password" class="CustomInput" placeholder="Password" id="cr_adminPassword"><br>
            <input type="password" class="CustomInput" placeholder="Repeat Password" id="cr_adminPassword2"><br>
            <button class="btnDefault" id="newAdminCreation">Create</button>
            <button class="btnDefault btnDefault_" id="exitAdminCreation">Exit</button>
            <label id="adminCreationError"></label>
        </div>
    </div>
</body>
</html>