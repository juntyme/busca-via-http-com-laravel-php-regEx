## Sistema Teste

Sistema de Busca de dados em outro site via PHP / RegEx:

-   PHP ^7.4.22
-   Laravel Framework 8.83.1
-   Banco de Dados MySQl.

## Instalação

1. Copie o arquivo do GitHub na pasta que você desejar.
2. Crie um Banco de Dados MySQL com o nome de sua preferência.
3. Configure o Banco de Dados no arquivo (.env), e altere as credenciais para os dados de acesso ao BD.

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=laravel

DB_USERNAME=root

DB_PASSWORD=root

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

usuario: admin@admin.com
senha: admin

## Finalização

O Sistema fora criado com o objetivo de processo seletivo empresarial, não utilizar em
ambiente de produção.
