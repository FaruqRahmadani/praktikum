<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class SendEmailKelasBatal implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $NPM;
    public $namamahasiswa;
    public $email;
    public $namamateri;
    public $namadosen;
    public $namakelas;
    public $pertemuan;
    public $tanggal;
    public $pesan;

    /**
     * Create a new job instance.
     *
     * @return void
     */
     //NPM, nama, email, nama materi, nama dosen, nama kelas, pertemuan, tanggal, pesan
    public function __construct($NPM,$namamahasiswa,$email,$namamateri,$namadosen,$namakelas,$pertemuan,$tanggal,$pesan)
    {
        //
        $this->NPM = $NPM;
        $this->namamahasiswa = $namamahasiswa;
        $this->email = $email;
        $this->namamateri = $namamateri;
        $this->namadosen = $namadosen;
        $this->namakelas = $namakelas;
        $this->pertemuan = $pertemuan;
        $this->tanggal = $tanggal;
        $this->pesan = $pesan;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $to   = $this->email;
      $nama = $this->namamahasiswa;
      $data = array($this->namamahasiswa,$this->namamateri,$this->namakelas,$this->namadosen,$this->pertemuan,$this->tanggal,$this->pesan);
        //
        Mail::send('email.KelasBatal', ['data' => $data], function ($mail) use ($to,$nama)
        {
          // Email dikirimkan ke address "momo@deviluke.com"
          // dengan nama penerima "Momo Velia Deviluke"
          $mail->to($to, $nama);

          // Copy carbon dikirimkan ke address "haruna@sairenji"
          // dengan nama penerima "Haruna Sairenji"
          // $mail->cc('faruq.rahmadani@gmail.com', 'Faruq Rahmadani');

          $mail->subject('Praktikum FTI UNISKA : Perubahan Status Kelas');
        });
    }
}
