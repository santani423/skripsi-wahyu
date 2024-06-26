@echo off
start "Terminal 1" cmd.exe /k "npm run dev"
start "Terminal 2" cmd.exe /k "php artisan serve"
