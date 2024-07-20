<?php

namespace App\Middleware;

use App\Core\Mvc;
use App\Core\Contract\MiddlewareInterface;

class MaintenanceMiddleware implements MiddlewareInterface
{
    public function exec(Mvc $mvc)
    {
        $stringManitence = getenv('MAINTENANCE'); // Prendiamo lo status di manutenzione
        
        $actualPath = $mvc->request->getRequestPath(); // recuperiamo il percorso URL dell'user
        
        // in caso di manutenzione entra qui
        if ($stringManitence === 'true' && $actualPath !== '/coming-soon')
            $mvc->response->redirect('/coming-soon');
    }
}
