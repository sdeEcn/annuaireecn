## How to install this project

# To start this project, you will need :
php 7.2   :<br>
```add-apt-repository ppa:ondrej/php```<br>
```sudo apt install php7.2 php7.2-common php7.2-cli php7.2-fpm```<br>


composer  :<br>
```php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"```<br>
```php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"```<br>
```sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer```<br>
```php -r "unlink('composer-setup.php');"```<br>


# First time launch :<br>
```git clone https://github.com/sdeEcn/annuaireecn.git```<br>
```cd annuaireecn```<br>
```composer install```<br>

if you have missing php packages :<br>
```sudo apt install php7.2-curl```<br>
```sudo apt install php7.2-xml```<br>
```sudo apt install php7.2-mbstring```<br>
```sudo apt install php7.2-zip```<br>

Once you have all necessary packages, run<br>
```php bin/console server:run```
