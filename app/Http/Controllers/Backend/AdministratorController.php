<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Services\AdministratorService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdministratorController extends Controller
{
    /**
     * @return Application|Factory|View|mixed
     */
    public function index()
    {
        $administrators = (new AdministratorService)->all();

        return view('backend.administrator.index', compact('administrators'));
    }

    /**
     * @return Application|Factory|View|mixed
     */
    public function create()
    {
        return view('backend.administrator.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|unique:administrators,email',
            'password' => 'required|confirmed',
        ]);

        try {
            $administrator = (new AdministratorService)->store($request->all());

            flash()->success(__('general.createSuccess', ['model' => 'Administrator']));
        } catch (Exception $e) {
            flash()->error(__('general.createFail', ['model' => 'Administrator']));

            return back()->withInput();
        }

        return redirect()->route('backend.administrator.edit', $administrator);
    }

    /**
     * @param Administrator $administrator
     * @return Application|Factory|View|mixed
     */
    public function edit(Administrator $administrator)
    {
        return view('backend.administrator.edit', compact('administrator'));
    }

    /**
     * @param Request $request
     * @param Administrator $administrator
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Administrator $administrator)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'confirmed',
        ]);

        try {
            (new AdministratorService($administrator))->update($request->all());

            flash()->success(__('general.updateSuccess', ['model' => 'Administrator']));
        } catch (Exception $e) {
            flash()->error(__('general.updateFail', ['model' => 'Administrator']));

            return back()->withInput();
        }

        return redirect()->route('backend.administrator.index');
    }

    /**
     * @param Administrator $administrator
     * @return RedirectResponse
     */
    public function destroy(Administrator $administrator)
    {
        try {
            (new AdministratorService($administrator))->destroy();

            flash()->success(__('general.deleteSuccess', ['model' => 'Administrator']));
        } catch (Exception $e) {
            flash()->success(__('general.deleteSuccess', ['model' => 'Administrator']));

            return back()->withInput();
        }

        return redirect()->route('backend.administrator.index');
    }
}
