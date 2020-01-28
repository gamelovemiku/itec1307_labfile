@echo off
echo - #1/5
echo -- Setting up Composer...
echo - This is shortcut to getting start faster
echo -
echo -
echo -
echo -
timeout /t 3
cls

echo - #2/5
echo -- Downloading composer...
echo -
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
timeout /t 3
cls

echo - #3/5
echo -- Verifing composer...
echo -
php -r "if (hash_file('sha384', 'composer-setup.php') === 'c5b9b6d368201a9db6f74e2611495f369991b72d9c8cbd3ffbc63edff210eb73d46ffbfce88669ad33695ef77dc76976') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
timeout /t 3
cls

echo - #4/5
echo -- Setting up internal composer...
echo -
php composer-setup.php
php -r "unlink('composer-setup.php');"
echo Composer.phar install successfully!
timeout /t 3
cls

echo - #5/5
echo -- Installing dependencics...
echo -
php composer.phar install
echo Installation completed...
timeout /t 3
cls

echo - Finished
echo # Press any key to launch server now. [ENTER]
echo -
PAUSE

cls
echo - Running..
echo -- Staring serve...
echo -
call run.bat