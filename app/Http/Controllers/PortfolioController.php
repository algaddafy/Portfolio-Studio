<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\models\Portfolio;
use File;

class PortfolioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $portfolios = Portfolio::all();
        return view('pages.portfolios.list', compact('portfolios'));
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $portfolios = new Portfolio;
        $portfolios->title = $request->title;
        $portfolios->description = $request->description;
        $portfolios->category = $request->category;

        if($request->hasfile('small_image'))
        {
            $destination = 'uploads/main/'.$portfolios->small_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('small_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/main/', $filename);
            $portfolios->small_image = $filename;
        }
        

        
        $portfolios->save();

        return redirect()->route('admin.portfolios.list')->with('success','New Portfolio Created Successfully');
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
        $portfolio = Portfolio::find($id);
        return view('pages.portfolios.edit', compact('portfolio'));
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
        $portfolios = Portfolio::find($id);
        $portfolios->title = $request->title;
        $portfolios->description = $request->description;
        $portfolios->category = $request->category;
        
        if($request->hasfile('small_image'))
        {
            $destination = 'uploads/main/'.$portfolios->small_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('small_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/main/', $filename);
            $portfolios->small_image = $filename;
        }

        $portfolios->save();

        return redirect()->route('admin.portfolios.list')->with('success','Portfolio Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        @unlink(public_path($portfolio->small_image));
        $portfolio->delete();

        return redirect()->route('admin.portfolios.list')->with('success','Portfolio Deleted Successfully');
    }
}
