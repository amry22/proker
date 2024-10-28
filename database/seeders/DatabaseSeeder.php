<?php

namespace Database\Seeders;

use App\Models\DataDepartment;
use App\Models\DataDivision;
use App\Models\ItemBudgetSource;
use App\Models\ItemRole;
use App\Models\ItemTarget;
use App\Models\ItemTargetList;
use App\Models\ItemTimeline;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        ItemRole::insert([
            [
                'name' => 'Admin'
            ],
            [
                'name' => 'Ketum'
            ],
            [
                'name' => 'Kabid'
            ],
            [
                'name' => 'Kadep'
            ],
            [
                'name' => 'Staff'
            ]
        ]);
        
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@hidayatullah.app',
            'password' => bcrypt('admin'),
            'role_id' => '1',
        ]);

        DataDivision::insert([
            [
                'name' => 'Bidang Tarbiyah',
                'name_as' => 'Tarbiyah'
            ],
            [
                'name' => 'Bidang Dakwah dan Pelayanan Ummat',
                'name_as' => 'Yanmat',
            ],
            [
                'name' => 'Bidang Pembinaan dan Pengembangan Organisasi',
                'name_as' => 'PPO',
            ],
            [
                'name' => 'Bidang Perekonomian',
                'name_as' => 'Perekonomian',
            ],
            [
                'name' => 'Kesekretariatan',
                'name_as' => 'Kesekretariatan',
            ],
            [
                'name' => 'Kebendaharaan',
                'name_as' => 'Kebendaharaan',
            ]
        ]);

        DataDepartment::insert([
            [
                'division_id' => '1',
                'name' => 'Departemen Perkaderan'
            ],
            [
                'division_id' => '1',
                'name' => 'Departemen Pendidikan Dasar dan Menengah'
            ],
            [
                'division_id' => '1',
                'name' => 'Departemen Pendidikan Tinggi dan Litbang'
            ],
            [
                'division_id' => '1',
                'name' => 'Departemen Kepesantrenan'
            ],
            [
                'division_id' => '1',
                'name' => 'Departemen Pembinaan Keluarga dan PAUD'
            ],
            [
                'division_id' => '2',
                'name' => 'Departemen Komunikasi dan Penyiaran'
            ],
            [
                'division_id' => '2',
                'name' => 'Departemen Rekrutmen dan Pembinaan Anggota'
            ],
            [
                'division_id' => '2',
                'name' => 'Departemen Kesehatan'
            ],
            [
                'division_id' => '2',
                'name' => 'Departemen Sosial'
            ],
            [
                'division_id' => '3',
                'name' => 'Departemen Organisasi'
            ],
            [
                'division_id' => '3',
                'name' => 'Departemen Sumber Daya Insani'
            ],
            [
                'division_id' => '3',
                'name' => 'Departemen Hubungan Antar Bangsa'
            ],
            [
                'division_id' => '3',
                'name' => 'Departemen Hubungan Antar Lembaga'
            ],
            [
                'division_id' => '3',
                'name' => 'Departemen Hukum'
            ],
            [
                'division_id' => '3',
                'name' => 'Hidayatullah Institute'
            ],
            [
                'division_id' => '4',
                'name' => 'Departemen Ekonomi Kelembagaan/BUMO'
            ],
            [
                'division_id' => '4',
                'name' => 'Departemen Keuangan'
            ],
            [
                'division_id' => '4',
                'name' => 'Departemen Ekonomi Keumatan'
            ],
            [
                'division_id' => '5',
                'name' => 'Wakil Sekretaris Jenderal I'
            ],
            [
                'division_id' => '5',
                'name' => 'Wakil Sekretaris Jenderal II'
            ],
            [
                'division_id' => '5',
                'name' => 'Kepala Biro Humas'
            ],
            [
                'division_id' => '5',
                'name' => 'Badan Pengamanan Hidayatullah'
            ],
            [
                'division_id' => '6',
                'name' => 'Wakil Bendahara Umum'
            ],
            [
                'division_id' => '6',
                'name' => 'Badan Pengumpul Keuangan Organisasi'
            ],
        ]);

        

        User::insert([
            ['name' => "Dr. Nashirul Haq, Lc.,M.A",'email' => 'ketum@hidayatullah.app','email_verified_at' => NULL,'password' => bcrypt('1234'),'role_id' => '2','division_id' => '1','department_id' => NULL,'remember_token' => NULL,'created_at' => '2024-10-11 17:41:14','updated_at' => '2024-10-11 17:41:14'],
            ['name' => "Ir. Abu A’la Abdullah, M.HI",'email' => 'tarbiyah@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$oKSC.rGcqWUeOxbX1OJNA./9ypDVeCb1tYDy91TLzv1aaHX/Qz20W','role_id' => '3','division_id' => '1','department_id' => NULL,'remember_token' => NULL,'created_at' => '2024-10-11 17:41:14','updated_at' => '2024-10-11 17:41:14'],
            ['name' => 'Drs. Nursyamsa Hadis','email' => 'yanmat@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$LXO0bvgZMaIltT6UU.rO..9mgFb9Uuec63jfdYDPd6BYWNYku1bUa','role_id' => '3','division_id' => '2','department_id' => NULL,'remember_token' => 'qZMtTW1Re7SG2LwVjlQKsT9JSEX7thkqkoEhTAD6FEjDfjuKynSv7tZb00g5','created_at' => '2024-10-11 17:41:36','updated_at' => '2024-10-11 17:41:36'],
            ['name' => 'Asih Subagyo, S.Kom','email' => 'ppo@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$MVeW.zxjPEyral.iS5j6ZetSeOqaqfKRdBzjcCkekIgjET6BWtSz.','role_id' => '3','division_id' => '3','department_id' => NULL,'remember_token' => NULL,'created_at' => '2024-10-11 17:42:01','updated_at' => '2024-10-11 17:42:01'],
            ['name' => 'Drs. Wahyu Rahman, MM','email' => 'ekonomi@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$PKQ/I3sWpTkOppMhVIdKIuuuQsd0J9ur.MoyAh/aW35UL/l.DOCIO','role_id' => '3','division_id' => '4','department_id' => NULL,'remember_token' => NULL,'created_at' => '2024-10-11 17:42:44','updated_at' => '2024-10-11 17:42:44'],
            ['name' => 'Ir. Candra Kurnianto','email' => 'sekjend@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$rpWD1TNC1Vn5tRE9vaS5EuhluNY9eBiGjk4AWTCU002MGlqrBt55O','role_id' => '3','division_id' => '5','department_id' => NULL,'remember_token' => NULL,'created_at' => '2024-10-11 17:43:11','updated_at' => '2024-10-11 17:43:11'],
            ['name' => 'Marwan Mujahidin, SE, M.Sust','email' => 'bendum@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$s7lExskwnUAnJlJ4PU1MMOWusbdfB6Ceb0lCwEejyktUxZEjQ3/1W','role_id' => '3','division_id' => '6','department_id' => NULL,'remember_token' => NULL,'created_at' => '2024-10-11 17:43:37','updated_at' => '2024-10-11 17:43:37'],
            ['name' => 'Muhammad Shaleh Utsman S.S, M.I.Kom','email' => 'perkaderan@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$RlpwI9bT1rGuDC6LvRUadOHEIUL.Z2S37eEAcWhCyvzgIfz32JoeK','role_id' => '4','division_id' => '1','department_id' => '1','remember_token' => NULL,'created_at' => '2024-10-11 17:44:07','updated_at' => '2024-10-11 17:44:07'],
            ['name' => 'Dr. Nanang Noerpatria, M.Pd.I','email' => 'dikdasmen@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$Bp.W.XcX3fy8VNTbqbNOOeMzhSnFGh3n6By5TTPELapUmFkMkuKQK','role_id' => '4','division_id' => '1','department_id' => '2','remember_token' => NULL,'created_at' => '2024-10-11 17:44:36','updated_at' => '2024-10-11 17:44:36'],
            ['name' => 'Miftahuddin, M.Pd','email' => 'dikti@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$/258rplC0FVNJMxh7A1R4eGkBhSgGwTd5YuOAQ3CXNv4d1j8MPg5.','role_id' => '4','division_id' => '1','department_id' => '3','remember_token' => NULL,'created_at' => '2024-10-11 17:45:06','updated_at' => '2024-10-11 17:45:06'],
            ['name' => 'Muh. Syakir Syafii','email' => 'pesantren@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$NlXmd.POlsaK/84oORtjduRZxNGQ/e78Vyr78piu6zcK5fWYclShm','role_id' => '4','division_id' => '1','department_id' => '4','remember_token' => NULL,'created_at' => '2024-10-11 17:45:30','updated_at' => '2024-10-11 17:45:30'],
            ['name' => 'Drs. Endang Abdurrahman','email' => 'pkpaud@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$Xa9SU3BDnPp8M3eCLFeCaO0xS7K1SSfghSEevBpA8J5JvD/r4LXwu','role_id' => '4','division_id' => '1','department_id' => '5','remember_token' => NULL,'created_at' => '2024-10-11 17:46:06','updated_at' => '2024-10-11 17:46:06'],
            ['name' => 'Drs. Shohibul Anwar, M.H.I','email' => 'dkp@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$eRc.OShf6lyoWrTt2CsgN.U4C9pKZgxJQZRzPYN9NVu.lxy41Zu/y','role_id' => '4','division_id' => '2','department_id' => '6','remember_token' => NULL,'created_at' => '2024-10-11 17:46:42','updated_at' => '2024-10-11 17:46:42'],
            ['name' => 'Iwan Abdullah, M.Si','email' => 'rpa@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$g2wVP545jklG5qpFyhGOxOU4OFYkpiTZ4Lib0xiYfsyN9entbdxua','role_id' => '4','division_id' => '2','department_id' => '7','remember_token' => NULL,'created_at' => '2024-10-11 17:47:13','updated_at' => '2024-10-11 17:47:13'],
            ['name' => 'Imron Faizin, SE','email' => 'kesehatan@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$uXuk10alxFM0pQqwftSu..bIP.Sl3CGvqxcSbkyTsWyfrJhRtipKO','role_id' => '4','division_id' => '2','department_id' => '8','remember_token' => NULL,'created_at' => '2024-10-11 17:47:44','updated_at' => '2024-10-11 17:47:44'],
            ['name' => 'Musliadi Raja, S.Th.I','email' => 'sosial@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$LujeM0Kzo8EnQWfRgt59wedkMxuu5oNDR0lDAihRO./Tz1wkl1Bd6','role_id' => '4','division_id' => '2','department_id' => '9','remember_token' => NULL,'created_at' => '2024-10-11 17:48:13','updated_at' => '2024-10-11 17:48:13'],
            ['name' => 'Samsuddin, MM','email' => 'organisasi@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$5fCHyLTxAYWVOLtXGUjOBOdy2qYti6GNFl8EGMiTf3GxUcj9abizK','role_id' => '4','division_id' => '3','department_id' => '10','remember_token' => NULL,'created_at' => '2024-10-11 17:48:44','updated_at' => '2024-10-11 17:48:44'],
            ['name' => 'Dr. Muh. Arfan AU','email' => 'sdi@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$5WRQr1PTBJGkncSJfx/oDOdKUgrCxHMlvnaG1fnCA8AsNoW.FbnqK','role_id' => '4','division_id' => '3','department_id' => '11','remember_token' => NULL,'created_at' => '2024-10-11 17:49:21','updated_at' => '2024-10-11 17:49:21'],
            ['name' => 'Dzikrullah W. Pramudya','email' => 'hab@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$pWABUdaVacP2ZEGqrSPIquoJpGOB6kacgYC.Bm1YGkHneKQKmYPWm','role_id' => '4','division_id' => '3','department_id' => '12','remember_token' => NULL,'created_at' => '2024-10-11 17:49:48','updated_at' => '2024-10-11 17:49:48'],
            ['name' => 'Syaefullah Hamid, SH, MH','email' => 'hal@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$LUdGPHXGM9JTp8.nb1RPQuSiHRhcLNp3RY3xo7jZzZwNkO7RrukrO','role_id' => '4','division_id' => '3','department_id' => '13','remember_token' => NULL,'created_at' => '2024-10-11 17:50:12','updated_at' => '2024-10-11 17:50:12'],
            ['name' => 'Dr. Dudung A. Abdullah, M.H','email' => 'hukum@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$qImNkV1vPTuJo6ObalU93OlfdLPml0vDouo9wvX4qEsdEAQnDu6Eu','role_id' => '4','division_id' => '3','department_id' => '14','remember_token' => NULL,'created_at' => '2024-10-11 17:50:38','updated_at' => '2024-10-11 17:50:38'],
            ['name' => 'Muzakkir Usman, Ph.D','email' => 'hi@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$9srLIf6nA11JFUwfTh7Ta.In916m/DaJA.mbmxkjfbKx3uklk6OmK','role_id' => '4','division_id' => '3','department_id' => '15','remember_token' => NULL,'created_at' => '2024-10-11 17:51:00','updated_at' => '2024-10-11 17:51:00'],
            ['name' => 'Miftahurrahman','email' => 'bumo@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$tVDmZtdLSqsPsW4iVl6BVOEtsog8KDIBiBNmJCrX7iyIkv1lOFG5C','role_id' => '4','division_id' => '4','department_id' => '16','remember_token' => NULL,'created_at' => '2024-10-11 17:51:26','updated_at' => '2024-10-11 17:51:26'],
            ['name' => 'Saiful Anwar, SE, M.E','email' => 'keuangan@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$otZ00lnCGhW9qoxqJ.8XEuvVKYr0oidcKxvoavc/o40F00UDJXWee','role_id' => '4','division_id' => '4','department_id' => '17','remember_token' => NULL,'created_at' => '2024-10-11 17:51:50','updated_at' => '2024-10-11 17:51:50'],
            ['name' => 'Ruhyadi','email' => 'keumatan@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$KerCIWMEzK1Q/HPywrt.Buh1eoSSebEiEn1XlWUP.jtW/QIdihs3W','role_id' => '4','division_id' => '4','department_id' => '18','remember_token' => NULL,'created_at' => '2024-10-11 17:52:21','updated_at' => '2024-10-11 17:52:21'],
            ['name' => 'Dr. Abdul Ghaffar Hadi, S.Pd.I, M.Pd.I','email' => 'wasekjend1@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$qYknseH6XL.VqsQjWRG/fOEQC8DVtd9ypPR5zq4eFeO2MyECZ1s6O','role_id' => '4','division_id' => '5','department_id' => '19','remember_token' => 'IwMxSMxpX6Fph98CWfBENovaSOzBNTwd4JPSEwYouN63LLn0VGO1UcihnfsE','created_at' => '2024-10-11 17:52:48','updated_at' => '2024-10-11 17:52:48'],
            ['name' => 'Iwan Ruswanda, M.Pd.I','email' => 'wasekjend2@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$vVEh.0q9xhzlqm/InYFcGuAloJP4qA5Wl.8J1WC3My/Lcz.kwSzra','role_id' => '4','division_id' => '5','department_id' => '20','remember_token' => NULL,'created_at' => '2024-10-11 17:53:15','updated_at' => '2024-10-11 17:53:15'],
            ['name' => 'Ir. Mahladi Murni','email' => 'humas@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$3.Wrffd/LXHgMRAXZwKX1OSbAr2LL/ckYrFZNYar.tAaNSG5DD0Ky','role_id' => '4','division_id' => '5','department_id' => '21','remember_token' => NULL,'created_at' => '2024-10-11 17:53:43','updated_at' => '2024-10-11 17:53:43'],
            ['name' => 'Ir. Musafir','email' => 'bph@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$EBewcfiLIUfdHeaWwELp5OM3VQJrdjR2KAzNzo5cgMiEjopbPXySq','role_id' => '4','division_id' => '5','department_id' => '22','remember_token' => NULL,'created_at' => '2024-10-11 17:54:11','updated_at' => '2024-10-11 17:54:11'],
            ['name' => 'Drs. Aghis Mahruri','email' => 'bendahara@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$C6FUyhkYo/GYOsCtWfygqOcrvSU8Znr49.pRX4EhKs4Fy45BzvwQG','role_id' => '4','division_id' => '6','department_id' => '23','remember_token' => NULL,'created_at' => '2024-10-11 17:54:58','updated_at' => '2024-10-11 17:54:58'],
            ['name' => 'Islah','email' => 'pko@hidayatullah.app','email_verified_at' => NULL,'password' => '$2y$12$XAIKYLZG9olEX9J1f2sil.ABdzEP3BkFQgDa4wF80OZbfqCIJX3Jy','role_id' => '4','division_id' => '6','department_id' => '24','remember_token' => NULL,'created_at' => '2024-10-11 17:55:23','updated_at' => '2024-10-11 17:55:23']
        ]);

        


        ItemTimeline::insert([
           
            [
                'name' => 'Januari'
            ],
            [
                'name' => 'Februari'
            ],
            [
                'name' => 'Maret'
            ],
            [
                'name' => 'April'
            ],
            [
                'name' => 'Mei'
            ],
            [
                'name' => 'Juni'
            ],
            [
                'name' => 'Juli'
            ],
            [
                'name' => 'Agustus'
            ],
            [
                'name' => 'September'
            ],
            [
                'name' => 'Oktober'
            ],
            [
                'name' => 'November'
            ],
            [
                'name' => 'Desember'
            ], 
            [
                'name' => 'Isidentil'
            ],
        ]);

        ItemTarget::insert([
            [
                'name' => 'DPW'
            ],
            [
                'name' => 'KI/KU'
            ],
            [
                'name' => 'Orpen'
            ],
            [
                'name' => 'Badan dan Amal Usaha'
            ],
            [
                'name' => 'PDH'
            ],
            [
                'name' => 'Lainnya'
            ],
        ]);

        ItemTargetList::insert([
                ['name' => 'Aceh', 'target_id' => '1'],
                ['name' => 'Sumatera Utara', 'target_id' => '1'],
                ['name' => 'Sumatera Barat', 'target_id' => '1'],
                ['name' => 'Riau', 'target_id' => '1'],
                ['name' => 'Jambi', 'target_id' => '1'],
                ['name' => 'Sumatera Selatan', 'target_id' => '1'],
                ['name' => 'Bengkulu', 'target_id' => '1'],
                ['name' => 'Lampung', 'target_id' => '1'],
                ['name' => 'Kepulauan Bangka Belitung', 'target_id' => '1'],
                ['name' => 'Kepulauan Riau', 'target_id' => '1'],
                ['name' => 'Daerah Khusus Ibukota Jakarta', 'target_id' => '1'],
                ['name' => 'Jawa Barat', 'target_id' => '1'],
                ['name' => 'Jawa Tengah', 'target_id' => '1'],
                ['name' => 'Daerah Istimewa Yogyakarta', 'target_id' => '1'],
                ['name' => 'Jawa Timur', 'target_id' => '1'],
                ['name' => 'Banten', 'target_id' => '1'],
                ['name' => 'Bali', 'target_id' => '1'],
                ['name' => 'Nusa Tenggara Barat', 'target_id' => '1'],
                ['name' => 'Nusa Tenggara Timur', 'target_id' => '1'],
                ['name' => 'Kalimantan Barat', 'target_id' => '1'],
                ['name' => 'Kalimantan Tengah', 'target_id' => '1'],
                ['name' => 'Kalimantan Selatan', 'target_id' => '1'],
                ['name' => 'Kalimantan Timur', 'target_id' => '1'],
                ['name' => 'Kalimantan Utara', 'target_id' => '1'],
                ['name' => 'Sulawesi Utara', 'target_id' => '1'],
                ['name' => 'Sulawesi Tengah', 'target_id' => '1'],
                ['name' => 'Sulawesi Selatan', 'target_id' => '1'],
                ['name' => 'Sulawesi Tenggara', 'target_id' => '1'],
                ['name' => 'Gorontalo', 'target_id' => '1'],
                ['name' => 'Sulawesi Barat', 'target_id' => '1'],
                ['name' => 'Maluku', 'target_id' => '1'],
                ['name' => 'Maluku Utara', 'target_id' => '1'],
                ['name' => 'Papua', 'target_id' => '1'],
                ['name' => 'Papua Barat', 'target_id' => '1'],
                ['name' => 'Papua Selatan', 'target_id' => '1'],
                ['name' => 'Papua Tengah', 'target_id' => '1'],
                ['name' => 'Papua Pegunungan', 'target_id' => '1'],
                ['name' => 'Papua Barat Daya', 'target_id' => '1'],
                ['name' => 'Kampus Induk Gutem', 'target_id' => '2'],
                ['name' => 'Kampus Utama Medan', 'target_id' => '2'],
                ['name' => 'Kampus Utama Batam', 'target_id' => '2'],
                ['name' => 'Kampus Utama Depok', 'target_id' => '2'],
                ['name' => 'Kampus Utama Surabaya', 'target_id' => '2'],
                ['name' => 'Kampus Utama Samarinda', 'target_id' => '2'],
                ['name' => 'Kampus Utama Makassar', 'target_id' => '2'],
                ['name' => 'Kampus Utama Timika', 'target_id' => '2'],
                ['name' => 'Pemuda Hidayatullah', 'target_id' => '3'],
                ['name' => 'Muslimat Hidayatullah', 'target_id' => '3'],
                ['name' => 'BMH', 'target_id' => '4'],
                ['name' => 'SAR', 'target_id' => '4'],
                ['name' => 'LBH Hidayatullah', 'target_id' => '4'],
                ['name' => 'LPH Hidayatullah', 'target_id' => '4'],
                ['name' => 'SAI', 'target_id' => '4'],
                ['name' => 'Baitul Wakaf', 'target_id' => '4'],
                ['name' => 'LSH Hidayatullah', 'target_id' => '4'],
                ['name' => "Pos Da'I", 'target_id' => '4'],
                ['name' => 'TASK', 'target_id' => '4'],
                ['name' => 'IMS', 'target_id' => '4'],
                ['name' => 'Baitul Tanwil Hidayatullah', 'target_id' => '4'],
                ['name' => 'PDH', 'target_id' => '5']
        ]);
        
        
        ItemBudgetSource::insert([
            [
                'name' => 'APBO'
            ],
            [
                'name' => 'DPW'
            ],
            [
                'name' => 'DPD'
            ],
            [
                'name' => 'Badan dan Amal Usaha'
            ],
            [
                'name' => 'KI/KU'
            ],
            [
                'name' => 'Wisma'
            ],
            [
                'name' => 'Sponsor'
            ],
            [
                'name' => 'Lainnya'
            ],
        ]);
    }
}
