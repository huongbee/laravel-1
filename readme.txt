
1. trong public tao folder moi dat ten la framework
2. copy all file trong thu muc goc, tru public, paste vào framework
3. copy all file and folder ra khỏi public, xóa public
4. tim file index.php thay doi 2 duong dan nhu sau:
	require __DIR__.'/framework/bootstrap/autoload.php';
	$app = require_once __DIR__.'/framework/bootstrap/app.php';
	
done!
Note: 
goi cac lenh nhu: php artisan:make.... thi goi o thu muc framework 
(mở cửa sổ cmd ở thu muc framework)

thêm function tự định nghĩa
1.trong app tạo file tên functions.php
2. compose.js
"autoload": {
        // sometihng
        "files": [
            "app/functions.php"
        ]
3. mở compose chạy lệnh: composer dump-autoload


____________________________________________