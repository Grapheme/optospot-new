<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Users_affiliate extends MY_Model {

    protected $table = "users_affiliate";
    protected $primary_key = "id";
    protected $fields = array("*");

    function __construct(){

        parent::__construct();
    }

}