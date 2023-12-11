<?php

namespace App\Helpers;

use App\Handler\QSSApiHandler;

class BooksHelper
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
     * Add a book
     */
    public function addBook(array $data): mixed
    {
        return $this->apiHandler->post('books', $data);
    }

    /**
     * Delete a book
     */
    public function deleteBook(int $id): bool
    {
        return $this->apiHandler->delete('books/'.$id);
    }
}
