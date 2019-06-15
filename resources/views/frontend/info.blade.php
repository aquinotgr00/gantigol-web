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
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1"
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
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
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
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
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
        <form action="/post" method="post">
            <input class="form-control" name="name" placeholder="Name..." /><br />
            <input class="form-control" name="phone" placeholder="Phone..." /><br />
            <input class="form-control" name="email" placeholder="E-mail..." /><br />
            <textarea class="form-control" name="text" placeholder="How can we help you?" style="height:150px;"></textarea><br />
            <button type="submit" class="btn btn-dark col-3">KIRIM</button><br /><br />
        </form>
        @elseif (Request::segment(1) == 'faq')
        <div id="accordion">
            <div class="card">
                <div class="card-header faq" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Mengapa transaksi produk cuci gudang saya tidak berhasil?
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header faq" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Syarat dan Ketentuan Pembayaran via BCA Virtual Account
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header faq" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Saya sudah melakukan pembayaran tagihan OVO PayLater namun kenapa limit tidak bertambah?
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
        </div>
        @elseif (Request::segment(1) == 'tnc')
        <h5>Akun, Saldo Refund, Saldo Penghasilan, Password dan Keamanan</h5>
        <ol>
            <li>Pengguna dengan ini menyatakan bahwa pengguna adalah orang yang cakap dan mampu untuk mengikatkan dirinya dalam sebuah perjanjian yang sah menurut hukum.</li>
            <li>Tokopedia tidak memungut biaya pendaftaran kepada Pengguna.</li>
            <li>Pengguna yang telah mendaftar berhak bertindak sebagai:</li>
            <ul>
                <li>- Pembeli</li>
                <li>- Penjual, dengan memanfaatkan layanan buka toko.</li>
            </ul>
            <li>Pengguna yang akan bertindak sebagai Penjual diwajibkan memilih pilihan menggunakan layanan buka toko. Setelah menggunakan layanan buka toko, Pengguna berhak melakukan pengaturan terhadap item-item yang akan diperdagangkan di etalase pribadi Pengguna.</li>
            <li>Tokopedia tanpa pemberitahuan terlebih dahulu kepada Pengguna, memiliki kewenangan untuk melakukan tindakan yang perlu atas setiap dugaan pelanggaran atau pelanggaran Syarat &amp; ketentuan dan/atau hukum yang berlaku, yakni tindakan berupa memindahkan Barang ke gudang, penghapusan Barang, moderasi toko, penutupan toko, pembatalan listing, suspensi akun, dan/atau penghapusan akun pengguna.</li>
            <li>Tokopedia memiliki kewenangan untuk menutup toko atau akun Pengguna baik sementara maupun permanen apabila didapati adanya tindakan kecurangan dalam bertransaksi&nbsp;dan/atau pelanggaran terhadap syarat dan ketentuan Tokopedia.&nbsp;Pengguna menyetujui bahwa Tokopedia berhak melakukan tindakan lain yang diperlukan terkait hal tersebut, termasuk namun tidak terbatas pada menolak pengajuan pembukaan toko yang baru apabila ditemukan kesamaan data.</li>
            <li>Pengguna dilarang untuk menciptakan dan/atau menggunakan perangkat,&nbsp;<em>software,&nbsp;</em>fitur&nbsp;dan/atau alat lainnya yang bertujuan untuk melakukan manipulasi pada sistem Tokopedia, termasuk namun tidak terbatas pada :&nbsp;(i) manipulasi data Toko; (ii) kegiatan perambanan (<em>crawling/scraping</em>); (iii) kegiatan otomatisasi dalam transaksi, jual beli, promosi, dsb; (v) penambahan produk ke etalase; dan/atau (vi) aktivitas lain yang secara wajar dapat dinilai sebagai tindakan manipulasi sistem.</li>
            <li>Tokopedia memiliki kewenangan untuk melakukan penyesuaian jumlah transaksi toko, penyesuaian jumlah reputasi, dan/atau melakukan proses moderasi/menutup akun Pengguna, jika diketahui atau diduga adanya kecurangan oleh Pengguna yang bertujuan memanipulasi data transaksi Pengguna demi meningkatkan reputasi toko (review dan atau jumlah transaksi). Contohnya adalah melakukan proses belanja ke toko sendiri dengan menggunakan akun pribadi atau akun pribadi lainnya.</li>
            <li>Saldo Refund berasal dari pengembalian dana transaksi (<em>refund</em>) pembelian Barang, produk digital, dan/atau produk keuangan di Situs Tokopedia dan tidak bisa dilakukan penambahan secara sendiri (<em>top up</em>).</li>
            <li>Saldo Refund dapat digunakan sebagai salah satu metode pembayaran atas transaksi pembelian Barang, produk digital, dan/atau produk investasi di Situs Tokopedia, dan dapat dilakukan penarikan dana (<em>withdrawal</em>) ke rekening bank yang terdaftar pada akun Pengguna.</li>
            <li>Saldo Penghasilan hanya berasal dari hasil penjualan Barang, produk investasi,&nbsp; dan/atau komisi affiliate pada Situs Tokopedia dan tidak bisa dilakukan penambahan secara sendiri (<em>top up</em>).</li>
            <li>Saldo Penghasilan hanya dapat dilakukan penarikan dana (withdrawal) ke rekening bank yang terdaftar pada akun Pengguna, dan tidak dapat digunakan sebagai metode pembayaran atas transaksi pembelian Barang, produk digital, dan/atau produk investasi di Situs Tokopedia, namun dapat digunakan untuk fitur-fitur berlangganan yang membantu Penjual, seperti Power Merchant, TopAds, dan promo cashback toko.</li>
            <li>Tokopedia memiliki kewenangan untuk melakukan pembekuan Saldo Refund dan Saldo Penghasilan Pengguna apabila ditemukan / diduga adanya tindak kecurangan dalam bertransaksi dan/atau pelanggaran terhadap syarat dan ketentuan Tokopedia.</li>
            <li>Penjual dilarang melakukan duplikasi toko, duplikasi produk, atau tindakan-tindakan lain yang dapat diindikasikan sebagai usaha persaingan tidak sehat.</li>
            <li>Pengguna tidak memiliki hak untuk mengubah nama akun, nama toko dan/atau domain toko Pengguna.</li>
            <li>Pengguna bertanggung jawab secara pribadi untuk menjaga kerahasiaan akun dan password untuk semua aktivitas yang terjadi dalam akun Pengguna.</li>
            <li>Tokopedia tidak akan meminta username,&nbsp;password maupun kode SMS verifikasi&nbsp;atau kode OTP milik&nbsp;akun Pengguna untuk alasan apapun, oleh karena itu Tokopedia menghimbau Pengguna agar tidak memberikan data tersebut maupun data penting lainnya kepada pihak&nbsp;yang mengatasnamakan Tokopedia atau pihak lain yang tidak dapat dijamin keamanannya.</li>
            <li>Pengguna setuju untuk memastikan bahwa Pengguna keluar dari akun di akhir setiap sesi dan memberitahu Tokopedia jika ada penggunaan tanpa izin atas sandi atau akun Pengguna.</li>
            <li>Pengguna dengan ini menyatakan bahwa Tokopedia tidak bertanggung jawab atas kerugian ataupun kendala yang timbul atas penyalahgunaan akun Pengguna yang diakibatkan oleh kelalaian Pengguna, termasuk namun tidak terbatas pada meminjamkan atau memberikan akses akun kepada pihak lain, mengakses link atau tautan yang diberikan oleh pihak lain, memberikan atau memperlihatkan kode verifikasi (OTP), password atau email kepada pihak lain, maupun kelalaian Pengguna lainnya yang mengakibatkan kerugian ataupun kendala pada akun Pengguna.</li>
            <li>Pengguna memahami dan menyetujui bahwa untuk mempergunakan fasilitas keamanan one time password (OTP) maka penyedia jasa telekomunikasi terkait dapat sewaktu-waktu mengenakan biaya kepada Pengguna dengan nominal sebagai berikut (i) Rp 500 ditambah pajak 10% untuk Indosat, Tri, XL, Smartfren, dan Esia; (ii) Rp 200 ditambah pajak 10% untuk Telkomsel.</li>
            <li>Penjual dilarang mempromosikan toko dan/atau Barang secara langsung menggunakan fasilitas pesan pribadi, diskusi produk, ulasan produk yang dapat mengganggu kenyamanan Pengguna lain.</li>
        </ol>
        @endif
    </div>
</div>
@endsection