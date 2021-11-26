<div class="sidebar bg-light">
    <div class="side-header">
        <h4 class="side-heading">Tùy chọn</h4>
    </div>
    <div class="side-list">
        <div class="side-item <?php if(isset($data["general"])) echo $data["general"] ?>">
            <p class="side-item-link">
                <i class="fas fa-play icon-act"></i>
                <a href="<?=DOMAIN?>/info/general">
                    <i class="fas fa-user-circle icon-light"></i>
                    Thông tin tài khoản
                </a>
            </p>
        </div>
        <div class="side-item <?php if(isset($data["myorder"])) echo $data["myorder"] ?>">
            <p class="side-item-link">
                <i class="fas fa-play icon-act"></i>
                <a href="<?=DOMAIN?>/info/myorder">
                    <i class="fas fa-layer-group icon-pink"></i>
                    Đơn hàng của tôi
                </a>
            </p>
        </div>
        <div class="side-item <?php if(isset($data["notice"])) echo $data["notice"] ?>">
            <p class="side-item-link">
                <i class="fas fa-play icon-act"></i>
                <a href="<?=DOMAIN?>/info/notice">
                    <i class="fas fa-bell icon-orange"></i>
                    Thông báo
                </a>
            </p>
        </div>
        <div class="side-item">
            <span class="side-item-link margin-0">
                <i class="fas fa-play icon-act"></i>
                <a href="#" id="logout" onclick="ajaxInfo('logout')">
                    <i class="fas fa-sign-out-alt icon-orange"></i>
                    Đăng xuất
                </a>
            </sqpn>
        </div>
        <div class="side-item">
            <span class="side-item-link margin-0">
                <a id="del-account" href="#" onclick="ajaxInfo('del-account')">
                    Xóa tài khoản
                </a>
            </span>
        </div>
    </div>
</div>