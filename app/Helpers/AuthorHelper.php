<?php

namespace App\Helpers;

use App\Handler\QSSApiHandler;

class AuthorHelper
{
    private QSSApiHandler $apiHandler;

    /**
     * @param QSSApiHandler $apiHandler
     */
    public function __construct(QSSApiHandler $apiHandler)
    {
        $this->apiHandler = $apiHandler;
    }

    public function getAuthorsAndBooksCount()
    {
        $authors = $this->apiHandler->get('authors');
        foreach ($authors->items as $author) {
            $authorsBooks = $this->apiHandler->get('authors/' . $author->id);
            $author->books_count = count($authorsBooks->books);
        }

        return $authors->items;
    }

    public function getAuthor(int $id)
    {
        return $this->apiHandler->get('authors/' . $id);
    }

    public function deleteAuthor(int $id)
    {
        return $this->apiHandler->delete('authors/' . $id);
    }
}
