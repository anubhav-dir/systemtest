<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $search = $request['search'] ?? '';
        if(!empty($search)){
            $model = Detail::where('created_at', 'LIKE', "%$search%")->orWhere('updated_at', 'LIKE', "%$search%")->orWhere('color', 'LIKE', "%$search%")->get();
        }else{
            $model = Detail::get();
        }
        return view('detail.index')->with(['model'=>$model, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Detail();
        return view('detail.create')->with(['model'=>$model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'book' => 'required',
            'color' => 'required',
        ]);

        $model = new Detail();
        $model->name = $request->name;
        $model->book = $request->book;
        $model->color = $request->color;
        if($model->save()){
            return redirect()->route('detail.show', ['detail'=>$model->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Detail::find($id);
        return view('detail.view')->with(['model' => $model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Detail::find($id);
        return view('detail.edit')->with(['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'book' => 'required',
            'color' => 'required',
        ]);

        $model = Detail::find($id);
        $model->name = $request->name;
        $model->book = $request->book;
        $model->color = $request->color;
        if($model->save()){
            return redirect()->route('detail.show', ['detail'=>$model->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Detail::find($id);
        if($model->delete()){
            return redirect()->route('detail.index');
        }
        return redirect()->back();
    }
}
