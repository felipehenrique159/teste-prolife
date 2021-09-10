## Aplicação teste Prolife

<img src="https://user-images.githubusercontent.com/43323183/132759193-a856a09d-a12e-43ae-abd4-d861ba07f380.png">

## Comandos para rodar a aplicação
- cp .env.example .env  (Configurar .env corretamente com o ambiente atual e não se esqueça de configurar as credenciais de e-mail)
- composer install
- php artisan config:cache (Rodar após a configuração do .env para limpar os cache)
- php artisan config:clear
- php artisan serve

## Uso de Migrate
- Foi criado migrate para a tabela contatos e as demais para registro e login do usuario

## Comandos

- php artisan migrate

## Sobre a aplicação
Aplicação consta em um cadastro de contatos em um formulario que permite salvar um anexo no storage local e logo em seguida após o cadastro envia-lo para o e-mail destino configurado no dot env, formulario possui tambem validações na camada do próprio Request

## Tecnologias utilizadas:

- ### Laravel 8
- ### AdminLTE

