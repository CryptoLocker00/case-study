<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Services\AddressService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AddressController extends Controller
{
    /**
     * @return Application|Factory|View|mixed
     */
    public function index()
    {
        $addresses = (new AddressService())->all();

        return view('backend.address.index', compact('addresses'));
    }

    /**
     * @return Application|Factory|View|mixed
     */
    public function create()
    {
        return view('backend.address.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'line_one'          => 'required',
        ]);

        try {
            $address = (new AddressService())->store($request->all());

            flash()->success(__('general.createSuccess', ['model' => 'Address']));
        } catch (Exception $e) {
            flash()->error(__('general.createFail', ['model' => 'Address']));

            return back()->withInput();
        }

        return redirect()->route('backend.address.edit', $address);
    }

    /**
     * @param Address $address
     * @return Application|Factory|View|mixed
     */
    public function edit(Address $address)
    {
        return view('backend.address.edit', compact('address'));
    }

    /**
     * @param Address $address
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Address $address, Request $request)
    {
        $this->validate($request, [
            'line_one'          => 'required',
        ]);

        try {
            (new AddressService($address))->update($request->all());

            flash()->success(__('general.updateSuccess', ['model' => 'Address']));
        } catch (Exception $e) {
            flash()->error(__('general.updateFail', ['model' => 'Address']));

            return back()->withInput();
        }

        return redirect()->route('backend.address.index');
    }

    /**
     * @param Address $address
     * @return RedirectResponse
     */
    public function destroy(Address $address)
    {
        try {
            (new AddressService($address))->destroy();

            flash()->success(__('general.deleteSuccess', ['model' => 'Address']));
        } catch (Exception $e) {
            flash()->success(__('general.deleteSuccess', ['model' => 'Address']));

            return back()->withInput();
        }

        return redirect()->route('backend.address.index');
    }
}
