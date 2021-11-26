# Thiết kế database

1. Bảng role
    - id: int -> khóa tự tăng
    - name: string -> 50 ký tự
2. Bảng quản lý user
    - id: int -> khóa tự tăng
    - fullname: string -> 50 ký tự
    - email: string -> 100 ký tự
    - password: string -> 20 ký tự
    - birthday: datetime
    - phone_number: string -> 20 ký tự
    - address: string -> 200 ký tự
    - role_id: int -> foreign -> role (id)
    - created_at: datetime
    - updated_at: datetime
3. Bảng quản lý category
    - id: int -> khóa tự tăng
    - name: string -> 100 ký tự
4. Bảng sản phẩm -> Product
    - id: int -> khóa tự tăng
    - category_id: int -> foreign -> category (id)
    - title: string -> 300 ký tự
    - price: int
    - discount: int
    - thumbnail: string -> 500 ký tự
    - description: longtext
    - created_at: datetime -> thời gian tạo
    - updated_at: datetime -> thời gian sửa
5. Bảng quản lý galery
    - id: int -> khóa tự tăng
    - product_id: int -> foreign -> product (id)
    - thumbnail: string -> 500 ký tự
6. Bảng quản lý phản hồi -> feedback
    - id: int -> khóa tự tăng
    - firstname: string -> 30 ký tự
    - lastname: string -> 30 ký tự
    - email: string -> 100 ký tự
    - phone_number: string -> 20 ký tự
    - subject: string -> 200 ký tự
    - content: 500 ký tự
7. Bảng quản lý đơn hàng
    - id: int -> khóa tự tăng
    - fullname
    - email
    - phone_number
    - address
    - note
    - order_date: datetime -> thời điểm mua hàng
    - danh sách sản phẩm:
        - sản phẩm 1 x số lượng x giá tại thời điểm mua
        - sản phẩm 2 x số lượng x giá tại thời điểm mua
    7.1 Bảng order
        - id: int -> khóa tự tăng
        - fullname
        - email
        - phone_number
        - address
        - note
        - order_date: datetime -> thời điểm mua hàng
        - status: int -> pending, approved,...
        - total_money: int -> tổng tiền đơn đặt hàng
    7.2 Bảng chi tiết đơn hàng
        - id: int -> tự tăng
        - order_id: int -> foreign -> order (id)
        - product_id: int -> foreign -> product (id)
        - price: int
        - num: int -> số lượng sản phẩm đặt
        - total_money: int -> tổng tiền sản phẩm đặt hàng (price * num)
