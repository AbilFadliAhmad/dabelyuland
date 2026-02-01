<main class="w-full pb-20">
      <section class="relative z-30 mt-16 mb-12 flex justify-center px-6">
        <div class="w-full max-w-4xl bg-white dark:bg-slate-900 rounded-2xl shadow-xl p-4 md:p-3 border border-slate-200 dark:border-slate-800 flex flex-col md:flex-row gap-3 md:items-center">
          <div class="flex-1 relative group flex items-center">
            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
              <span class="material-symbols-outlined text-xl">search</span>
            </div>
            <input
              id="pencarian"
              class="w-full h-12 pl-11 pr-4 bg-slate-50 dark:bg-slate-800 border-none rounded-xl text-sm outline-none focus:ring-2 focus:ring-primary/20"
              placeholder="Cari lokasi (Jombang, Surabaya, dsb)"
              type="text"
              value="<?= $filters['search'] ?>"
            />
          </div>

          <div class="relative group md:min-w-[160px]">
            <button class="w-full h-12 px-4 flex items-center justify-between bg-white dark:bg-slate-800 border border-slate-200 rounded-xl text-sm font-semibold">
              <span id="label-harga"><?= $filters['harga'] ?></span>
              <span class="material-symbols-outlined text-sm">expand_more</span>
            </button>
            <div class="absolute left-0 z-[100] w-full mt-2 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-all bg-white dark:bg-slate-800 border border-slate-200 rounded-xl shadow-2xl">
              <div class="p-2 space-y-1">
                <button onclick="updateLabel('harga', 'Semua Harga')" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-primary/10">Semua Harga</button>
                <button onclick="updateLabel('harga', '< 500 Juta')" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-primary/10">< 500 Juta</button>
                <button onclick="updateLabel('harga', '500 Juta - 1 M')" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-primary/10">< 500 Juta - 1 M</button>
                <button onclick="updateLabel('harga', '> 1 Miliar')" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-primary/10"><> 1 Miliar</button>
              </div>
            </div>
          </div>

          <div class="relative group md:min-w-[180px]">
            <button class="w-full h-12 px-4 flex items-center justify-between bg-white dark:bg-slate-800 border border-slate-200 rounded-xl text-sm font-semibold">
              <span id="label-tipe"><?= $filters['tipe'] ?></span>
              <span class="material-symbols-outlined text-sm">expand_more</span>
            </button>
            <div class="absolute left-0 z-[100] w-full mt-2 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-all bg-white dark:bg-slate-800 border border-slate-200 rounded-xl shadow-2xl">
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

          <button onclick="filterProperti()" class="h-12 px-10 bg-primary hover:bg-primary-dark text-white rounded-xl font-bold text-sm shadow-lg transition-all flex-shrink-0">Cari</button>
        </div>
      </section>

      <!-- unggulan dabelyuland -->
      <section class="mt-12 max-w-[1440px] mx-auto px-6 lg:px-12">
        <div class="flex items-center justify-between mb-6">
          <h2 class="text-2xl font-bold tracking-tight text-text-main">Properti Unggulan Dabelyuland</h2>
        </div>

        <?php if (!empty($properties)) : ?>

        <!-- Grid -->
          <div id="property-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Cards -->
            <?php foreach ($properties as $index => $property) : ?>
              <div onclick="window.location.href=`index.php?page=detail&name=<?= $property['title'] ?>`"
                class="property-card <?= $index >= 8 ? 'hidden' : '' ?> group hover:cursor-pointer relative bg-white dark:bg-slate-900 rounded-3xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-2xl hover:shadow-primary/10 transition-all duration-500 transform hover:-translate-y-2 max-w-sm md:max-w-none"
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
          <?php if (count($properties) > 8) : ?>
              <div class="flex justify-center mt-12">
                  <button id="loadMoreBtn" class="px-8 py-3 bg-primary text-white font-bold rounded-full hover:bg-primary/90 transition-all shadow-lg shadow-primary/20">
                      Muat Lebih Banyak
                  </button>
              </div>
          <?php endif; ?>

          </div>
        <?php else : ?>
            <div class="flex flex-col items-center justify-center py-20 px-6 bg-slate-50 dark:bg-slate-800/50 rounded-[40px] border-2 border-dashed border-slate-200 dark:border-slate-700">
                <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-5xl text-primary">search_off</span>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 dark:text-white mb-2">Properti Tidak Ditemukan</h3>
                <p class="text-slate-500 dark:text-slate-400 text-center max-w-md mb-8">
                    Maaf, kami tidak dapat menemukan properti yang sesuai dengan kriteria pencarian Anda. Coba ubah filter atau gunakan kata kunci lain.
                </p>
                <a href="index.php?page=property" class="flex items-center gap-2 px-6 py-3 bg-white dark:bg-slate-900 text-primary font-bold rounded-2xl border border-primary hover:bg-primary hover:text-white transition-all shadow-sm">
                    <span class="material-symbols-outlined text-sm">refresh</span>
                    Reset Semua Filter
                </a>
            </div>
        <?php endif; ?>
      </section>
    </main>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
          const loadMoreBtn = document.getElementById('loadMoreBtn');
          const cards = document.querySelectorAll('.property-card');
          let itemsShown = 8; // Jumlah awal yang tampil

          console.log(loadMoreBtn, 'cards');
          if (loadMoreBtn) {
              loadMoreBtn.addEventListener('click', function () {
                  // Ambil 8 card berikutnya yang masih tersembunyi
                  const hiddenCards = Array.from(cards).slice(itemsShown, itemsShown + 8);
                  console.log('oke', hiddenCards)
                  
                  hiddenCards.forEach(card => {
                      card.classList.remove('hidden');
                      // Tambahkan animasi fade-in sederhana
                      card.classList.add('animate-fade-in'); 
                  });

                  itemsShown += 8;

                  // Sembunyikan tombol jika semua card sudah tampil
                  if (itemsShown >= cards.length) {
                      loadMoreBtn.parentElement.style.display = 'none';
                  }
              });
          }
      });
      function updateLabel(type, value) {
        // Ganti teks label
        document.getElementById("label-" + type).innerText = value;

        // Paksa dropdown tertutup dengan menghilangkan fokus
        if (document.activeElement) {
          document.activeElement.blur();
        }
      }

      function filterProperti() {
        const pencarian = document.getElementById("pencarian").value;
        const harga = document.getElementById("label-harga").innerText;
        const tipe = document.getElementById("label-tipe").innerText;
        // Menyusun URL dengan parameter agar halaman tujuan bisa membaca pilihan user
          const targetURL = `index.php?page=property&search=${encodeURIComponent(pencarian)}&harga=${encodeURIComponent(harga)}&tipe=${encodeURIComponent(tipe)}`;
        // Berpindah halaman
        window.location.href = targetURL;
      }

      function handleLoadMore() {
        const btn = document.getElementById("load-more-btn");
        const btnText = document.getElementById("btn-text");
        const btnLoader = document.getElementById("btn-loader");
        const container = document.getElementById("property-container");

        // 1. Ubah ke state Loading
        btn.disabled = true;
        btnText.innerText = "Memuat...";
        btnLoader.classList.remove("hidden");

        // 2. Simulasi loading data (misal 1.5 detik)
        setTimeout(() => {
          // 3. Render baris baru (Contoh menambahkan 7 kartu baru)
          for (let i = 0; i < 7; i++) {
            const newCard = ``;
            container.insertAdjacentHTML("beforeend", newCard);
          }

          // 4. Kembalikan state tombol
          btn.disabled = false;
          btnText.innerText = "Muat Lebih Banyak";
          btnLoader.classList.add("hidden");

          // Opsional: Sembunyikan tombol jika data sudah habis
          // btn.style.display = 'none';
        }, 1500);
      }
    </script>