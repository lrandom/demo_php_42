1. Shop B2C B2C: Business To Customer (Người bán hàng bán cho khách hàng)
   C2C: Customer To Customer - Marketplaces (Khách hàng bán cho khách hàng): Shopee, Tiki, Lazada, Sendo B2B: Business
   To Business

2. Bán sách báo

3. Người dùng
    - Admin (quản trị hệ thống)
    - User (người dùng)

4. Chức năng Admin
5. +, Quản lý user
6. +, Quản lý sản phẩm
7. +, Quản lý danh mục
8. +, Quản lý đơn hàng

   User
9. +, Xem trang chủ +, Xem sp theo danh mục +, Tìm kiếm sản phẩm +, Đặt hàng : Thêm sp vào giỏ hàng + đặt hàng + tạo hoá
   đơn

CSDL 
+, users(id, email, password, address, phone, role: 2(admin) | 1(user) ) Lưu thông tin người dùng 
+, category(id, name,
parent_id) Lưu thông tin danh mục 
+, products(id, name, price, image, description, category_id) Lưu thông tin sản phẩm
+, orders(id, user_id, total_price, status: pending | processing | shipped | delivered | cancelled) Lưu thông tin đơn
hàng 
+, order_details(id, order_id, product_id, quantity, price, name) Lưu thông tin chi tiết đơn hàng

//Thuật toán phân trang
LIMIT trong SQL 
LIMIT 10 // lấy 10 dòng
LIMIT 1, 20 // Lấy về 20 bản ghi từ vị trí offset = 1, offset tính từ vị trí 0 
1 Nam
2 Luân
3 Nguyên


//số trang: tổng số bản ghi / số bản ghi trên 1 trang 
//số trang: SELECT COUNT(*) FROM table / 10 
//trang hiện tại =1 => offset =0 => LIMIT 0, 10  
//trang hiện tại =2 => offset =10 => LIMIT 10, 10 
//trang hiện tại =3 => offset =20 => LIMIT 20, 10
//offset = (trang hiện tại -1) * số bản ghi trên 1 trang 