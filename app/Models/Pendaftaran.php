<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $fillable = [
        'user_id', 'no_pendaftaran', 'nama_lengkap', 'nik', 'jenis_kelamin',
        'tempat_lahir', 'tanggal_lahir', 'agama_id', 'alamat', 'provinsi_id',
        'kabupaten_id', 'kode_pos', 'no_hp', 'email', 'asal_sekolah',
        'jurusan_sekolah', 'tahun_lulus', 'nisn', 'prodi_pilihan_1',
        'prodi_pilihan_2', 'status', 'catatan_admin',
    ];

    public function user()      
    { 
        return $this->belongsTo(User::class); 
    }

    public function provinsi()  
    { 
        return $this->belongsTo(Provinsi::class); 
    }

    public function kabupaten() 
    { 
        return $this->belongsTo(Kabupaten::class); 
    }

    public function agama()     
    { 
        return $this->belongsTo(Agama::class); 
    }
}
