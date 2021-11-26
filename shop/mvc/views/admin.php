<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data["title"]?></title>

<!-- link css -->
    <?php
    require_once './mvc/views/assets/main_css.php';
    ?>

</head>
<body>
    
    <div class="block-admin">
        
        <?php require_once './mvc/views/blocks/'.$data["header"].'.php' ?>
        
        <div class="mygrid block-admin-page">
            <div class="myrow">
                <div class="mycol side-wide">
                    <?php require_once './mvc/views/blocks/'.$data["sidebar"].'.php' ?>
                </div>
                <div class="mycol park-wide">
                    <?php require_once './mvc/views/pages/'.$data["page"].'.php' ?>
                </div>
            </div>
        </div>
    
        <?php
        if(isset($data["toast"])) {
			$toast = $data["toast"];
			require_once './mvc/views/components/toast.php';
        }
        ?>


        <?php require_once './mvc/views/blocks/'.$data["footer"].'.php' ?>
    </div>


<!-- link js -->
    <?php
    require_once './mvc/views/assets/main_js.php';
    ?>

</body>
</html>