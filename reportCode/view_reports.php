<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<?php $sql = "SELECT * FROM REPORT";
if ($result = $conn->query($sql)) {
    ?>
    <table class="table" width=50%>
        <thead>
        <td> Report Number</td>
        <td> Username</td>
        <td> Date </td>
        <td> Popular Request</td>
        <td> Average Time to Resolve</td>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch_row()) {
            ?>
            <tr>
                <td><?php printf("%s", $row[0]); ?></td>
                <td><?php printf("%s", $row[1]); ?></td>
                <td><?php printf("%s", $row[2]); ?></td>
                <td><?php printf("%s", $row[3]); ?></td>
                <td><?php printf("%s", $row[4]); ?></td>
                <td><a href="update_report_interface.php?Uid=<?php echo $row[0] ?>">Update</a></td>
                <td><a href="delete_report.php?Uid=<?php echo $row[0] ?>">Delete</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}
?>
<!-- Link to return to student_menu-->
<a href="report_menu.php">Back to Report Menu</a><br>
<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>