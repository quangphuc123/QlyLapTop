# Giới thiệu website bán laptop HandSome Shop

Đây là dự án Website Ecommerce PHP laravel nơi mà mọi người có thể tìm ra thứ mọi người muốn mua.
- Một trang web Ecommerce là một nền tảng trực tuyến được thiết kế để thực hiện giao dịch mua bán hàng hóa và dịch vụ. Đây là một không gian kinh doanh trực tuyến nơi người mua và người bán có thể tương tác và thực hiện các giao dịch mua sắm. Trang web Ecommerce thường cung cấp một giao diện dễ sử dụng, hiển thị sản phẩm và thông tin chi tiết, cho phép người dùng thêm vào giỏ hàng và tiến hành thanh toán trực tuyến.

- Các tính năng chung của một trang web Ecommerce bao gồm hệ thống thanh toán an toàn, quản lý đơn hàng, tìm kiếm sản phẩm, đánh giá của khách hàng. Ngoài ra, có thể có các tính năng bổ sung như quản lý tài khoản cá nhân. Mục tiêu chính của một trang web Ecommerce là tối ưu hóa trải nghiệm mua sắm trực tuyến và thuận tiện cho cả người mua và người bán.

## Sơ lược về hệ thống
- Admin
- Khách hàng

## Chức năng chính 
- Đăng nhập - Đăng ký - Đăng xuất
- Quản lý thông tin cá nhân
- Quản lý bài viết
- Quản lý đơn hàng
- Quản lý sản phẩm
- Quản lý đơn hàng
- Thanh toán
- Bình luận sản phẩm
- Bình luận bài viết
- Thêm sửa xóa 

## Tác giả 
#### Trần Quang Phúc - Trương Đức Quyền
##### Mọi ý kiến thắc mắc bạn có thể liên hệ chúng tôi qua Email: quangphuc1311@gmail.com

## Cấu hình dự án
- PHP/Laravel Framework
- Visual Studio Code (1.85), XAMPP 3.3
- MySQL
## Bắt Đầu

Hướng dẫn này sẽ giúp bạn bắt đầu với dự án của mình. Để có được một bản sao của dự án trên máy cục bộ của bạn, hãy thực hiện các bước sau:

### Yêu Cầu Tiên Quyết

Cài đặt các phần mềm và công cụ sau:

- [Xampp](https://www.apachefriends.org/download.html)
- [Composer](https://getcomposer.org/)
- [Visualcode](https://code.visualstudio.com/download)
- [Git](https://git-scm.com/)

### Cài Đặt

1. Clone dự án về máy cục bộ của bạn:

```bash
git clone https://github.com/quangphuc123/QlyLapTop.git
```
```bash
cd QlyLapTop
```

2. Thiết lập .env
```bash
Tạo thêm file .env sau đó copy nội dung file .env.example vào file .env 
Rồi vào terminal nhập lệnh : composer install
```
3. Generate key
```bash
php artisan key:generate
```
4. Config env và cache
```bash
php artisan config
```
5. Khởi tạo Database
```bash
php artisan migrate
```

### Tài khoản đăng nhập
1. Chạy lệnh
```bash
php artisan db:seed --class=UserSeeder
```
2. Tài khoản
- Email: handsome1805@gmail.com
- Mật khẩu: password
