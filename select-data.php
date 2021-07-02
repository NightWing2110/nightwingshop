
    <?php
    include "config.php";

    $sql = "SELECT * FROM comment";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <p><i class="fa fa-user"><?php echo $row['name'] ?> - <?php echo $row['created_at'] ?></i></p>
                    <p><?php echo $row['msg'] ?></p>
                </div>
            </div>

    <?php
        }
    }
    ?>