<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;

class IndexController extends Controller
{
    protected $tours;
    protected $data;
    public function __construct()
    {
        $this->tours = Tour::all();
        $this->data = [];
        $this->data = array_add($this->data, 'tours', $this->tours);
    }

    public function show()
    {
        return view('index', $this->data);
    }

    public function add(Request $request)
    {
        // country
        // city
        // citysMemories
        // days
        // date
        // class
        // price
        if (isset($request->cancel)) {
            redirect('/');
        }

        $newTour = new Tour;
        $newTour->country = $request->country;
        $newTour->city = $request->city;
        $newTour->citysMemories = $request->citysMemories;
        $newTour->days = $request->days;
        $newTour->date = $request->date;
        $newTour->class = $request->class;
        $newTour->price = $request->price;
        $newTour->save();
        
        return redirect('/');
    }

    public function edit($id, Request $request)
    {
        $tour = Tour::find($id);
        if (isset($request->cancel)) {
            return redirect('/');
        }

        if (isset($request->save)) {
            $tour->country = $request->country;
            $tour->city = $request->city;
            $tour->citysMemories = $request->citysMemories;
            $tour->days = $request->days;
            $tour->date = $request->date;
            $tour->class = $request->class;
            $tour->price = $request->price;
            $tour->save();
            return redirect('/');
        }
        $this->data = array_add($this->data, 'tour', $tour);
        return view('index', $this->data);
    }

    public function delete($id)
    {
        $tour = Tour::find($id);
        $tour->delete();
        return redirect('/');
    }
}
