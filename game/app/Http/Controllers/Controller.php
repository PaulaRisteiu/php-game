<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;

abstract class Controller
{
    /**
     * Trimite un răspuns JSON standard pentru succes.
     */
    protected function respondSuccess(array $data = [], string $message = 'Success', int $status = 200): JsonResponse
    {
        return response()->json([
            'status'  => 'success',
            'message' => $message,
            'data'    => $data
        ], $status);
    }

    /**
     * Trimite un răspuns JSON standard pentru erori.
     */
    protected function respondError(string $message = 'Something went wrong', int $status = 400, array $errors = []): JsonResponse
    {
        return response()->json([
            'status'  => 'error',
            'message' => $message,
            'errors'  => $errors
        ], $status);
    }
}
