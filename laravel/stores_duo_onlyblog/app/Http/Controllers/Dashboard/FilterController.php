<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Filter;

class FilterController extends Controller
{
    public function postFilter(Request $request)
    {
        $this->validate($request, [
            'filterName' => 'bail|required|unique:filters,filterName|max:40',     //unique:{tableName},{columnName}
            'filterType' => 'required'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $filter = new FIlter();

        $filter->filterName = $request->input('filterName');
        $filter->filterType = $request->input('filterType');
        $filter->save();
        return response()->json(['filter' => $filter], 201);
    }

    public function getFilters()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $filters = Filter::select('id','filterName','filterType','created_at')
                            ->get();

        $response = [
            'data' => $filters
        ];
        return response()->json($response, 200);
    }

    public function getFilter($id)
    {
        $filters = Filter::select('id', 'filterName', 'filterType')
                            ->where('id', '=', $id)
                            ->get();

        $response = [
            'data' => $filters
        ];
        return response()->json($response, 200);
    }

    public function putFilter(Request $request, $id)
    {
        $filter = Filter::find($id);

        if(!$filter) {
            return response()->json(['message' => 'Filter not found'], 404);
        }

        $this->validate($request, [
            'filterName' => 'required|unique:filters,filterName,'.$id.'|max:40',
            'filterType' => 'required'
        ]);

        $filter->filterName = $request->input('filterName');
        $filter->filterType = $request->input('filterType');

        $filter->update();

        return response()->json(['filter' => $filter], 200);
    }

    public function deleteFilter($id)
    {
        $filter = Filter::find($id);
        $filter->delete();
        return response()->json(['message' => 'Filter deleted Successfully.', 200]);
    }
}
