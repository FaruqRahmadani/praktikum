<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mahasiswa;
use App\JadwalPraktikum;
use App\JadwalDosen;
use App\Materi;
use App\Dosen;
use Mail;

class SendEmailReminderKelas implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $idmahasiswa;
    public $idjadwal;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($idmahasiswa, $idjadwal)
    {
        //
        $this->idmahasiswa = $idmahasiswa;
        $this->idjadwal = $idjadwal;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $data['1'] = Mahasiswa::find($this->idmahasiswa);
        $data['2'] = JadwalPraktikum::find($this->idjadwal);
        $jadwaldosen = JadwalDosen::find($data['2']->first()->id_jadwal_dosen);
        $data['3'] = Materi::find($jadwaldosen->id_praktikum);
        $data['4'] = Dosen::find($jadwaldosen->id_dosen);

        //
        $to   = 'faruq.rahmadani@gmail.com';
        $nama = 'asd';
          //
          Mail::send('email.ReminderKelas', ['data' => $data], function ($mail) use ($to,$nama)
          {
            // Email dikirimkan ke address "momo@deviluke.com"
            // dengan nama penerima "Momo Velia Deviluke"
            $mail->to($to, $nama);

            // Copy carbon dikirimkan ke address "haruna@sairenji"
            // dengan nama penerima "Haruna Sairenji"
            // $mail->cc('faruq.rahmadani@gmail.com', 'Faruq Rahmadani');

            $mail->subject('Praktikum FTI UNISKA : Reminder Kelas');
          });
    }
}
