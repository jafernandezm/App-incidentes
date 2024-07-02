
### comenzar el proyecto 
```sh
sudo docker-compose up -d --build
```

### ejemplo para mirar la base de datos 
```sh
sudo docker ps 
# saber que la maquina laravel para poner el id
sudo docker exec -it d24505092c53 php artisan migrate:fresh --seed
```

### libreria de laravel
```sh
composer require laravel/breeze --dev
php artisan breeze:install
composer require guzzlehttp/guzzle
```

### install librerias de docker
```r
npm install
sudo npm run dev
```