<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories = Category::where('parent_id', null)->get();
        foreach ($Categories as $c) {
        echo 'name : ' . $c->name ;
        echo '<br>';
        $repeates = 1;
        if(count($c->children))$this->display__children($c->children,$repeates);
        echo '<br>';
        echo '<br>';
        echo '<br>';
        }
    }
    public function display__children($children,$repeates)
    {
        $spaces_str = str_repeat("==", $repeates);
        echo '<br>';
        echo '<br>';
        echo  $spaces_str.'  has children';
        echo '<br>';
        echo '<br>';
        foreach ($children as $m) {
        echo '<br>';
            echo $spaces_str .'  name : ' . $m->name ;
            echo '<br>';
             if(count($m->children))
             {
                $this->display__children($m->children,++$repeates);
             }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
