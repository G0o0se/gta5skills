<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Models\Package;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $packages = Package::all();

        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePackageRequest $request
     * @return Application|RedirectResponse|Redirector|void
     */
    public function store( StorePackageRequest $request )
    {
        Package::create($request->validated());

        return redirect()->route('packages.index')->with('success', 'Package successful created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit( $id )
    {
        $package = Package::findOrFail($id);

        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update( UpdatePackageRequest $request, int $id )
    {
        Package::findOrFail($id)->update($request->validated());

        return redirect()->route('packages.index')->with('success', 'Package successful edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return void
     */
    public function delete( $id )
    {
        Package::destroy($id);

        return redirect()->back()->with('success', 'Package successful removed');
    }
}
