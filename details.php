<?php

include('template/db_connect.php');

if (isset($_POST['delete'])) {
    $id_del = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM pizza WHERE id = '$id_del'";

    if (mysqli_query($conn, $sql)) {
        header('location: index.php');
    } else {
        echo "Query Error: " . mysqli_error($conn);
    }
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM pizza WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
} else {
    echo "Print No";
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include('template/header.php'); ?>
<h3 class="center black-text">Details</h3>
<div class="container center">
    <?php if ($pizza) : ?>
        <div class="card z-depth-0">
            <div class="card-content grey lighten-2">
                <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
                <p>Created By: <?php echo htmlspecialchars($pizza['name']); ?></p>
                <p>Contact: <?php echo htmlspecialchars($pizza['email']); ?></p>
                <p><?php echo date($pizza['created_at']); ?></p>
                <h5>Ingredients</h5>
                <ul>
                    <?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>
                        <li><?php echo htmlspecialchars($ing); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
            <input type="submit" value="Delete" name="delete" class="btn brand z-depth-0">
        </form>
    <?php else : ?>
        <h5> No Such Pizza Exists ! Go Back <a href="index.php"><i class="fas fa-undo-alt" style="color: black;"></i></a></h5>
    <?php endif; ?>
</div>
<?php include('template/footer.php'); ?>

</html>