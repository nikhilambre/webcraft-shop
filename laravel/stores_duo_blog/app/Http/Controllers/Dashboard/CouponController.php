<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Coupon;

class CouponController extends Controller
{
    public function postCoupon(Request $request)
    {
        $this->validate($request, [
            'couponCode' => 'bail|required|unique:coupons,couponCode|max:16',     //unique:{tableName},{columnName}
            'status' => 'required'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $coupon = new Coupon();

        $coupon->couponCode = $request->input('couponCode');
        $coupon->couponPercentage = $request->input('couponPercentage');
        $coupon->couponAmount = $request->input('couponAmount');
        $coupon->status = $request->input('status');
        $coupon->couponType = $request->input('couponType');
        $coupon->save();
        return response()->json(['coupon' => $coupon], 201);
    }

    public function getCoupon($id)
    {
        $coupon = Coupon::select('id','couponCode','couponPercentage','couponAmount','status','couponType','created_at')
                            ->where('id', $id)
                            ->get();

        $response = [
            'data' => $coupon
        ];
        return response()->json($response, 200);
    }

    public function getCoupons()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $coupon = Coupon::select('id','couponCode','couponPercentage','couponAmount','status','couponType','created_at')
                            ->get();

        $response = [
            'data' => $coupon
        ];
        return response()->json($response, 200);
    }

    public function putCoupon(Request $request, $id)
    {
        $coupon = Coupon::find($id);

        if(!$coupon) {
            return response()->json(['message' => 'Coupon not found'], 404);
        }

        $this->validate($request, [
            'couponCode' => 'required|unique:coupons,couponCode,'.$id.'|max:16',
            'status' => 'required'
        ]);

        $coupon->couponCode = $request->input('couponCode');
        $coupon->couponPercentage = $request->input('couponPercentage');
        $coupon->couponAmount = $request->input('couponAmount');
        $coupon->status = $request->input('status');
        $coupon->couponType = $request->input('couponType');

        $coupon->update();

        return response()->json(['coupon' => $coupon], 200);
    }

    public function deleteCoupon($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return response()->json(['message' => 'Coupon deleted Successfully.', 200]);
    }
}
