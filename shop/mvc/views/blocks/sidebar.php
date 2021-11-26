<div class="sidebar bg-light">
    <div class="side-header">
        <h4 class="side-heading">Danh mục quản lý</h4>
    </div>
    <div class="side-list">
        <div class="side-item <?php if(isset($data["dashboard"])) echo $data["dashboard"] ?>">
            <p class="side-item-link">
                <i class="fas fa-play icon-act"></i>
                <a href="<?=DOMAIN?>/admin">
                    <i class="fas fa-tachometer-alt icon-light"></i>
                    Dashboard
                </a>
            </p>
        </div>
        <div class="side-item <?php if(isset($data["category"])) echo $data["category"] ?>">
            <p class="side-item-link">
                <i class="fas fa-play icon-act"></i>
                <a href="<?=DOMAIN?>/admin/category">
                    <i class="fas fa-sitemap icon-red"></i>
                    Danh mục sản phẩm
                </a>
            </p>
        </div>
        <div class="side-item <?php if(isset($data["product"])) echo $data["product"] ?>">
            <p class="side-item-link">
                <i class="fas fa-play icon-act"></i>
                <a href="<?=DOMAIN?>/admin/product">
                    <i class="fas fa-hockey-puck icon-pink"></i>
                    Sản phẩm
                </a>
            </p>
        </div>
        <div class="side-item <?php if(isset($data["order"])) echo $data["order"] ?>">
            <p class="side-item-link">
                <i class="fas fa-play icon-act"></i>
                <a href="<?=DOMAIN?>/admin/order">
                    <i class="fas fa-shopping-cart icon-green"></i>
                    Quản lý đơn hàng
                </a>
            </p>
        </div>
        <div class="side-item <?php if(isset($data["feedback"])) echo $data["feedback"] ?>">
            <p class="side-item-link">
                <i class="fas fa-play icon-act"></i>
                <a href="<?=DOMAIN?>/admin/feedback">
                    <i class="fas fa-comments icon-orange"></i>
                    Quản lý phản hồi
                </a>
            </p>
        </div>
        <div class="side-item <?php if(isset($data["user"])) echo $data["user"] ?>">
            <p class="side-item-link">
                <i class="fas fa-play icon-act"></i>
                <a href="<?=DOMAIN?>/admin/user">
                    <i class="fas fa-users icon-light"></i>
                    Quản lý người dùng
                </a>
            </p>
        </div>
    </div>
</div>