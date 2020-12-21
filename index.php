<?php
session_start();
// if($_SESSION['codUser'] == '' && $_SESSION['type'] == '') {
//   header('Location: login.php');
// }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Joinco</title>
    <link rel="icon" href="img/joinco_icon.png" />
    <!-- SCRIPT -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.5.1.js"
      integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <!-- CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />
    <link
      href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"
      rel="stylesheet"
    />
    <link href="css/style-main.css" rel="stylesheet" type="text/css" />
  </head>

  <body>
    <script src="js/main.js" type="text/javascript"></script>
    <div class="container">
      <!-- NAV -->
      <div class="row navRow">
        <div class="col-sm">
          <img src="img/joinco-logo.png" alt="Logotipo" class="logotipo" />
        </div>
        <div class="col-sm profileSection">
          <i class="iconType far fa-user"
            ><label class="typeUser active" id="default">Default</label></i
          >
          <i class="iconType fas fa-user-tie"
            ><label class="typeUser" id="admin">Admin</label></i
          >
          <i class="iconType fas fa-users-cog"
            ><label class="typeUser" id="super">Super</label></i
          >
          <div class="col-lg-2">
            <i class="iconType fas fa-sign-out-alt" id="logOut"></i>
          </div>
        </div>
      </div>
      <!-- MAIN - DEFAULT -->
      <div class="" id="defaultScreen">
        <table id="tb_suppliers" class="display">
          <thead>
            <tr>
              <th>Supplier</th>
              <th>Categories</th>
              <th>Notes</th>
              <th>Country</th>
              <th>Images</th>
              <th>Email</th>
              <th>Info</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>aaaaa</td>
              <td>aaaaa</td>
              <td>aaaaa</td>
              <td>aaaaa</td>
              <td>aaaaa</td>
              <td>aaaaa</td>
              <td>aaaaa</td>
            </tr>
          </tbody>
        </table>
        <div class="col-sm customButtons">
          <button class="btnDefault">Create New</button>
          <button class="btnDefault btnDefault_">Download</button>
        </div>
      </div>
      <!-- ADMIN -->
      <div class="hidden" id="adminScreen">

        <div class="container">

          <div class="spacer"></div>

          <div class="row">
            <button class="btnDefault col-sm" id="btnUserList">Create/View Users</button>
            <button class="btnDefault btnDefault_ col-sm" id="btnCategoriesValidation">Validate Categories</button>
          </div>

          <div class="spacer"></div>
          
        </div>

        <div id="tbUsers" class="">

          <table id="tb_defaults" class="display">

            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>aaaaa</td>
                <td>aaaaa</td>
                <td>aaaaa</td>
              </tr>
            </tbody>

          </table>

          <div class="col-sm customButtons">
            <button class="btnDefault">Create New</button>
            <button class="btnDefault btnDefault_">Download</button>
          </div>

        </div>

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
              <tr>
                <td>aaaaa</td>
                <td>aaaaa</td>
                <td>aaaaa</td>
                <td>aaaaa</td>
                <td>aaaaa</td>
              </tr>
            </tbody>

          </table>

          <div class="col-sm customButtons">
            <button class="btnDefault">Create New</button>
            <button class="btnDefault btnDefault_">Download</button>
          </div>

        </div>

      </div>
      <!-- SUPER -->
      <div class="hidden" id="superScreen">
        <table id="tb_admin" class="display">
          <thead>
            <tr>
              <th>nome</th>
              <th>email</th>
              <th>contacto</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>aaaaa</td>
              <td>aaaaa</td>
              <td>aaaaa</td>
            </tr>
          </tbody>
        </table>
        <div class="col-sm customButtons">
          <button class="btnDefault">Create New</button>
          <button class="btnDefault btnDefault_">Download</button>
        </div>
      </div>
    </div>
  </body>
</html>
