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

        $a = $data['a'];
        $b = $data['b'];
        $operation = $data['operation'];

        switch ($operation) {
            case 'add':
                $result = $a + $b;
                break;
            case 'subtract':
                $result = $a - $b;
                break;
            case 'multiply':
                $result = $a * $b;
                break;
            case 'divide':
                if ($b == 0) {
                    return response()->json(['error' => 'Invalid operation'], 400);
                }
                $result = $a / $b;
                break;
            default:
                return response()->json(['error' => 'Invalid operation'], 400);
        }

        $calculation = Calculation::create([
            'a' => $a,
            'b' => $b,
            'operation' => $operation,
            'result' => $result,
        ]);

        return response()->json([
            'id' => $calculation->id,
            'result' => $calculation->result,
        ]);
    }

    public function show($id)
    {
        $calculation = Calculation::find($id);

        if (!$calculation) {
            return response()->json(['error' => 'Not found'], 404);
        }

        return response()->json([
            'id' => $calculation->id,
            'a' => $calculation->a,
            'b' => $calculation->b,
            'operation' => $calculation->operation,
            'result' => $calculation->result,
            'created_at' => $calculation->created_at->toIso8601String(),
        ]);
    }
}