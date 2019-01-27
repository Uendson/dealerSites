Passos todos realizados no Ubuntu 64 18.04lt

Passo 1 - Instalando o Docker

1.1 - Primeiro, atualize sua lista atual de pacotes:
        $ sudo apt update
        
1.2 - Em seguida, instale alguns pacotes de pré-requisitos que permitem que o apt utilize pacotes via HTTPS:
        $ sudo apt install apt-transport-https ca-certificates curl software-properties-common

1.3 - Então adicione a chave GPG para o repositório oficial do Docker em seu sistema:
        $ curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
        
1.4 - Adicione o repositório do Docker às fontes do APT:
        $ sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu bionic stable"

1.5 - A seguir, atualize o banco de dados de pacotes com os pacotes Docker do repositório recém adicionado:
        $ sudo apt update
        
1.6 - Certifique-se de que você irá instalar a partir do repositório do Docker em vez do repositório padrão do Ubuntu:
        $ apt-cache policy docker-ce
        
1.7 - Finalmente, instale o Docker:
        $ sudo apt install docker-ce
        
        
Passo 2 - Insatalando o laradock, Para prosseguir é necessário que o docker e o git estajam instalados.

2.1 - Cria uma pasata onde ficará oa arquivos do laradock, vá até ela e clone o mesmo do git.
        $ git clone https://github.com/Laradock/laradock.git laradock
        
2.2 - Entre na pasta laradock e renomeie o arquivo env-example para .env:    
        $ cd laradock/
        $ cp env-example .env

2.3 - Execute os containers
        $ docker-compose up -d nginx mysql phpmyadmin

Obs: Por padrão, a pasta /var/www do workspace está mapeada para a pasta pai da pasta raiz do laradock. Logo, as pastas dos seus projetos devem ficar no mesmo nível da pasta do laradock na máquina host. E assim, estarão disponíveis dentro de /var/www no container.

2.4 - Volte para a pasta raiz do laradock e clone o projeto do git:
        $ git clone https://github.com/Uendson/dealerSites.git
        
2.5 - Renomeie a pasta clonada para "blogDealerSite2"

2.6 - Configure as permissões das pastas storage e bootstrap/cache, alterar o usuario, pelo nome do usuario logado no so.
        $ sudo chown -R usuario:www-data blogDealerSite2/
        $ cd blogDealerSite2
        $ chmod -R 755 storage bootstrap/cache
        
2.7 - Vá até a pasta /laradock/nginx/sites/ e edite o arquivo default.conf
        De: 
            server_name localhost;
            root /var/www/public;
            index index.php index.html index.htm;
        Para
            server_name localhost;
            root /var/www/blogDealerSite2/public;
            index index.php index.html index.htm;
            
2.8 - Volte para dentro da pasta laradock e reinicie os containers para que a mudança faça refeito.
        $ cd ~/laradock/
        $ docker-compose restart
        
Passo 3 - Configurando o banco de dados

3.1 - Acesse o endereço http://localhost:8080/index.php no navegador
        logue no phpMyAdmim com as seguintes credenciais:
        server   = laradock_mysql_1;
        Username = root
        Password = root
        
3.2 - Depois de logado crie uma base de dados com o nome "blogDealerSite2"

Passo 4 - Rodando o projeto laravel

4.1 - Dentro da pasta do laravel Execute o aplicativo bash do container laradock_workspace_1
        docker container exec -it laradock_workspace_1 bash

4.2 - Gere a base de dados através do comando
        php artisan migrate seed
        
4.3 - No navegador digite localhost, a aplicação devera rodar normalmente.        
