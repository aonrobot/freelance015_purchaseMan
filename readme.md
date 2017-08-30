# Freelance 015 Test Project (Purchase Management)

[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Install
* 1. Create new Mysql DB -> CREATE DATABASE tleshop CHARACTER SET utf8 COLLATE utf8_general_ci;
* 2. Set username and password to access DB in config/database.php (line 60, 61)
* 3. Open command line and goto project folder then run -> php artisan migrate
* 4. then run -> php artisan db:seed
* 5. finish open web in browser :)


- 2.1.	ระบบจัดการข้อมูลพื้นฐาน
  - 2.1.1.	สามารถจัดการข้อมูลลูกค้า (เพิ่ม,แก้ไข,ลบ,ค้นหา)
  - 2.1.2.	สามารถจัดการข้อมูลสินค้า (เพิ่ม,แก้ไข,ลบ,ค้นหา)
- 2.2.	ระบบการสั่งซ้อสินค้า
  - 2.2.1.	สามารถสร้างข้อมูลกาสั่งซือสินค้าได้
  - 2.2.2.	ใบสั่งซื้อต้องระบุชื่อลูกค้าที่มีอยู่ในระบบเท่านั้น
  - 2.2.3.	ใบสั่งซื่อต้องสามารถเลือกรายการสินค้าที่มีอยู่ในระบบเท่านั้น

