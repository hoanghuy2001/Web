<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập/Đăng ký</title>

	<!-- link css -->
	<?php
	require_once './mvc/views/assets/main_css.php';
	?>
</head>
<body>
	<div class="model">
		<?php require_once './mvc/views/pages/'.$data["page"].'.php' ?>
	</div>

	<?php 
		if(isset($data["toast"])) {
			$toast = $data["toast"];
			require_once './mvc/views/components/toast.php';
		}
	?>


	<!-- link js -->
	<?php
    require_once './mvc/views/assets/main_js.php';
    ?>
</body>
</html>
