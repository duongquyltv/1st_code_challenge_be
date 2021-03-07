# Code Challenge
* Phát triển API xem tất cả thành viên trong một công ty, công ty tổ chức phân cấp như sau:

<img src="https://drive.google.com/file/d/10z89zTnvEFWdXsqfCGPkXQEb71aJTxw1/view"/>

1. Đứng đầu là giám đốc.
2. Mỗi phòng ban do một người quản lý
3. Mỗi phòng ban có nhiều team dự án
4. Mỗi team dự án thuốc về một phòng ban và có nhiều người tham gia.
5. Mỗi người có thể tham gia nhiều team dự án.
6. API có thể trả về tối da 1500 nhân viên

## Author

  * Duong Quy <duongquy.ltv@gmail.com>

# Contents
  1. [Architecture](#Architecture)
  2. [Services](#Services)
  3. [Docker images](#Docker-images)
  4. [Build](#Build)
  5. [For Developer Development enviroment](#For-Developer-Development-enviroment)
  6. [Publish site](#Publish-site)
  7. [Source for development](#Source-for-development)
  8. [First running project](#First-running-project)

# Architecture

<img src="https://drive.google.com/file/d/1zgbh4NEsu9jRyXxkx2GfCV-aLYC46AG2/view"/>


# Services
  * MySQL
    * Relational database.
    * <https://www.mysql.com/>

  * Laravel:
    * Laravel Framework.
    * <https://laravel.com/>

  * Nginx:
    * Nginx Web Server.
    * <https://www.nginx.com/>

# Docker images
  * php-fpm: <https://hub.docker.com/_/php>
  * mysql: <https://hub.docker.com/_/mysql>
  * nginx: <https://hub.docker.com/_/nginx>
  * composer: <https://hub.docker.com/_/composer>

# Build for Windows

Installing Git on Windows follow the link below if not yet:\
<https://git-scm.com/downloads>

Install Docker on Windows follow link if not yet:\
<https://docs.docker.com/docker-for-windows/install/>

Open PowerShell window in project location folder then Run command line to clone source and build\
```
$ git clone git@github.com:duongquyltv/1st_code_challenge_be.git
$ cd 1st_code_challenge_be
$ cp src/.env.example src/.env
$ docker-compose up -d
```
# Build for Mac

Installing Git on Mac follow the link below if not yet:\
<https://git-scm.com/downloads/mac>

Install Docker on Windows follow link if not yet:\
<https://docs.docker.com/docker-for-mac/install/>

Open Terminal in project location folder then Run command line to clone source and build
```
$ git clone git@github.com:duongquyltv/1st_code_challenge_be.git
$ cd 1st_code_challenge_be
$ cp src/.env.example src/.env
$ docker-compose up -d
```

# Publish site

<b>API Link:</b>
  * Source: Laravel
  * URL authencation: <http://localhost/api/login>
  * URL get user: <http://localhost/api/user/list>

<b>Swagger documents:</b>
  * URL: <http://localhost/api/documentation>

# Source for development
  * Laravel: ./src/

# First running project

You must run it to generate database demo and swagger.
```
make php
php artisan migrate: refresh --seed
php artisan l5-swagger: generate
```