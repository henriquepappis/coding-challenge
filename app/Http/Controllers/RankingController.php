<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\PersonalRecord;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function getRanking(Request $request)
    {
        $movement_id = $request->input('movement_id');

        if (!$movement_id) {
            return response()->json([
                    'status_code' => 400,
                    'message' => "O campo 'movement_id' é obrigatório.",
                    'data' => []
            ], 400);
        }

        $movement = Movement::find($movement_id);

        if (!$movement) {
            return response()->json([
                'status_code' => 200,
                'message' => "Movimento não encontrado.",
                'data' => []
            ], 200);
        }

        $personalRecord = new PersonalRecord();
        $personal_records = $personalRecord->getPersonalRecordsByMovementId($movement_id);

        return response()->json([
            'status_code' => 200,
            'message' => "Success",
            'data' => $this->sanitizeRanking($movement, $personal_records)
        ], 200);
    }

    public function sanitizeRanking($movement, $personal_records)
    {
        $position = 0;
        $rank = 1;
        $prev_value = 0;


        usort($personal_records, function($a, $b) {
            return $b['value'] <=> $a['value'];
        });

        foreach ($personal_records as $key => $personal_record) {
            if ($prev_value != $personal_record['value']) {
                $position++;
                $personal_records[$key]['position'] = $rank;
            } else {
                $personal_records[$key]['position'] = $position;
                $position = $rank;
            }

            $prev_value = $personal_record['value'];
            $rank++;

            $records[] = [
                'user' => User::find($personal_record['user_id'])->name,
                'value' => $personal_record['value'],
                'position' => $personal_records[$key]['position'],
                'date' => Carbon::parse($personal_record['date'])->format('d/m/Y')
            ];
        }

        $ranking = [
            'movement_name' => $movement->name,
            'records' => $records
        ];

        return $ranking;
    }
}
