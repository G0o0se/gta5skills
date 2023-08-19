<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromocodeRequest;
use App\Http\Requests\UpdatePromocodeRequest;
use App\Models\Promocode;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $promocodes = Promocode::all();

        return view('admin.promocodes.index', compact('promocodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.promocodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store( StorePromocodeRequest $request )
    {
        if ( $request->name == NULL && $request->autoGenerateName == "on" ) $request->merge([ 'name' => $this->generatePromocode() ]);

        Promocode::create($request->only([ 'name', 'amount', 'count_uses', 'expiration_date' ]));

        return redirect()->route('promocodes.index')->with('success', 'Promocode successful created');
    }

    /**
     * Generate unique promocode with 8 symbols
     *
     * @return string
     */
    public function generatePromocode()
    {
        $name = Str::random(8);

        if ( Promocode::where('name', $name) === NULL ) return $this->generatePromocode();

        return $name;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit( $id )
    {
        $promocode = Promocode::findOrFail($id);

        return view('admin.promocodes.edit', compact('promocode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update( UpdatePromocodeRequest $request, $id )
    {
        Promocode::findOrFail($id)->update($request->validated());

        return redirect()->route('promocodes.index')->with('success', 'Promocode #' . $id . ' successful edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function delete( $id )
    {
        Promocode::findOrFail($id)->delete();

        return redirect()->route('promocodes.index')->with('success', 'Promocode #' . $id . ' successful deleted');
    }
}
