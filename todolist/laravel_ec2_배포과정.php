<?php

/**
    * Laravel Project EC2에 배포하는 과정
    * EC2 세팅까지 완성됐다는 조건하에 진행
    *
    * // 우분투 업데이트
    * sudo apt-get update
    *
    * // -y를 넣어줘서 설치과정에 자동yes를 해준다.
    * sudo apt-get install php8.3 wget
    *
    * // php 확장자 설치
    * sudo apt-get install php8.3-curl php8.3-dom -y
    *
    * sudo apt-get install php curl git unzip
    *
    * sudo apt-get install php-pear php-fpm php-dev php-zip php-curl php-xmlrpc
    * php-gd php-mysql php-mbstring php-xml libapache2-mod-php
    *
    * sudo apt-get install -y php8.3-mysql
    *
    * // php 버전 확인
    * php --version
    *
    * // nginx 설치
    * sudo apt-get install nginx
    *
    * // nginx 버전확인
    * nginx -v
    *
    * // composer & mysql 설치
    * sudo apt-get install -y composer mysql-server
    *
    * // mysql 버전확인
    * mysql --version
    *
    * // composer 확인
    * composer
    *
    * // html 폴더로 이동
    * cd /var/www/html/
    *
    * // aws ec2 인바운드 설정에서 HTTP 80포트 0.0.0.0/0 허용해주고 저장
    * // html 폴더로 이동 후 public ip 주소 복사해서 웹 브라우저 연결 시도해본다.
    * apache 페이지가 뜬다. (index.html)
    *
    * // Github에 프로젝트 연결
    * // 프로젝트 폴더 생성해두고 그 폴더에서 git clone할것
    * sudo git clone https://github.com/Junjehyun/all-star_laravel.git folderName(laravel_all_starr)
    *
    *
    * PHP 버전이 8.3인 경우
    * sudo apt install php8.3-bcmath
    *
    * // 프로젝트 폴더로 들어와서 composer install
    * // composer install로 php 외부 패키지 설치
    * cd /var/www/html/project_folder
    * sudo composer install
    *
    * // ls-al로 모든 파일을 확인하면, .env가 없을 것이다.
    * // .env.example을 .env로 복사한다.
    * sudo cp .env.example .env
    *
    * // env파일을 연다.
    * sudo vi .env
    *
    * // mysql로 들어가서 해당 프로젝트에 사용할 디비를 만든다.
    * sudo mysql
    *
    * // 현재 db를 조회한다.
    * show databases;
    *
    * // 그리고 사용할 db를 생성한다.
    * create database DBNAME;
    *
    * // 만들어진 db다시 확인
    * show databaes;
    *
    * // mysql에서 나온다.
    * exit
    *
    * // mysql에서 쿼리문 날리기
    * sudo mysql
    * select user,plugin,host from mysql.user;
    *
    * // root의 plugin이 auth_socket으로 되어있을텐데, 이걸 변경해야함.
    * alter user 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '변경할비번';
    *
    * // mysql_native_password로 잘 적용 되어 있는지 확인한다.
    * select user,plugin,host from mysql.user;
    *
    * // 변경사항을 적용시킨다.
    * FLUSH PRIVILEGES;
    * exit;
    *
    * // mysql 외부접속 설정하기
    * cd /etc/mysql/mysql.conf.d
    *
    * sudo vi mysqld.cnf
    *
    * //127.0.0.1에서 외부 접속이 가능하도록 변경
    * bind-address = 0.0.0.0으로 변경
    *
    * // mysql 들어가서
    * use mysql;

    * // 외부IP에서 접속 가능하도록 허용
    * grant all privileges on *.* to 'root'@'%' identified by '1234';
    *
    * // 만약 특정 아이피에서만 접속 가능하게 하려면 아래를 적용
    * 2. 권한 설정하기
    * 설정을 할 때, IP나 특정 IP대역만 허용을 하거나, 전체를 허용되게 하는 방법이 있다.
    *
    * 1) 특정 IP접근 허용 설정
    * mysql> grant all privileges on *.* to 'root'@'192.168.56.101' identified by 'root의 패스워드';
    *
    * 2) 특정 IP 대역 접근 허용 설정
    * mysql> grant all privileges on *.* 'root'@'192.168.%' identified by 'root의 패스워드';
    *
    * 3) 모든 IP의 접근 허용 설정
    * mysql> grant all privileges on *.* to 'root'@'%' identified by 'root의 패스워드';
    *
    * -> 위에꺼 안되길래 검색해서 찾아서 보충
    * mysql> CREATE USER 'root'@'%' IDENTIFIED BY '1234';
    * mysql> GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;
    * mysql> FLUSH PRIVILEGES;
    *
    * // mysql 외부접속 관련
    * https://jootc.com/p/201806101246
    *
    * // aws 보안 -> 인바운드 규칙
    * 3306포트 열어준다. 0.0.0.0/0 (MYSQL/Aurora)
    *
    * // mysql 재실행
    * sudo service mysql restart
    *
    * // mysql 잘 돌아가는지 확인
    * sudo service mysql status
    *
    * // key를 생성한다.
    * sudo php artisan key:generate
    *
    * // nginx 설정
    * cd /etc/nginx/sites-available/
    *
    * // default 파일을 찾는다.
    * sudo vi default
    *
    * // 라라벨 문서 config 부분을 보고 설정한다.
    * https://laravel.com/docs/7.x/deployment#nginx
    *
    * // 파일 편집 - root /var/www/html/프로젝트폴더/public;
    * root /var/www/html/프로젝트폴더/public;
    * index index.php추가
    * try_files $uri uri/ /index.php?query_string;
    *
    * esc누르고
    *
    * // 편집한 내용 저장
    * :wq
    *
    * // nginx 파일 설정이 잘 되었는지 테스트
    * sudo nginx -t
    *
    * // 아파치 돌아가는지 확인
    * sudo service apache2 status
    *
    * // 아파치 서버 정지
    * sudo service apache2 stop
    *
    * // nginx 서버 스타트
    * sudo service nginx start
    *
    * // nginx 서버 잘 돌아가는지 확인
    * sudo service nginx status
    *
    * cd /var/www/html/프로젝트폴더
    * !! 모든파일 확인
    * //storage 폴더의 권한을 설정해준다.
    * sudo chown -R www-data:www-data storage
    * sudo chown -R www-data:www-data public
    *
    * // DB 마이그레이션
    * sudo php artisan migrate

*/

?>



