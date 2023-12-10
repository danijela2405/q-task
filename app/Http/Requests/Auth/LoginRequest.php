<?php

namespace App\Http\Requests\Auth;

use App\Handler\QSSApiHandler;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    private QSSApiHandler $apiHandler;

    /**
     * @param QSSApiHandler $apiHandler
     */
    public function __construct(QSSApiHandler $apiHandler)
    {
        $this->apiHandler = $apiHandler;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $body = [
            'email' => $this->get('email'),
            'password' => $this->get('password'),
        ];

        $response = $this->apiHandler->post('token', $body);

        if (!$response or !isset($response->token_key)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        session(['login_token' => $response->token_key]);
    }
}
