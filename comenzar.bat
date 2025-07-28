@echo off
:loop
php artisan serve
timeout /t 2 /nobreak >nul
taskkill /f /im php.exe >nul 2>&1
goto loop