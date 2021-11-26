<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="text-center">Đăng Ký</h2>
			<p class="panel-subheading">
				<a href="<?=DOMAIN?>/login">Đăng nhập</a>
			</p>
		</div>
		<div class="panel-body">
			<form action="<?=DOMAIN?>/register/processRegister" method="post" onsubmit="return validateForm()">
				<div class="form-group">
					<label class="form-item-lable" for="usr">Name:</label>
					<input required="true" type="text" name="name" class="form-control" id="usr" minlength="2" maxlength="50" placeholder="2 - 50 ký tự">
				</div>
				<div class="form-group">
					<label class="form-item-lable" for="email">Email:</label>
					<input required="true" type="email" name="email" class="form-control" id="email" placeholder="<sth>@<sth>.<sth>">
					<p id="alert-email"></p>
				</div>
				<div class="form-group">
					<label class="form-item-lable" for="pwd">Password:</label>
					<input required="true" type="password" name="pwd" class="form-control" id="pwd" minlength="6">
				</div>
				<div class="form-group">
					<label class="form-item-lable" for="confirmation_pwd">Confirmation Password:</label>
					<input required="true" type="password" class="form-control" id="confirmation_pwd">
				</div>
				<button class="btn btn-login" name="btnRegister">Register</button>
			</form>
		</div>
	</div>
</div>