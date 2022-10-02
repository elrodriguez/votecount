<?php

namespace App\Imports;

use App\Models\Person;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Modules\Setting\Entities\SetCompany;
use Modules\Staff\Entities\StaEmployee;

class PersonImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $c = SetCompany::where('main', true)->first();
        $person = Person::create([
            'country_id' => 'PE',
            'identity_document_type_id' => $row[0],
            'number' => $row[1],
            'names' => $row[2],
            'last_name_father' => $row[3],
            'last_name_mother' => $row[4],
            'full_name' => $row[3] . ' ' . $row[4] . ' ' . $row[2],
            'trade_name' => null,
            'address' => $row[5],
            'email' => $row[6],
            'telephone' => $row[7],
            'sex' => $row[8]
        ]);
        StaEmployee::create([
            'admission_date' => Carbon::now()->format('Y-m-d'),
            'person_id' => $person->id,
            'company_id' => $c->id,
            'occupation_id' => 1,
            'employee_type_id' => 1,
            'cv' => 'dd',
            'photo' => 'ff',
            'state' => true
        ]);
    }
}
