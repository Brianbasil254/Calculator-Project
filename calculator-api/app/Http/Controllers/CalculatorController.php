<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculation;

class CalculatorController extends Controller
{
    public function calculate(Request $request)
    {
        $data = $request->validate([
            'a' => 'required|numeric',
            'b' => 'required|numeric',
            'operation' => 'required|in:add,subtract,multiply,divide',
        ]);

        switch ($data['operation']) {
            case 'add':
                $result = $data['a'] + $data['b'];
                break;
            case 'subtract':
                $result = $data['a'] - $data['b'];
                break;
            case 'multiply':
                $result = $data['a'] * $data['b'];
                break;
            case 'divide':
                if ($data['b'] == 0) return response()->json(['error' => 'Division by zero'], 400);
                $result = $data['a'] / $data['b'];
                break;
        }

        $calc = Calculation::create([
    'operand1' => $data['a'],   // ✅ Correct name
    'operand2' => $data['b'],   // ✅ Correct name
    'operation' => $data['operation'],
    'result' => $result,
]);

        if (!$calc) return response()->json(['error' => 'Calculation failed'], 500);

        return response()->json($calc, 201);
    }

    public function show($id)
    {
        $calc = Calculation::find($id);

        if (!$calc) return response()->json(['error' => 'Not found'], 404);

        return response()->json($calc);
    }
}
