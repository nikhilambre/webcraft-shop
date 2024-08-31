<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class VisitorController extends Controller
{
    public function getVisitors()
    {
        //  $visitor = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $visitor = Customer::select('id','name','lastname','email','contact_no','created_at')
                            ->get();

        $response = [
            'data' => $visitor
        ];
        return response()->json($response, 200);
    }

    public function getVisitor($id)
    {
        $visitor = Customer::select('id','name','lastname','email','contact_no','created_at')
                            ->where('id', '=', $id)
                            ->get();

        $response = [
            'data' => $visitor
        ];
        return response()->json($response, 200);
    }
}
