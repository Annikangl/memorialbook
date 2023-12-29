<?php

namespace App\Rules;

use App\Models\VerificationCode;
use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Translation\PotentiallyTranslatedString;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class EmailVerificationCode implements InvokableRule
{
    /**
     * Run the validation rule.
     * @param string $attribute
     * @param mixed $value
     * @param \Closure(string): PotentiallyTranslatedString $fail
     * @return void
     * @throws NotFoundExceptionInterface|ContainerExceptionInterface
     */
    public function __invoke($attribute, $value, $fail): void
    {
        $email = request()->get('email') ?: Auth::user()->email;

        if (strlen((string)abs($value)) !== 4 || !VerificationCode::checkVerificationCode($email, $value)) {
            $fail('Неверный код подтверждения');
        }
    }
}
