<?php

namespace App\Http\Controllers;

use App\Helpers\AuthorHelper;
use App\Helpers\BooksHelper;
use App\Http\Requests\BookCreateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class BooksController extends Controller
{
    /**
     * @var BooksHelper
     */
    private BooksHelper $booksHelper;
    /**
     * @var AuthorHelper
     */
    private AuthorHelper $authorHelper;

    /**
     * @param BooksHelper $booksHelper
     * @param AuthorHelper $authorHelper
     */
    public function __construct(BooksHelper $booksHelper, AuthorHelper $authorHelper)
    {
        $this->booksHelper = $booksHelper;
        $this->authorHelper = $authorHelper;
    }

    /**
     * Create a new book view
     */
    public function create(Request $request): View
    {
        return view('books.create', [
            'authors' => $this->authorHelper->getAuthors(),
        ]);
    }

    /**
     * Add a new book.
     */
    public function store(BookCreateRequest $request): RedirectResponse
    {
        $request->validated();

        $data = $request->all();
        $formattedData = $request->formatRequestData($data);
        $this->booksHelper->addBook($formattedData);

        return Redirect::route('authors.list');
    }

    /**
     * Delete a book.
     */
    public function destroy(Request $request, int $id): RedirectResponse
    {
        $this->booksHelper->deleteBook($id);

        return back();
    }
}
