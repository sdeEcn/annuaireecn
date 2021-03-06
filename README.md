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

nodejs :<br>
```curl -sL https://deb.nodesource.com/setup_11.x | sudo -E bash -```<br>
```sudo apt-get install -y nodejs```<br>

yarn :<br>
```curl -sL https://dl.yarnpkg.com/debian/pubkey.gpg | sudo apt-key add -```<br>
```echo "deb https://dl.yarnpkg.com/debian/ stable main" | sudo tee /etc/apt/sources.list.d/yarn.list```<br>
```sudo apt-get update && sudo apt-get install yarn```<br>

# First time launch :<br>
```git clone https://github.com/sdeEcn/annuaireecn.git```<br>
```cd annuaireecn```<br>
```composer install```<br>
```npm install```<br>
```yarn install```<br>

if you have missing php packages, run (skip if no error when running composer) :<br>
```sudo apt install php7.2-curl```<br>
```sudo apt install php7.2-xml```<br>
```sudo apt install php7.2-mbstring```<br>
```sudo apt install php7.2-zip```<br>

Once you have all necessary packages, run<br>
```php bin/console server:run```<br>
```yarn encore dev --watch```<br>
