<?php
namespace Controllers;
use AltoRouter;
class RouterApi{
    private $vieuwPath;    
    /**
     * router
     * cette class utilise AltoRouter comme routeur principal
     * @var AltoRouter
     */
    private $router;
    public function __construct(string $vieuwPath)
    {
        $this->vieuwPath = $vieuwPath;
        $this->router =new AltoRouter();   
    }
    public function get(string $url,string $view,?string $name = null):self
    {
        $this->router->map('GET',$url,$view,$name);
        return $this;
    }
    public function post(string $url,string $view,?string $name = null):self
    {
        $this->router->map('POST',$url,$view,$name);
        return $this;
    }
    public function run():self
    {
        $match = $this->router->match();
        if ($match === false) {
            $match['target'] = null;
        }
        $view = $match['target'];
        if ($view === null) {
            $view = 'NotFoundApi'; 
        }
        $explose = explode('@',$view);
        $methode = null;
        if (isset($explose[1])) {
            $view = $explose[0];
            $methode = $explose[1];
        }
        $class = $this->vieuwPath . '\\'.$view ;
        new $class($methode);
        return $this;  
    } 

    public function generate(string $name)
    {
        return $this->router->generate($name) ;
    }
}

?>