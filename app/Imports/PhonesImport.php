<?php
namespace App\Imports;

use App\Models\Phone;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class PhonesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Phone|null
     */
    public function model(array $row)
    {
        $user_id = Auth::user()->id;

        return new Phone([
            'user_id' => $user_id,
            'phone'   => $row[0],
        ]);
    }
}
