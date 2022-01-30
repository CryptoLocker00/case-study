<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AddressService;
use App\Services\UserService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * @return Application|Factory|View|mixed
     */
    public function index()
    {
        $users = (new UserService)->all();

        return view('backend.user.index', compact('users'));
    }

    /**
     * @return Application|Factory|View|mixed
     */
    public function create()
    {
        $addresses = (new AddressService())->all();

        return view('backend.user.create', compact('addresses'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|unique:users,email',
        ]);

        try {
            $user = (new UserService)->store($request->all());

            flash()->success(__('general.createSuccess', ['model' => 'User']));
        } catch (Exception $e) {
            flash()->error(__('general.createFail', ['model' => 'User']));

            return back()->withInput();
        }

        return redirect()->route('backend.user.edit', $user);
    }

    /**
     * @param User $user
     * @return Application|Factory|View|mixed
     */
    public function edit(User $user)
    {
        $addresses = (new AddressService())->all();

        return view('backend.user.edit', compact('user', 'addresses'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required',
        ]);

        try {
            (new UserService($user))->update($request->all());

            flash()->success(__('general.updateSuccess', ['model' => 'User']));
        } catch (Exception $e) {
            flash()->error(__('general.updateFail', ['model' => 'User']));

            return back()->withInput();
        }

        return redirect()->route('backend.user.index');
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        try {
            (new UserService($user))->destroy();

            flash()->success(__('general.deleteSuccess', ['model' => 'User']));
        } catch (Exception $e) {
            flash()->success(__('general.deleteSuccess', ['model' => 'User']));

            return back()->withInput();
        }

        return redirect()->route('backend.user.index');
    }
}
