<?php
/* Include config file */
require_once "config.php";

/* Define variables and initialize with empty values */

$username = $password = $confirm_password = $name= $id = $age = $salary = $phone = "";
$username_err = $password_err = $confirm_password_err = $name_err = $id_err = $age_err = $salary_err = $phone_err ="";

/* Processing form data when form is submitted */
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    /* Validate username */
    if (empty(trim($_POST["username"])))
    {
        $username_err = "Please enter a username.";
    }
    else
    {
        /* Prepare a select statement */
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql))
        {
            /* Bind variables to the prepared statement as parameters */
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            /* Set parameters */
            $param_username = trim($_POST["username"]);

            /* Attempt to execute the prepared statement */
            if (mysqli_stmt_execute($stmt))
            {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken.";
                }
                else
                {
                    $username = trim($_POST["username"]);
                }
            }
            else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }

            /* Close statement */
            mysqli_stmt_close($stmt);
        }
    }

    /* Validate  Employee Name */
    if (empty(trim($_POST["name"])))
    {
        $name_err = "Please enter a Employe Name.";
    }
    else
    {
        $name = trim($_POST["name"]);
    }
    /* Validate Employee ID */
    if (empty(trim($_POST["id"])))
    {
        $id_err = "Please enter a Employe ID.";
    }
    else
    {
        $id = trim($_POST["id"]);
    }

    /* Validate password */
    if (empty(trim($_POST["password"])))
    {
        $password_err = "Please enter a password.";
    }
    elseif (strlen(trim($_POST["password"])) < 6)
    {
        $password_err = "Password must have atleast 6 characters.";
    }
    else
    {
        $password = trim($_POST["password"]);
    }

    /* Validate confirm password */
    if (empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = "Please confirm password.";
    }
    else
    {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password))
        {
            $confirm_password_err = "Password did not match.";
        }
    }
    /* Validate Age */
    if (empty(trim($_POST["age"])))
    {
        $age_err = "Please enter a your Age.";
    }
    else
    {
        $age = trim($_POST["age"]);
    }
    /* Validate salary */
    if (empty(trim($_POST["salary"])))
    {
        $salary_err = "Please enter a Employee Salary.";
    }
    else
    {
        $salary = trim($_POST["salary"]);
    }
    /* Validate Phone # */
    if (empty(trim($_POST["phone"])))
    {
        $phone_err = "Please enter a Phone Number.";
    }
    else
    {
        $phone = trim($_POST["phone"]);
    }

    /* Check input errors before inserting in database */
    if (empty($name_err) && empty($id_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($age_err) && empty($salary_err) && empty($phone_err))
    {

        /* Prepare an insert statement */
        $sql = "INSERT INTO users (name, id, username, password, age, salary, phone) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql))
        {
            /* Bind variables to the prepared statement as parameters */
            mysqli_stmt_bind_param($stmt, "sssssss", $param_name, $param_id, $param_username, $param_password, $param_age, $param_salary, $param_phone);

            /* Set parameters */
            $param_name = $name;
            $param_id = $id;
            $param_username = $username;
            $param_password = $password; // Creates a password hash
            $param_age =$age;
            $param_salary = $salary;
            $param_phone = $phone;
            
            /*
            Attempt to execute the prepared statement */
            if (mysqli_stmt_execute($stmt))
            {
                /* Redirect to login page */
                header("location: login.php");
            }
            else
            {
                echo "Something went wrong. Please try again later.";
            }

            /* Close statement */
            mysqli_stmt_close($stmt);
        }
    }

    /* Close connection */
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/bootstrap.css">
    <style type="text/css">
    body {
        font: 14px sans-serif;
    }

    .wrapper {
        width: 350px;
        padding: 20px;
        margin-left: 30%;
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Employe Name</label>
                <input type="text" name="name" autocomplete="off" class="form-control"
                    value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : ''; ?>">
                <label>Employe ID</label>
                <input type="text" name="id" autocomplete="off" class="form-control"
                    value="<?php echo $id; ?>">
                <span class="help-block"><?php echo $id_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" autocomplete="off" class="form-control"
                    value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" autocomplete="off" class="form-control"
                    value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" autocomplete="off" class="form-control"
                    value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($age_err)) ? 'has-error' : ''; ?>">
                <label>Age</label>
                <input type="text" name="age" autocomplete="off" class="form-control"
                    value="<?php echo $age; ?>">
                <span class="help-block"><?php echo $age_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                <label>Salary</label>
                <input type="text" name="salary" autocomplete="off" class="form-control"
                    value="<?php echo $salary; ?>">
                <span class="help-block"><?php echo $salary_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                <label>Phone #</label>
                <input type="text" name="phone" autocomplete="off" class="form-control"
                    value="<?php echo $phone; ?>">
                <span class="help-block"><?php echo $phone_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn  btn-lg btn-primary" value="Submit">
            </div>

            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>

</html>