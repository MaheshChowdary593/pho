<?php
$name = $email = $mobile = $age = $gender = $country = "";
$name_err = $email_err = $mobile_err = $age_err = $gender_err = $country_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $name_err = "Name is required";
    } else {
        $name = htmlspecialchars($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $name_err = "Only letters and spaces allowed";
        }
    }

    if (empty($_POST["email"])) {
        $email_err = "Email is required";
    } else {
        $email = htmlspecialchars($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format";
        }
    }

    if (empty($_POST["mobile"])) {
        $mobile_err = "Mobile number is required";
    } else {
        $mobile = $_POST["mobile"];
        if (!preg_match("/^[0-9]{10}$/", $mobile)) {
            $mobile_err = "Mobile number must be 10 digits";
        }
    }

    if (empty($_POST["age"])) {
        $age_err = "Age is required";
    } else {
        $age = $_POST["age"];
        if (!is_numeric($age) || $age <= 0) {
            $age_err = "Age must be a positive number";
        }
    }

    if (empty($_POST["gender"])) {
        $gender_err = "Gender is required";
    } else {
        $gender = $_POST["gender"];
    }

    if (empty($_POST["country"])) {
        $country_err = "Country is required";
    } else {
        $country = $_POST["country"];
    }

    if (empty($name_err) && empty($email_err) && empty($mobile_err) && empty($age_err) && empty($gender_err) && empty($country_err)) {
        echo "<h3>Form submitted successfully!</h3>";
        echo "<b>Name:</b> $name <br>";
        echo "<b>Email:</b> $email <br>";
        echo "<b>Mobile:</b> $mobile <br>";
        echo "<b>Age:</b> $age <br>";
        echo "<b>Gender:</b> $gender <br>";
        echo "<b>Country:</b> $country <br>";
    } else {

        header("Location: form.html?name_err=$name_err&email_err=$email_err&mobile_err=$mobile_err&age_err=$age_err&gender_err=$gender_err&country_err=$country_err");
        exit();
    }
}
?>
