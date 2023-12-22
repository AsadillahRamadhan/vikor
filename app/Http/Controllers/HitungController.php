<?php

namespace App\Http\Controllers;

use App\Models\criteria;
use App\Models\penilaian;
use App\Models\alternatif;
use Illuminate\Http\Request;

class HitungController extends Controller
{
    public function index()
    {
        $criterias = criteria::all();
        $alternatifs = alternatif::all();
        $penilaians = penilaian::with(['alternatif', 'criteria'])->get();

        $ranking = [];
        $normalizedValues = [];
        $weightedNormalization = [];

        $desiredDecimalPlaces = 3; 

        foreach ($criterias as $keyColumn => $c) {

            $values = $penilaians->where('id_criteria', $c->id);
            $nilai = $penilaians->where('id_criteria', $c->id)->map(function ($p) {
                return $p->nilai;
            })->toArray();

            $maxVal = max($nilai);
            $minVal = min($nilai);

            foreach ($alternatifs as $keyRow => $a) {
                $temp = 0;
                $value = $values->where('id_criteria', $c->id)->where('id_alternatif', $a->id)->first();
                if ($value->criteria->criteria_type ==  'Cost') {
                    $temp = ($value->nilai - $minVal) / ($maxVal - $minVal);
                    $normalizedValues[$keyRow][$keyColumn] = round($temp, $desiredDecimalPlaces);
                } else {
                    $temp = ($maxVal - $value->nilai) / ($maxVal - $minVal);
                    $normalizedValues[$keyRow][$keyColumn] = round($temp, $desiredDecimalPlaces);
                }
                $temp = $value->criteria->weight * $normalizedValues[$keyRow][$keyColumn];
                if ($temp % 1 < 1) {
                    $temp = round($temp / 100, 3);
                } else {
                    $temp = round($temp / 100, 0);
                }
                $weightedNormalization[$keyRow][$keyColumn] = $temp;
            }
        }

        $sum = array_fill(0, count($alternatifs), 0);
        $max = array_fill(0, count($criterias), 0);

        foreach ($alternatifs as $keyRow => $a) {
            $sum[$keyRow] = array_sum($weightedNormalization[$keyRow]);
            $max[$keyRow] = max($weightedNormalization[$keyRow]);
        }

        $sumMax = max($sum);
        $sumMin = min($sum);
        $rMax = max($max);
        $rMin = min($max);

        $V = 0.5;
        $finalValues = [];
        $ranking = range(1, count($criterias));

        foreach ($alternatifs as $key => $value) {
            $val1 = $V * (($sum[$key] - $sumMin) / ($sumMax - $sumMin));
            $val2 = (1 - $V) * (($max[$key] - $rMin) / ($rMax - $rMin));

            $finalValues[$key] = $val1 + $val2;
            $ranking[$key] = $val1 + $val2;
        }

        array_multisort($ranking, SORT_ASC);

        return view('dashboard.hitung', [
            'criteria' => $criterias,
            'alternatif' => $alternatifs,
            'penilaian' => $penilaians,
            'normalisasi' => $normalizedValues,
            'weightedNormalization' => $weightedNormalization,
            'Si' => $sum,
            'Ri' => $max,
            'finalValues' => $finalValues,
            'ranking' => $ranking,
        ]);
    }
}
