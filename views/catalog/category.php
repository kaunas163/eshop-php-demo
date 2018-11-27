<?php include("../../header.php"); ?>

<h1 class="display-3">Mūsų turimas prekių katalogas</h1>
<p class="lead">Koks nors tekstas apie turimas prekes.</p>
<hr class="my-4">

<div class="row">

<?php

    $sql = "SELECT `id`, `title`, `description`, `parent_category_id` FROM `categories`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
                <div class="col-4">
                    <div class="card bg-light mb-3">
                        <div class="card-header">
                            <a href="./category.php?id=<?php echo $row['id']; ?>">
                                <?php echo $row["title"]; ?>
                            </a>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $row["description"]; ?></p>
                        </div>
                    </div>
                </div>
            <?php
        }
    } else {
        echo '<div class="col">Nieko nėra.</div>';
    }

?>

</div>

<?php include("../../footer.php"); ?>