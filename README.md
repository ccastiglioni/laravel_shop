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

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

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

$ob = new App\Models\Produto();
$ob->nome = "sandro tinker";
$ob->save();

-versao do laravel:
php artisan --version
ver quais versoes existem : https://packagist.org/packages/laravel/laravel

-criar tabela com migrate:
https://www.youtube.com/watch?v=A_75whSp6BI&t=1s&ab_channel=WsCubeTech
php artisan make:migration create_posts_table.
php artisan migrate


ADVANCED :
https://medium.com/nerd-for-tech/advanced-laravel-7-topics-and-links-to-learn-them-in-2022-67ee19b3dc88
https://www.youtube.com/watch?v=CUtsExkl3fA&ab_channel=TaLigadoDev


Falando sobre:
-Eloquent é o ORM do Laravel ela usa o padrao Active record
 Model:
    -Por padrao um model escrito SiteContatoTest considera a tabela site_contato_testes. Colocando o underLine no lugado do Maiusculo e no final plural O Produto fica produtos
 	 - protected $table ='users'; essa declaracao for�a o nome da tabela ignorando o padr�o acima!

OBS:
  pra estudar os metédos All() , toArray() update() ,increment() .. só ver nesse arquivo suas Est�ncias:
  /var/www/html/lara_gestao/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php


-Migrate, o
-comando < php artisan migrate >, executa por padrao todos metodos Ups das migrations que ainda nao foram executadas! (Mais antiga para mais atual)
-comando < php artisan migrate:rollback > executa o down (Mais atual para mais antiga ,tras pra frente)
Importante: apenas migrate::rollback usa como padrao --step=1 , pra retrocedor 2,3 passos tem que passar o paramentro!!
-comando reset volta todos rollbak , ate a criacao da tabela
-comando refresh volta todos rollbak (down em toda)  E   em seguida da um up em todas migrate criando Todas tabelas!
-comando fresh da um DROP em todas tabelas ignorando o down da migrate  E  em seguida da um up em todas migrate criando Todas tabelas!



blade:
@php
    echo '<pre>';
    print_r($data_controller);
    die;
@endphp

 
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

Medotos estaticos, sao metodos que nao dependem da extancia do objeto da class. ele acessa a classe diretamente

versões do Laravel:
https://packagist.org/packages/laravel/



 
atualizar o composer: composer self-update .. pra versao mais recente
voltar uma versa    :  composer self-update --rollback






























 
