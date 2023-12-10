<?php

namespace App\Console\Commands;

use App\Handler\QSSApiHandler;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use function Laravel\Prompts\text;
use function Laravel\Prompts\select;

class CreateAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-author';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new author entry';

    private QSSApiHandler $apiHandler;

    /**
     * @param QSSApiHandler $apiHandler
     */
    public function __construct(QSSApiHandler $apiHandler)
    {
        parent::__construct();
        $this->apiHandler = $apiHandler;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = text(
            label: 'Your email (auth)',
            required: true
        );

        $pass = text(
            label: 'Your password (auth)',
            required: true
        );

        $login = [
            "email" => trim($email),
            "password" => $pass,
        ];

        $response = $this->apiHandler->post('token', $login);

        $token = $response->token_key;

        $firstName = text(
            label: 'First name of the author?',
            required: true
        );

        $lastName = text(
            label: 'First name of the author?',
            required: true
        );

        $birthday = text(
            label: 'Birthday of the author?',
            required: true
        );

        $biography = text(
            label: 'Biography of the author?',
            required: true
        );

        $gender = select(
            label: 'Gender of the author?',
            options: ['male', 'female'],
            required: true
        );

        $placeOfBirth = text(
            label: 'Place of birth of the author?',
            required: true
        );

        $data = [
            "first_name" => $firstName,
            "last_name" => $lastName,
            "birthday" => strtotime($birthday),
            "biography" => $biography,
            "gender" => $gender,
            "place_of_birth" => $placeOfBirth
        ];

        $response = $this->apiHandler->post('authors', $data, $token = null);

        if(!$response){
            Log::error('An error happened while adding a new author');
            return 0;
        }

        Log::info('Successfully added a new author');
        return 1;
    }
}
