<?php

namespace App\Http\Controllers;

use App\Handler\QSSApiHandler;
use App\Helpers\AuthorHelper;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AuthorsController extends Controller
{
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
     * Update the user's authors information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('authors.list')->with('status', 'authors-updated');
    }

    public function destroy(Request $request, int $id): RedirectResponse
    {
        $this->authorHelper->deleteAuthor($id);

        return back();
    }
}
