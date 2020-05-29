<?php

namespace App\Http\Validators\Notifier;
use Illuminate\Support\Facades\Validator;

class DecedentValidator {

    public function stepOne($request)
    {
        // TODO proper validation for all cases base on data type
        $rules = [
            'name' => 'required|max:255',
            'address' => 'required',
            'relationship' => 'required',
            'person_dealing_with_estate' => 'required',
            'is_verify_identity' => 'required',
            'user_id' => 'required|exists:users,id',
        ];
        if($request->available_for_contact==1){
            $rules['avail_for_contact_checkbox'] = 'required';
        }
        $messages = [
            'name.required'     => ':attribute is required.',
            'lat.required'  => ':attribute is required.',
            'lng.required'     => ':attribute is required.',
            'formatted_address.required'    => ':attribute is required.',
            'relationship.required'      => ':attribute is required.',
            'is_dealing_estate.required'         => ':attribute is required.',
            'is_verify_identity.required'     => ':attribute is required.',
            'avail_for_contact_checkbox.required' => 'Prefer to Contact is required.'
        ];
        return Validator::make($request->all(), $rules, $messages);
    }


    public function stepTwo($request)
    {
        // TODO proper validation for all cases base on data type
        $rules = [
            'id' => 'required',
//            'document' => 'required',
            'certificate_id' => 'required',
            'certificate_number' => 'required',
            'present_address' => 'required',
            'date_of_birth' => 'required|before:today',
            'date_of_death' => 'required|before:today',
            'cause_of_death' => 'required'
        ];
        $messages = [
            'id.required'                      => ':attribute is required.',
            'document.required'                => ':attribute is required.',
            'document_id.required'             => ':attribute is required.',
            'certificate_number.required'      => ':attribute is required.',
            'present_address.required'         => ':attribute is required.',
            'date_of_birth.required'           => ':attribute is required.',
            'date_of_death.required'           => ':attribute is required.',
            'cause_of_death.required'          => ':attribute is required.',
            'date_of_birth.before'             => ':attribute cannot be more than today\'s date',
            'date_of_death.before'             => ':attribute cannot be more than today\'s date',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }

    public function stepThree($request)
    {
        // TODO proper validation for all cases base on data type
        $rules = [
            'id' => 'required',
            'document' => 'required',
            'document_id' => 'required',
            'certificate_number' => 'required',
            'present_address' => 'required',
            'date_of_birth' => 'required',
            'date_of_death' => 'required',
            'cause_of_death' => 'required'
        ];
        $messages = [
            'name.required'     => 'A name for the cafe is required.',
            'lat.required'  => 'An address is required to add this cafe.',
            'lng.required'     => 'A city is required to add this cafe.',
            'formatted_address.required'    => 'A state is required to add this cafe.',
            'relationship.required'      => 'A zip code is required to add this cafe.',
            'is_dealing_estate.required'         => 'The zip code entered is invalid.',
            'is_verify_identity.required'     => 'A name for the cafe is required.'
        ];
        return Validator::make($request->all(), $rules, $messages);
    }

    public function fileUpload($request)
    {
        $rules = [
            'file' => 'required|mimes:jpeg,pdf,png|max:15000',
        ];
        $messages = [
            'file.required'     => 'File is required.',
            'file.mimes' => 'Only jpeg, png, pdf types are allowed.',
            'file.size' => 'File size should be less tha 15 MB.'
        ];
        return Validator::make($request->all(), $rules, $messages);
    }

    public function profile($request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$request->id,
            'phone' => 'required|integer',
        ];

        return Validator::make($request->all(), $rules);
    }


    public function passwordUpdate($request)
    {
        $rules = [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ];

        return Validator::make($request->all(), $rules);
    }
}

