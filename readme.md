# Back-End do sistema de gestão paroquial

## Guia de instalação
  

       git clone https://github.com/Gestao-Paroquial/back-end.git
    
       cd back-end
    
       composer install
       
	   # Lembre-se de criar o arquivo .env com base no arquivo .env.sample lá você deve colocar as suas configurações de banco de dados, email, etc...
	   
       php artisan migrate
        
       php artisan db:seed

       php artisan key:generate
       
       php artisan jwt:secret
    
       php artisan serve  

