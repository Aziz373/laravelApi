<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        try {
            $data = $this->userRepository->index();
            return response()->json($data);
        }
        catch (\Exception $e) {
            return response()->json($e);
        }
    }

    public function store(Request $request)
    {
        try {
            $this->userRepository->store($request->all());
            return response()->json(['message' => 'User added successfully.']);
        }
        catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }

    }
    public function update(Request $request, $id)
    {
        $data['id'] = $id;
        $data = $request->all();

        try {
            $this->userRepository->update($data);
            return response()->json(['message' => 'User Updated successfully.']);
        }
        catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $this->userRepository->destroy($id);
            return response()->json(['message' => 'User Deleted successfully.']);
        }
        catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

}
