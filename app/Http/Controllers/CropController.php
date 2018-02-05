<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crop;
use App\Disease;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class CropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crop = Crop::orderBy('created_at', 'desc')->get();
        return view('pages.crop.index')->withCrop($crop);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.crop.create');
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
            'name'=>'required|max:100',
            'altitude'=>'required|integer',
            'harvesting_method'=>'required|max:45',
            'harvesting_time'=>'required|date|date_format:m/d/Y|after:today',
            'diseases.*'=>'required|max:45'
        ]);

        $crop_existing = Crop::where('name', '=', $request->input('name'))->get();
        if($crop_existing->count() > 0){
            return redirect()->back()->withErrors( 'crops already exists');
        }else{
            $crop = new Crop;
            $crop->name = $request->input('name');
            $crop->altitude = $request->input('altitude');
            $crop->farming_method = $request->input('harvesting_method');
            $crop->harvesting_time = Carbon::parse($request->input('harvesting_time'));
            $crop->save();

            $diseases = $request->input('diseases');
            $new_diseases = collect($diseases);
            $unique = $new_diseases->unique();
            foreach ($unique as $value) {
                $disease = Disease::where('name', '=', $value)->first();
                if (!is_null($disease)){
                    $crop->disease()->attach($disease);
                }else{
                    $dis = new Disease;
                    $dis->name = $value;
                    $crop->disease()->save($dis);
                }
            }
        }


        return redirect()->route('crop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crop = Crop::find($id);
        return view('pages.crop.show')->withCrop($crop);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crop = Crop::find($id);
        //2018-02-28
        $date = $crop->harvesting_time;
        // $data = [
        //     $crop,
        //     $date
        // ];
        return view('pages.crop.edit')->withCrop($crop)->withDate($date);
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
            'name'=>'required|max:100',
            'altitude'=>'required|integer',
            'harvesting_method'=>'required|max:45',
            'harvesting_time'=>'required|date|date_format:m/d/Y|after:today',
            'diseases.*'=>'required|max:45'
        ]);

        $crop = Crop::find($id);
        $crop->name = $request->input('name');
        $crop->altitude = $request->input('altitude');
        $crop->farming_method = $request->input('harvesting_method');
        $crop->harvesting_time = Carbon::parse($request->input('harvesting_time'));
        $crop->save();

        $crop->disease()->detach();
        $diseases = $request->input('diseases');
        $new_diseases = collect($diseases);
        $unique = $new_diseases->unique();
        foreach ($unique as $value) {
            $disease = Disease::where('name', '=', $value)->first();
            if (!is_null($disease)){
                $crop->disease()->attach($disease);
            }else{
                $dis = new Disease;
                $dis->name = $value;
                $crop->disease()->save($dis);
            }
        }

        return redirect()->route('crop.show', [$crop]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crop = Crop::find($id);
        $crop->disease()->detach();
        $crop->delete();
        return redirect()->route('crop.index');
    }

    public function delete($id)
    {
        $crop = Crop::find($id);
        return view('pages.crop.confirmDelete')->withCrop($crop);
    }

    public function search(Request $request){
        $search_string  = $request->input('search_string');

        $crop = Crop::where('name', 'LIKE', '%'.$search_string.'%')
            ->orWhere('farming_method', 'LIKE', '%'.$search_string.'%')
            ->get();

        return view('pages.crop.search')->withCrop($crop);
    }
}
