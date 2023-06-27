<?php
include "connect.php";
?>
<?php
if (isset($_POST['signUp'])) {
    $emailPattern = '/^[a-zA-Z]+[0-9]{2}@gmail\.com$/';
    $count = 0;
    $sql = "SELECT Email FROM users";
    $mysqlRes = mysqli_query($db, $sql);
    // Check if email already exists
    while ($row = mysqli_fetch_assoc($mysqlRes)) {
        if ($row['Email'] == $_POST['email']) {
            $count++;
        }
    }
    if ($count == 0) {
        // Check if email is valid
        if (preg_match($emailPattern, $_POST['email'])) {
            // Check if username is unique
            $usernameCount = 0;
            $usernameSql = "SELECT Username FROM users";
            $usernameRes = mysqli_query($db, $usernameSql);
            while ($row = mysqli_fetch_assoc($usernameRes)) {
                if ($row['Username'] == $_POST['user']) {
                    $usernameCount++;
                }
            }
            if ($usernameCount == 0) {
                // Check password criteria
                $password = $_POST['pass'];
                if (strlen($password) >= 8 && strlen($password) <= 16 && preg_match('/[0-9]{2}/', $password) && preg_match('/[!@#$%^&*()-=_+[\]{};:,.<>?]/', $password) && !preg_match('/[\'"]/', $password)) {
                    // Check if password and confirm password match
                    if ($_POST['pass'] == $_POST['conpass']) {
                        // Insert new user into database
                        mysqli_query($db, "INSERT INTO `users` (`Name`, `Surname`, `Email`, `Username`, `Password`, `Confirm_password`, `PhoneNr`)
                        VALUES ('$_POST[name]', '$_POST[surname]', '$_POST[email]', '$_POST[user]', '$_POST[pass]', '$_POST[conpass]', '$_POST[phonenr]')");
                   header("Location: login.php");
                   exit();
                } else {
                        ?>
                        <i class="fa-solid fa-circle-info" id="warningIcon"></i>
                        <label style="color: red;" id="warningText">Password and confirm password do not match!</label>
                        <?php
                    }
                } else {
                    ?>
                    <i class="fa-solid fa-circle-info" id="warningIcon"></i>
                    <label style="color: red;" id="warningText">Invalid password format!</label>
                    <?php
                }
            } else {
                ?>
                <i class="fa-solid fa-circle-info" id="warningIcon"></i>
                <label style="color: red;" id="warningText">Username is already taken!</label>
                <?php
            }
        } else {
            ?>
            <i class="fa-solid fa-circle-info" id="warningIcon"></i>
            <label style="color: red;" id="warningText">Please enter a valid email address</label>
            <?php
        }
    } else {
        ?>
        <i class="fa-solid fa-circle-info" id="warningIcon"></i>
        <label style="color:red;" id="warningText">This email already exists!</label>
        <?php
    }
}
?>
