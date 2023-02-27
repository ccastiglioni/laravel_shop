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


## Sintaxe

Sitaxe programacao:

- criar proj laravel:
composer create-project laravel/laravel:8.6.11 lara_gestao --prefer-dist


- ligar servido imbutido:
php artisan serve
php artisan serve --port=9000

- criar controller:
php artisan make:controller HomeController

-criar models
php artisan make:model Contato
e php artisan make:model Contato -m  (aqui ja cria o migrate)

-criar migration
php artisan make:migration create_produtos_tables --create=produtos (esse parametro ja coloca o nome da tabela)
para um arquivo :
	php artisan migrate:rollback --step=5
	php artisan migrate:refresh


php artisan migrate (roda todoas tabelas)
php artisan migrate:reset (rollback, apaga as tabelas)

-popular banco
php artisan tinker

-versao do laravel:
php artisan --version
ver quais versoes existem : https://packagist.org/packages/laravel/laravel

-criar tabela com migrate:
https://www.youtube.com/watch?v=A_75whSp6BI&t=1s&ab_channel=WsCubeTech
php artisan make:migration create_posts_table.
php artisan migrate


Falando sobre:
-Eloquent é o ORM do Laravel ela usa o padrao Active record
 Model:
    -Por padrao um model escrito SiteContatoTest considera a tabela site_contato_testes. Colocando o underLine no lugado do Maiusculo e no final plural        Produto fica produtos
 	 - protected $table ='users'; essa declaracao força o nome da tabela ignorando o padrão acima!


-Migrate, o
-comando < php artisan migrate >, executa por padrao todos metodos Ups das migrations que ainda nao foram executadas! (Mais antiga para mais atual)
-comando < php artisan migrate:rollback > executa o down (Mais atual para mais antiga ,tras pra frente)
Importante: apenas migrate::rollback usa como padrao --step=1 , pra retrocedor 2,3 passos tem que passar o paramentro!!
-comando reset volta todos rollbak , ate a criacao da tabela
-comando refresh volta todos rollbak (down em toda)  E   em seguida da um up em todas migrate criando Todas tabelas!
-comando fresh da um DROP em todas tabelas ignorando o down da migrate  E  em seguida da um up em todas migrate criando Todas tabelas!

  
-Seeds:
 php artisan make:seeder category_seeders  . Cria a seed ma pasta (database/seeders/category_seeders.php)

atualizar o npm:
sudo npm install -g npm@latest --unsafe-perm=true --allow-root

instalar vue:
composer require laravel/ui:^3
php artisan ui vue

instalar:
npm install vuex@3.6.1

desintalar:
npm uninstall vuex

listar versão dos pacotes:
npm list vue
npm list bootstrap
 
versões do Laravel:
https://packagist.org/packages/laravel/




 
