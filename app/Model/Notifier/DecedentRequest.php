<?php

namespace App\Model\Notifier;

use App\Model\CauseofDeath;
use App\Model\DocumentType;
use Illuminate\Database\Eloquent\Model;

class DecedentRequest extends Model
{
    protected $table = 'decedent_requests';

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'email',
        'phone_number',
        'relationship',
        'person_dealing_with_estate',
        'person_dealing_name',
        'person_dealing_phone_number',
        'probate_applied',
        'available_for_contact',
        'email_available_for_contact',
        'phone_number_available_for_contact',
        'mail_available_for_contact',
        'name_of_departed',
        'present_address',
        'previous_address',
        'second_previous_address',
        'third_previous_address',
        'date_of_birth',
        'date_of_death',
        'cause_of_death',
        'certificate_id',
        'certificate_number',
        'country_code',
        'person_dealing_country_code'
    ];

    public function getDocType($id){
        $docType = new DocumentType();
        $document = $docType->find($id);
        return ($document) ? $document->document_type: "";
    }

    public function getCauseOfDeath($id){
        $cause_of_death = new CauseofDeath();
        $_cause_of_death = $cause_of_death->find($id);
        return ($_cause_of_death) ? $_cause_of_death->cause_of_death: "";
    }

}
