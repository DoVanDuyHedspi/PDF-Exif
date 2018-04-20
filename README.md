## Composer package trích xuất các thông tin cơ bản từ file PDF
Gói này sử dụng thư viện PDFLib để tương tác và trích xuất dữ liệu từ file pdf.
### Yêu cầu
Hệ thống của bạn cần cài đặt PDFLib 9. Có thể cài đặt theo hướng dẫn tại [đây](https://www.pdflib.com/download/pdflib-family/pdflib/)
### Cài đặt
Cài đặt package qua Composer
```
$composer require vanduy/pdf_exif
```
### Sử dụng
Khởi tạo một đối tượng, truyền vào đường dẫn đến file pdf $path:

```php
$file = new PDFExif($path);
```
Có 2 kiểu lấy dữ liệu.
- Lấy một array chứa toàn bộ thông tin
```php
$data = $file->getAllInfoKeys();
```
- Lấy từng dữ liệu (Title, Author, Creator...)
```php
$title = $file->get('Title')
```
