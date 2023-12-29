<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Exceptions\Api\Auth\PasswordException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ForgotPasswordRequest;
use App\Http\Requests\Api\Auth\PasswordRecoverRequest;
use App\Mail\VerificationCodeMail;
use App\Models\VerificationCode;
use App\Services\Auth\AuthService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    /**
     * Send email with verification code
     *
     * @param ForgotPasswordRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function sendResetEmail(ForgotPasswordRequest $request): JsonResponse
    {
        $verifications = VerificationCode::createVerificationCode($request->validated('email'));

        Mail::to($request->validated('email'))
            ->queue(new VerificationCodeMail($verifications->code));

        return response()->json(['status' => true, 'message' => 'Verification code send to your email'])
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @param PasswordRecoverRequest $request
     * @return JsonResponse
     * @throws PasswordException
     */
    public function recoverPassword(PasswordRecoverRequest $request): JsonResponse
    {
        $this->authService->recoverPassword(
            $request->validated('email'),
            $request->validated('password')
        );

        return response()->json(['status' => true, 'message' => 'Password changes successful'])
            ->setStatusCode(Response::HTTP_OK);
    }
}
