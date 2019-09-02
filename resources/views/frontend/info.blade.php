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
            E-mail: <a class="email-link" href="mailto:support@mysite.com">support@<a href="http://gantigol.com">gantigol.com</a></a><br />

            <br /><br />

            <b>Headquarter:</b><br />
            Company Inc, <br />
            Jl. Imogiri Timur no 192-194, RT 31 RW 11, Giwangan, <br />
            Umbulharjo, Yogyakarta<br />
            Phone: +62 145 000 101<br />
            E-mail: <a class="email-link" href="mailto:usa@mysite.com">kami@<a href="http://gantigol.com">gantigol.com</a></a><br />

            <br /><br />

            <b>Jakarta
            Jl. Kemang Timur No.21, </b><br />
            Jakarta Selatan<br />
            Phone: +62 52 129 209 291<br />
            E-mail: <a class="email-link" href="mailto:hk@mysite.com">admin@<a href="http://gantigol.com">gantigol.com</a></a><br />

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
                <h4>Terms & Condition</h4></p>
            <p><b>Transaksi dan Konfirmasi Tagihan</b>
                <br> Produk yang dibeli melalui <a href="http://gantigol.com">gantigol.com</a> akan berstatus diketahui ketika pembeli menerima email konfirmasi tagihan dari gantigolsepakbola@gmail.com berupa daftar produk yang dibeli, kuantitas dan total harga yang harus anda bayar termasuk ongkos kirim. Pembayaran atas tagihan pembeli dapat dilakukan melalui transfer rekening bank, kartu kredit atau paypal yang ada di halaman checkout page <a href="http://gantigol.com">gantigol.com</a>.
                <br> Jumlah yang harus dibayar adalah sebesar yang tertera di total tagihan dan admin <a href="http://gantigol.com">gantigol.com</a> tidak akan memproses pengiriman sebelum ada konfirmasi pembayaran dari bank dan/atau payment gateway.
Semua informasi lebih lanjut dapat langsung ditanyakan ke staf kami melalui email ke gantigolsepakbola@gmail.com.
            </p>
            <p>

                <br> <b>Pembayaran Tagihan</b>
            </p>
            <p>
                <b>Pembayaran melalui transfer bank</b>
                <br>  
                Pembayaran atas konfirmasi tagihan dapat dilakukan melalui transfer rekening bank yang ada di halaman checkout page <a href="http://gantigol.com">gantigol.com</a> dan pastikan pembeli mengklik link konfirmasi pembayaran yang ada di email konfirmasi tagihan dan mengisi datanya.
                Setelah melakukan pembayaran melalui transfer bank, pembeli harus melakukan konfirmasi dengan mengisi data konfirmasi pembayaran melalui link yang tersedia di email konfirmasi tagihan, yang secara otomatis memberi notifikasi kepada admin <a href="http://gantigol.com">gantigol.com</a> telah terjadi pembayaran atas nomor tagihan tertentu.
            </p>
            <p>
                <br> <b>Pembayaran dengan kartu kredit Visa / Master Card </b>
                <br> Pembayaran dengan kartu kredit Visa / Master Card mengikuti prosedur yang diberikan oleh payment gateway yang kita tunjuk, pembeli akan dihubungkan ke halaman pembayaran kartu kredit jika pembeli memilih pembayaran dengan kartu kredit di checkout page <a href="http://gantigol.com">gantigol.com</a>. Dengan sendirinya, pembeli tunduk pada prosedur dan aturan yang ditetapkan oleh payment gateway.
            </p>
            <p>
                <br> <b>Pengiriman</b>
                <br>  Dalam 1 x 24 jam setelah admin <a href="http://gantigol.com">gantigol.com</a> menerima dan memeriksa ulang konfirmasi pembayaran dari bank dan/atau payment gateway, akan melakukan proses pengemasan dan pengiriman produk yang dibeli.
                    Pengiriman dilayani pada hari Senin sampai Sabtu, jika konfirmasi diterima pada hari Sabtu setelah pukul 13:00 WIB, maka pengiriman dilakukan pada hari Senin setelahnya.
                <br> Biaya pengiriman dikenakan sepenuhnya pada pembeli. Mekanisme biaya dan layanan pengiriman diserahkan sepenuhnya pada jasa kurir yang ditunjuk oleh <a href="http://gantigol.com">gantigol.com</a> untuk melakukan pengiriman.
                <br> Dengan sendirinya, pembeli tunduk pada prosedur dan aturan yang ditetapkan oleh jasa kurir yang digunakan.
                Jasa kurir yang digunakan adalah JNE OKE Service untuk pengiriman dalam wilayah Indonesia.
            </p>
            <p>
                <br><b>Sangkalan dan Penolakan</b>
                <br> <a href="http://gantigol.com">gantigol.com</a> berhak menolak dan tidak memproses pesanan jika tidak ada konfirmasi pembayaran dari bank dan/atau payment gateway yang ditunjuk.
                <br> <a href="http://gantigol.com">gantigol.com</a> tidak bertanggungjawab atas kesalahan masukan data pribadi dan alamat pada halaman checkout yang mengakibatkan pengiriman tidak sampai ke alamat pembeli.
                <br> <a href="http://gantigol.com">gantigol.com</a> tidak bertanggungjawab atas kerusakan barang yang diakibatkan oleh jasa pengiriman. Pembeli sebaiknya melakukan pemeriksaan atas kemasan pada saat barang diterima.
                <br> <a href="http://gantigol.com">gantigol.com</a> tidak bertanggungjawab atas kesalahan dan pembayaran, dan segala penyalahgunaan dan kejahatan sistem pembayaran apapun. Dan jika terjadi hal yang sedimikian, akan diproses dengan hukum yang berlaku di Republik Indonesia.
            </p>
            <p>
                <br><b>Privacy Policy</b>
            </p>
            <p>
                <b>Privasi dan Keamanan</b>
                <br> <a href="http://gantigol.com">gantigol.com</a> menjamin keamanan dan kerahasiaan data pribadi yang digunakan untuk pembelian di <a href="http://gantigol.com">gantigol.com</a>, dan tidak akan digunakan untuk keperluan yang lain.
                <br> Segala sesuatu tantang syarat dan ketentuan ini dapat berubah sewaktu-waktu, dan admin <a href="http://gantigol.com">gantigol.com</a> dianggap sudah melakukan pemberitahuan jika sudah terunggah di <a href="http://gantigol.com">gantigol.com</a>.
            </p>
        </div>
        @endif
    </div>
</div>
@endsection