<?php

    include('template/db_connect.php');

    $name = $email = $ingre = $title = "";
    $error = array('name' => "", 'email' => "", "title" => "", "ingredients" => "");

    if (isset($_POST['submit'])) {
        if (empty($_POST['name'])) {
            $error["name"] = "God knows what your mom and dad taught while nameing you :-p<br>";
        } else {
            $name = $_POST['name'];
        }
        if (empty($_POST['email'])) {
            $error["email"] = "How do we reach you ??? Error: 101 <br>";
        } else {
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error["email"] = "Invalid Email Bitch !";
            }
        }
        if (empty($_POST['title'])) {
            $error["title"] = "Woow, such weird fantacies. Nameless Pizza <br>";
        } else {
            $title = $_POST['title'];
            if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
                $error["title"] = "Title can be Chars only !";
            }
        }
        if (empty($_POST['ingredients'])) {
            $error["ingredients"] = "We soon hope to make air pizzas, soooon ! <br>";
        } else {
            $ingre = $_POST['ingredients'];
            if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-z\s]*)*$/', $ingre)) {
                $error["ingredients"] = "How do we make a pizza with that !";
            }
        }

        if (array_filter($error)) {
            // echo "Errors  In the form";
        } else {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingre = mysqli_real_escape_string($conn, $_POST['ingredients']);

            $sql = "INSERT INTO pizza (name, email, title, ingredients) VALUES ('$name', '$email', '$title', '$ingre')";

            if (mysqli_query($conn, $sql)) {
                header('Location: index.php');
            } else {
                echo "Query Error :" . mysqli_error($conn);
            }
        }
    }
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<?php include('template/header.php'); ?>
<section class="container black-text">
    <h3 class="center">Add A Pizza</h3>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="grey lighten-2" method="POST" style="border-radius: 10px;">
        <div class="input-field">
            <input type="text" class="black-text validate" name="name" id="name" value="<?php echo $name; ?>">
            <label for="name" class="black-text">Name</label>
            <div class="red-text"><?php echo $error['name']; ?></div>
        </div>

        <div class="input-field">
            <input type="email" class="black-text" name="email" id="email" value="<?php echo $email; ?>">
            <label for="email" class="black-text">Email</label>
            <div class="red-text"><?php echo $error['email']; ?></div>
        </div>

        <div class="input-field">
            <input type="text" class="black-text" name="title" id="title" value="<?php echo $title; ?>">
            <label for="title" class="black-text">Pizza Title</label>
            <div class="red-text"><?php echo $error['title']; ?></div>

        </div>

        <div class="input-field">
            <input type="text" class="black-text" name="ingredients" id="ingredients" value="<?php echo $ingre; ?>">
            <label for="ingredients" class="black-text">Ingredients [Comma Seprated]</label>
            <div class="red-text"><?php echo $error['ingredients']; ?></div>
        </div>

        <div class="center" style="padding-top: 10px;">
            <input type="submit" value="submit" name="submit" class="btn brand z-depth-0" style="border-radius: 10px;">
        </div>
    </form>
</section>
<?php include('template/footer.php'); ?>

</html>