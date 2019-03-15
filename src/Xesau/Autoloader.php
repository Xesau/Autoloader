<?php

namespace Xesau;

class Autoloader {
    
    private $baseDir;
    private $namespace;
    
    public function __construct($baseDir, $namespace = null) 
    {
        $this->baseDir = $baseDir;
        $this->namespace = $namespace;
    }
    
    private function getPath($className)
    {
        return $this->baseDir .DIRECTORY_SEPARATOR. str_replace(['_', '\\'], DIRECTORY_SEPARATOR, $className).'.php';
    }
    
    public function register()
    {
        $baseDir = $this->baseDir;
        $namespace = $this->namespace;
        spl_autoload_register(function($className) use ($baseDir, $namespace) {
            if ($namespace == null) {
                $path = $this->getPath($className);
            } else {
                if (strpos($className, $namespace . '\\') !== 0)
                    return;
                
                $path = $this->getPath(substr($className, strlen($namespace) + 1));
            }

            if (is_readable($path))
                include_once $path;
        });
    }
    
}
