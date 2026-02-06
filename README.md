<p align="center"><a href="https://laravel.com" target="_blank">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="100"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:
 
## Tela da Home
![Captura de tela de 2023-02-23 21-19-07](https://user-images.githubusercontent.com/20956815/221061074-64ace942-a250-45ff-9a18-525eaffdc490.png)

## Tela Login
![Captura de tela de 2023-02-23 21-24-32](https://user-images.githubusercontent.com/20956815/221061872-89d4d1f4-00e8-4c9b-ae74-ce0521827c8b.png)

## Tela Painel
![painel](https://user-images.githubusercontent.com/20956815/221061944-7d2c991b-4da6-4beb-9883-2f28a6b3eb75.png)


## Implementações

-Docker (apenas para rodar o Mysql)                 
Arquivo: Dockerfile

- MultiLinguagem :                   
Usei um Middleware : app/Http/Middleware/Language.php  
Carregamento : middlewareGroups no Kernel  
Traduções: resources/lang/pt/messages.php  

- Helper próprio: 
Arquivo: app/Providers/Helpers.php     
Carregamento : no autoload do composer ("app/Providers/Helpers.php")         

- Log de Acesso(views produtos) :       
Arquivo: app/Http/Middleware/LogAcessoMiddleware.php   

- Validar Emailsusando MustVerifyEmail(Ao se cadastrar)  :       
Arquivo: app/Http/Controllers/Auth/RegisterController.php    
Carregado: Illuminate\Contracts\Auth\MustVerifyEmail dentro do Model User    

-Consultas com Redis: *ainda nao aplicado!          
Arquivo: app/Models/Produto.php 

-Eventos:          
Arquivo:  momento do orçamento    

- Vue :
Arquivo: resources/js/app.js    
Carregamento : O Htmls São estanciados no Blade    


 
versões do Laravel:
https://packagist.org/packages/laravel/

## Ollama + Assistente

Subir containers:
```bash
docker compose up -d
```

Depois de subir os containers:
```bash
docker compose exec app php artisan db:seed
```

Baixar com pull:
```bash
docker compose exec ollama ollama pull mistral
```

Verificar se o Ollama está de pé:
```bash
curl -s http://localhost:11434/api/tags
```

Baixar/rodar um modelo leve (3B):
```bash
docker exec -it laravel_shop_ollama ollama run llama3.2:3b
```

Testar a API do Ollama pela rede do compose (importante):
```bash
docker exec -it laravel_app curl -s http://ollama:11434/api/tags
```

Essa imagem não tem modelo instalado:
```
image: ollama/ollama:latest
```

Testar o endpoint do assistente:
```bash
curl -s -X POST http://localhost:8000/api/assistente \
  -H "Content-Type: application/json" \
  -d '{"message":"Quais categorias temos?"}'
```



 
