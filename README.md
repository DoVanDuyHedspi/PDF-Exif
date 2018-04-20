## Composer package trích xuất các thông tin cơ bản từ file PDF
Gói này sử dụng thư viện PDFLib để tương tác và trích xuất dữ liệu từ file pdf.

**Lưu ý** Gói này chỉ giới hạn cho các file pdf nhỏ với tối đa 10 pages và 1 MB.
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
- Lấy từng thông tin (Title, Author, Creator...)
```php
$title = $file->get('Title')
```
