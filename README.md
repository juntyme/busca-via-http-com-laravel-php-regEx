## Sistema de Busca de Veículos via PHP / RegEx

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<br>
<img src="https://user-images.githubusercontent.com/67340099/154813929-108de5b4-4d52-4d50-b9e5-b497d569e75c.png" >
<br>

Sistema de Busca de dados em outro site via PHP / RegEx:

-   PHP ^7.4.22
-   Laravel Framework 8.83.1
-   Banco de Dados MySQL.

## Instalação

1. Copie o arquivo do GitHub na pasta que você desejar.
2. Crie um Banco de Dados MySQL com o nome de sua preferência.
3. Configure o Banco de Dados no arquivo (.env), e altere as credenciais para os dados de acesso ao BD.

<p>DB_CONNECTION=mysql<br/>
DB_HOST=127.0.0.1<br/>
DB_PORT=3306<br/>
DB_DATABASE=laravel<br/>
DB_USERNAME=root<br/>
DB_PASSWORD=root<p>

## Comando para instalação do Laravel

Após a instalação execute os comandos para configurar a loja.

1. Execute um dos comandos:
   composer install
   composer update

2. Criar Tabelas no BD:
   php artisan migrate

3. Criar usuário Admin:
   php artisan db:seed

## Acesso ao sistema

usuario: admin@admin.com<br/>
senha: admin

## Finalização

O Sistema fora criado com o objetivo de processo seletivo empresarial, não utilizar em
ambiente de produção.
