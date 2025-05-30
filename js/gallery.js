
// Change font size of the page
function changeFontSize(size) {
    document.body.style.fontSize = size;
}

// Change font family of the page
function changeFontFamily(fontFamily) {
    document.body.style.fontFamily = fontFamily;
}


// Change color of the page
function bgcolor(value) {
    document.body.style.backgroundColor = value;
    document.getElementById("viewbg").style.backgroundColor = value;
    document.getElementById("viewbg1").style.backgroundColor = value;
    document.getElementById("viewbg2").style.backgroundColor = value;
    document.getElementById("viewbg3").style.backgroundColor = value;
    document.getElementById("viewbg4").style.backgroundColor = value;
}

let slider = document.querySelector('.slider .list');
let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let dots = document.querySelectorAll('.slider .dots li');

let lengthItems = items.length - 1;
let active = 0;
next.onclick = function(){
    active = active + 1 <= lengthItems ? active + 1 : 0;
    reloadSlider();
}
prev.onclick = function(){
    active = active - 1 >= 0 ? active - 1 : lengthItems;
    reloadSlider();
}
let refreshInterval = setInterval(()=> {next.click()}, 3000);
function reloadSlider(){
    slider.style.left = -items[active].offsetLeft + 'px';
    // 
    let last_active_dot = document.querySelector('.slider .dots li.active');
    last_active_dot.classList.remove('active');
    dots[active].classList.add('active');

    clearInterval(refreshInterval);
    refreshInterval = setInterval(()=> {next.click()}, 3000);

    
}

dots.forEach((li, key) => {
    li.addEventListener('click', ()=>{
         active = key;
         reloadSlider();
    })
})
window.onresize = function(event) {
    reloadSlider();
};

