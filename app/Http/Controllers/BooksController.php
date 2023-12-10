<?php

namespace App\Http\Controllers;

use App\Helpers\BooksHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BooksController
{
    private BooksHelper $booksHelper;

    /**
     * @param BooksHelper $booksHelper
     */
    public function __construct(BooksHelper $booksHelper)
    {
        $this->booksHelper = $booksHelper;
    }

    public function destroy(Request $request, int $id): RedirectResponse
    {
        $this->booksHelper->deleteBook($id);

        return back();
    }
}
