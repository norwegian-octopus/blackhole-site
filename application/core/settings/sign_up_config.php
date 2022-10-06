<?php


// конфиг для регистрации 

ACCESS or die('Access denied');


const SIGNUP_STR = "/^[a-zа-яё0-9_-]{1,50}$/ui";
const SIGNUP_EMAIL = "/^(.+@.+\..+){1,255}$/ui";
const SIGNUP_PASS = "/^.{7,255}$/ui";