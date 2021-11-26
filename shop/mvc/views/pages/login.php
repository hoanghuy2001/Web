<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Đăng Nhập</h2>
            <p class="panel-subheading">
                <a href="<?=DOMAIN?>/register">Đăng ký</a>
            </p>
        </div>
        <div class="panel-body">
            <form action="<?=DOMAIN?>/login/processLogin" method="POST">
                <div class="form-group">
                    <label class="form-item-lable" for="email">Email:</label>
                    <input required="true" type="email" name="email-login" class="form-control" id="email" placeholder="<sth>@<sth>.<sth>">
                </div>
                <div class="form-group">
                    <label class="form-item-lable" for="pwd">Password:</label>
                    <input required="true" type="password" name="pwd-login" class="form-control" id="pwd" minlength="6">
                </div>
                <button class="btn btn-login" name="btnLogin">Register</button>
            </form>
        </div>
    </div>
</div>