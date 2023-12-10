<?php

namespace App\Providers;

use App\Handler\QSSApiHandler;

class QSSApiUserProvider
{
    private QSSApiHandler $apiHandler;

    /**
     * @param QSSApiHandler $apiHandler
     */
    public function __construct(QSSApiHandler $apiHandler)
    {
        $this->apiHandler = $apiHandler;
    }

    public function getCurrentUser()
    {
        return $this->apiHandler->get('me');
    }
}
