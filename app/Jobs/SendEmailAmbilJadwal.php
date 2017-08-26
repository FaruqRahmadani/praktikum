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

class SendEmailAmbilJadwal implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $idmahasiswa;
    public $idjadwaldosen;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($idmahasiswa, array $idjadwaldosen)
    {
        //
        $this->idmahasiswa = $idmahasiswa;
        $this->idjadwaldosen = $idjadwaldosen;

        // $data['1'] = Mahasiswa::find($this->idmahasiswa);
        // for ($i=1; $i <= count($this->idjadwaldosen) ; $i++) {
        //   $data['2'] = JadwalPraktikum::find($this->idjadwaldosen);
        // }
        // $jadwaldosen = JadwalDosen::find($data['2']->first()->id_jadwal_dosen);
        // $data['3'] = Materi::find($jadwaldosen->id_praktikum);
        // $data['4'] = Dosen::find($jadwaldosen->id_dosen);
        // $test = array(
        //   'mahasiswa' => $data['1'],
        // );
        // dd($test['mahasiswa']->nama);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data['1'] = Mahasiswa::find($this->idmahasiswa);
        for ($i=1; $i <= count($this->idjadwaldosen) ; $i++) {
          $data['2'] = JadwalPraktikum::find($this->idjadwaldosen);
        }
        $jadwaldosen = JadwalDosen::find($data['2']->first()->id_jadwal_dosen);
        $data['3'] = Materi::find($jadwaldosen->id_praktikum);
        $data['4'] = Dosen::find($jadwaldosen->id_dosen);

        //
        $to   = $data['1']->email;
        $nama = $data['1']->nama;
          //
          Mail::send('email.AmbilJadwal', ['data' => $data], function ($mail) use ($to,$nama)
          {
            // Email dikirimkan ke address "momo@deviluke.com"
            // dengan nama penerima "Momo Velia Deviluke"
            $mail->to($to, $nama);

            // Copy carbon dikirimkan ke address "haruna@sairenji"
            // dengan nama penerima "Haruna Sairenji"
            // $mail->cc('faruq.rahmadani@gmail.com', 'Faruq Rahmadani');

            $mail->subject('Praktikum FTI UNISKA : Ambil Jadwal');
          });
    }
}
