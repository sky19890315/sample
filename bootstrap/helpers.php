<?php
/**
 * Created by PhpStorm.
 * User: s
 * Date: 17-2-1
 * Time: 上午11:43
 */
    /*判断是否在本地服务器*/
    function get_db_config()
    {
        if (getenv('IS_IN_HEROKU')){
          $url = parse_url(getenv("DATABASE_URL"));

          return $db_config = [
            'connection'        =>      'pgsql',
            'host'              =>      $url['host'],
            'database'          =>      substr($url['path'], 1),
            'username'          =>      $url['user'],
            'password'          =>      $url['pass'],
          ];

        }else{/*本地环境*/
            return $db_config = [
            'connection'        =>      env('DB_CONNECTION', 'mysql'),
            'host'              =>      env('DB_HOST', 'localhost'),
            'database'          =>      env('DB_DATABASE', 'forge'),
            'username'          =>      env('DB_USERNAME' ,'forge'),
            'password'          =>      env('DB_PASSWORD', ''),
           ];
        }
    }