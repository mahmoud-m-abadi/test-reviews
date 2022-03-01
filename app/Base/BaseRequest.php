<?php

namespace App\Base;

use App\Http\Controllers\Controller;
use App\Interfaces\Requests\BaseRequestInterface;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class BaseRequest extends FormRequest implements BaseRequestInterface
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array{}

    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'data' => null,
                    'errors' => $validator->errors(),
                    Controller::EXCEPTION_MESSAGE => null
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            )
        );
    }
}
