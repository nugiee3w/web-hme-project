// Data fungsionaris
const fungsionarisData = {
    'ketua-umum': {
        name: "Muhammad Fajrianoor Syawalludin",
        position: "Ketua Umum",
        prodi: "Prodi Teknik Listrik '23",
        instagram: "https://instagram.com/fajrimhmmadd_",
        image: "assets/img/fungsionaris/ketum.png",
        description: "Sebagai pemimpin utama, Ketua Umum memiliki peran penting dalam mengarahkan, mengkoordinasikan, dan memegang tanggung jawab atas seluruh aktivitas HME Poliban. Dengan jiwa kepemimpinan yang kuat, beliau bertekad untuk mendorong pencapaian visi organisasi serta menjaga kesinambungan perkembangan HME.",
        responsibility: "Memimpin organisasi, mengkoordinasikan seluruh kegiatan, membuat keputusan strategis, dan menjadi representasi HME di berbagai forum."
    },
    'wakil-ketua-1': {
        name: "Risky Arba Kusuma",
        position: "Wakil Ketua Umum I",
        prodi: "Prodi Elektronika '23",
        instagram: "https://instagram.com/_risky.4r8a",
        image: "assets/img/fungsionaris/wk_1.png",
        description: "Wakil Ketua Umum memiliki tanggung jawab besar dalam menjaga kekompakan dan keharmonisan di antara pengurus HME. Mereka juga berperan dalam membantu Ketua Umum dalam menjalankan roda organisasi, menjadi penghubung yang efektif antar anggota, serta memastikan komunikasi dan kolaborasi berjalan lancar demi tercapainya tujuan bersama.",
        responsibility: "Membantu ketua dalam koordinasi internal, mengelola hubungan eksternal, dan menjalankan tugas ketua saat berhalangan."
    },
    'wakil-ketua-2': {
        name: "Ahmad Saputra",
        position: "Wakil Ketua Umum II",
        prodi: "Prodi Sistem Informasi Kota Cerdas '24",
        instagram: "https://instagram.com/aaahmadaja",
        image: "assets/img/fungsionaris/wk_2.png",
        description: "Wakil Ketua Umum memiliki tanggung jawab besar dalam menjaga kekompakan dan keharmonisan di antara pengurus HME. Mereka juga berperan dalam membantu Ketua Umum dalam menjalankan roda organisasi, menjadi penghubung yang efektif antar anggota, serta memastikan komunikasi dan kolaborasi berjalan lancar demi tercapainya tujuan bersama.",
        responsibility: "Mengembangkan program kegiatan, mengkoordinasikan pelaksanaan event, dan membantu dalam perencanaan strategis organisasi."
    },
    'sekretaris-umum': {
        name: "Dea Fitri Amalia",
        position: "Sekretaris Umum I",
        prodi: "Prodi Teknologi Rekayasa Otomasi '24",
        instagram: "https://instagram.com/dea.ftri_",
        image: "assets/img/fungsionaris/sektum_1.png",
        description: "Sebagai Sekretaris Umum, mereka memiliki peran yang sangat penting dalam menjaga kelancaran administrasi HME Poliban. Tugasnya meliputi mengelola surat-menyurat, menyusun dan menyimpan arsip, mengelola daftar hadir kegiatan, menyusun Laporan Pertanggungjawaban (LPJ), serta mengurus semua hal yang berkaitan dengan pemberkasan administrasi, baik untuk keperluan internal maupun eksternal organisasi.",
        responsibility: "Mengelola administrasi organisasi, membuat notulen rapat, mengurus surat-menyurat, dan mendokumentasikan kegiatan HME.",
        anggota: [
            {
                name: "Putri Nancin",
                position: "Sekretaris Umum II",
                prodi: "Prodi Teknik Informatika '23",
                instagram: "https://www.instagram.com/fvv.cici/",
                image: "assets/img/fungsionaris/sektum_2.png"
            }
        ]
    },
    'bendahara-umum': {
        name: "Selvi Selpina",
        position: "Bendahara Umum I",
        prodi: "Prodi Sistem Informasi Kota Cerdas '24",
        instagram: "https://www.instagram.com/_selpinaaa",
        image: "assets/img/fungsionaris/bendum_1.png",
        description: "Sebagai Bendahara Umum, mereka memiliki peran penting dalam mengatur seluruh aspek keuangan HME Poliban. Tugasnya mencakup penyusunan Rencana Anggaran Belanja (RAB), pengelolaan bukti transaksi keuangan, penyusunan laporan pertanggungjawaban, serta bertanggung jawab atas semua pemasukan dan pengeluaran organisasi. Dengan ketelitian dan integritas tinggi, mereka memastikan bahwa seluruh proses keuangan berjalan dengan rapi, akuntabel, dan transparan.",
        responsibility: "Mengelola keuangan organisasi, membuat laporan keuangan, mengatur anggaran kegiatan, dan memastikan transparansi finansial.",
        anggota: [
            {
                name: "Resa Faulia",
                position: "Bendahara Umum II",
                prodi: "Prodi Elektronika '23",
                instagram: "https://www.instagram.com/resaaafaulia",
                image: "assets/img/fungsionaris/bendum_2.png"
            }
        ]
    },
    'inventaris': {
        name: "Nabila Azzahra",
        position: "Inventaris I",
        prodi: "Prodi Sistem Informasi Kota Cerdas '24",
        instagram: "https://www.instagram.com/nablidhan",
        image: "assets/img/fungsionaris/inven_1.png",
        description: "Sebagai Inventaris, mereka memiliki peran penting dalam memastikan segala barang kebutuhan sekretariat tersedia dan terkelola dengan baik. Tugas mereka mencakup pendataan, pengelolaan, serta pengecekan ketersediaan barang yang dibutuhkan untuk mendukung kelancaran aktivitas HME Poliban. Dengan inventaris yang tertata rapi, setiap kegiatan organisasi dapat berjalan lebih lancar dan efisien.",
        responsibility: "Mengelola inventaris organisasi, memelihara aset HME, membuat laporan barang, dan mengatur penggunaan fasilitas.",
        anggota: [
            {
                name: "Lisna",
                position: "Inventaris II",
                prodi: "Prodi Elektronika '23",
                instagram: "https://www.instagram.com/lisnanavya",
                image: "assets/img/fungsionaris/inven_2.png"
            }
        ]
    }
};

