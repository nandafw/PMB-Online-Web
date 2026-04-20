<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('no_pendaftaran')->unique();

            // Data Pribadi
            $table->string('nama_lengkap');
            $table->string('nik', 16);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->foreignId('agama_id')->constrained('agamas');
            $table->text('alamat');
            $table->foreignId('provinsi_id')->constrained('provinsis');
            $table->foreignId('kabupaten_id')->constrained('kabupatens');
            $table->string('kode_pos', 10);
            $table->string('no_hp', 15);
            $table->string('email');

            // Data Pendidikan
            $table->string('asal_sekolah');
            $table->string('jurusan_sekolah');
            $table->year('tahun_lulus');
            $table->string('nisn', 20)->nullable();

            // Pilihan Program Studi
            $table->string('prodi_pilihan_1');
            $table->string('prodi_pilihan_2')->nullable();

            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->text('catatan_admin')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
