@echo off

REM Menjalankan npm install
echo Menjalankan npm install...
call npm install

REM Memeriksa apakah perintah npm install berhasil dijalankan
if %errorlevel% neq 0 (
    echo Error: Gagal menjalankan npm install.
    exit /b %errorlevel%
)

REM Menampilkan pesan jika npm install berhasil dijalankan
echo npm install selesai.

pause

REM Menjalankan composer install
echo Menjalankan composer install...
call composer install

REM Memeriksa apakah perintah composer install berhasil dijalankan
if %errorlevel% neq 0 (
    echo Error: Gagal menjalankan composer install.
    exit /b %errorlevel%
)

REM Menampilkan pesan jika composer install berhasil dijalankan
echo composer install selesai.

pause


call php artisan key:generate

REM Menampilkan pesan jika composer install berhasil dijalankan
echo aplikasi siap digunakan.

pause