// Variable untuk carousel fungsionaris
let currentFungsionarisIndex = 0;
let currentFungsionarisMembers = [];

// Fungsi untuk modal fungsionaris
function openFungsionarisModal(fungsionarisKey) {
    console.log('Opening fungsionaris modal for:', fungsionarisKey);
    const fungsionaris = fungsionarisData[fungsionarisKey];
    if (!fungsionaris) {
        console.error('Fungsionaris not found:', fungsionarisKey);
        return;
    }

    console.log('Fungsionaris data:', fungsionaris);

    // Set modal title
    const modalLabel = document.getElementById('fungsionarisModalLabel');
    if (modalLabel) modalLabel.textContent = 'Detail ' + fungsionaris.position;

    // Set description
    const descTitle = document.getElementById('fungsionarisDescTitle');
    if (descTitle) descTitle.textContent = 'Tentang ' + fungsionaris.position;
    
    const descContent = document.getElementById('fungsionarisDescContent');
    if (descContent) descContent.textContent = fungsionaris.description;

    // Check if this position should use carousel (only for positions with anggota)
    const hasAnggota = fungsionaris.anggota && fungsionaris.anggota.length > 0;
    
    if (hasAnggota) {
        // Prepare members array (ketua + anggota)
        currentFungsionarisMembers = [fungsionaris];
        currentFungsionarisMembers = currentFungsionarisMembers.concat(fungsionaris.anggota);

        // Set statistics for carousel view
        const totalMembersEl = document.getElementById('totalFungsionarisMembers');
        if (totalMembersEl) totalMembersEl.textContent = currentFungsionarisMembers.length;
        
        const yearEl = document.getElementById('fungsionarisYear');
        if (yearEl) yearEl.textContent = '2024';

        // Show carousel container
        const carouselContainer = document.getElementById('fungsionarisCarouselContainer');
        if (carouselContainer) carouselContainer.style.display = 'block';
        
        const singleProfile = document.getElementById('singleFungsionarisProfile');
        if (singleProfile) singleProfile.style.display = 'none';

        // Show carousel dots for carousel view
        const dotsContainer = document.getElementById('fungsionarisCarouselDots');
        if (dotsContainer) dotsContainer.style.display = 'block';

        // Initialize carousel
        initFungsionarisCarousel();
    } else {
        // Show single profile view for Ketua Umum, Wakil Ketua I & II
        const carouselContainer = document.getElementById('fungsionarisCarouselContainer');
        if (carouselContainer) carouselContainer.style.display = 'none';
        
        const singleProfile = document.getElementById('singleFungsionarisProfile');
        if (singleProfile) singleProfile.style.display = 'block';

        // Hide carousel dots for single profile view
        const dotsContainer = document.getElementById('fungsionarisCarouselDots');
        if (dotsContainer) dotsContainer.style.display = 'none';

        // Set statistics for single view
        const totalMembersEl = document.getElementById('totalFungsionarisMembers');
        if (totalMembersEl) totalMembersEl.textContent = '1';
        
        const yearEl = document.getElementById('fungsionarisYear');
        if (yearEl) yearEl.textContent = '2024';

        // Set single profile information
        const photo = document.getElementById('fungsionarisPhoto');
        if (photo) {
            photo.src = fungsionaris.image;
            photo.alt = fungsionaris.name;
        }
        
        const name = document.getElementById('fungsionarisName');
        if (name) name.textContent = fungsionaris.name;
        
        const position = document.getElementById('fungsionarisPosition');
        if (position) position.textContent = fungsionaris.position;
        
        const prodi = document.getElementById('fungsionarisProdi');
        if (prodi) prodi.textContent = fungsionaris.prodi;
        
        const instagram = document.getElementById('fungsionarisInstagram');
        if (instagram) instagram.href = fungsionaris.instagram;
    }

    // Show modal
    const modalEl = document.getElementById('fungsionarisModal');
    if (modalEl) {
        const modal = new bootstrap.Modal(modalEl);
        modal.show();
    }
}

