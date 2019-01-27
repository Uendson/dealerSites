<p>Passos todos realizados no Ubuntu 64 18.04lt</p>

<p>Passo 1 - Instalando o Docker</p>

<p>1.1 - Primeiro, atualize sua lista atual de pacotes:<br />
 $ sudo apt update<br />
 <br />
1.2 - Em seguida, instale alguns pacotes de pr&eacute;-requisitos que permitem que o apt utilize pacotes via HTTPS:<br />
 $ sudo apt install apt-transport-https ca-certificates curl software-properties-common</p>

<p>1.3 - Ent&atilde;o adicione a chave GPG para o reposit&oacute;rio oficial do Docker em seu sistema:<br />
 $ curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -<br />
 <br />
1.4 - Adicione o reposit&oacute;rio do Docker &agrave;s fontes do APT:<br />
 $ sudo add-apt-repository &quot;deb [arch=amd64] https://download.docker.com/linux/ubuntu bionic stable&quot;</p>

<p>1.5 - A seguir, atualize o banco de dados de pacotes com os pacotes Docker do reposit&oacute;rio rec&eacute;m adicionado:<br />
 $ sudo apt update<br />
 <br />
1.6 - Certifique-se de que voc&ecirc; ir&aacute; instalar a partir do reposit&oacute;rio do Docker em vez do reposit&oacute;rio padr&atilde;o do Ubuntu:<br />
 $ apt-cache policy docker-ce<br />
 <br />
1.7 - Finalmente, instale o Docker:<br />
 $ sudo apt install docker-ce<br />
 <br />
 <br />
Passo 2 - Insatalando o laradock, Para prosseguir &eacute; necess&aacute;rio que o docker e o git estajam instalados.</p>

<p>2.1 - Cria uma pasata onde ficar&aacute; oa arquivos do laradock, v&aacute; at&eacute; ela e clone o mesmo do git.<br />
 $ git clone https://github.com/Laradock/laradock.git laradock<br />
 <br />
2.2 - Entre na pasta laradock e renomeie o arquivo env-example para .env: <br />
 $ cd laradock/<br />
 $ cp env-example .env</p>

<p>2.3 - De permiss&atilde;o de escrita para a pasta e Execute os containers<br />
 $ sudo chmod -R 777 laradock<br />
 $ docker-compose up -d nginx mysql phpmyadmin</p>

<p>Obs: Por padr&atilde;o, a pasta /var/www do workspace est&aacute; mapeada para a pasta pai da pasta raiz do laradock. Logo, as pastas dos seus projetos devem ficar no mesmo n&iacute;vel da pasta do laradock na m&aacute;quina host. E assim, estar&atilde;o dispon&iacute;veis dentro de /var/www no container.</p>

<p>2.4 - Volte para a pasta raiz do laradock e clone o projeto do git:<br />
 $ git clone https://github.com/Uendson/dealerSites.git<br />
 <br />
2.5 - Renomeie a pasta clonada para &quot;blogDealerSite2&quot;</p>

<p>2.6 - Configure as permiss&otilde;es das pastas storage e bootstrap/cache, alterar o usuario, pelo nome do usuario logado no so.<br />
 $ sudo chown -R usuario:www-data blogDealerSite2/<br />
 $ cd blogDealerSite2<br />
 $ chmod -R 755 storage bootstrap/cache<br />
 <br />
2.7 - V&aacute; at&eacute; a pasta /laradock/nginx/sites/ e edite o arquivo default.conf<br />
 De: <br />
 server_name localhost;<br />
 root /var/www/public;<br />
 index index.php index.html index.htm;<br />
 Para<br />
 server_name localhost;<br />
 root /var/www/blogDealerSite2/public;<br />
 index index.php index.html index.htm;<br />
 <br />
2.8 - Volte para dentro da pasta laradock e reinicie os containers para que a mudan&ccedil;a fa&ccedil;a refeito.<br />
 $ cd ~/laradock/<br />
 $ docker-compose restart<br />
 <br />
Passo 3 - Configurando o banco de dados</p>

<p>3.1 - Acesse o endere&ccedil;o http://localhost:8080/index.php no navegador<br />
 logue no phpMyAdmim com as seguintes credenciais:<br />
 server = laradock_mysql_1;<br />
 Username = root<br />
 Password = root<br />
 <br />
3.2 - Depois de logado crie uma base de dados com o nome &quot;blogDealerSite2&quot;</p>

<p>Passo 4 - Rodando o projeto laravel</p>

<p>4.1 - Dentro da pasta do laravel Execute o aplicativo bash do container laradock_workspace_1<br />
 $ docker container exec -it laradock_workspace_1 bash<br />
 <br />
4.2 - Entre na pasta blogDealerSite2 e gere a base de dados atrav&eacute;s do comando<br />
 /var/www# cd blogDealerSite2/<br /> 
 /var/www# php artisan migrate --seed<br />
 <br />
4.3 - Suba o servidor atrav&eacute;s do comando:<br />
 /var/www# php artisan serve<br />
 <br />
4.4 - No navegador digite localhost, a aplica&ccedil;&atilde;o devera rodar normalmente.</p>
