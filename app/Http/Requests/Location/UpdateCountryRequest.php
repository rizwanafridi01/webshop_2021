<?php

namespace App\Http\Requests\Location;

use App\Models\Country;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCountryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('country_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'       => [
                'required',
            ],
            'short_code' => [
                'required',
            ],
        ];
    }
}
