<?php
    include('template/db_connect.php');
    $sql = 'SELECT id, name, title, ingredients FROM pizza ORDER BY created_at';
    $result = mysqli_query($conn, $sql);
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<?php include('template/header.php'); ?>
<h3 class="center black-text">Pizzas</h3>
<div class="container">
    <div class="row">
        <?php foreach ($pizzas as $pizza) : ?>
            <div class="col l4 m12 s12">
                <div class="card z-depth-0">
                    <img src="img/pizza.svg" alt="Pizza" class="pizza">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <div><?php echo htmlspecialchars($pizza['name']); ?></div>
                        <ul>
                            <?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>
                                <li><?php echo htmlspecialchars($ing); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align black">
                        <a href="details.php?id=<?php echo htmlspecialchars($pizza['id']); ?>" class="brand-text">More Info</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include('template/footer.php'); ?>

</html>