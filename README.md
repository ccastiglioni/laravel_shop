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

- MultiLinguagem :
  Usei um Middleware : app/Http/Middleware/Language.php  
Carregamento : middlewareGroups no Kernel  
Traduções: resources/lang/pt/messages.php  

- Helper próprio:
Arquivo: app/Providers/Helpers.php     
Carregamento : no autoload do composer ("app/Providers/Helpers.php")         

- Log de Acesso(views produtos) :       
Arquivo: app/Http/Middleware/LogAcessoMiddleware.php   


- Validados Email(Ao se cadastrar)  :       
Arquivo: app/Http/Controllers/Auth/RegisterController.php    


- Vue :
Arquivo: resources/js/app.js    
Carregamento : O Htmls São estanciados no Blade    



atualizar o npm:
sudo npm install -g npm@latest --unsafe-perm=true --allow-root

instalar vue:
composer require laravel/ui:^3
php artisan ui vue

instalar:
npm install vuex@3.6.1

 
versões do Laravel:
https://packagist.org/packages/laravel/




 
