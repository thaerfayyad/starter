<?php

namespace App\Http\Controllers;

use App\models\Offer;
use App\Http\Requests\OfferRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CrudController extends Controller
{
    public function create (){
      return view( ' offers.create');
    }
    public function store(Request $request){

        $rules = $this->getRules();
        $message = $this->getMessage();

        $validator = Validator::make($request->all() ,$rules, $message);

        if( $validator->fails()){
          //  return redirect()->back()->with('success','successfully');//->withErrors( $validator);//->withInput($request->all());
            return redirect()->back()->withErrors($validator->errors());
        }

        Offer::create([
            'name' => $request->name,
            'price' => $request->price,
           'details'=>$request->details,

        ]);

    }
    protected function getRules(){
        return  $rules = [
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required',
        ];
    }

    protected function getMessage(){
        return $messags = [
            'name.required' => __('messeges.offer name required'),
            // 'name.unique' =>__('اسم العرض موجود '),
            'price.required' => __('messeges.offer price required'),
            // 'price.required' => 'السعر مطلوب',
            'details.required' => __('messeges.offer details required'),

        ];

    }

}
