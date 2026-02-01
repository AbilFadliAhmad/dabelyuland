<main class="flex-1 w-full">
  <!-- Hero Section -->
      <section class="relative w-full h-[600px] lg:h-[700px] flex items-center justify-center">
        <!-- Background Image -->
        <div id="hero-carousel" class="absolute inset-0 w-full h-full">
          <div class="hero-slide absolute inset-0 w-full h-full transition-opacity duration-1000 opacity-100">
            <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?q=80&w=2071&auto=format&fit=crop" />
            <div class="absolute inset-0 bg-black/40"></div>
          </div>
          <div class="hero-slide absolute inset-0 w-full h-full transition-opacity duration-1000 opacity-0">
            <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop" />
            <div class="absolute inset-0 bg-black/40"></div>
          </div>
          <div class="hero-slide absolute inset-0 w-full h-full transition-opacity duration-1000 opacity-0">
            <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=2075&auto=format&fit=crop" />
            <div class="absolute inset-0 bg-black/40"></div>
          </div>
        </div>
        <!-- Content -->
        <div class="relative z-20 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center text-center -mt-20">
          <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white leading-tight tracking-tight mb-4 drop-shadow-sm">Hunian Mewah <br class="hidden md:block" />Impian Anda</h1>
          <p class="text-lg md:text-xl text-white/90 font-medium max-w-2xl drop-shadow-sm mb-12">Exclusive listings for the modern lifestyle. Temukan properti premium yang sesuai dengan gaya hidup Anda.</p>
          <!-- Floating Search Bar -->
          <div
            class="w-full max-w-4xl bg-surface-light dark:bg-surface-dark rounded-xl shadow-2xl p-4 md:p-3 transform translate-y-8 md:translate-y-12 transition-all border border-white/20 dark:border-white/5 backdrop-blur-sm bg-opacity-95 dark:bg-opacity-95"
          >
            <div class="flex flex-col md:flex-row gap-3 md:items-center">
              <div class="flex-1 relative group flex items-center">
                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-text-muted group-focus-within:text-primary transition-colors">
                  <span class="material-symbols-outlined text-xl">search</span>
                </div>
                <input
                  id="pencarian"
                  class="w-full h-12 pl-11 pr-4 bg-background-light dark:bg-background-dark/50 border border-transparent rounded-xl text-text-main dark:text-white placeholder:text-text-muted/70 focus:bg-white dark:focus:bg-background-dark focus:border-primary/50 focus:ring-4 focus:ring-primary/10 text-sm font-medium transition-all outline-none"
                  placeholder="Cari lokasi, properti, kota"
                  type="text"
                />
              </div>

              <div class="hidden md:block w-px h-8 bg-border-light dark:bg-border-dark"></div>

              <div class="grid grid-cols-2 md:flex gap-3 md:w-auto">
                <div class="relative group md:min-w-[160px]">
                  <button
                    class="w-full h-12 px-4 flex items-center justify-between bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl text-slate-700 dark:text-slate-200 text-sm font-semibold hover:border-primary transition-all"
                  >
                    <div class="flex items-center gap-2">
                      <span class="material-symbols-outlined text-lg opacity-70">payments</span>
                      <span id="label-harga">Semua Harga</span>
                    </div>
                    <span class="material-symbols-outlined text-sm transition-transform group-hover:rotate-180">expand_more</span>
                  </button>
                  <div
                    class="absolute z-20 w-full mt-2 origin-top scale-95 opacity-0 invisible group-hover:visible group-hover:opacity-100 group-hover:scale-100 transition-all bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl shadow-xl overflow-hidden"
                  >
                    <div class="p-2 space-y-1">
                      <button onclick="updateLabel('harga', 'Semua Harga')" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-primary/10 transition-colors">Semua Harga</button>
                      <button onclick="updateLabel('harga', '< 500 Juta')" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-primary/10 transition-colors">< Rp500 Juta</button>
                      <button onclick="updateLabel('harga', '500 Juta - 1 M')" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-primary/10 transition-colors">Rp500 Juta - 1 M</button>
                      <button onclick="updateLabel('harga', '> 1 Miliar')" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-primary/10 transition-colors">> Rp1 Miliar</button>
                    </div>
                  </div>
                </div>

                <div class="relative group md:min-w-[180px]">
                  <button
                    class="w-full h-12 px-4 flex items-center justify-between bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl text-slate-700 dark:text-slate-200 text-sm font-semibold hover:border-primary transition-all"
                  >
                    <div class="flex items-center gap-2">
                      <span class="material-symbols-outlined text-lg opacity-70">home_work</span>
                      <span id="label-tipe">Semua Properti</span>
                    </div>
                    <span class="material-symbols-outlined text-sm transition-transform group-hover:rotate-180">expand_more</span>
                  </button>
                  <div
                    class="absolute z-20 w-full mt-2 origin-top scale-95 opacity-0 invisible group-hover:visible group-hover:opacity-100 group-hover:scale-100 transition-all bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl shadow-xl overflow-hidden"
                  >
                    <div class="p-2 space-y-1">
                      <button onclick="updateLabel('tipe', 'Semua Properti')" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-primary/10 transition-colors">Semua Properti</button>
                      <button onclick="updateLabel('tipe', 'Kantor')" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-primary/10 transition-colors">Kantor</button>
                      <button onclick="updateLabel('tipe', 'Gudang')" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-primary/10 transition-colors">Gudang</button>
                      <button onclick="updateLabel('tipe', 'Rumah')" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-primary/10 transition-colors">Rumah</button>
                      <button onclick="updateLabel('tipe', 'Ruko')" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-primary/10 transition-colors">Ruko</button>
                      <button onclick="updateLabel('tipe', 'Apartemen')" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-primary/10 transition-colors">Apartemen</button>
                      <button onclick="updateLabel('tipe', 'Tanah')" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-primary/10 transition-colors">Tanah</button>
                    </div>
                  </div>
                </div>
              </div>

              <button onclick="handleSearch()" class="h-12 px-8 bg-primary hover:bg-primary-dark text-white rounded-xl font-bold text-sm shadow-lg shadow-primary/30 transition-all flex items-center justify-center gap-2">
                <span>Cari</span>
              </button>
            </div>
          </div>
        </div>
      </section>
  <!-- Featured Properties Section -->

  <section class="relative w-full py-24 md:py-32 bg-background-light dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Section Header -->
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
        <div>
          <h2 class="text-3xl md:text-4xl font-bold text-text-main dark:text-white tracking-tight mb-2">Properti Unggulan</h2>
          <p class="text-text-muted dark:text-gray-400">Pilihan terbaik yang dikurasi khusus untuk Anda.</p>
        </div>
        <a class="flex items-center gap-1 text-primary font-bold text-sm hover:gap-2 transition-all" href="index.php?page=property"> Lihat Semua <span class="material-symbols-outlined text-lg">arrow_forward</span> </a>
      </div>
      <!-- Grid -->
      <div id="property-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Cards -->
        <?php foreach ($properties as $index => $property) : ?>
          <div onclick="window.location.href=`index.php?page=detail&name=<?= $property['title'] ?>`"
            class="property-card <?= $index >= 6 ? 'hidden' : '' ?> group hover:cursor-pointer relative bg-white dark:bg-slate-900 rounded-3xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-2xl hover:shadow-primary/10 transition-all duration-500 transform hover:-translate-y-2 max-w-sm md:max-w-none"
          >
            <div class="relative h-72 overflow-hidden">
              <img alt="Modern Minimalist House" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="<?= $property['image_url'] ?>" />

              <div
                class="absolute top-4 left-4 bg-surface-light/90 dark:bg-surface-dark/90 backdrop-blur-sm px-3 py-1 rounded-full text-[10px] font-bold text-text-main dark:text-white shadow-sm border border-black/5 tracking-wider uppercase"
              >
                Dijual
              </div>

              <button class="absolute top-4 right-4 p-2 rounded-full bg-surface-light/20 backdrop-blur-md hover:bg-white text-white hover:text-red-500 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
              </button>
            </div>

            <div class="p-6">
              <div class="flex flex-col gap-1 mb-4">
                <div class="flex justify-between items-start">
                  <h3 class="text-lg font-bold text-slate-800 dark:text-white leading-tight line-clamp-2 group-hover:text-primary transition-colors">
                    <?= $property['title']; ?>
                  </h3>
                </div>
                <p class="text-2xl font-semibold text-primary mt-1">Rp <?= number_format($property['price'], 0, ',', '.'); ?></p>
              </div>

              <div class="flex items-center gap-1.5 text-slate-500 dark:text-slate-400 text-sm mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span><?= $property['district'] ?>, <?= $property['city'] ?></span>
              </div>

              <div class="grid grid-cols-3 gap-2 pt-5 border-t border-slate-100 dark:border-slate-800">
                <div class="flex flex-col items-center gap-1">
                  <div class="flex items-center gap-1.5 text-slate-700 dark:text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="text-xs font-bold"><?= $property['bedrooms'] ?></span>
                  </div>
                  <span class="text-[10px] uppercase tracking-wider text-slate-400 font-medium">Kamar</span>
                </div>

                <div class="flex flex-col items-center gap-1 border-x border-slate-100 dark:border-slate-800">
                  <div class="flex items-center gap-1.5 text-slate-700 dark:text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                    </svg>
                    <span class="text-xs font-bold"><?= $property['bathrooms'] ?></span>
                  </div>
                  <span class="text-[10px] uppercase tracking-wider text-slate-400 font-medium">Mandi</span>
                </div>

                <div class="flex flex-col items-center gap-1">
                  <div class="flex items-center gap-1.5 text-slate-700 dark:text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5v-4m0 4h-4m4 0l-5-5" />
                    </svg>
                    <span class="text-xs font-bold"><?= $property['building_area'] ?>m²</span>
                  </div>
                  <span class="text-[10px] uppercase tracking-wider text-slate-400 font-medium">Luas</span>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <?php if (count($properties) > 6) : ?>
          <div class="flex justify-center mt-12">
              <button id="loadMoreBtn" class="px-8 py-3 bg-primary text-white font-bold rounded-full hover:bg-primary/90 transition-all shadow-lg shadow-primary/20">
                  Muat Lebih Banyak
              </button>
          </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- Stats/Trusted Section (Optional filler to balance height) -->
  <section class="border-t border-border-light dark:border-border-dark bg-white dark:bg-surface-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div>
          <p class="text-3xl font-black text-primary mb-1">200+</p>
          <p class="text-sm font-medium text-text-muted">Desain Terealisasi</p>
        </div>

        <div>
          <p class="text-3xl font-black text-primary mb-1">250+</p>
          <p class="text-sm font-medium text-text-muted">Transaksi Klien</p>
        </div>

        <div>
          <p class="text-3xl font-black text-primary mb-1">60+</p>
          <p class="text-sm font-medium text-text-muted">Proyek Build Selesai</p>
        </div>

        <div>
          <p class="text-3xl font-black text-primary mb-1">5+</p>
          <p class="text-sm font-medium text-text-muted">Kota & Kabupaten</p>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- Chatbot -->
    <div id="chat-wrapper" class="fixed bottom-6 right-6 z-[9999] font-sans">
      <button onclick="toggleChat()" id="chat-btn" class="w-14 h-14 bg-primary text-white rounded-full shadow-2xl flex items-center justify-center hover:scale-110 transition-all">
        <span class="material-symbols-outlined text-3xl">smart_toy</span>
      </button>

      <div id="chat-box" class="hidden absolute bottom-20 right-0 w-[350px] h-[500px] bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden flex flex-col scale-in-center">
        <div class="bg-primary p-5 text-white flex items-center justify-between">
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
              <span class="material-symbols-outlined text-sm">robot_2</span>
            </div>
            <div>
              <p class="text-sm font-bold">Dabelyu Assistant</p>
              <p class="text-[10px] opacity-80">AI Properti • Online</p>
            </div>
          </div>
          <button onclick="toggleChat()" class="hover:bg-white/10 rounded-full p-1">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>

        <div id="chat-messages" class="flex-1 p-5 overflow-y-auto space-y-4 bg-gray-50/50 text-sm">
          <div class="bg-white p-3 rounded-2xl rounded-tl-none shadow-sm border border-gray-100 max-w-[80%]">
            Halo 👋 <br />
            Saya asisten virtual Dabelyuland. Siap membantu informasi properti, desain, dan layanan terkait.
          </div>
        </div>

        <div class="p-4 bg-white border-t border-gray-100 flex gap-2">
          <input type="text" id="user-input" placeholder="Tanya sesuatu..." class="flex-1 bg-gray-100 border-none rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-primary/20" />
          <button onclick="askGemini()" class="bg-primary text-white p-2 rounded-xl hover:bg-primary-dark transition-colors flex items-center justify-center">
            <span class="material-symbols-outlined text-sm">send</span>
          </button>
        </div>
      </div>
    </div>
