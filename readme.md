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


# Criando um novo usuário

Vá até o console do navegador e execute esse código

```
    const user = {
      name: "Padre",
      email: "admin@admin.com",
      password: "1234"
    };
    
    fetch('http://localhost:8000/api/register', {
      method: 'POST',
      headers: new Headers({
        'Content-Type': 'application/json'
      }),
      body: JSON.stringify(user)
    }).then((response) => {
      console.log(response);
    }).catch((error) => {
      console.error(error);
    });
```
