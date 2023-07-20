<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Request;
use Throwable;

class ApiErrorResponse implements Responsable
{
    public function __construct(
        private string|array $message,
        private ?Throwable $exception = null,
        private int $code = Response::HTTP_INTERNAL_SERVER_ERROR,
        private array $headers = []
    ) {}

    /**
     * @return \Symfony\Component\HttpFoundation\Response|void
     */
    public function toResponse($request)
    {
        $response = ['message' => $this->message];

        if (! is_null($this->exception) && config('app.debug')) {
            $response['debug'] = [
                'message' => $this->exception->getMessage(),
                'file'    => $this->exception->getFile(),
                'line'    => $this->exception->getLine(),
                'trace'   => $this->exception->getTraceAsString()
            ];
        }

        return response()->json($response, $this->code, $this->headers);
    }
}
