<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;

class ApiSuccessResponse implements Responsable
{
    /**
     * @param  mixed  $data
     * @param  int  $code
     * @param  array  $metadata
     * @param  array  $headers
     */
    public function __construct(
        private readonly mixed $data,
        private readonly int   $code = Response::HTTP_OK,
        private readonly array $metadata = [],
        private readonly array $headers = [],
    ) {}

    /**
     * @param  $request
     * @return \Symfony\Component\HttpFoundation\Response|void
     */
    public function toResponse($request)
    {
        return response()->json(
            [
                'data' => $this->data,
                'metadata' => $this->metadata,
            ],
            $this->code,
            $this->headers
        );
    }
}
