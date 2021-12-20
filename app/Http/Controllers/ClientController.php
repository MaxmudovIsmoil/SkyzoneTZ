<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ClientController extends Controller
{

    public function index()
    {
        return view('client.index');
    }


    public function getClients()
    {
        $clients = User::where(['sys_admin' => 2])->orderBy('id', 'DESC')->get();

        return DataTables::of($clients)
            ->addIndexColumn()
            ->editColumn('active', function($client) {
                return ($client->active == 1) ? 'Active' : 'No active';
            })
            ->addColumn('action', function ($client) {
                $btn = '<div class="text-right">
                            <a href="javascript:void(0);" class="text-primary js_edit_btn"
                                data-update_url="'.route('client.update', [$client->id]).'"
                                data-one_data_url="'.route('client.oneClient', [$client->id]).'"
                                title="Tahrirlash">
                                <i class="fas fa-pen mr-50"></i>
                            </a>
                            <a class="text-danger js_delete_btn" href="javascript:void(0);"
                                data-toggle="modal"
                                data-target="#deleteModal"
                                data-name="'.$client->full_name.'"
                                data-url="'.route('client.destroy', [$client->id]).'" title="O\'chirish">
                                <i class="far fa-trash-alt mr-50"></i>
                            </a>
                        </div>';
                return $btn;
            })
            ->editColumn('id', '{{$id}}')
            ->rawColumns(['action'])
            ->setRowClass('js_this_tr')
            ->setRowAttr(['data-id' => '{{ $id }}'])
            ->make(true);
    }


    public function oneClient($id) {
        try {
            $client = User::findOrFail($id);
            return response()->json(['status' => true, 'client' => $client]);
        }
        catch (\Exception $exception) {
            return response()->json(['status' => false, 'errors' => $exception->getMessage()]);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), $this->validate_data());

        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->getMessageBag()->toArray()
            ]);
        }
        else {
            try {
                User::create([
                    'username'  => $request->username,
                    'password'  => Hash::make($request->password),
                    'full_name' => $request->full_name,
                    'active'    => $request->active,
                    'email'     => $request->username."@gmail.com",
                ]);
                return response()->json(['status' => true, 'msg' => 'ok']);
            } catch (\Exception $exception) {

                return response()->json([
                    'status' => false,
                    'errors' => $exception->getMessage()
                ]);
            }
        }
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
        if ($request->password)
            $validate = ['password' => 'required|min:6', 'full_name' => 'required', 'active' => 'required'];
        else
            $validate = ['full_name' => 'required', 'active' => 'required'];


        $validation = Validator::make($request->all(), $validate);
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->getMessageBag()->toArray()
            ]);
        }
        else {
            try {
                if ($request->password)
                    $data = [
                        'full_name' => $request->full_name,
                        'active'    => $request->active,
                        'password'  => Hash::make($request->password),
                    ];
                else
                    $data = [
                        'full_name' => $request->full_name,
                        'active'    => $request->active,
                    ];

                $p = User::findOrFail($id);
                $p->fill($data);
                $p->save();
                return response()->json(['status' => true, 'msg' => 'ok']);
            }
            catch (\Exception $exception) {
                return response()->json([
                    'status' => false,
                    'errors' => $exception->getMessage()
                ]);
            }
        }
    }


    public function validate_data() {
        return [
            'username'  => 'required|unique:users',
            'password'  => 'required|min:6',
            'full_name' => 'required',
            'active'    => 'required',
        ];
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $p = User::findOrFail($id);
            $p->delete();
            return response()->json(['status' => true, 'id' => $id]);
        }
        catch (\Exception $exception) {

            return response()->json([
                'status' => false,
                'errors' => $exception->getMessage()
            ]);
        }
    }

}