document.addEventListener("DOMContentLoaded", function() {

    // Variables for Row 1
    const btns = document.querySelectorAll(".btn");
    const popupOverlay = document.getElementById("popup-overlay");
    const closePopup = document.getElementById("close-popup");
    const popupImage = document.getElementById("popup-image");
    const popupTitle = document.getElementById("popup-title");
    const popupDescription = document.getElementById("popup-description");

    // Variables for Row 2
    const btns2 = document.querySelectorAll(".btn2");
    const popupOverlay2 = document.getElementById("popup-overlay2");
    const closePopup2 = document.getElementById("close-popup2");
    const popupImage2 = document.getElementById("popup-image2");
    const popupTitle2 = document.getElementById("popup-title2");
    const popupDescription2 = document.getElementById("popup-description2");

    // Variables for Row 3
    const btns3 = document.querySelectorAll(".btn3");
    const popupOverlay3 = document.getElementById("popup-overlay3");
    const closePopup3 = document.getElementById("close-popup3");
    const popupImage3 = document.getElementById("popup-image3");
    const popupTitle3 = document.getElementById("popup-title3");
    const popupDescription3 = document.getElementById("popup-description3");

    // Variables for Row 4
    const btns4 = document.querySelectorAll(".btn4");
    const popupOverlay4 = document.getElementById("popup-overlay4");
    const closePopup4 = document.getElementById("close-popup4");
    const popupImage4 = document.getElementById("popup-image4");
    const popupTitle4 = document.getElementById("popup-title4");
    const popupDescription4 = document.getElementById("popup-description4");

    // Variables for Row 5
    const btns5 = document.querySelectorAll(".btn5");
    const popupOverlay5 = document.getElementById("popup-overlay5");
    const closePopup5 = document.getElementById("close-popup5");
    const popupImage5 = document.getElementById("popup-image5");
    const popupTitle5 = document.getElementById("popup-title5");
    const popupDescription5 = document.getElementById("popup-description5");


    //Row 1 popup discription
    btns.forEach((btn, index) => {
        btn.addEventListener("click", function() {
            const card = this.closest(".card");
            const title = card.querySelector("h1").innerText;
            const imageSrc = card.querySelector("img").getAttribute("src");
            let description = "";

            // Get the description based on the index
            switch (index) {
                case 0:
                    description = "Mamalia darat terbesar di Bumi adalah gajah Afrika, termasuk jenis sabana dan hutan. Mereka dapat dikenali dengan telinga besar dan gading mereka. Hidup dalam kawanan matriarkal, mereka menggunakan infrasound dan berbagai vokalisasi untuk berkomunikasi. Herbivora ini memakan berbagai jenis tanaman dan memiliki masa kehamilan yang panjang. Mereka biasanya melahirkan satu anak. Keberadaan mereka terancam oleh berbagai masalah, seperti degradasi habitat akibat ekspansi manusia, perburuan gading, dan konflik antara manusia dan satwa liar. Melalui keterlibatan komunitas, pelestarian habitat, dan langkah-langkah anti-perburuan, upaya konservasi berusaha mengatasi masalah-masalah ini dan melindungi hewan-hewan megah ini, yang sangat penting bagi kesehatan ekosistem dan keanekaragaman hayati Afrika.";
                    break;
                case 1:
                    description = "Macaw, burung besar dan berwarna-warni yang berasal dari Amerika Tengah dan Selatan, dikenal karena bulunya yang luar biasa dan kecerdasannya. Mereka membentuk ikatan pasangan yang erat dan menggunakan bahasa tubuh serta vokalisasi untuk berkomunikasi saat hidup dalam kelompok. Mereka makan buah-buahan, biji, kacang-kacangan, dan kadang-kadang serangga. Mereka adalah omnivora. Macaw menghadapi berbagai ancaman, seperti hilangnya habitat akibat deforestasi, perdagangan hewan peliharaan ilegal, dan perburuan untuk daging dan bulu. Untuk mengurangi risiko ini dan menjamin kelangsungan hidup burung-burung luar biasa ini, yang sangat penting untuk melestarikan ekosistem hutan tropis dan keanekaragaman hayati, inisiatif konservasi berfokus pada perlindungan habitat, program pemuliaan di penangkaran, dan edukasi.";
                    break;
                case 2:
                    description = "Berwarna cerah dan mudah beradaptasi, anggur ditanam di lokasi beriklim sedang di seluruh dunia dan dapat berwarna hijau, merah, atau ungu. Mereka dibudidayakan untuk konsumsi langsung, pembuatan anggur, dan pengeringan sebagai kismis. Anggur adalah anggota keluarga Vitaceae. Antioksidan, vitamin, dan mineral yang terkandung dalam anggur memberikan manfaat kesehatan seperti memperkuat kinerja jantung dan sistem kekebalan tubuh. Sistem teralis digunakan di kebun anggur untuk mendukung tanaman anggur, meningkatkan ventilasi dan paparan sinar matahari. Sepanjang musim tanam, anggur harus disiram secara teratur dan tumbuh dengan baik di tanah dengan drainase yang baik. Thompson Seedless, Cabernet Sauvignon, dan Chardonnay adalah jenis anggur yang umum. Anggur sangat penting bagi budaya di seluruh dunia dan digunakan untuk membuat anggur serta hidangan gastronomi lainnya.";
                    break;
                case 3:
                    description = "Sekitar 31% dari permukaan daratan Bumi ditutupi oleh hutan, yang merupakan ekosistem penting yang menawarkan berbagai layanan ekologi seperti penyimpanan karbon, produksi oksigen, dan habitat bagi berbagai jenis hewan. Hutan mengendalikan suhu, mencegah erosi tanah, dan meningkatkan perekonomian regional dengan menyediakan makanan, bahan bakar, dan pariwisata. Fenomena alam yang luar biasa dikenal sebagai air terjun terbentuk ketika sungai atau aliran air jatuh melalui jurang yang curam, membentuk air terjun yang memukau. Mereka sering terbentuk di daerah pegunungan atau medan yang terjal. Air terjun menarik wisatawan karena memberikan keindahan pemandangan dan aktivitas rekreasi seperti berenang dan fotografi. Lanskap Bumi hanya akan lengkap dengan hutan dan air terjun, yang meningkatkan kesejahteraan manusia, keanekaragaman hayati, dan keindahan alam.";
                    break;
                case 4:
                    description = "Kucing besar yang paling dikenali di Asia, harimau, memiliki bulu oranye dengan garis-garis hitam. Mereka adalah hewan soliter yang hidup di berbagai habitat, termasuk rawa bakau, padang rumput, dan hutan. Harimau menggunakan bahasa tubuh, penanda bau, dan vokalisasi untuk berkomunikasi. Sebagai karnivora, mereka makan berbagai jenis mangsa, seperti hewan kecil, rusa, dan babi hutan. Populasi harimau terancam oleh perburuan untuk kulit dan tulang mereka, degradasi habitat akibat aktivitas manusia, dan konflik antara manusia dan satwa liar. Predator puncak ini menjadi sasaran perlindungan melalui program konservasi seperti keterlibatan komunitas, pelestarian habitat, dan patroli anti-perburuan. Konservasi harimau sangat penting untuk keanekaragaman hayati dan kesehatan ekosistem karena peran penting mereka dalam menjaga keseimbangan ekologi.";
                    break;
                default:
                    description = "Deskripsi tidak tersedia";
            }

            // Set the popup content
            popupImage.style.backgroundImage = `url(${imageSrc})`;
            popupTitle.innerText = title;
            popupDescription.innerText = description;

            // Display the popup
            popupOverlay.style.display = "block";
        });
    });

    closePopup.addEventListener("click", function() {
        // Close the popup
        popupOverlay.style.display = "none";
    });


    //Row 2 popup discription
    btns2.forEach((btn, index) => {
        btn.addEventListener("click", function() {
            const card = this.closest(".card");
            const title = card.querySelector("h1").innerText;
            const imageSrc = card.querySelector("img").getAttribute("src");
            let description = "";

            // Get the description based on the index
            switch (index) {
                case 0:
                    description = "Asli dari Himalaya Timur, panda merah menjalani kehidupan yang kesepian di hutan bambu yang lebat. Meskipun namanya dan kesamaannya dengan panda raksasa, mereka tidak berkerabat dekat. Bambu merupakan sebagian besar dari diet mereka, dengan buah-buahan, serangga, dan mamalia kecil sebagai tambahan. Dengan bantuan cakar yang dapat ditarik, mereka adalah pemanjat yang lincah dan menghabiskan banyak waktu di pohon. Sebagai hewan nokturnal, mereka paling aktif saat fajar dan senja. Musim dingin akhir adalah musim kawin, ketika betina melahirkan anak-anak yang berjumlah satu hingga empat ekor. Kegiatan konservasi mencakup pelestarian habitat dan program pemuliaan di penangkaran untuk memastikan kelangsungan hidup spesies ini, yang terancam punah akibat kehilangan habitat dan perburuan.";
                    break;
                case 1:
                    description = "Umum ditemukan di Eropa, Asia, dan Amerika Utara, robin dikenal dengan dada merah cerah dan lagu ceria mereka. Mereka hidup di berbagai lingkungan, seperti taman dan hutan. Mereka makan buah-buahan, biji-bijian, dan serangga karena merupakan omnivora. Untuk menarik betina, jantan sering menandai wilayah dan bernyanyi. Pasangan yang bersamaan membentuk ikatan melalui ritual kawin yang rumit. Betina membangun sarang dari lumpur dan rumput di semak-semak atau pohon. Kedua orang tua berbagi peran dalam mengerami telur dan merawat anak burung. Populasi yang berbeda bermigrasi dengan cara yang berbeda; beberapa pergi ke selatan untuk musim dingin, sementara yang lainnya tetap tinggal sepanjang tahun. Tujuan utama dari upaya konservasi adalah untuk melindungi area alami dan mengurangi dampak ancaman seperti kehilangan habitat dan perubahan iklim.";
                    break;
                case 2:
                    description = "Panda tinggal di hutan bambu China dan dikenal sebagai simbol upaya konservasi. Mereka sebagian besar herbivora dan dapat memakan hingga 26 pon bambu setiap hari. Diselamatkan dari kepunahan akibat kerusakan habitat, mereka hidup sendirian di luar musim kawin. Ibu merawat anaknya yang tunggal dengan tingkat kelahiran yang rendah. Struktur tambahan yang mirip jempol pada panda memungkinkan mereka memegang bambu. Di hutan, mantel hitam dan putih mereka membantu mereka berbaur. Inisiatif pembiakan dan perlindungan habitat adalah contoh kegiatan konservasi. Meskipun penampilannya imut, panda kuat dan gesit. Para konservasionis menggunakan pelacakan GPS untuk memantau aktivitas mereka. Panda merupakan sumber utama wisatawan ke cadangan alam China dan menjadi simbol upaya konservasi global.";
                    break;
                case 3:
                    description = "Simbol Antartika, penguin raja, dapat bertahan di suhu serendah -40°C. Mereka adalah spesies penguin terbesar, dengan tinggi hampir 1,2 meter. Mereka dapat bertahan dalam cuaca ekstrem dan suhu dingin serta bepergian hingga 100 kilometer untuk mencapai koloni pembiakan mereka. Untuk menjaga agar telur tetap hangat selama inkubasi, pasangan monogami berbagi tanggung jawab pengasuhan dan kawin. Beberapa kesulitan yang dihadapi anak penguin adalah predator dan cuaca buruk. Karena adaptasi khusus mereka, yang meliputi bulu tebal dan lapisan lemak, mereka dapat bertahan di perairan dingin tempat mereka berburu cumi-cumi dan ikan. Tujuan utama dari upaya konservasi adalah untuk mengurangi dampak perubahan iklim dan melindungi habitat di Antartika.";
                    break;
                case 4:
                    description = "Proses transformasi luar biasa yang dialami kupu-kupu adalah metamorfosis: telur, larva (ulat), pupa (kepompong), dan dewasa. Mereka berkembang di berbagai lingkungan global, termasuk taman perkotaan dan hutan hujan tropis. Sementara dewasa menghisap nektar untuk membantu dalam penyerbukan, ulat terutama memakan vegetasi. Pola sayap mereka yang kompleks berfungsi sebagai pengalih perhatian dan peringatan bagi predator potensial. Beberapa ciri khas hewan adalah migrasi; mereka dapat menempuh ribuan mil dalam setahun. Perubahan iklim, pestisida, dan kehilangan habitat adalah beberapa ancamannya. Pelestarian habitat dan pembuatan habitat yang ramah kupu-kupu adalah tujuan utama dari inisiatif konservasi. Signifikansi ekologi dan keindahan mereka menjadikan mereka simbol penting untuk menjaga keberagaman hayati.";
                    break;
                default:
                    description = "Deskripsi Tidak Tersedia";
            }

            // Set the popup content for Row 2
            popupImage2.style.backgroundImage = `url(${imageSrc})`;
            popupTitle2.innerText = title;
            popupDescription2.innerText = description;

            // Display the popup for Row 2
            popupOverlay2.style.display = "block";
        });
    });

    // Event listener to close Row 2 popup
    closePopup2.addEventListener("click", function() {
        popupOverlay2.style.display = "none";
    });


    //Row 3 popup discription
    btns3.forEach((btn, index) => {
        btn.addEventListener("click", function() {
            const card = this.closest(".card");
            const title = card.querySelector("h1").innerText;
            const imageSrc = card.querySelector("img").getAttribute("src");
            let description = "";

            // Get the description based on the index
            switch (index) {
                case 0:
                    description = "Ciri fisik permukaan Bumi, seperti pegunungan, dataran, sungai, dan pantai, yang telah dibentuk selama jutaan tahun oleh proses geologi, secara kolektif disebut lanskap dan geografi. Keanekaragaman hayati Bumi meningkat oleh lingkungan yang beragam ini, yang menjadi rumah bagi berbagai jenis tumbuhan dan hewan. Geografi mempelajari bagaimana fitur-fitur ini saling berhubungan secara spasial dan bagaimana keterkaitan ini memengaruhi ekosistem, masyarakat manusia, dan iklim. Mengetahui geografi dan lanskap memudahkan kita untuk menghargai kekayaan dan keindahan planet kita, mempermudah manajemen sumber daya dan perencanaan perkotaan, serta memberikan informasi untuk inisiatif konservasi lingkungan. Ini juga mendorong pembangunan berkelanjutan dan pengelolaan sumber daya dengan menjelaskan hubungan antara manusia dan lingkungan sekitar.";
                    break;
                case 1:
                    description = "Komponen penting dari alam, iklim dan cuaca membentuk ekosistem dan memengaruhi kehidupan seperti yang kita ketahui. Tren suhu jangka panjang, curah hujan, dan faktor meteorologi lainnya yang memengaruhi ekosistem dan keanekaragaman hayati dari waktu ke waktu disebut sebagai iklim suatu wilayah. Kondisi atmosfer jangka pendek yang memengaruhi kegiatan dan peristiwa sehari-hari, seperti suhu, kelembapan, angin, dan curah hujan, disebut cuaca. Memahami peristiwa iklim dan cuaca seperti gelombang panas, kekeringan, dan badai sangat penting untuk merencanakan pertanian, mengelola sumber daya alam, dan mengurangi dampak perubahan iklim. Dengan mempelajari variabel-variabel ini, para ilmuwan dapat meramalkan tren, membimbing kebijakan, dan membuat rencana untuk mengurangi dan beradaptasi dengan masalah yang terkait dengan iklim.";
                    break;
                case 2:
                    description = "Ekologi mempelajari interaksi antara makhluk hidup dan lingkungan mereka, dengan fokus pada interaksi yang melibatkan organisme. Ekosistem adalah jaringan rumit dari makhluk hidup yang saling berinteraksi, termasuk habitat yang mereka huni dan lingkungan sekitarnya. Untuk menjaga kehidupan di Bumi tetap layak, sistem saling bergantung ini menyediakan fungsi penting seperti penyerbukan, siklus nutrisi, dan pengelolaan iklim. Mempertahankan keanekaragaman hayati, mengelola sumber daya secara berkelanjutan, dan upaya konservasi bergantung pada pemahaman tentang ekologi dan ekosistem. Para ilmuwan dapat membuat rencana untuk melindungi ekosistem, meningkatkan ketahanan terhadap perubahan lingkungan, dan memajukan kesejahteraan manusia serta dunia alami dengan mempelajari hubungan kompleks ini.";
                    break;
                case 3:
                    description = "Flora dan fauna alam mewakili keberagaman besar kehidupan tumbuhan dan hewan di ekosistem di seluruh dunia. Flora, yang mencakup seluruh kerajaan tumbuhan, dari bunga kecil hingga pohon besar, memberikan rumah, makanan, dan oksigen bagi banyak spesies. Fauna, kerajaan hewan yang mencakup mamalia, burung, reptil, amfibi, dan serangga, semuanya memiliki peran yang berbeda dalam menjaga keseimbangan ekologi. Interaksi rumit antara flora dan fauna Bumi menopang kehidupan, mulai dari gajah-gajah megah di Afrika hingga organisme kecil yang hidup di tanah. Mengingat pentingnya keanekaragaman hayati bagi kesehatan ekosistem, kesejahteraan manusia, dan masa depan planet ini, inisiatif konservasi berusaha untuk menyelamatkan dan melestarikannya.";
                    break;
                default:
                    description = "Deskripsi Tidak Tersedia";
            }

            // Set the popup content for Row 3
            popupImage3.style.backgroundImage = `url(${imageSrc})`;
            popupTitle3.innerText = title;
            popupDescription3.innerText = description;

            // Display the popup for Row 3
            popupOverlay3.style.display = "block";
        });
    });

    // Event listener to close Row 3 popup
    closePopup3.addEventListener("click", function() {
        popupOverlay3.style.display = "none";
    });


    //Row 4 popup discription
    btns4.forEach((btn, index) => {
        btn.addEventListener("click", function() {
            const card = this.closest(".card");
            const title = card.querySelector("h1").innerText;
            const imageSrc = card.querySelector("img").getAttribute("src");
            let description = "";

            // Get the description based on the index
            switch (index) {
                case 0:
                    description = "Salah satu landasan utama pertanian berkelanjutan adalah agroekologi, yang menggabungkan konsep ekologi dengan metode pertanian. Agroekologi sangat menekankan pada keanekaragaman hayati, kesehatan tanah, dan proses alami untuk memaksimalkan dampak positif terhadap lingkungan sambil memaksimalkan produktivitas pertanian. Teknik-teknik penting meliputi rotasi tanaman, agroforestri, polikultur (penanaman berbagai jenis tanaman), dan manajemen hama terpadu. Sistem agroekologis meningkatkan ketahanan terhadap hama, penyakit, dan perubahan iklim dengan meniru ekosistem alami. Agroekologi meningkatkan kesuburan tanah, retensi air, dan keanekaragaman hayati dengan mengurangi ketergantungan pada input buatan seperti pupuk dan pestisida. Ini memberikan pendekatan komprehensif terhadap pertanian yang menguntungkan baik bagi manusia maupun lingkungan, mendukung produksi pangan yang berkelanjutan, mempertahankan mata pencaharian pedesaan, dan membantu dalam konservasi lingkungan.";
                    break;
                case 1:
                    description = "Dalam pertanian berkelanjutan, kesehatan tanah sangat penting untuk mempertahankan dan meningkatkan kualitas tanah untuk produktivitas jangka panjang. Hal ini menekankan metode untuk mencegah erosi, memperkuat struktur tanah, dan mendorong siklus nutrisi, seperti rotasi tanaman, tanaman penutup, dan pengolahan tanah rendah. Mengurangi kebutuhan akan input kimia, berbagai komunitas mikroba yang ditemukan dalam tanah yang sehat membantu dalam pengelolaan hama dan ketersediaan nutrisi. Mempertahankan kandungan bahan organik tanah membantu mengurangi dampak perubahan iklim dengan meningkatkan penyerapan karbon dan retensi air. Keamanan pangan diperkuat dengan pengelolaan tanah yang berkelanjutan, yang juga meningkatkan ketahanan pertanian terhadap peristiwa cuaca yang merugikan. Pertanian berkelanjutan menjamin sistem pertanian yang kuat, produktif, dan ramah lingkungan dengan memprioritaskan kesehatan tanah.";
                    break;
                case 2:
                    description = "Dalam pertanian berkelanjutan, keberagaman tanaman adalah praktik menanam berbagai jenis spesies tanaman untuk meningkatkan ketahanan pangan, kesehatan ekosistem, dan ketahanan. Ini mencakup kultivar yang beragam secara genetik, varietas warisan, serta tanaman tradisional dan asli. Pola penanaman yang beragam meningkatkan kesuburan tanah, mengurangi beban hama dan penyakit, serta mendorong penyerbukan dan proses ekosistem alami lainnya. Teknik seperti rotasi tanaman, penanaman berselang-seling, dan polikultur didorong dalam pertanian berkelanjutan untuk meningkatkan hasil sekaligus mengurangi ketergantungan pada sumber daya luar. Mempertahankan keberagaman tanaman melindungi sumber daya genetik dan menjaga agar mereka cukup fleksibel untuk merespons permintaan pasar dan perubahan lingkungan yang berubah. Melalui diversifikasi tanaman, pertanian berkelanjutan mendorong ketahanan dalam sistem pertanian, pelestarian keanekaragaman hayati, dan mata pencaharian yang berkelanjutan.";
                    break;
                case 3:
                    description = "Untuk mempertahankan hasil pertanian sambil meminimalkan dampak lingkungan, manajemen air dalam pertanian berkelanjutan fokus pada penggunaan dan konservasi sumber daya air secara efektif. Teknik-teknik seperti irigasi tetes, pengumpulan air hujan, dan pemantauan kelembaban tanah digunakan untuk memaksimalkan pemanfaatan air dan meminimalkan pemborosan. Pertanian berkelanjutan mendorong teknik penghemat air seperti irigasi presisi dan mulsa untuk mengurangi risiko kekeringan dan kelangkaan air. Praktik agroforestri dan jenis tanaman yang efisien dalam penggunaan air meningkatkan retensi air tanah, mengurangi limpasan dan erosi. Untuk memastikan bahwa pertanian berkelanjutan tetap tangguh dalam menghadapi perubahan kondisi iklim, teknik manajemen air terpadu mempertimbangkan kebutuhan ekosistem, distribusi yang adil, dan pelestarian kualitas air.";
                    break;
                case 4:
                    description = "Dalam pertanian berkelanjutan, keterlibatan komunitas melibatkan petani, masyarakat lokal, dan pemangku kepentingan yang secara aktif berpartisipasi dalam proses pengambilan keputusan, manajemen sumber daya, dan pertukaran informasi. Hal ini memperkuat kepemilikan lokal terhadap proyek pertanian, memberdayakan komunitas yang terpinggirkan, dan mempromosikan kohesi sosial. Komunitas mempelajari tentang pertanian organik, agroforestri, konservasi air, dan praktik berkelanjutan lainnya melalui seminar, kursus pelatihan, dan metode interaktif. Inisiatif yang digerakkan oleh komunitas meningkatkan kedaulatan pangan, memajukan akses sumber daya yang adil, dan membantu pembangunan pedesaan. Keterlibatan komunitas dalam pertanian berkelanjutan mendorong aksi kelompok, ketahanan sosial, dan mata pencaharian yang berkelanjutan bagi generasi sekarang dan mendatang dengan membangun kemitraan dan jaringan.";
                    break;
                default:
                    description = "Deskripsi Tidak Tersedia";
            }

            // Set the popup content for Row 4
            popupImage4.style.backgroundImage = `url(${imageSrc})`;
            popupTitle4.innerText = title;
            popupDescription4.innerText = description;

            // Display the popup for Row 4
            popupOverlay4.style.display = "block";
        });
    });

    // Event listener to close Row 4 popup
    closePopup4.addEventListener("click", function() {
        popupOverlay4.style.display = "none";
    });


    //Row 5 popup discription
    btns5.forEach((btn, index) => {
        btn.addEventListener("click", function() {
            const card = this.closest(".card");
            const title = card.querySelector("h1").innerText;
            const imageSrc = card.querySelector("img").getAttribute("src");
            let description = "";

            // Get the description based on the index
            switch (index) {
                case 0:
                    description = "Dengan mengembalikan spesies pohon asli, mendorong regenerasi alami, dan menciptakan koridor habitat, reforestasi berkontribusi pada pemulihan ekosistem. Proses ini membantu fungsi, struktur, dan keanekaragaman hayati ekosistem. Penanaman pohon yang strategis berkontribusi pada pemulihan habitat alami dan menyediakan makanan serta tempat berlindung bagi berbagai spesies satwa liar. Selain meningkatkan retensi air, mencegah erosi, dan mempromosikan kesehatan tanah, pemulihan ekosistem sangat penting untuk menjaga ketahanan ekosistem secara keseluruhan. Pada akhirnya, pemulihan bertujuan untuk mengembalikan ekosistem yang berkelanjutan, seimbang, dan menjadi rumah bagi berbagai tumbuhan dan hewan sambil mengurangi kerusakan lingkungan.";
                    break;
                case 1:
                    description = "Perubahan Iklim yang Disebabkan oleh Reforestasi Menanam pohon untuk menyerap karbon dioksida dari atmosfer, mengurangi dampak efek rumah kaca, dan memerangi perubahan iklim adalah contoh mitigasi. Pohon berfungsi sebagai penampung karbon karena mereka menyimpan karbon di dalam tanah dan biomassa mereka. Reforestasi membantu mengendalikan suhu global dan pola cuaca dengan mengurangi konsentrasi gas rumah kaca melalui pemulihan hutan dan perluasan tutupan pohon. Selain itu, hutan sangat penting untuk mempertahankan keanekaragaman hayati dan siklus hidrologi, meningkatkan ketahanan terhadap perubahan iklim. Untuk memerangi perubahan iklim dan mencapai target netralitas karbon, proyek reforestasi sangat penting untuk memastikan masa depan yang berkelanjutan bagi generasi mendatang.";
                    break;
                case 2:
                    description = "Reforestasi berkontribusi pada pengelolaan sumber daya air dengan meningkatkan ketersediaan, kualitas, dan regulasi air. Pohon sangat penting untuk menjaga stabilitas tanah, mengontrol aliran air, mencegah erosi, dan mengurangi kemungkinan banjir dan kekeringan. Sebagai spons organik, hutan mengumpulkan dan menyaring presipitasi, mengembalikan tingkat air tanah, dan mempertahankan aliran sungai. Reforestasi berkontribusi pada pemeliharaan pasokan air untuk ekosistem dan manusia dengan memulihkan area yang terdegradasi dan daerah aliran sungai. Teknik pengelolaan hutan yang berkelanjutan meningkatkan infiltrasi air, mengurangi sedimentasi, dan mengurangi polusi untuk menjaga ketahanan ekosistem air tawar serta mengamankan pasokan air yang penting bagi manusia dan satwa liar.";
                    break;
                case 3:
                    description = "Manfaat sosial-ekonomi dari reforestasi melampaui pemulihan ekologi untuk mencakup kesejahteraan sosial dan ekonomi. Reforestasi meningkatkan perekonomian lokal dan mengurangi kemiskinan dengan menciptakan lapangan kerja di sektor kehutanan, ekowisata, dan industri terkait. Hutan yang dipulihkan mendukung mata pencaharian berkelanjutan bagi masyarakat dengan menyediakan sumber daya seperti kayu, produk hutan bukan kayu, dan tanaman obat. Inisiatif reforestasi juga sering melibatkan pemberdayaan dan keterlibatan komunitas, memperkuat kohesi sosial dan ketahanan. Kesehatan manusia dan kualitas hidup meningkat dengan akses yang lebih baik ke layanan ekosistem, termasuk air bersih, pengaturan iklim, dan konservasi keanekaragaman hayati. Dengan demikian, reforestasi mendukung pembangunan holistik dengan mengoordinasikan tujuan sosial, ekonomi, dan lingkungan.";
                    break;
                case 4:
                    description = "Karena reforestasi memulihkan habitat bagi berbagai spesies tumbuhan dan hewan, hal ini sangat penting dalam upaya konservasi keanekaragaman hayati. Dengan mendorong keragaman genetik dan ketahanan ekologi, reforestasi membantu pemulihan ekosistem yang mendukung berbagai tumbuhan dan hewan. Banyak spesies, terutama yang terancam punah, bergantung pada hutan untuk menyediakan makanan, tempat berlindung, dan tempat berkembang biak saat mereka membangun kembali populasi mereka. Spesies asli sering diberi prioritas dalam inisiatif reforestasi, yang meningkatkan keragaman dan kompleksitas komunitas ekologi. Koridor reforestasi membantu mencegah hilangnya keanekaragaman hayati dengan memfasilitasi mobilitas spesies dan menghubungkan habitat yang terfragmentasi untuk meningkatkan tutupan hutan. Pada akhirnya, reforestasi memainkan peran penting dalam menjaga dan memperbaiki jaringan kehidupan Bumi yang kompleks, melindungi keanekaragaman hayati untuk generasi yang akan datang.";
                    break;
                default:
                    description = "Deskipsi Tidak Tersedia";
            }

            // Set the popup content for Row 5
            popupImage5.style.backgroundImage = `url(${imageSrc})`;
            popupTitle5.innerText = title;
            popupDescription5.innerText = description;

            // Display the popup for Row 5
            popupOverlay5.style.display = "block";
        });
    });

    // Event listener to close Row 5 popup
    closePopup5.addEventListener("click", function() {
        popupOverlay5.style.display = "none";
    });
});