<script>
      function initHeroCarousel() {
        const slides = document.querySelectorAll(".hero-slide");
        let currentSlide = 0;

        function nextSlide() {
          // Sembunyikan slide saat ini
          slides[currentSlide].classList.replace("opacity-100", "opacity-0");

          // Hitung index selanjutnya
          currentSlide = (currentSlide + 1) % slides.length;

          // Tampilkan slide berikutnya
          slides[currentSlide].classList.replace("opacity-0", "opacity-100");
        }

        // Jalankan otomatis setiap 5 detik
        setInterval(nextSlide, 5000);
      }

      document.addEventListener('DOMContentLoaded', function () {
          const loadMoreBtn = document.getElementById('loadMoreBtn');
          const cards = document.querySelectorAll('.property-card');
          let itemsShown = 6; // Jumlah awal yang tampil

          if (loadMoreBtn) {
              loadMoreBtn.addEventListener('click', function () {
                  // Ambil 6 card berikutnya yang masih tersembunyi
                  const hiddenCards = Array.from(cards).slice(itemsShown, itemsShown + 4);
                  
                  hiddenCards.forEach(card => {
                      card.classList.remove('hidden');
                      // Tambahkan animasi fade-in sederhana
                      card.classList.add('animate-fade-in'); 
                  });

                  itemsShown += 6;

                  // Sembunyikan tombol jika semua card sudah tampil
                  if (itemsShown >= cards.length) {
                      loadMoreBtn.parentElement.style.display = 'none';
                  }
              });
          }
      });
      
      // Jalankan fungsi setelah DOM siap
      document.addEventListener("DOMContentLoaded", initHeroCarousel);

      const API_KEY = "AIzaSyAZNj7Lt-LMg_WQT0LzZOFvIhaG6rxFnBA";
      const chatBox = document.getElementById("chat-box");
      const messagesContainer = document.getElementById("chat-messages");

      function toggleChat() {
        chatBox.classList.toggle("hidden");
      }

      async function askGemini() {
        const inputField = document.getElementById("user-input");
        const userText = inputField.value.trim();
        if (!userText) return;

        // 1. Tampilkan pesan user
        appendMessage(userText, "user");
        inputField.value = "";

        // 2. Tampilkan indikator mengetik (Loading)
        const loadingId = "loading-" + Date.now();
        showLoading(loadingId);

        try {
          const response = await fetch(`https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=${API_KEY}`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
              contents: [
                {
                  parts: [
                    {
                      text: `Kamu adalah asisten virtual resmi Dabelyuland.
Jawablah dengan bahasa profesional, jelas, dan humanis.
Gunakan kalimat ringkas namun informatif (tidak terlalu singkat).
Hindari paragraf panjang, gunakan poin jika diperlukan.
Akhiri setiap jawaban dengan satu pertanyaan relevan untuk melanjutkan percakapan.
 Pertanyaan: ${userText}`,
                    },
                  ],
                },
              ],
            }),
          });

          const data = await response.json();

          // 3. Hapus indikator mengetik
          removeLoading(loadingId);

          const aiText = data.candidates[0].content.parts[0].text;
          appendMessage(aiText, "ai");
        } catch (error) {
          removeLoading(loadingId);
          appendMessage("Maaf, sedang ada gangguan koneksi. Coba lagi ya!", "ai");
        }
      }

      // Fungsi pembantu untuk memunculkan loading
      function showLoading(id) {
        const div = document.createElement("div");
        div.id = id;
        div.className = "bg-white p-3 rounded-2xl rounded-tl-none shadow-sm border border-gray-100 mr-auto max-w-[17%] flex gap-1 items-center typing-dots";
        div.innerHTML = `<span></span><span></span><span></span>`;
        messagesContainer.appendChild(div);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
      }

      // Fungsi pembantu untuk menghapus loading
      function removeLoading(id) {
        const el = document.getElementById(id);
        if (el) el.remove();
      }

      function appendMessage(text, sender) {
        const div = document.createElement("div");
        div.className = sender === "user" ? "bg-primary text-white p-3 rounded-2xl rounded-tr-none shadow-md ml-auto max-w-[80%]" : "bg-white p-3 rounded-2xl rounded-tl-none shadow-sm border border-gray-100 mr-auto max-w-[80%]";
        div.innerText = text;
        messagesContainer.appendChild(div);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
      }

      document.getElementById("user-input").addEventListener("keypress", function (e) {
        if (e.key === "Enter") {
          e.preventDefault(); // Mencegah reload halaman
          askGemini();
        }
      });

      // Fungsi untuk mengubah teks pada tombol dropdown secara visual
      function updateLabel(type, value) {
        document.getElementById("label-" + type).innerText = value;
      }

      // Fungsi untuk mengarahkan ke halaman tujuan dengan filter yang dipilih
      function handleSearch() {
        const pencarian = document.getElementById("pencarian").value;
        const harga = document.getElementById("label-harga").innerText;
        const tipe = document.getElementById("label-tipe").innerText;

        // Menyusun URL dengan parameter agar halaman tujuan bisa membaca pilihan user
          const targetURL = `index.php?page=property&search=${encodeURIComponent(pencarian)}&harga=${encodeURIComponent(harga)}&tipe=${encodeURIComponent(tipe)}`;
        // Berpindah halaman
        window.location.href = targetURL;
      }
    </script>
