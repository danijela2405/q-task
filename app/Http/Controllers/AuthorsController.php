<?php

namespace App\Http\Controllers;

use App\Helpers\AuthorHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class AuthorsController extends Controller
{
    /**
     * @var AuthorHelper
     */
    private AuthorHelper $authorHelper;

    /**
     * @param AuthorHelper $authorHelper
     */
    public function __construct(AuthorHelper $authorHelper)
    {
        $this->authorHelper = $authorHelper;
    }

    /**
     * Display the authors.
     */
    public function index(Request $request): View
    {
        return view('authors.list', [
            'authors' => $this->authorHelper->getAuthorsAndBooksCount(),
        ]);
    }

    /**
     * Display one author and their books.
     */
    public function view(Request $request, int $id): View
    {
        return view('authors.view', [
            'author' => $this->authorHelper->getAuthor($id),
        ]);
    }

    /**
     * Delete an author
     */
    public function destroy(Request $request, int $id): RedirectResponse
    {
        $this->authorHelper->deleteAuthor($id);

        return back();
    }
}
