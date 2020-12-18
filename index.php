<?php
include('includes/_server.php')
?>

<!doctype html>
<html lang="pt">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Joinco</title>
    <link href="css/style-main.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/joinco_icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"
        integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
</head>

<body>
    <script src="js/main.js" type="text/javascript"></script>
    <script src="db/categories.js" type="text/javascript"></script>
    <script src="db/emails.js" type="text/javascript"></script>
    <script src="db/images.js" type="text/javascript"></script>
    <script src="db/supCat.js" type="text/javascript"></script>
    <script src="db/suppliers.js" type="text/javascript"></script>
    <script src="db/users.js" type="text/javascript"></script>
    <script src="db/countries.js" type="text/javascript"></script>
    <script src="js/animations.js" type="text/javascript"></script>

    <!-- NAV -->
    <nav class="header">
        <img src="img/joinco-logo.png" alt="Logotipo" width="390" class="logo">
        <div class="profileSection">
            <i class="iconType far fa-user"><label class="typeUser active" id="default"
                    onclick=changeTypeUser()>Default</label></i>
            <i class="iconType fas fa-user-tie"><label class="typeUser" id="admin"
                    onclick=changeTypeUser()>Admin</label></i>
            <i class="iconType fas fa-users-cog"><label class="typeUser" id="super"
                    onclick=changeTypeUser()>Super</label></i>
        </div>
        <i class="fas fa-sign-out-alt" id="logOut" onclick="window.location='login.html'"></i>
    </nav>

    <!-- MAIN -->
    <main class="main" id="main">
        <!-- DEFAULT -->
        <div class="hidden" id="defaultScreen">
            <div class="creationSection">
                <div class="first">
                    <input type="text" name="search" id="search">
                    <button class="btnDefault" id="addsupplier" onclick=addSupplier()> Add Supplier</button>
                    <button class="btnDefault btnDefault_" id="downloadviewlist" onclick=download()>Download</button>
                </div>
                <div class="last">
                    <i class="fas fa-chevron-left"></i>
                    <i class="fas fa-chevron-right"></i>
                    <select id="perPage">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>All</option>
                    </select>
                </div>
            </div>
            <table id="tb_suppliers">
                <thead>
                    <tr>
                        <td width="45%">Supplier</td>
                        <td width="25%">Categories</td>
                        <td width="45%">Notes</td>
                        <td width="15%">Country</td>
                        <td width="15%">Images</td>
                        <td width="15%">Email</td>
                        <td width="15%">Info</td>
                    </tr>
                </thead>
                <tbody id="tbody"></tbody>
            </table>
        </div>

        <!-- ADMIN -->
        <div class="" id="adminScreen">
            <div class="adminOptions">
                <button id="addUsers">
                    <h2>Users</h2>
                    <p>Check users registrations and add new ones.</p>
                </button>
                <button id="validCategories">
                    <h2>Categories</h2>
                    <p>Validate categories created by users.</p>
                </button>
            </div>
            <div class="hidden" id="adminPage">
                <div class="userList">
                    <div class="creationSection">
                        <div class="first">
                            <input type="text" name="search" id="search">
                            <button class="btnDefault" id="validateCategories" onclick=searchUsers()>Search</button>
                            <button class="btnDefault btnDefault_" id="downloadviewlist"
                                onclick=download()>Download</button>
                        </div>
                        <div class="last">
                            <i class="fas fa-chevron-left"></i>
                            <i class="fas fa-chevron-right"></i>
                            <select id="perPage">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                                <option>All</option>
                            </select>
                        </div>
                    </div>
                    <table id="tb_defaults">
                        <tr>
                            <th>nome</th>
                            <th>email</th>
                            <th>contacto</th>
                        </tr>
                    </table>
                </div>
                <div class="categoriesList">
                    <div class="creationSection">
                        <div class="last">
                            <i class="fas fa-chevron-left"></i>
                            <i class="fas fa-chevron-right"></i>
                            <select id="perPage">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                                <option>All</option>
                            </select>
                        </div>
                    </div>
                    <table id="tb_cat_0">
                        <tr>
                            <th>Utilizador</th>
                            <th>Categoria</th>
                            <th>Descrição</th>
                            <th>Aceitar</th>
                            <th>Recusar</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- SUPER -->
        <div class="hidden" id="super">
            <div class="superScreen">
                <div class="creationSection">
                    <input type="text" name="search" id="search">
                    <button class="btnDefault" id="validateCategories" onclick=createAdmin()> Create Admin</button>
                    <button class="btnDefault btnDefault_" id="download" onclick=download()> Download</button>
                </div>
            </div>
            <table id="tb_admin">
                <tr>
                    <th>nome</th>
                    <th>email</th>
                    <th>contacto</th>
                </tr>
            </table>
        </div>
    </main>
</body>

</html>