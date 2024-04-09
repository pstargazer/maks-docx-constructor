# postgres
CREATE ROLE laravel;
ALTER USER laravel WITH PASSWORD '123';
ALTER ROLE laravel WITH LOGIN;

# laravel reuqired modules
sudo apt install openssl php-bcmath php-curl php-json php-mbstring php-mysql php-tokenizer php-xml php-zip
composer upgrade
