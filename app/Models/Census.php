<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Census extends Model
{
    use HasFactory;

    protected $fillable = [
        'age',
        'pop',
        'year'
    ];

    /**
     * Download census data from API
     */
    public static function download(): array
    {
        $response = Http::get('https://api.census.gov/data/2017/popproj/pop', [ 
            'get' => 'POP,AGE,YEAR',
            'for' => 'us:1'
        ]);

        $rawArr = json_decode($response->body());

        $censusData = [];
        foreach ($rawArr as $index => $row) {
            // skip header and last out of range data
            if (($index === 0) || ($row[1] >= 999)) {
                continue;
            }

            $censusData[] = ['pop' => $row[0], 'age' => $row[1], 'year' => $row[2]];
        }

        return $censusData;
    }

    /**
     * Clear out existing data and store new values
     */
    public static function populate(): bool
    {
        self::truncate();

        $censusData = self::download();

        return self::insert($censusData);
    }
}
