<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB.
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file retrieves and displays the records of the table ticket.
 */
-->


<?php
/*
* Reference for tables: https://getbootstrap.com/docs/4.5/content/tables/
*/

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
    <?php $sql = "SELECT * FROM ticket";
    if ($result = $conn->query($sql)) {
    ?>
        <table class="table" width=50%>
            <thead>
                <td> User ID</td>
                <td> Ticket Number</td>
                <td> Ticket Category</td>
                <td> Ticket Status </td>
                <td> Time Opened</td>
                <td> Time Closed</td>
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
                        <td><?php printf("%s", $row[5]); ?></td>
                        <td><a href="update_ticket_interface.php?Tid=<?php echo $row[1] ?>">Update</a></td>
                        <td><a href="delete_ticket.php?Tid=<?php echo $row[1] ?>">Delete</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>
    <!-- Link to return to ticket_menu-->
    <a href="ticket_menu.php">Back to ticket Menu</a><br>
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
