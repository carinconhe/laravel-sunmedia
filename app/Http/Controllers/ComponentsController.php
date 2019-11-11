<?php

namespace Sunmedia\Http\Controllers;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Sunmedia\Models\Component;
use Sunmedia\Models\TypeComponent;

class ComponentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $components     = Component::with('typeComponents')->get();
        $data = [
            'title'=>'Components',
            'components' => $components
        ];
        return view('component.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $types      = TypeComponent::where('status',1)->pluck('name', 'id')->toArray();
        $types['']  = "Select one...";
        return view('component.create')->with('types',$types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $messages   = [];
        $rules      = [
            'name'      => 'required',
            'type'      => 'required',
            'width'     => 'required|integer',
            'height'    => 'required|integer',
            'status'    => 'required',
            'location_x' => 'required',
            'location_y' => 'required',
            'location_z' => 'required'
        ];
        

        if($request->type == 2){
            $rules['url']       = 'required|url';
            $rules['format']    = 'required';
        }else if($request->type == 1){
            $rules['text']      = 'required';
        }else if($request->type == 3){
            $rules['image']     = 'required|image|mimes:jpg,png';
        }


        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
   
        //Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checked($id){
        $type = Component::find($id);
        $type->status = !$type->status;
        $type->update();
        return redirect('/dashboard/components');
    }
}