function initFungsionarisCarousel() {
    const track = document.getElementById('fungsionarisCarouselTrack');
    const dots = document.getElementById('fungsionarisCarouselDots');
    
    if (!track || !dots) return;
    
    // Clear previous content
    track.innerHTML = '';
    dots.innerHTML = '';
    
    // Generate member cards
    currentFungsionarisMembers.forEach(function(member, index) {
        // Create member card
        const memberCard = document.createElement('div');
        memberCard.className = 'carousel-member-card';
        memberCard.style.cssText = 'min-width: 100%; height: 100%; padding: 20px; display: flex; align-items: center; justify-content: center;';
        
        memberCard.innerHTML = generateFungsionarisCarouselCard(member);
        track.appendChild(memberCard);
        
        // Create minimalist line indicator
        const dot = document.createElement('button');
        dot.className = 'carousel-dot' + (index === 0 ? ' active' : '');
        dot.style.cssText = 'width: 12px; height: 2px; border-radius: 1px; border: none; margin: 0 2px; background: ' + (index === 0 ? '#37517e' : '#ddd') + '; cursor: pointer; transition: all 0.2s ease; opacity: 0.6;';
        dot.onclick = function() { goToFungsionarisMember(index); };
        dots.appendChild(dot);
    });

    // Reset to first member
    currentFungsionarisIndex = 0;
    updateFungsionarisCarouselPosition();

    // Setup navigation buttons
    setupFungsionarisCarouselControls();
}

function generateFungsionarisCarouselCard(member) {
    return '<div style="position: relative; box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.15); padding: 30px; border-radius: 15px; background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%); transition: all 0.3s ease; max-width: 500px; width: 100%; text-align: center; border: 2px solid #e9ecef;">' +
        '<div style="overflow: hidden; width: 150px; height: 150px; border-radius: 50%; margin: 0 auto 20px; border: 4px solid #37517e;">' +
        '<img src="' + member.image + '" class="img-fluid" alt="' + member.name + '" style="width: 100%; height: 100%; object-fit: cover;">' +
        '</div>' +
        '<h4 style="font-weight: 700; margin-bottom: 10px; font-size: 22px; color: #37517e;">' + member.name + '</h4>' +
        '<span style="display: block; font-size: 16px; padding-bottom: 10px; font-weight: 500; color: #666;">' + member.position + '</span>' +
        '<p style="margin: 10px 0 15px 0; font-size: 15px; color: #888;">' + member.prodi + '</p>' +
        '<div style="margin-top: 20px;">' +
        '<a href="' + member.instagram + '" target="_blank" onclick="event.stopPropagation();" class="modal-social-link">' +
        '<i class="ri-instagram-fill"></i>' +
        '</a>' +
        '</div>' +
        '</div>';
}

function setupFungsionarisCarouselControls() {
    // Previous button
    document.getElementById('prevFungsionarisMember').onclick = function() {
        currentFungsionarisIndex = currentFungsionarisIndex > 0 ? currentFungsionarisIndex - 1 : currentFungsionarisMembers.length - 1;
        updateFungsionarisCarouselPosition();
    };

    // Next button
    document.getElementById('nextFungsionarisMember').onclick = function() {
        currentFungsionarisIndex = currentFungsionarisIndex < currentFungsionarisMembers.length - 1 ? currentFungsionarisIndex + 1 : 0;
        updateFungsionarisCarouselPosition();
    };
}

function goToFungsionarisMember(index) {
    currentFungsionarisIndex = index;
    updateFungsionarisCarouselPosition();
}

function updateFungsionarisCarouselPosition() {
    const track = document.getElementById('fungsionarisCarouselTrack');
    const dots = document.querySelectorAll('#fungsionarisCarouselDots .carousel-dot');
    
    // Update track position
    track.style.transform = 'translateX(-' + (currentFungsionarisIndex * 100) + '%)';
    
    // Update dots
    dots.forEach(function(dot, index) {
        if (index === currentFungsionarisIndex) {
            dot.style.background = '#37517e';
            dot.style.opacity = '1';
            dot.classList.add('active');
        } else {
            dot.style.background = '#ddd';
            dot.style.opacity = '0.6';
            dot.classList.remove('active');
        }
    });
}
