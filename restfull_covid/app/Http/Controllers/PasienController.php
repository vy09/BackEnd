<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all();
        if (count($pasiens)) {
            $data = [
                'massege' => 'all Pasiens',
                'data' => $pasiens,
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'massege' => 'Tidak ada Data'
            ];
            return response()->json($data, 404);
        }
    }
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required',
            'in_date_at' => 'date',
            'out_date_at' => 'date'
        ],
        [
            'name.required' => 'Masukan nama anda!',
            'phone.required' => 'Masukan nomor phone!',
            'address.required' => 'Masukan alamat anda!',
            'status.required' => 'Masukan status anda!',
            'in_date_at.required' => 'Masukan tanggal masuk anda!',
            'out_date_at.required' => 'Masukan tanggal keluar anda!',
            'in_date_at.date'=> 'Masukan tanggal sesuai format (tahun-bulan-tanggal)',
            'out_date_at.date' => 'Masukan tanggal sesuai format (tahun-bulan-tanggal)'
        ]);

        if ($validasi->fails()) {
            $data = [
                'massege' => 'Data Tidak berhasil diinput',
                'data' => $validasi->errors()
            ];
            return response()->json($data, 404);
        } else {
            $input = [
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'status' => $request->status,
                'in_date_at' => $request->in_date_at,
                'out_date_at' => $request->out_date_at
            ];
            $pasiens = Pasien::create($input);

            $data = [
                'massege' => 'Pasien is created Successfully',
                'data' => $pasiens,
            ];
            return response()->json($data, 200);
        }
    }
    public function show($id)
    {
        $pasiens = Pasien::find($id);
        if ($pasiens){
            $data = [
                'massege' => 'Detail data pasien',
                'data' => $pasiens,
            ];
            return response()->json($data, 202);
        } else {
            $data = [
                'massege' => 'data not found',
            ];
            return response()->json($data,404);
        }
        
    }
    public function update(Request $request, $id)
    {
        $pasiens = Pasien::find($id);
        $pasiens->update($request->all());
        if ($pasiens) {
            $input = [
                'name' => $request->name ?? $pasiens->name,
                'phone' => $request->phone ?? $pasiens->phone,
                'address' => $request->address ?? $pasiens->address,
                'status' => $request->status ?? $pasiens->status,
                'in_date_at' => $request->in_date_at ?? $pasiens->in_date_at,
                'out_date_at' => $request->out_date_at ?? $pasiens->out_date_at
            ];
            $pasiens->update($input);

            $data = [
                'massege' => 'Data is Updated',
                'data' => $pasiens
            ];
            return response()->json($data, 202);
        } else {
            $data = [
                'massege' => "Data not found"
            ];
            return response()->json($data, 404);
        }
    }
    public function destroy($id)
    {
        $pasiens = Pasien::find($id);
        if ($pasiens) {
            $pasiens->delete();

            $data = [
                'massege' => "data is deleted"
            ];
            return response()->json($data, 202);
        } else {
            $data = [
                'massege' => 'Student not found'
            ];
            return response()->json($data, 404);
        }
    }
    public function search($nama)
    {

        $pasiens = Pasien::where('nama', 'like', '%' . $nama . '%')->get();

        $data = [
            'massege' => 'Data pasien ' . $nama . '',
            'data' => $pasiens
        ];
        return response()->json($data, 200);
    }
    public function status($status)
    {
        $covid = Pasien::where('status', $status)->count();

        $data = [
            'massege' => 'Data pasien dengan status ' . $status . ' ; ',
            'jumlah' => $covid

        ];

        return response()->json($data, 200);
    }
}

