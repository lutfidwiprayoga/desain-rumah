<?php

namespace App\Http\Controllers;

use App\Models\Desain;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllDesainController extends Controller
{
    public function desains()
    {
        $user = Auth::user()->id;
        $desains = Desain::with('kategori')->where('desains.user_id', $user)->get();
        return view('frontend.v_allDesain', compact('desains'));
    }

    public function add()
    {
        $kategori = Kategori::get();
        return view('frontend.v_addDesain', compact('kategori'));
    }

    // Insert Data
    public function insert(Request $request)
    {

        Request()->validate([
            'nama' => 'required',
            // 'kategori_id' => 'required',
            'harga' => 'required',
            'tipe' => 'required',
            'foto_desain' => 'mimes:jpg,jpeg,png|max:2000',
            'tampak_samping_kiri' => 'mimes:jpg,jpeg,png|max:2000',
            'tampak_samping_kanan' => 'mimes:jpg,jpeg,png|max:2000',
            'keterangan' => 'required',
        ], [
            'nama.required' => 'Wajib Diisi',
            // 'kategori_id.required' => 'Pilih Kategori',
            'harga.required' => 'Wajib Diisi',
            'tipe.required' => 'Wajib Diisi',
            'foto_desain.mimes' => 'Harus memiliki format jpg,jpeg,dan png',
            'foto_desain.max' => 'Ukuran foto maksimal 2MB',
            'tampak_samping_kiri.mimes' => 'Harus memiliki format jpg,jpeg,dan png',
            'tampak_samping_kiri.max' => 'Ukuran foto maksimal 2MB',
            'tampak_samping_kanan.mimes' => 'Harus memiliki format jpg,jpeg,dan png',
            'tampak_samping_kanan.max' => 'Ukuran foto maksimal 2MB',
            'keterangan.required' => 'Wajib Diisi',
        ]);

        $file_foto = Request()->foto_desain;
        $file_kiri = Request()->tampak_samping_kiri;
        $file_kanan = Request()->tampak_samping_kanan;
        $fileName_foto = Request()->nama . '.' . $file_foto->extension();
        $fileName_kiri = Request()->nama . '.' . $file_kiri->extension();
        $fileName_kanan = Request()->nama . '.' . $file_kanan->extension();
        $file_foto->move(public_path('foto_desain'), $fileName_foto);
        $file_kiri->move(public_path('tampak_samping_kiri'), $fileName_kiri);
        $file_kanan->move(public_path('tampak_samping_kanan'), $fileName_kanan);

        $data = new Desain;
        $data->nama = $request->nama;
        $data->kategori_id = $request->kategori_id;
        $data->user_id = Auth::user()->id;
        $data->harga = $request->harga;
        $data->tipe = $request->tipe;
        $data->keterangan = $request->keterangan;
        $data->foto_desain = $fileName_foto;
        $data->tampak_samping_kiri = $fileName_kiri;
        $data->tampak_samping_kanan = $fileName_kanan;
        $data->save();

        // $this->Desain->addData($data);
        return redirect()->route('desains')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    // Edit Data
    public function edit($id)
    {
        $desains = Desain::find($id);
        $kategori = Kategori::get();
        return view('backend.desainer.v_editDesain', compact('desains', 'kategori'));
    }

    // Update Data
    public function update(Request $request, $id)
    {
        Request()->validate([
            'nama' => 'required',
            // 'kategori_id' => 'required',
            'harga' => 'required',
            'tipe' => 'required',
            'foto_desain' => 'mimes:jpg,jpeg,png|max:2000',
            'tampak_samping_kiri' => 'mimes:jpg,jpeg,png|max:2000',
            'tampak_samping_kanan' => 'mimes:jpg,jpeg,png|max:2000',
            'keterangan' => 'required',
        ], [
            'nama.required' => 'Wajib Diisi',
            // 'kategori_id.required' => 'Pilih Kategori',
            'harga.required' => 'Wajib Diisi',
            'tipe.required' => 'Wajib Diisi',
            'foto_desain.mimes' => 'Harus memiliki format jpg,jpeg,dan png',
            'foto_desain.max' => ' Ukuran foto maksimal 2MB',
            'tampak_samping_kiri.mimes' => 'Harus memiliki format jpg,jpeg,dan png',
            'tampak_samping_kiri.max' => 'Ukuran foto maksimal 2MB',
            'tampak_samping_kanan.mimes' => 'Harus memiliki format jpg,jpeg,dan png',
            'tampak_samping_kanan.max' => 'Ukuran foto maksimal 2MB',
            'keterangan.required' => 'Wajib Diisi',
        ]);
        $desain = Desain::find($id);
        if (Request()->foto_desain <> "") {
            $file_foto = Request()->foto_desain;
            $file_kiri = Request()->tampak_samping_kiri;
            $file_kanan = Request()->tampak_samping_kanan;
            $fileName_foto = Request()->nama . '.' . $file_foto->extension();
            $fileName_kanan = Request()->nama . '.' . $file_kanan->extension();
            $fileName_kiri = Request()->nama . '.' . $file_kiri->extension();
            $file_foto->move(public_path('foto_desain'), $fileName_foto);
            $file_kiri->move(public_path('tampak_samping_kiri'), $fileName_kiri);
            $file_kanan->move(public_path('tampak_samping_kanan'), $fileName_kanan);

            $desain->nama = $request->nama;
            $desain->tipe = $request->tipe;
            $desain->harga = $request->harga;
            $desain->keterangan = $request->keterangan;
            $desain->foto_desain = $fileName_foto;
            $desain->tampak_samping_kiri = $fileName_kiri;
            $desain->tampak_samping_kanan = $fileName_kanan;
            $desain->save();
        } else {
            $desain->nama = $request->nama;
            $desain->tipe = $request->tipe;
            $desain->harga = $request->harga;
            $desain->keterangan = $request->keterangan;
            $desain->save();
        }
        return redirect('/desains')->with('pesan', 'Data Berhasil Diperbarui');
    }


    public function delete($id)
    {
        // delete desain foto
        $desains = Desain::findOrFail($id);
        if ($desains->foto_desain <> "") {
            unlink(public_path('foto_desain/') . '/' . $desains->foto_desain);
            unlink(public_path('tampak_samping_kiri/') . '/' . $desains->tampak_samping_kiri);
            unlink(public_path('tampak_samping_kanan/') . '/' . $desains->tampak_samping_kanan);
        }
        $desains->delete($id);
        return redirect()->route('desains')->with('pesan', 'Data Berhasil Dihapus');
    }
}
