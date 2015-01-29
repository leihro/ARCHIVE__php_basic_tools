<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 29.01.15
 * Time: 10:05
 */

namespace DesignPatterns\Structural\DependencyInjection;


class App {
    private $config;
    private $user;
    private $url;

    public function __construct(Config $config){
        $this->config = $config;
    }

    public function getUser(){
        $this->user = $this->config->get('user');
        return $this->user;
    }

    public function getUrl(){
        $this->url = $this->config->get('url');
        return $this->url;
    }

    public function setUser($user){

    }

    public function setUrl($url){

    }

} 