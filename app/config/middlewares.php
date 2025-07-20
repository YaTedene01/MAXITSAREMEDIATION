<?php
 namespace  App\config;
use App\core\middlewares\Auth;

$middlewares = [
 'auth'=>Auth::class
 ];