<?php

namespace App\Interfaces\Requests;

interface BaseRequestInterface
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize(): bool;

    /**
     * @return array
     */
    public function rules(): array;
}
