# Projet_HTML-CSS-BD

![Static Badge](https://img.shields.io/badge/php-8.2.8-red.svg?logo=php&logoColor=fff&style=flat)
![Static Badge](https://img.shields.io/badge/mysql-latest-blue.svg?logo=mysql&logoColor=fff&style=flat)

## Introduction

Ce projet est une application web développée dans le cadre du cours "Technologies Web" de l'année 2023. L'objectif est de créer une interface utilisateur conviviale pour interagir avec une base de données, en utilisant HTML, CSS et des technologies de serveur comme PHP et MySQL.

## Installation et configuration

1. Installer Docker sur votre machine local :

| OS      | Tutorial URL                                    |
| ------- | ----------------------------------------------- |
| LinuxOS | https://docs.docker.com/engine/install/ubuntu/  |
| MacOS   | https://www.docker.com/products/docker-desktop/ |

2.  Lancez la commande suivante pour extraire l'image et installer le conteneur

```
docker compose up --build -d
```

3.  Aller sur PhpMyAdmin en suivant le liens suivant.

    | identifiant : |         |
    | ------------- | ------- |
    | serveur       | db      |
    | Username      | root    |
    | Password      | example |

```
http://localhost:8080
```

4. Crée une base de donnée avec le nom suivant :

```
human_ressources
```

5. importer le fichier human_ressources.sql pour avoir la base de donnée

6. Voir le site en suivant l'url :

```
http://localhost/
```
