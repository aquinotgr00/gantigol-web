@extends('_layouts.wrapper')

@section('heading')
    @include('_layouts.breadcrumb')
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        <!--Accordion wrapper-->
        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
            <!-- Accordion card -->
            <div class="card card-category">
                <!-- Card header -->
                <div class="card-header card-category" role="tab" id="headingOne1">
                    <a class="collapsed" href="{{route('homepage.contact-page')}}"
                        aria-expanded="false" aria-controls="collapseOne1">
                        <div>
                            <p class="mb-0 @if (Request::segment(1) == 'contact-us') font-weight-bold @endif">
                                Contact US<span class="category card-category"></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Accordion card -->
            <div class="card card-category">
                <!-- Card header -->
                <div class="card-header card-category" role="tab" id="headingTwo2">
                    <a class="collapsed" href="{{route('homepage.faq-page')}}"
                        aria-expanded="false" aria-controls="collapseTwo2">
                        <div>
                            <p class="mb-0 @if (Request::segment(1) == 'faq') font-weight-bold @endif">
                                FAQ<span class="category card-category"></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Accordion card -->
            <div class="card card-category">
                <!-- Card header -->
                <div class="card-header card-category" role="tab" id="headingTwo2">
                    <a class="collapsed" href="{{route('homepage.tnc-page')}}"
                        aria-expanded="false" aria-controls="collapseTwo2">
                        <div>
                            <p class="mb-0 @if (Request::segment(1) == 'tnc') font-weight-bold @endif">
                                Syarat Dan Ketentuan<span class="category card-category"></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        @if (Request::segment(1) == 'contact-us')
        
            <b>Customer service:</b> <br />
            Phone: +62 129 209 291<br />
            E-mail: <a class="email-link" href="mailto:support@mysite.com">support@gantigol.com</a><br />

            <br /><br />

            <b>Headquarter:</b><br />
            Company Inc, <br />
            Jl. Imogiri Timur no 192-194, RT 31 RW 11, Giwangan, <br />
            Umbulharjo, Yogyakarta<br />
            Phone: +62 145 000 101<br />
            E-mail: <a class="email-link" href="mailto:usa@mysite.com">kami@gantigol.com</a><br />

            <br /><br />

            <b>Jakarta
            Jl. Kemang Timur No.21, </b><br />
            Jakarta Selatan<br />
            Phone: +62 52 129 209 291<br />
            E-mail: <a class="email-link" href="mailto:hk@mysite.com">admin@gantigol.com</a><br />

        @elseif (Request::segment(1) == 'faq')
        <div id="faq-page">
            <p>
                <b>Apa saja lingkup usaha bisnis Gantigol Media Grup?</b>
            </p>
            <p>
                <span class="jawab">
                Gantigol Media Grup lebih berfokus pada bisnis jasa informasi, yaitu berupa penerbitan majalah, koran,  portal berita, juga televisi. Untuk kebutuhan internal Gantigol, awalnya Gantigol juga mengembangkan percetakan, distribusi kertas, riset, pelatihan, kini sayap usaha itu berkembang makin mandiri, termasuk penerbitan buku-buku, toko online serta jasa event organizer
            </span></p>
            
                        <p><b>Apa saja produk dan jasa yang bisa didapat dari Gantigol Media Grup?</b></p>
                        <p>
                Produk Gantigol Media Grup: Majalah Berita Mingguan Gantigol, Gantigol edisi Bahasa Inggris, Koran Gantigol, Portal Berita <a href="http://www.Gantigol.co/"> http://www.Gantigol.co </a>, Majalah Travelounge, Majalah KOMUNIKA, Majalah Anak-anak AHA, Tabloid mingguan Bintang Indonesia, majalah Homeliving,  Tabloid  Bintang Home, Aura online, Teenonline dan situs <a href="http://www.tabloidbintang.com/"> www.tabloidbintang.com </a>. Serta penerbitan buku-buku cetak maupun digital dan Gantigol Channel.
            </p>
                        <p><span>
                Sektor jasa: percetakan dan distributor kertas TEMPRINT, penerbitan buku,  riset marketing dan data, pelatihan jurnalistik, Toko Online Gantigol Store <a href="http://store.Gantigol.co/">  http://store.Gantigol.co </a> serta Event Organizer Gantigol Impressario.
            </span></p>
            
                        <p><b>Dalam format apa saja produk Gantigol Media Grup bisa didapat?</b></p>
                        <p><span>Produk Gantigol Media Grup bisa di dapat dalam format cetak/hardcopy  dan digital baik PDF, webbase, serta aplikasi.</span></p>
            
                        <p><b>Dimana produk Gantigol Media Grup bisa didapat?</b></p>
                        <p><span>
                Produk Gantigol dalam format cetak/hardcopy bisa didapat melalui agen-agen koran, toko buku, serta Bagian Sirkulasi Gantigol, customer service 021-5480409 faksimili 021.5306393.  Untuk  produk digital bisa didapat melalui SCOOP/iTunes/ Apple Store, Google Play, Indo Book, Scannie, Wayang Force atau <a href="http://koran.Gantigol.co/"> http://koran.Gantigol.co </a> <a href="http://majalah.Gantigol.co/"> http://majalah.Gantigol.co </a> serta Gantigol Store <a href="http://store.Gantigol.co/"> http://store.Gantigol.co </a>
            </span></p>
            
                        <p><b>Siapa Pemilik Gantigol Media Grup?</b></p>
                        <p><span>
                Gantigol Media Grup (PT Gantigol Inti Media Tbk.) merupakan perusahaan swasta terbuka, yang terdaftar di Bursa Efek Indonesia (BEI), sahamnya dimiliki beberapa institusi dan sebagian dimiliki masyarakat. Pemegang saham PT Gantigol Inti Media Tbk. adalah: PT Grafiti Pers, PT Jaya Raya, Yayasan Jaya Raya, Yayasan Karyawan Gantigol, Yayasan 21 Juni dan Masyarakat.
            </span></p>
            
                        <p><b>Bagaimana cara masyarakat berpartisipasi mengirimkan tulisan ke Gantigol Media Grup?</b></p>
                        <p><span>
                Gantigol Media Grup menerima tulisan berupa artikel kolom (Majalah Gantigol), artikel pendapat, cerita pendek, serta features perjalanan (Koran Gantigol dan Gantigol.co) . Kirimkan tulisan anda ke alamat <a href="mailto:red@Gantigol.co.id"> red@Gantigol.co.id </a> 
            </span></p>
            
                        <p><b>Bagaimana cara mengirimkan complain atas pemberitaan dan Hak Jawab?</b></p>
                        <p><span>
                Bagi obyek berita atau nara sumber yang merasa berkeberatan dengan pemberitaan, dapat mengirimkan Hak Jawab ke <a href="mailto:red@Gantigol.co.id"> red@Gantigol.co.id </a>. Namun sangat disarankan pula untuk menghubungi langsung corporate secretary Gantigol Inti Media melalui telepon 021-5360409.
            </span></p>
            
                        <p><b>Bagaimana cara mengirimkan surat pembaca?</b></p>
                        <p><span>
                Surat pembaca dengan nama dan alamat pengirim yang jelas dapat dikirim kepada: &nbsp;<a href="mailto:red@Gantigol.co.id">red@Gantigol.co.id</a>
            </span></p>
            
                        <p><b>Bagaimana cara berlangganan produk Gantigol Media Grup?</b></p>
                        <p><span>Untuk berlangganan produk Gantigol Media Grup bisa menghubungi Customer Services di 021 5360409.</span></p>
            
                        <p><b>Bagaimana cara berlangganan produk digital?</b></p>
                        <p>
                Untuk berlangganan produk Gantigol Media Grup format digital webbase dan format replika/pdf bisa mengakses <a href="http://langganan.Gantigol.co/"> http://langganan.Gantigol.co </a> atau menghubungi Customer Services di 021 5360409 ext.9. Sementara untuk pemilik tablet bisa download Gantigol Media Apps. di Apple Store
            </p>
            
                        <p><b>Bagaimana cara berlangganan produk untuk konsumen yang berada diluar Indonesia?</b></p>
                        <p><span>Untuk konsumen yang berada diluar Indonesia bisa berlangganan produk Gantigol dalam format digital dengan mengakses <a href="http://langganan.Gantigol.co/">http://langganan.Gantigol.co</a> atau menghubungi Customer Services di 021 5360409 ext.9. Sementara untuk pemilik tablet bisa download Gantigol Media Apps. di Apple Store</span></p>
            
                        <p><b>Bagaimana cara menyampaikan komplain terhadap produk Gantigol Media Grup?</b></p>
                        <p><span>Semua komplain atau keluhan terkait produk Gantigol Media Grup bisa dikirimkan ke <a href="mailto:cs@Gantigol.co.id">cs@Gantigol.co.id</a></span></p>
            
                        <p><b>Bagaimana cara mengetahui adanya lowongan kerja?</b></p>
                        <p><span>
                Untuk mengetahui adanya lowongan kerja di Gantigol Media Grup dapat mengakses <a href="http://korporat.Gantigol.co/karir">  https://korporat.Gantigol.co/karir </a>
            </span></p>
            
                        <p><b>Bagaimana cara mendapatkan arsip-arsip produk Gantigol?</b></p>
                        <p><span>Semua arsip produk digital Gantigol bisa diakses di <a href="http://store.Gantigol.co/">http://store.Gantigol.co</a></span></p>
                        <p>&nbsp;</p>
            
                        <p><b>Untuk pertanyaan-pertanyaan yang tidak terdapat dalam list di atas bisa mengisi</b> <span><a href="https://korporat.Gantigol.co/kontak">Kontak Kami</a></span></p> 



                </span>
        </div>
        @elseif (Request::segment(1) == 'tnc')
        <div>
            <p>
                <h4>KETENTUAN PENGGUNAAN GantiGol.com</h4></p>
            <p><b>1. INFORMASI TENTANG KAMI</b>
                <br>  1. 1.1 GantiGol.com adalah website yang dioperasikan oleh Perform Media Sales Limited ("Kami"). Kami adalah perusahaan yang terdaftar di Inggris dan Wales dengan nomor perusahaan 05160606 dan kantor terdaftar di Sussex House, Plane Tree Crescent, Feltham, Middlesex, TW13 7HE. Kami bagian dari Perform Group.</p>
            <p>
                <br> <b>2. KETENTUAN PENGGUNAAN WEBSITE</b>
                <br>  1. 2.1 Halaman ini (bersama dengan dokumen yang merujuk kepadanya) menetapkan ketentuan penggunaan di mana Anda dapat menggunakan website GantiGol.com dan aplikasi mobile GantiGol.com (bersama-sama dan secara terpisah, "Situs Kami"), baik sebagai tamu maupun pengguna terdaftar. Silakan baca persyaratan penggunaan ini dengan teliti sebelum Anda mulai menggunakan situs ini. Dengan menggunakan situs kami, Anda menunjukkan bahwa Anda menerima ketentuan penggunaan, yang meliputi kebijakan privasi yang berlaku di situs kami ("Kebijakan Privasi") dan bahwa Anda setuju untuk mematuhinya. Jika Anda tidak setuju dengan ketentuan penggunaan, harap menahan diri dari menggunakan situs kami.</p>
            <p>
                <br> <b>3. HAK KEKAYAAN INTELEKTUAL </b>
                <br>  1. 3.1 Kami merupakan pemiliki dari lisensi hak kekayaan intelektual situs kami dan materi yang terbit di dalamnya. Karya tersebut dilindungi hukum hak cipta dan perjanjian di seluruh dunia. Semua hak tersebut berlaku pada kami dan pemberi lisensi kami. Sebagai pengunjung, Anda dapat mengunduk sebuah salinan materi hanya untuk keperluan non-komersil, kebutuhan konsumsi pribadi. Tidak boleh ada penyalinan atau pendistribusian untuk setiap penggunaan komersial atau bisnis tanpa persetujuan tertulis kami.
                <br>  2. 3.2 Anda tidak dapat memodifikasi lembaran atau salinan digital dari setiap materi yang dicetak atau diunduh dengan cara apapun, dan Anda tidak boleh menggunakan ilustrasi, foto-foto, video, maupun urutan audio atau setiap grafis secara terpisah dari teks yang menyertainya. Sebagai tambahan, Anda tidak dapat menyertakan sebuah tautan ke situs kami atau menampilkan konten dari situs kami dengan dikelilingi atau dibingkai atau apapun dengan materi yang tidak sebenarnya berasal dari kami tanpa persetujuan kami.
                <br>  3. 3.3 Status kami (dan setiap kontributor yang disebutkan) sebagai penulis dari material di dalam situs harus selalu dicantumkan.
                <br>  4. 3.4 Jika Anda mencetak, menyalin, atau mengunduh setiap bagian dari situs kami dengan melanggar ketentuan penggunaan, hak Anda dalam menggunakan situs kami akan segera dihentikan dan Anda harus, pada pilihan kita, mengembalikan atau memusnahkan setiap salinan materi yang telah Anda buat.
                <br>  5. 3.5 "GantiGol.com" adalah merek dagang dari Perform Group dan yang mungkin tedaftar di sejumlah yurisdiksi tertentu. Semua merek dagang lain yang digunakan di situs kami adalah milik masing-masing pemiliknya.</p>
            <p>
                <br> <b>4. PENGGUNAAN YANG DAPAT DITERIMA</b>
                <br>  1. 4.1 Anda hanya dapat diperbolehkan menggunakan situs kami untuk tujuan yang sah secara hukum. Anda tidak diperbolehkan menggunakan situs ini:
                <br>  1. 4.1.1 Dengan cara apapun melanggar peraturan daerah, nasional, atau internasional, atau peraturan yang berlaku.
                <br>  2. 4.1.2 Dengan cara apapun yang melanggar hukum atau penipuan atau memiliki tujuan atau efek melanggar hukum atau penipuan.
                <br>  3. 4.1.3 Untuk tujuan merugikan atau berupaya merugikan anak-anak dengan cara apapun.
                <br>  4. 4.1.4 Untuk mengirim, sengaja menerima, mengunggah, mengunduh, menggunakan atau menggunakan ulang setiap material yang tidak sesuai dengan standar konten kami di bawah ini.
                <br>  5. 4.1.5 Untuk mengirimkan, atau pengadaan pengiriman, setiap iklan yang tidak diminta atau tidak sah atau bentuk lain yang tidak diinginkan (spam).
                <br>  6. 4.1.6 Untuk dengan sengaja mengirimkan data, mengirim atau mengunggah materi yang mengandung virus, Trojan horse, worm, time-bomb, keystroke loggers, spyware, adware atau program lain yang merusak atau kode komputer sejenis yang dirancang untuk mempengaruhi pengoperasian setiap perangkat lunak atau perangkat keras komputer.
                <br>  2. 4.2 Anda juga menyetujui tidak mengakses tanpa otoritas, mengganggu dengan, merusak atau menghalangi:
                <br>  1. 4.2.1 setiap bagian dari situs kami;
                <br>  2. 4.2.2 setiap perlengkapan atau jaringan di mana situs kami disimpan;
                <br>  3. 4.2.3 setiap perangkat lunak yang digunakan dalam penyediaan situs kami; atau
                <br>  4. 4.2.4 setiap perlengkapan atau jaringan atau perangkat lunak milik atau digunakan oleh pihak ketiga.
                <br>
                <br> <b>5. PENGGUNAAN FITUR PESAN DAN KONTEN </b>
                <br>  1. 5.1 Setiap kali Anda menggunakan sebuah fitur yang membuat Anda dapat mengunggah material ke situs kami, atau menjalin kontak dengan pengguna lain situs kami, Anda harus mematuhi bagian ini. Anda mengakui bahwa kontribusi memenuhi standar tersebut.
                <br>  2. 5.2 Situs kami dapat memberikan penawaran kepada Anda untuk mengirimkan pesan berkaitan dengan sejumlah fitur melingkupi email, papan pesan (message board), dan chat room ("Fitur Pesan").
                <br>  3. 5.3 Ketika kami menyediakan setiap fitur pesan, kami akan memberikan informasi yang jernih tentang jenis-jenis jasa yang ditawarkan, jika dimoderasi dan bentuk moderasi yang digunakan (termasuk apakah itu dilakukan manusia atau komputer).
                <br>  4. 5.4 Kami melakukan yang terbaik untuk menilai setiap risiko yang mungkin ditimbulkan terhadap pengguna (dan terutama, anak-anak) dari pihak ketiga ketika menggunakan setiap bentuk Jasa Pesan yang tersedia di situs kami, dan kami akan memutuskan dalam setiap kasus apakah pantas dilakukan moderasi untuk servis yang relevan (termasuk jenis moderasi yang digunakan) dalam lingkup risiko tersebut. Namun, kami tidak berkewajiban mengawasi, memonitor, atau mengatur Fitur Pesan yang tersedia di situs kami, dan kami dengan tegas mengesampingkan tanggung jawab kami untuk setiap kerugian atau kerusakan yang timbul dari penggunaan setiap Fitur Pesan oleh pengguna yang bertentangan dengan standar konten kami, apakah layanan dimoderasi atau tidak.
                <br>  5. 5.5 Penggunaan setiap Fitur Pesan oleh anak-anak adalah tunduk pada persetujuan orangtua atau wali mereka. Kami menyarankan kepada para orangtua yang mengizinkan anak-anaknya dalam menggunakan Fitur Pesan kami bahwa sungguh penting berkomunikasi dengan anak-anak mereka tentang cara aman menikmati internet, karena sistem moderasi tidak bebas dari kesalahan. Anak-anak yang menggunakan setiap Fitur Pesan seharusnya sadar akan potensi risiko yang menimpa mereka.
                <br>  6. 5.6 Ketika kami memoderasi Fitur Pesan, kami akan menyediakan Anda dengan alat untuk mengontak moderator jika muncul kerisauan atau kesulitan.
                <br>  7. 5.7 Anda harus menggunakan Fitur Pesan secara bertanggung jawab, dan sepenuhnya bertanggung jawab atas setiap konten yang dikirimkan. Anda tidak boleh mengirimkan pesan ("Pesan") terkait Fitur Pesan yang:
                <br>  1. 5.7.1 memaksakan muatan besar yang tidak sesuai proporsi atau tidak masuk akal ke dalam infrastruktur situs kami, atau sebaliknya mempengaruhi, merugikan, membatasi, atau melarang pengguna lain dalam menggunakan dan menikmati situs kami;
                <br>  2. 5.7.2 mengancam, menghina, memfitnah, menghujat, cabul, vulgar, ofensif, pornografi, tidak sopan, eksplisit secara seksual atau tidak senonoh;
                <br>  3. 5.7.3 mengajak melakukan kekerasan;
                <br>  4. 5.7.4 mengajak melakukan diskriminasi berdasarkan ras, jenis kelamin, agama, kebangsaan, cacat fisik, orientasi seksual atau usia;
                <br>  5. 5.7.5 merupakan atau mendorong tndakan yang dapat menyebabkan terjadinya pelanggaran pidana, menimbulkan tanggung jawab perdata atau sebaliknya melanggar hukum daerah, provinsi, nasional, atau internasional;
                <br>  6. 5.7.6 melanggar, menjiplak atau menyalahi hak-hak pihak ketiga termasuk, tanpa batasan, hak cipta, merek dagang, paten, hak privasi atau publisitas atau hak milik lainnya;
                <br>  7. 5.7.7 melanggar setiap kewajiban legal kepada pihak ketiga, seperti kewajiban kontraktual atau kewajiban keyakinan;
                <br>  8. 5.7.8 mengandung informasi, perangkat lunak atau bahan lain yang besifat komersial;
                <br>  9. 5.7.9 mengandung iklan, promosi atau permohonan komersial dalam bentuk apapun;
                <br>  10. 5.7.10 akan cenderung melecehkan, mempermalukan, atau mengganggu orang lain;
                <br>  11. 5.7.11 merupakan atau mengandung indikasi palsu atau menyesatkan asal atau pernyataan fakta;
                <br>  12. 5.7.12 digunakan sebagai kedok, atau tidak merepresentasikan identitas Anda atau berafiliasi dengan orang lain (termasuk memberikan kesan bahwa Pesan tersebut berasal dari Kami);
                <br>  13. 5.7.13 mengandung material yang tidak relevan dengan subyek dari Fitur Pesan; atau
                <br>  14. 5.7.14 mengandung virus, Trojan horse, worm, bom waktu, cancelbot atau sejenisnya yang membahayakan kegiatan pemrograman.
                <br>  8. 5.8 Kami akan menentukan, sesuai kebijakan, apakah telah terjadi pelanggaran kebijakaan pengunaan atau kebijakan penggunaan konten dalam situs kami. Ketika pelanggaran kebijakan ini terjadi, kami akan melakukan tindakan yang kami anggap pantas (termasuk namun tidak terbatas pada menyunting atau menghapus setiap pesan atau Nama Pengguna yang Anda kirimkan).
                <br>  9. 5.9 Kegagalan mematuhi kebijakan penggunaan penggunaan ini yang menyebabkan pelanggaran isi ketentuan penggunaan website sesuai izin yang diberikan untuk Anda dalam menggunakannya, dan dapat menyebabkan kami mengambil semua atau salah satu dari tindakan berikut:
                <br>  1. 5.9.1 Penarikan segera, sementara, atau permanen hak Anda menggunakan situs kami.
                <br>  2. 5.9.2 Pemindahan segera, sementara, atau permanen setiap posting atau material yang Anda unggah ke situs kami.
                <br>  3. 5.9.3 Mengeluarkan peringatan kepada Anda.
                <br>  4. 5.9.4 Proses hukum terhadap Anda untuk semua penggantian biaya ganti rugi (termasuk, tapi tanpa terbatas pada, biaya administrasi dan hukum yang wajar) yang ditimbulkan dari pelanggaran tersebut.
                <br>  5. 5.9.6 Pengungkapan informasi tersebut kepada pihak penegak hukum sepanjang dirasa perlu.
                <br>  6. 5.9.7 Kami mengecualikan kewajiban untuk setiap tindakan yang ditempuh dalam merespon pelanggaran kebijakan penggunaan ini. Respon dalam kebijakan ini tidak terbatas, dan kami dapat menempuh tindakan apapun sepanjang dirasa tepat.
                <br>
                <br> <b>6. PENGGUNA TERDAFTAR</b>
                <br>  1. 6.1 Dalam rangka berpartisipasi dalam Fitur Pesan tertentu dan mengakses fitur tertentu dalam situs kami, Anda dapat diminta mendaftar dengan menyedikan informasi pribadi seperti, misalnya, nama dan alamat email (Kebijakan Privasi kami: http://www.GantiGol.com/id-ID/legal/privacy-policy menjelaskan bagaimana informasi itu dikumpulkan dan digunakan termasuk kebijakan kami soal cookies). Anda juga akan diminta memilih nama pengguna ("Nama Pengguna") dengan tujuan identifikasi. Anda tidak boleh menggunakan Nama Pengguna yang melanggar pasal (5.7.1)-(5.7.12) di atas, atau syarat lain yang ditetapkan situs kami. Keputusan mendaftar sebuah Nama Pengguna dan password ada pada kebijakan kami dan kami dapat mencabut Nama Pengguna dan password Anda sewaktu-waktu.
                <br>  2. 6.1 Anda bertanggung jawab dalam menjaga kerahasiaan password Anda dan informasi akun Anda, dan Anda sepenuhnya bertanggung jawab atas segala aktivitas yang terjadi di bawah password atau akun Anda dan untuk setiap akses atau menggunakan situs kami oleh Anda sendiri atau orang lain yang menggunakan password Anda, apakah akses atau penggunaan tersebut disetujui atau tidak oleh Anda, dan apakah orang atau badan lain itu merupakan agen atau pegawai Anda.
                <br>  3. 6.2 Anda harus dengan segera memberi tahu kami jika ada penggunaan yang tidak disetujui dalam password atau akun atau pelanggaran keamanan lain.
                <br>  4. 6.3 Kami tidak bertanggung jawab atas segala kehilangan atau kerusakan yang ditimbulkan dari pengungkapan password Anda karena melanggar Ketentuan Penggunaan. Anda tidak dapat menggunakan akun orang lain kapan pun tanpa meminta izin dari sang pemegang akun.
                <br>  5. 6.4 Anda mendapatkan kepemilikan untuk setiap konten yang Anda cantumkan dengan menggunakan Fitur Pesan.
                <br>  6. 6.5 Kami berhak menyimpan konten yang Anda posting di situs kami, dan pada kebijakan kami membuatnya tersedia dalam setiap konten yang ada di situs kami, dalam setiap kasus tanpa batas. Namun, kami tidak diwajibkan menyediakan atau mengeksploitasi konten tersebut. Kami tidak bertanggung jawab atas kehilangan, pencurian, pelanggaan hak atau kerusakan apapun terkait dengan konten tersebut dan Anda mengemban tanggung jawab untuk setiap konten yang Anda berikan kepada kami.
                <br>  7. 6.6 Dengan melakukan posting setiap konten melalui Fitur Pesan, Anda memberikan kami hak dan izin secara terus menerus, bebas royalti, tidak eksklusif, dan tidak dapat dibatalkan untuk mereproduksi, mempersiapkan karya turunan berdasarkan, mendistribusikan, melakukan atau menampilkan konten tersebut, secara keseluruhan atau sebagian, dalam bentuk apapun, media atau teknologi yang dikenal atau yang selanjutnya berkembang.
                <br>
                <br> <b>7. REMAJA DAN ANAK-ANAK</b>
                <br>  1. 7.1 Situs kami utamanya ditujukan kepada para pengguna dengan usia di atas 18 tahun. Namun, tidak ada batasan bagi kelompok usia di bawah 18 tahun untuk mengakses situs kami atau mendaftar sebagai pengguna. Pengguna di bawah 18 tahun harus menggunakan situs kami atas seizin orangtua atau walinya. Orangtua atau wali pengguna situs kami yang berusia di bawah 18 tahun seharusnya menyimak Ketentuan Penggunaan ini dengan seksama.
                <br>
                <br> <b>8. INFORMASI DAN KETERSEDIAAN</b>
                <br>  1. 8.1 Kami menempuh segala cara agar informasi yang disajikan dalam situs kami adalah akurat dan lengkap, beberapa di antaranya diberikan kepada kami dari pihak ketiga dan kami tidak dapat mengecek keakuratan dan kelengkapannya. Anda disarankan untuk memverifikasi keakuratan setiap informasi sebelum benar-benar mengandalkannya. Lebih jauh, sehubungan dengan sifat yang melekat pada internet, kesalahan interupsi dan penundaan dapat terjadi dalam layanan setiap saat. Oleh karena itu, situs kami tersedia "sebagaimana adanya" tanpa jaminan dalam bentuk apapun dan Kami tidak menerima tanggung jawab yang timbul dari setiap ketidaktelitian atau kelalaian dalam informasi atau gangguan dalam ketersediaan.
                <br>
                <br> <b>9. TAUTAN DARI SITUS KAMI</b>
                <br>  1. 9.1 Situs kami mengandung tautan ke situs dan sumber lain yang disediakan pihak ketiga sehingga tidak ada kontrol dari kami terhadap konten di situs atau sumber tersebut, dan kami tidak menerima tanggung jawab untuk mereka atau untuk setiap kerugian atau kerusakan yang mungkin timbul dari penggunaan Anda terhadap mereka.
                <br>
                <br> <b>10. KOMPETISI DAN JAJAK PENDAPAT</b>
                <br>  1. 10.1 Dari waktu ke waktu, Kami (atau pihak ketiga yang dipilih) dapat mencakup jajak pendapat, kompetisi, promosi atau penawaran lain dalam situs kami. Setiap tawaran tersebut harus tunduk pada persyaratan tersendiri dan mungkin tidak tersedia di semua yurisdiksi.
                <br>
                <br> <b>11. KETENTUAN PENGGUNAAN MOBILE</b>
                <br>  1. 11.1 Ketika mengakses GantiGol.com melalui mobile, biaya jaringan standar berlaku. Handset Anda harus bisa menunjang WAP. Anda mungkin dikenakan tambahan biaya WAP dan GPRS dari operator jaringan Anda sesuai kontrak. Situs kami via perangkat selular (di luar portal) bukan merupakan layanan berlangganan.
                <br>
                <br> <b>12. VARIASI</b>
                <br>  1. 12.1 Kami dapat merevisi syarat ketentuan ini sewak-waktu dengan mengubah halaman ini. Anda diharapkan untuk memeriksa halaman ini dari waktu ke waktu untuk memperhatikan setiap perubahan yang kami buat, karena ketentuan ini mengikat Anda. Beberapa ketentuan yang terdapat dalam ketentuan penggunaan dapat digantikan oleh ketentuan-ketentuan atau pemberitahuan yang dipublikasi di bagian lain situs kami.
                <br>
                <br> <b>13. GANTI RUGI</b>
                <br> Anda setuju tidak membebankan ganti rugi kepada kami dan afiliasi kami dan berturut-turut direksi, petugas, karyawan dan agen, sebagaimana pula pemberi lisensi dan penyedia, dari dan terhadap setiap dan semua kehilangan, kewajiban, kerusakan, biaya dan pengeluaran (termasuk biaya hukum yang wajar) yang timbul dari:
                <br>  1. 13.1 setiap kekeliruan, tindakan atau kelalaian yang dibuat oleh Anda sehubungan dengan penggunaan situs kami;
                <br>  2. 13.2 setiap ketidakpatuhan Anda terhadap Ketentuan ini; atau
                <br>  3. 13.3 klaim yang diajukan pihak ketiga sebagai akibat atau terkait akses atau penggunaan Anda terhadap situs kami, termasuk tanpa batasan Fitur Pesan atau informasi lain yang tersedia di situs kami.
                <br>
                <br> <b>14. KEWAJIBAN</b>
                <br>  1. 14.1 Mengingat segala aspek di situs kami selain pasokan produk (dan hal lain yang tunduk pada ketentuan-ketentuan lain di Pasal 14 ini), GantiGol.com, pihak lain (yang terlibat atau tidak dalam menciptakan, memproduksi, menjaga atau menghantarkan situs kami), dan setiap perusahaan grup kami dan petugas, direksi, karyawan, pemegang saham atau agen dan lain-lain, tidak memiliki kewajiban dan tanggung jawab untuk setiap jumlah atau jenis kerugian atau kerusakan yang dapat menyebabkan Anda atau pihak ketiga (termasuk tanpa batas, setiap kehilangan atau kerusakan sengaja, tidak sengaja, tidak langsung, hukuman atau konsekuensi, atau setiap kehilangan pendapatan, keuntungan, niat baik, data, kontrak, alokasi dana, atau kehilangan atau kerusakan yang ditimbulkan dari atau terkait dengan cara apapun dalam hal gangguan usaha, dan apakah dalam kerugian (termasuk tanpa batasan kelalaian, kontrak, atau sebaliknya) yang terkait dengan penggunaan situs kami dalam hal Fitur Pesan atau yang berkaitan dengan penggunaan, ketidakmampuan menggunakan atau hasil dari penggunaan situs kami, setiap situs yang ditaut ke situs kami atau material di website tersebut, termasuk tanpa batasan pada kehilangan atau kerusakan akibat virus yang dapat menyerang peralatan komputer, perangkat lunak, data atau properti lain Anda terkait dengan akses Anda, penggunaan, mengunjungi situs kami atau mengunduh setiap material dari situs kami atau website yang ditaur ke situs kami.
                <br>  2. 14.2 Jika Anda memilih mencantumkan lokasi, lokasi yang dituju atau informasi personal lain yang tersedia via Fitur Pesan atau metode lain dalam situs kami Anda menerima bahwa seluruhnya merupakan risiko Anda dan kami tidak bertanggung jawab atas kehilangan atau kerusakan yang bisa timbul sebagai akibat tindakan Anda membagi informasi tentang lokasi Anda atau lokasi yang dituju.
                <br>  3. 14.3 Pasal ini tidak dengan cara apapun membatasi tanggung jawab kami:
                <br>  1. 14.3.1 untuk kematian atau cedera personal akibat kelalaian kami;
                <br>  2. 14.3.2 sesuai pasal 2(3) dari Consumer Protection Act 1987;
                <br>  3. 14.3.3 untuk penipuan atau kesalahpahaman; or
                <br>  4. 14.3.4 untuk setiap hal ilegal terhadap kita untuk mengecualikan, atau berupaya mengecualikan, tanggung jawab kami.
                <br>  4. 14.4 Tempat Anda membeli produk atau layanan pihak ketiga melalui situs kami, merupakan kewajiban individual sang penjual yang akan diatur dalam syarat dan ketentuan penjual.
                <br>
                <br> <b>15. YURISDIKSI DAN HUKUM YANG BERLAKU</b>
                <br>  1. 15.1 Pengadilan Inggris akan memiliki yurisdiksi eksklusif atas klaim yang timbul dari, atau terkait dengan, kunjungan ke situs kami.
                <br>  2. 15.2 Ketentuan penggunaan ini dan setiap sengketa atau klaim yang timbul dari, atau terkait dengan pasal-pasalnya atau topik lain yang terbentuk (termasuk sengketa atau klaim non-kontraktual) akan diatur oleh dan sesuai dengan hukum yang berlaku di Inggris dan Wales.
                <br>
                <br> <b>16. HUBUNGI KAMI</b>
                <br>  1. 16.1 Jika memiliki kerisauan tertentu terhadap situs kami, harap hubungi kami di info@GantiGol.com. (gunakan "re: terms of service" sebagai judul e-mail).
                <br>  2. 16.2 Terima kasih telah mengunjungi situs kami.</p>
        </div>
        @endif
    </div>
</div>
@endsection