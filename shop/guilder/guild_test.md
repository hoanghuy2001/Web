# Hướng dẫn test web


1. Đầu tiên import file "technology_shop.sql" trong folder guilder vào phpMyAdmin, tên database cũng phải là "technology_shop" mới chịu cơ.

2. Bỏ cả project vào xampp/htdocs mà chạy.

3. Khi vào bằng bất kỳ link nào ở mục 6, nếu trước đó chưa đang nhập hoặc đã đăng xuất thì tự đổ về trang đăng nhập.
Tạo 1 tài khoản với email bất kỳ (tên crush hay nyc cũng được nhưng phải theo dạng email), mật khẩu tối thiểu 6 ký tự.

4. Sau khi vào được trang admin, test các tính năng của quản lý user, category và product, feedback tớ mới cho hiển thị danh sách thôi chứ chưa code tính năng, order chưa làm gì cả, dashboard chẳng có gì làm hết.

5. Thích thì cứ code chơi vào đó nhé, thứ 6 tớ giải thích code, cái này còn nhiều cái phải sửa lại lắm tớ chưa sửa thôi.

6. Các đường link
    - trang đăng ký/đăng nhập
        localhost/shop                      -> trang login
        localhost/shop/login                -> trang login
        localhost/shop/register             -> trang đăng nhập
    - trang admin
        localhost/shop/admin                -> trang admin/dashboard
        localhost/shop/admin/dashboard      -> trang admin/dashboard
        localhost/shop/admin/category       -> quản lý danh mục
        localhost/shop/admin/product        -> quản lý sản phẩm
        localhost/shop/admin/feedback       -> quản lý phản hồi
        localhost/shop/admin/order          -> quản lý đơn hàng
        localhost/shop/admin/user           -> quản lý người dùng