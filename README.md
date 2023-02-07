# Wordpress Boilerplate

| app           | host      | port |
| ------------- | --------- | ---- |
| **wordpress** | localhost | 8000 |

<br />

### Pré-requisitos

#

Para começar, certifique-se de ter o [Docker](https://docs.docker.com/) e [Docker Compose](https://docs.docker.com/compose/install/) instalado no seu sistema.

<br />

### Download

#

Faça o download do projeto com o comando:

```sh
git clone git@github.com:caiobarilli/wordpress-boilerplate.git
```

<br />

### Instalação

#

Utilize o comando para construir os containers do docker

```sh
sh ./_up.sh
```

após construir os containers do docker acesse o wordpress e atribua as permissões necessarias do container para ativar os plugins
do tema com o comando:

```sh
sh ./_container-permissions.sh
```

após ativar o tema e todos os plugins atribua as permissões necessarias para desenvolver na pasta themes com o comando:

```sh
sh ./_user-permissions.sh
```

Pronto agora você pode acessar a pasta do tema:

```sh
cd ./cms/wp-content/themes/custom_theme
```
