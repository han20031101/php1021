<?php
require_once 'db.php'; 

include('header.php'); 

$sql = "SELECT `name`, `description` FROM `event` ORDER BY `id` ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>活動首頁</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <div style="margin-top: 120px;"></div>

    <div class="container my-5">
        <div class="row mb-4">
            
            <?php
            // 檢查是否有活動資料
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-md-6 mb-4"> 
                        <div class="card h-100 bg-white text-dark">
                            <div class="card-body d-flex flex-column">
                                <h3 class="card-title"><?= htmlspecialchars($row['name']) ?></h3>
                                <p class="card-text">
                                    <?= nl2br(htmlspecialchars($row['description'])) ?>
                                </p>
                                </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                // 如果資料庫中沒有活動資料
                echo '<div class="col-12"><p class="text-center">目前沒有任何活動資訊。</p></div>';
            }
            ?>
            
        </div>
    </div>

    <?php
    if (isset($result)) {
        mysqli_free_result($result);
    }
    if (isset($conn)) {
        mysqli_close($conn);
    }
    ?>
    
    <?php include("footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>