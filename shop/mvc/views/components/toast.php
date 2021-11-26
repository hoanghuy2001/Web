<div class="_toast_">
    <div class="toast-type <?=$toast["type"]?>">
        <div class="toast-icon">
            <i class="<?=$toast["icon"]?>"></i>
        </div>
        <div class="toast-body">
            <h6 class="toast-heading"><?=$toast["heading"]?></h6>
            <p class="toast-msg"><?=$toast["msg"]?></p>
        </div>
        <span class="btn-close-toast" onclick="closeToast()">
            <i class="fas fa-times"></i>
        </span>
    </div>
</div>