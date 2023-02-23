# Wordpress Boilerplate

```sh
├── cms/ 
│ ├── wp-content/
│ │ ├── themes/ 
│ │ │ └── custom_theme/
│ │ └── index.php
│ └── docker-compose.yml
├── app
└── .gitignore
```

| app           | host      | port |
| ------------- | --------- | ---- |
| **wordpress** | localhost | 8000 |

<br />

[custom_theme](https://github.com/caiobarilli/wordpress-boilerplate/tree/main/cms/wp-content/themes/custom_theme)

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
sh ./app up
```

Atribua as permissões necessarias do container para ativar os plugins do tema com o comando:

```sh
sh ./app permissions
```

após ativar o tema e todos os plugins atribua as permissões necessarias para desenvolver na pasta themes com o comando:

```sh
sh ./app dev
```

Pronto agora você pode acessar a pasta do tema:

```sh
cd ./cms/wp-content/themes/custom_theme
```
