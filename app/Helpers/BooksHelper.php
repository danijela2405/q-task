<?php

namespace App\Helpers;

use App\Handler\QSSApiHandler;

class BooksHelper
{
    private QSSApiHandler $apiHandler;

    /**
     * @param QSSApiHandler $apiHandler
     */
    public function __construct(QSSApiHandler $apiHandler)
    {
        $this->apiHandler = $apiHandler;
    }

    public function deleteBook(int $id)
    {
        return $this->apiHandler->delete('books/'.$id);
    }
}
