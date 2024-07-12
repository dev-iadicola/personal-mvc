<?php

class Router{
     public function __construct(
        public Request $request, 
        public array $routes
        ) {
        // var_dump($request);

        echo $request->getRequestPath();
        echo $request->getRequestMethod();

    }
}