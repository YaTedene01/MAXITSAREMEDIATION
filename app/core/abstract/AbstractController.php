<?php
namespace App\core\abstract;

use App\core\App;
use App\core\Session;

abstract class AbstractController{
    
    protected string $layout='layout/baselayout.html.php';
    protected Session $session ;
    public function __construct(){
        $this->session= App::getDependencie('session');
    }
    public function render($view,$data=[]){
        ob_start();
        extract($data);
        require_once __DIR__."/../../../templates/".$view;
        $contentForLayout=ob_get_clean();
        require_once __DIR__."/../../../templates/".$this->layout;
    }
    abstract public function create();
    abstract public function show();
    abstract public function update();
    abstract public function destroy();
    abstract public function index();
    abstract public function store();
    abstract public function edit();

}