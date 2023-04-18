# docker_compose_lnmp

#### 介绍
docker-compose搭建PHP8.1（fpm和cli含扩展）+ Nginx1.22 + MySQL8.0 + Mongo6.0 + Redis6.0 + Swoole2.0
搭建webman项目的配置

Gitee地址：https://gitee.com/owenzhang24/docker_compose_lnmp

#### 感谢
在kingsfeng的基础上添加了一些功能和插件
GitHub地址: https://github.com/kingsfeng/docker_compose_lnmp

#### 软件架构
docker-compose搭建LNMP环境映射文件目录，clone到指定composer_lnmp74目录，可以一键安装

### 安装教程

1.  `git clone https://gitee.com/owenzhang24/docker_compose_lnmp lnmp`
2.  `cd lnmp`
3.  `docker-compose build`
4.  `docker-compose up -d`

![](https://oscimg.oschina.net/oscnet/up-bcf90815e989567dff88d70f659acbc09a2.png)

5.  5-10是测试LNMP搭建是否成功
5.  `docker exec -it lnmp_nginx /bin/sh`
6.  `apt-get update`
7.  `apt-get install vim`
8.  `vim /etc/nginx/conf.d/default.conf`
```
location ~ \.php$ {                                                                                                                                                                                                 
root           /var/www/html; #php容器的目录，不是nginx
fastcgi_pass   lnmp_php:9000;#php容器名
fastcgi_index  index.php;
fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;                                                                                                                                              
include        fastcgi_params;                                                                                                                                                                                   
}
```
9. `exit`
10. `docker restart lnmp_nginx`

    ![](https://oscimg.oschina.net/oscnet/up-f75061667803ea0764faefbbb2dcb010777.png)

11. window-docker环境下进行11-14，（如果是linux下是得配置nginx转发的，后期会更新文档）
11. 如果是phpcli模式可以跳过5-10，直接进入lnmp_phpcli容器,docker exec -it lnmp_phpcli /bin/sh
12. 进入项目根目录cd /var/www/html/webman-owen/ （https://gitee.com/owenzhang24/webman-owen）
13. phpcli项目的env注意是0.0.0.0 和 DB_HOST = mysql 和 REDIS_HOST = redis

```
APP_DEBUG = true
APP_VERSION = 1.0.0
PLAY_WAIT_TIME = 43200
APP_NAME = 'OwenWeb'
ENVIRONMENT = DEV
SMS_COUNT=900

SERVER_LISTEN = http://0.0.0.0:8241
WEB_SITE = 0.0.0.0
WWW_SITE = 0.0.0.0:8241
API_SITE = 0.0.0.0
WEB_WWW = 0.0.0.0

DB_HOST = mysql
DB_PORT = 3306
DB_DATABASE = owenweb
DB_USERNAME = root
DB_PASSWORD = root

MONGODB_PORT = 27017

REDIS_HOST = redis
REDIS_PASSWORD =
REDIS_PORT = 6379

```
14. 运行  php start.php start 即可

    ![](https://oscimg.oschina.net/oscnet/up-a75247fedc1d89ec7c6e20f45c5c34e69fd.png)



#### 如果安装失败了或者配置文件修改导致build失败可以执行以下步骤再进行重新build
1. docker-compose stop

#### 点 y 确认后删除所有containers（环境有其他containers的话谨慎执行）
2. docker-compose rm
#### 删除所有images（环境有其他image的话谨慎执行）
3. docker rmi $(docker images -q)
#### 进入nginx镜像


### 使用说明
1.  `/docker_compose_lnmp/php/extension/dockerfile  是PHP8.1的常用扩展，包括mysqli、gd、mcrypt、zip、redis、memcache、mongodb、swoole等等`

2.  `在/docker_compose_lnmp/ 目录下执行安装命令`

### 联系

email：owen@owenzhang.com
