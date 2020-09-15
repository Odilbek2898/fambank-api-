<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Models\Models\Category;
use App\Models\Models\History;
use App\Models\Models\Type;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }


    public function income(Request $request)
    {
        $request->validate([
            'sum' => 'required|integer|min:0',
            'category_id' => 'required|integer'
        ]);

        //qoshimcha tekshiruv tanlagangan category_id income ga tegishli bo'lishi shart aks holda
        // return response()->json(['message' => 'etot category ne podxodi k etomu tipu]);


        $category = Category::query()->where('type_id', Type::INCOME)->whereIn('id', [$request->category_id])->first();
        if(!$category){
            return response()->json(['message' => 'etot category ne podxodit k etomu tipu'],404);
            }

        $previous_history = History::query()->latest('id')->first();

        $history = new History();
        $history->sum = $request->sum;
        $history->total = ($previous_history->total + $request->sum);
        $history->type_id = Type::INCOME;
        $history->category_id = $request->category_id;

        $history->save();

        return $history;
    }


    public function outgo(Request $request)
    {
        $request->validate([
            'sum' => 'required|integer|min:0',
            'category_id' => 'required|integer'
        ]);

        $category = Category::query()->where('type_id', Type::OUTGO)->whereIn('id', [$request->category_id])->first();
        if(!$category){
            return response()->json(['message' => 'etot category ne podxodit k etomu tipu'],404);
        }

        $previous_history = History::query()->latest('id')->first();

//        if ($previous_history->total == 0) {
//            return response()->json(['message' => 'у вас не осталось деньги']);
//        }
        if($previous_history->total < $request->sum)
        {
            return response()->json(['msg' => 'у вас не хватает деньги'],400);
        }

        $history = new History();
        $history->sum = $request->sum;
        $history->total = ($previous_history->total - $request->sum);
        $history->type_id = Type::OUTGO;
        $history->category_id = $request->category_id;

        $history->save();

        return $history;
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
}
