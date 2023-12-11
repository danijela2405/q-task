<?php

namespace App\Providers;

use App\Handler\QSSApiHandler;

class QSSApiUserProvider
{
    /**
     * @var QSSApiHandler
     */
    private QSSApiHandler $apiHandler;

    /**
     * @param QSSApiHandler $apiHandler
     */
    public function __construct(QSSApiHandler $apiHandler)
    {
        $this->apiHandler = $apiHandler;
    }

    /**
     * Get currently signed-in user
     */
    public function getCurrentUser(): mixed
    {
        return $this->apiHandler->get('me');
    }
}
