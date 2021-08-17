<!--
/**
 * CS 4342 Database Management
 * @author Instruction team with contribution from L. Garnica and K. Apodaca
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB.
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file inserts a new record  into the table note of your DB.
 */
-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Create note</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Create note</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="create_note.php" method="post">
        <div class="form-group">
                <label for="TNumber">Ticket Number</label>
                <input class="form-control" type="text" id="TNumber" name="TNumber">
            </div>
            <div class="form-group">
                <label for="NContents">Note</label>
                <input class="form-control" type="text" id="NContents" name="NConents">
            </div>
        </form>
        <div>
            <br>
            <a href="note_menu.php">Back to Note Menu</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>


    <?php
        session_start();
        require_once('../config.php');
        require_once('../validate_session.php');
        if (isset($_POST['Submit'])){


            /**
             * Grab information from the form submission and store values into variables.
             */
            $TNumber = isset($_POST['TNumber']) ? $_POST['TNumber'] : " ";
            $NContents = isset($_POST['NContents']) ? $_POST['NContents'] : " ";
            $smiddleName = isset($_POST['middle_name']) ? $_POST['middle_name'] : " ";

            //Insert into note table;

            $querynote  = "INSERT INTO note (Sid,SfirstName,SmiddleName,SlastName)
                        VALUES ('".$sid."', '".$sfirstName."', '".$smiddleName."', '".$slastName."');";

            // The query sent to the DB can be printed by not commenting the following row
            //echo $querynote;
            if ($conn->query($querynote) === TRUE) {
            echo "<br> New record created successfully for note id ".$sid;
            } else {
                echo "<br> The record was not created, the query: <br>" . $querynote . "  <br> Generated the error <br>" . $conn->error;
            }

            // To redirect the page to the note menu right after the query is executed, use the following statement
            // header("Location: note_menu.php");
}
?>


</body>

</html>
