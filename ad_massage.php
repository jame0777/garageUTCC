<?php
ob_start();
session_start();
require "dbcon.php";
$type = $_SESSION['type'];
if (!isset($_SESSION['id']) || $type != 1) {
    header("location:login.php");
    exit(0);
}
$q = "SELECT * FROM massage ";

$name = $_SESSION['name'];
$result = mysqli_query($conn, $q);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>TNS Service</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/stylepage.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header" style="text-align:center;">
                <a href="work.php"><img src="img/logoW.png" width="150px"></a>
                <h5 style="color:white;margin-top:10px">ชื่อผู้ดูแล</h5>
                <p><?php echo $name ?></p>
                <!-- <a href="edit_pro.php"><button type="button" class="btn btn-primary">แก้ไขข้อมูลส่วนตัว</button></a> -->
            </div>

            <ul class="list-unstyled components">
                <p>เมนู</p>
                <li class="active">
                    <a href="ad_main.php">หน้าแรก</a>
                </li>
                <li>
                    <a href="ad_massage.php">พูดคุย</a>
                </li>       
                <li>
                    <a href="login.php">ออกจากระบบ</a>
                </li>
            </ul>


        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-dark black scrolling-navbar" style="color:white;">
                <div class="container">



                    <!-- Collapse -->
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa fa-align-left"></i>

                    </button>
                    <h2 class="justify-content-center">Admin-Report</h2>
                    <!-- Links -->

                </div>
            </nav>
            <div class="table-responsive">
                <table class="table table-reflow table-bordered" >
                <thead class="bg-dark align-middle" style="color:white">
                    <tr>

                        <th>
                            <center>หมายเลขข้อความ</center>
                        </th>
                        <th>
                            <center>Email</center>
                        </th>
                        <th>
                            <center>หัวข้อเรื่อง</center>
                        </th>
                        <th>
                            <center>เนื้อหาข้อความ</center>
                        </th>
                        <th>
                            <center>หมายเลขโทรศัพท์</center>
                        </th>

                    </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                    <tbody>
                        <tr>
                            <td>
                                <center><?php echo $row['ID_massage']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $row['Email_massage']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $row['Head']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $row['Body']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $row['Phone']; ?></center>
                            </td>
                           
                        </tr>
                    </tbody>

                <?php
            }
            mysqli_free_result($result);
            mysqli_close($conn)
            ?>
            </table>

        </div>
    </div>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    </div>
</body>

</html>