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
        $messages   = [
            
        ];
        $rules      = [
            'name'                  => 'required',
            'type_components_id'    => 'required',
            'width'                 => 'required|integer',
            'height'                => 'required|integer',
            'status'                => 'required',
            'location_x'            => 'required',
            'location_y'            => 'required',
            'location_z'            => 'required'
        ];
        

        if($request->type_components_id == 2){
            $rules['video']     = 'required|mimetypes:video/mp4,video/webm';
            $rules['url']       = 'required|url';
            $rules['size']      = 'required|integer';
            $rules['format']    = 'required';
        }else if($request->type_components_id == 1){
            $rules['text']      = 'required|string|max:140';
        }else if($request->type_components_id == 3){
            $rules['image']     = 'required|image|mimes:jpeg,png';
            $rules['url']       = 'required|url';
            $rules['size']      = 'required|integer';
            $rules['format']    = 'required';
            //dd($request->image);
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $component = Component::create($request->all());

        if($request->type_components_id == 2){
            $file   = $request->file('video');
            $video  = $file->store('components', ['disk' => 'public']);
            $component->video = $video;
        }

        if($request->type_components_id == 3){
            $file   = $request->file('image');
            $image  = $file->store('components', ['disk' => 'public']);
            $component->image = $image;
        }
        
        $component->update();
        return Redirect::to('dashboard/components')->with('success','Greate! Component created successfully.');
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

    public function json($id){
        $component = Component::find($id)->toArray();
        return response()->json($component);
    }
}
