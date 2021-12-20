<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PhoneController extends Controller
{

    public function index()
    {
        $sys_admin = Auth::user()->sys_admin;

        return view('phone.index', compact('sys_admin'));
    }


    public function getPhones()
    {
        if (Auth::user()->sys_admin == 1) {
            $phones = Phone::whereNull('deleted_at')->orderBy('id', 'DESC')->get();
            $phones->load('client');

            return DataTables::of($phones)
                ->addIndexColumn()
                ->addColumn('client', function($p) {
                    return optional($p->client)->full_name;
                })
                ->editColumn('phone', function ($p) {
                    return $this->phone_format($p->phone);
                })
                ->addColumn('action', function ($p) {
                    $btn = '<div class="text-right">
                            <a href="javascript:void(0);" class="text-primary js_edit_btn"
                                data-update_url="' . route('phone.update', [$p->id]) . '"
                                data-one_data_url="' . route('phone.onePhone', [$p->id]) . '"
                                title="Tahrirlash">
                                <i class="fas fa-pen mr-50"></i>
                            </a>
                            <a class="text-danger js_delete_btn" href="javascript:void(0);"
                                data-toggle="modal"
                                data-target="#deleteModal"
                                data-name="' . $p->phone . '"
                                data-url="' . route('phone.destroy', [$p->id]) . '" title="O\'chirish">
                                <i class="far fa-trash-alt mr-50"></i>
                            </a>
                        </div>';
                    return $btn;
                })
                ->editColumn('id', '{{$id}}')
                ->rawColumns(['client', 'phone', 'action'])
                ->setRowClass('js_this_tr')
                ->setRowAttr(['data-id' => '{{ $id }}'])
                ->make(true);
        }
        else {
            $user_id = Auth::user()->id;
            $phones = Phone::where('user_id', $user_id)->orderBy('id', 'DESC')->get();

            return DataTables::of($phones)
                ->addIndexColumn()
                ->editColumn('phone', function ($p) {
                    return $this->phone_format($p->phone);
                })
                ->editColumn('id', '{{$id}}')
                ->rawColumns(['phone'])
                ->setRowClass('js_this_tr')
                ->setRowAttr(['data-id' => '{{ $id }}'])
                ->make(true);
        }
    }


    public function onePhone($id) {
        try {
            $phone = Phone::findOrFail($id);
            return response()->json(['status' => true, 'phone' => $phone]);
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
        $validation = Validator::make($request->all(), ['phone' => 'required|unique:phones|min:9|max:12']);

        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->getMessageBag()->toArray()
            ]);
        }
        else {
            try {
                Phone::create([
                    'user_id'   => Auth::user()->id,
                    'phone'     => $request->phone,
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
        if ($request->old_phone !== $request->phone)
            $validate = ['phone' => 'required|unique:phones|min:9|max:12'];
        else
            $validate = ['phone' => 'required|min:9|max:12'];

        $validation = Validator::make($request->all(), $validate);
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->getMessageBag()->toArray()
            ]);
        }
        else {
            try {
                $p = Phone::findOrFail($id);
                $p->fill([
                    'phone' => $request->phone,
                ]);
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $p = Phone::findOrFail($id);
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


    private function phone_format($phone)
    {
        $length = strlen($phone);

        if ($length == 12)
            $response = mb_substr($phone, 0, 3)." (".mb_substr($phone, 3, 2).") ".mb_substr($phone, 5, 3)." - ".mb_substr($phone, 8, 2)." - ".mb_substr($phone, -2);
        else
            $response = "(".mb_substr($phone, 0, 2).") ".mb_substr($phone, 2, 3)." - ".mb_substr($phone, 5, 2)." - ".mb_substr($phone, -2);

        return $response;
    }
}
