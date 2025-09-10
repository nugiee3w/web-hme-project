<section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up" style="align-items: center">

        <div class="section-title">
            <h2>Divisi</h2>
            <p>Himpunan Mahasiswa Elektro terdiri dari lima divisi, 
                masing-masing dengan tugas pokok dan fungsi dan tujuan yang jelas. Setiap divisi diisi oleh individu-individu yang 
                memiliki ketangguhan dan kompetensi yang tinggi di bidangnya.</p>
        </div>

        <div class="row">

            <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="member d-flex align-items-start" style="cursor: pointer;" onclick="openDivisiModal('keagamaan')">
                    <div class="pic"><img src="assets/img/divisi/agama_1.png" class="img-fluid"
                            alt=""></div>
                    <div class="member-info">
                        <h4>Irfansyah</h4>
                        <span>Koordinator Divisi Keagamaan</span>
                        <p>Prodi Teknik Listrik '23</p>
                        <div class="social">
                            <!--<a href=""><i class="ri-twitter-fill"></i></a>-->
                            <!--<a href=""><i class="ri-facebook-fill"></i></a>-->
                            <a href="https://www.instagram.com/_irfansyah_13/" target="_blank" onclick="event.stopPropagation();"><i class="ri-instagram-fill"></i></a>
                            <!--<a href=""> <i class="ri-linkedin-box-fill"></i> </a>-->
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
                <div class="member d-flex align-items-start" style="cursor: pointer;" onclick="openDivisiModal('mikat')">
                    <div class="pic"><img src="assets/img/divisi/mikat_1.png" class="img-fluid"
                            alt=""></div>
                    <div class="member-info">
                        <h4>Muhammad Pradita Alfarisy Nugraha</h4>
                        <span>Koordinator Divisi Minat dan Bakat</span>
                        <p>Prodi Teknik Listrik '23</p>
                        <div class="social">
                            <!--<a href=""><i class="ri-twitter-fill"></i></a>-->
                            <!--<a href=""><i class="ri-facebook-fill"></i></a>-->
                            <a href="https://www.instagram.com/praditaalfrsyy" target="_blank" onclick="event.stopPropagation();"><i class="ri-instagram-fill"></i></a>
                            <!--<a href=""> <i class="ri-linkedin-box-fill"></i> </a>-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="member d-flex align-items-start" style="cursor: pointer;" onclick="openDivisiModal('medinfo')">
                    <div class="pic"><img src="assets/img/divisi/medinfo_1.png" class="img-fluid"
                            alt=""></div>
                    <div class="member-info">
                        <h4>Muhammad Anugrah Tsabitul Azmi</h4>
                        <span>Koordinator Divisi Media dan Informasi</span>
                        <p>Prodi Teknik Informatika '23</p>
                        <div class="social">
                            <!--<a href=""><i class="ri-twitter-fill"></i></a>-->
                            <!--<a href=""><i class="ri-facebook-fill"></i></a>-->
                            <a href="https://instagram.com/nugi.ja" target="_blank" onclick="event.stopPropagation();"><i class="ri-instagram-fill"></i></a>
                            <!--<a href=""> <i class="ri-linkedin-box-fill"></i> </a>-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
                <div class="member d-flex align-items-start" style="cursor: pointer;" onclick="openDivisiModal('bidik')">
                    <div class="pic"><img src="assets/img/divisi/bidik_1.png" class="img-fluid"
                            alt=""></div>
                    <div class="member-info">
                        <h4>Noor Alfa Rahmah</h4>
                        <span>Koordinator Divisi Bimbingan Pendidikan</span>
                        <p>Prodi Teknik Informatika '23</p>
                        <div class="social">
                            <!--<a href=""><i class="ri-twitter-fill"></i></a>-->
                            <!--<a href=""><i class="ri-facebook-fill"></i></a>-->
                            <a href="https://www.instagram.com/alfarahmahh_/" target="_blank" onclick="event.stopPropagation();"><i class="ri-instagram-fill"></i></a>
                            <!--<a href=""> <i class="ri-linkedin-box-fill"></i> </a>-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-center justify-content-center">
                <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="member d-flex align-items-start" style="cursor: pointer;" onclick="openDivisiModal('humas')">
                        <div class="pic"><img src="assets/img/divisi/humas_1.png" class="img-fluid"
                                alt=""></div>
                        <div class="member-info">
                            <h4>Muhammad Riza</h4>
                            <span>Koordinator Divisi Hubungan Masyarakat</span>
                            <p>Prodi Teknik Informatika '23</p>
                            <div class="social">
                                <!--<a href=""><i class="ri-twitter-fill"></i></a>-->
                                <!--<a href=""><i class="ri-facebook-fill"></i></a>-->
                                <a href="https://www.instagram.com/_muhammadriza_/" target="_blank" onclick="event.stopPropagation();"><i class="ri-instagram-fill"></i></a>
                                <!--<a href=""> <i class="ri-linkedin-box-fill"></i> </a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>

    <!-- Modal untuk menampilkan anggota divisi -->
    <div class="modal fade" id="divisiModal" tabindex="-1" aria-labelledby="divisiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="divisiModalLabel">Detail Divisi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                        <!-- Deskripsi Divisi - Sebelah Kiri -->
                        <div class="col-lg-5">
                            <div class="divisi-description">
                                <h4 id="divisiDescTitle" style="color: #37517e; margin-bottom: 20px;">Tentang Divisi</h4>
                                <div id="divisiDescContent" style="text-align: justify; line-height: 1.8; font-size: 16px;">
                                    <!-- Deskripsi akan diisi oleh JavaScript -->
                                </div>
                                <div class="divisi-stats mt-4">
                                    <div class="row text-center">
                                        <div class="col-6">
                                            <div class="stat-box" style="background: #f8f9fa; padding: 20px; border-radius: 10px; margin-bottom: 15px;">
                                                <h5 style="color: #37517e; margin-bottom: 5px;" id="totalMembers">0</h5>
                                                <span style="font-size: 14px; color: #666;">Total Anggota</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="stat-box" style="background: #f8f9fa; padding: 20px; border-radius: 10px; margin-bottom: 15px;">
                                                <h5 style="color: #37517e; margin-bottom: 5px;" id="divisiYear">2024</h5>
                                                <span style="font-size: 14px; color: #666;">Periode</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Member Carousel - Sebelah Kanan -->
                        <div class="col-lg-7">
                            <div class="member-carousel-container" style="position: relative;">
                                <!-- Carousel Container dengan navigasi samping -->
                                <div class="member-carousel" style="height: 400px; overflow: hidden; position: relative; border-radius: 10px; background: #f8f9fa;">
                                    <!-- Tombol Previous - Kiri -->
                                    <button class="btn carousel-nav-btn carousel-prev" id="prevMember" style="
                                        position: absolute;
                                        left: 15px;
                                        top: 50%;
                                        transform: translateY(-50%);
                                        background: rgba(55, 81, 126, 0.6);
                                        color: white;
                                        border: none;
                                        border-radius: 50%;
                                        width: 24px;
                                        height: 24px;
                                        z-index: 10;
                                        box-shadow: none;
                                        opacity: 0.5;
                                        transition: all 0.3s ease;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                    ">
                                        <i class="ri-arrow-left-s-line" style="font-size: 12px;"></i>
                                    </button>
                                    
                                    <!-- Tombol Next - Kanan -->
                                    <button class="btn carousel-nav-btn carousel-next" id="nextMember" style="
                                        position: absolute;
                                        right: 15px;
                                        top: 50%;
                                        transform: translateY(-50%);
                                        background: rgba(55, 81, 126, 0.6);
                                        color: white;
                                        border: none;
                                        border-radius: 50%;
                                        width: 24px;
                                        height: 24px;
                                        z-index: 10;
                                        box-shadow: none;
                                        opacity: 0.5;
                                        transition: all 0.3s ease;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                    ">
                                        <i class="ri-arrow-right-s-line" style="font-size: 12px;"></i>
                                    </button>
                                    
                                    <div class="carousel-track" id="memberCarouselTrack" style="display: flex; transition: transform 0.5s ease-in-out; height: 100%;">
                                        <!-- Member cards akan diisi oleh JavaScript -->
                                    </div>
                                </div>
                                
                                <!-- Minimalist Dots Indicator -->
                                <div class="carousel-dots text-center mt-2" id="carouselDots" style="height: 12px;">
                                    <!-- Dots akan diisi oleh JavaScript -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
