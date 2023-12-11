<?php

namespace App\Helpers;

use App\Handler\QSSApiHandler;

class AuthorHelper
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
     * Get a list of authors
     */
    public function getAuthors(): mixed
    {
        $authors = $this->apiHandler->get('authors');

        return $authors->items;
    }

    /**
     * Get a list of authors with books count included
     */
    public function getAuthorsAndBooksCount()
    {
        $authors = $this->getAuthors();
        foreach ($authors as $author) {
            $authorsBooks = $this->apiHandler->get('authors/' . $author->id);
            $author->books_count = count($authorsBooks->books);
        }

        return $authors;
    }

    /**
     * Get a single author
     */
    public function getAuthor(int $id)
    {
        return $this->apiHandler->get('authors/' . $id);
    }

    /**
     * Delete an author
     */
    public function deleteAuthor(int $id)
    {
        return $this->apiHandler->delete('authors/' . $id);
    }
}
