<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TraineeController extends Controller
{
    public function index()
    {
        return view('trainee.index');
    }

    public function fetchstudent()
    {
        $trainees = Trainee::all();
        return response()->json([
            'trainees'=>$trainees,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:191',
            'course'=>'required|max:191',
            'email'=>'required|email|max:191',
            'phone'=>'required|max:10|min:10',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $trainee = new Trainee;
            $trainee->name = $request->input('name');
            $trainee->course = $request->input('course');
            $trainee->email = $request->input('email');
            $trainee->phone = $request->input('phone');
            $trainee->save();
            return response()->json([
                'status'=>200,
                'message'=>'Trainee Added Successfully.'
            ]);
        }

    }

    public function edit($id)
    {
        $trainee = Trainee::find($id);
        if($trainee)
        {
            return response()->json([
                'status'=>200,
                'trainee'=> $trainee,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Trainee Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:191',
            'course'=>'required|max:191',
            'email'=>'required|email|max:191',
            'phone'=>'required|max:10|min:10',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $trainee = Trainee::find($id);
            if($trainee)
            {
                $trainee->name = $request->input('name');
                $trainee->course = $request->input('course');
                $trainee->email = $request->input('email');
                $trainee->phone = $request->input('phone');
                $trainee->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Trainee Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Trainee Found.'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $trainee = Trainee::find($id);
        if($trainee)
        {
            $trainee->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Trainee Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Trainee Found.'
            ]);
        }
    }
}