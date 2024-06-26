@echo off
call php artisan db:seed --class=AdminSeeder
 pause

 call php artisan storage:link