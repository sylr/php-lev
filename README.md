PHP-LEV
=======

[![Docker Repository on Quay](https://quay.io/repository/sylr/php-lev/status "Docker Repository on Quay")](https://quay.io/repository/sylr/php-lev)

A Docker container (based on  https://github.com/richarvey/nginx-php-fpm) that computes Levenshtein distances between each elements of an array of random md5 hashes.

The goal of this container is to burn CPU and test autoscaling.

API
---

| URL                     | Description	                                      |
|-------------------------|---------------------------------------------------|
| /index.php              | Default values                                    |
| /index.php?count=500    | Number of hashes in the array                     |
| /index.php?max=22       | Display hashes with a distance lower than max     |
| /php.php                | Display php info                                  |
| /server.php             | Display content of `$_SERVER`, `$_GET` & `$_POST` |

Unleash Hell
------------

```shell
HOST=php-lev.mycompany.com

while [ true ]; do
  parallel --gnu -j 30 "curl -s https://${HOST}/?count={0} && sleep 1" ::: $(seq 1000 1200)
done
```
