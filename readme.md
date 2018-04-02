# Back-End do sistema de gestão paroquial

## Guia de instalação
  

       git clone https://github.com/Gestao-Paroquial/back-end.git
    
       cd back-end
    
       composer install
       
	   # Lembre-se de criar o arquivo .env com base no arquivo .env.sample
	   # lá você deve colocar as suas configurações de banco de dados, email, etc...	   
	   
       php artisan key:generate
       
       php artisan jwt:secret
	   
       php artisan migrate
        
       php artisan db:seed
    
       php artisan serve  


## DOCKER

docker run --rm --interactive --tty \
    --volume $PWD:/app \
    composer install

docker-compose up -d --build

docker-compose exec app chown -R www-data:www-data /var/www

docker-compose exec app php artisan migrate

docker-compose exec app php artisan db:seed

sudo chown -R 33 ./*