<?php

/**
 * ------------------------------------------
 * Json Response Trait
 * ------------------------------------------
 *
 * This trait makes it easier to return the JSON response from controllers
 * accompanied with proper status code
 *
 */

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    /**
     * The request has succeeded.
     *
     * @param  mixed      $data Response body
     * @param  string|null $key  parent key (Optional key)
     * @return Illuminate\Http\JsonResponse
     */

    protected function ok(object $data, string $message = null)
    {
        return response()->json(['message' => $message,'data' => $data], 200);
    }

    /**
    * The request has been fulfilled and resulted in a new resource being created.
    *
    * @param  mixed      $data Response body
    * @param  string|null $key  parent key (Optional key)
    * @return Illuminate\Http\JsonResponse
    */
    protected function created($data, string $message = null)
    {
        return response()->json(['data' => $data,'message' => $message], 201);
    }

    /**
     * The request has been accepted for processing, but the processing has not been completed.
     *
     * @param  mixed      $data Response body
     * @param  string|null $key  parent key (Optional key)
     * @return Illuminate\Http\JsonResponse
     */
    protected function accepted($data, string $message = null)
    {
        return response()->json(['data' => $data,'message' => $message], 202);
    }

    /**
     * The request successfully deleted the resource
     *
     * @return Illuminate\Http\JsonResponse
     */
    protected function noContent(string $message)
    {
        return response()->json(['message' => $message,'content' => null], 204);
    }

    /**
     * The request could not be understood by the server due to malformed syntax.
     * The client SHOULD NOT repeat the request without modifications.
     *
     * @param  mixed      $data Response body
     * @param  string|null $key  parent key (Optional key)
     * @return Illuminate\Http\JsonResponse
     */
    protected function badRequest($data, ?string $key = null): JsonResponse
    {
        return response()->json($this->body($data, $key), 400);
    }

    /**
    * The request requires user authentication.
    *
    * @param  mixed      $data Response body
    * @param  string|null $key  parent key (Optional key)
    * @return Illuminate\Http\JsonResponse
    */
    protected function unauthorized($data, ?string $key = null): JsonResponse
    {
        return response()->json($this->body($data, $key), 401);
    }

    /**
     * The original intention was that this code might be used as part of some form of digital cash or micropayment scheme,
     * but that has not happened, and this code is not usually used.
     *
     * @param  mixed      $data Response body
     * @param  string|null $key  parent key (Optional key)
     * @return Illuminate\Http\JsonResponse
     */
    protected function paymentRequired($data, ?string $key = null): JsonResponse
    {
        return response()->json($this->body($data, $key), 402);
    }

    /**
    * The server understood the request, but is refusing to fulfill it.
    * Authorization will not help and the request SHOULD NOT be repeated.
    *
    * @param  mixed      $data Response body
    * @param  string|null $key  parent key (Optional key)
    * @return Illuminate\Http\JsonResponse
    */
    protected function forbidden($data, ?string $key = null): JsonResponse
    {
        return response()->json($this->body($data, $key), 403);
    }

    /**
    * The server has not found anything matching the Request-URI.
    * No indication is given of whether the condition is temporary or permanent.
    *
    * @param  mixed      $data Response body
    * @param  string|null $key  parent key (Optional key)
    * @return Illuminate\Http\JsonResponse
    */
    protected function notFound($data, ?string $key = null): JsonResponse
    {
        return response()->json($this->body($data, $key), 404);
    }

    /**
     * The server understands the content type of the request entity,
     * and the syntax of the request entity is correct,
     * but was unable to process the contained instructions.
     *
     * @param  mixed      $data Response body
     * @param  string|null $key  parent key (Optional key)
     * @return Illuminate\Http\JsonResponse
     */
    protected function invalid($data, ?string $key = null): JsonResponse
    {
        return response()->json($this->body($data, $key), 422);
    }

    /**
     * Optionally add a parent key to the response body
     *
     * @param  mixed      $data Response body
     * @param  string|null $key  parent key (Optional key)
     * @return mixed
     */
    protected function body($data, ?string $key = null)
    {
        return is_null($key) ? $data : [$key => $data];
    }
}