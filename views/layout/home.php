<main class="flex-1 w-full">
  <!-- Hero Section -->
  <section class="relative w-full h-[600px] lg:h-[700px] flex items-center justify-center overflow-hidden">
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
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center text-center -mt-20">
      <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white leading-tight tracking-tight mb-4 drop-shadow-sm">Hunian Mewah <br class="hidden md:block" />Impian Anda</h1>
      <p class="text-lg md:text-xl text-white/90 font-medium max-w-2xl drop-shadow-sm mb-12">Exclusive listings for the modern lifestyle. Temukan properti premium yang sesuai dengan gaya hidup Anda.</p>
      <!-- Floating Search Bar -->
      <div
        class="w-full max-w-4xl bg-surface-light dark:bg-surface-dark rounded-xl shadow-2xl p-4 md:p-3 transform translate-y-8 md:translate-y-12 transition-all border border-white/20 dark:border-white/5 backdrop-blur-sm bg-opacity-95 dark:bg-opacity-95"
      >
        <div class="flex flex-col md:flex-row gap-3 md:items-center">
          <!-- Location Input -->
          <div class="flex-1 relative group flex items-center">
            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-text-muted group-focus-within:text-primary transition-colors duration-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
              </svg>
            </div>

            <input
              class="w-full h-12 pl-11 pr-4 bg-background-light dark:bg-background-dark/50 border border-transparent rounded-xl text-text-main dark:text-white placeholder:text-text-muted/70 focus:bg-white dark:focus:bg-background-dark focus:border-primary/50 focus:ring-4 focus:ring-primary/10 text-sm font-medium transition-all duration-200 outline-none"
              placeholder="Lokasi, kota, atau nama gedung..."
              type="text"
            />
          </div>
          <div class="hidden md:block w-px h-8 bg-border-light dark:bg-border-dark"></div>
          <div class="grid grid-cols-2 md:flex gap-3 md:gap-3 md:w-auto">
            <div class="relative group md:min-w-[160px]">
              <button
                class="w-full h-12 px-4 flex items-center justify-between bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl text-slate-700 dark:text-slate-200 text-sm font-semibold hover:border-primary-500 hover:ring-2 hover:ring-primary-500/10 transition-all duration-200"
              >
                <div class="flex items-center gap-2">
                  <span class="material-symbols-outlined text-lg opacity-70">payments</span>
                  <span>Harga</span>
                </div>
                <span class="material-symbols-outlined text-sm transition-transform group-hover:rotate-180">expand_more</span>
              </button>

              <div
                class="absolute z-10 w-full mt-2 origin-top scale-95 opacity-0 invisible group-hover:visible group-hover:opacity-100 group-hover:scale-100 transition-all duration-200 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl shadow-xl overflow-hidden"
              >
                <div class="p-2 space-y-1">
                  <button class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">Termurah</button>
                  <button class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">Termahal</button>
                </div>
              </div>
            </div>

            <div class="relative group md:min-w-[180px]">
              <button
                class="w-full h-12 px-4 flex items-center justify-between bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl text-slate-700 dark:text-slate-200 text-sm font-semibold hover:border-primary-500 hover:ring-2 hover:ring-primary-500/10 transition-all duration-200"
              >
                <div class="flex items-center gap-2">
                  <span class="material-symbols-outlined text-lg opacity-70">home_work</span>
                  <span>Tipe Properti</span>
                </div>
                <span class="material-symbols-outlined text-sm transition-transform group-hover:rotate-180">expand_more</span>
              </button>

              <div
                class="absolute z-10 w-full mt-2 origin-top scale-95 opacity-0 invisible group-hover:visible group-hover:opacity-100 group-hover:scale-100 transition-all duration-200 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl shadow-xl overflow-hidden"
              >
                <div class="p-2 space-y-1">
                  <button class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">Rumah</button>
                  <button class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">Apartemen</button>
                  <button class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-gray-100 dark:hover:bg-slate-700 transition-colors">Ruko</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Search Button -->
          <button class="h-12 px-8 bg-primary hover:bg-primary-dark text-white rounded-lg font-bold text-sm shadow-lg shadow-primary/30 transition-all flex items-center justify-center gap-2">
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
        <a class="flex items-center gap-1 text-primary font-bold text-sm hover:gap-2 transition-all" href="#"> Lihat Semua <span class="material-symbols-outlined text-lg">arrow_forward</span> </a>
      </div>
      <!-- Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Cards -->
        <?php foreach ($properties as $property) : ?>
          <div
            class="group relative bg-white dark:bg-slate-900 rounded-3xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-2xl hover:shadow-primary/10 transition-all duration-500 transform hover:-translate-y-2 max-w-sm md:max-w-none"
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

  // Jalankan fungsi setelah DOM siap
  document.addEventListener("DOMContentLoaded", initHeroCarousel);
</script>
