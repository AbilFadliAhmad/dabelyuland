<!doctype html>
<html lang="id" class="light">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="icon" type="image/png" href="../dabelyu logo.png" />
    <title>Jual Properti - Dabelyuland Indonesia</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <script id="tailwind-config">
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#135bec",
              "primary-dark": "#0f4bc2",
            },
            fontFamily: {
              sans: ["'Plus Jakarta Sans'", "sans-serif"],
            },
          },
        },
      };
    </script>

    <style type="text/tailwindcss">
      @layer components {
        .form-card {
          @apply bg-white rounded-3xl shadow-sm border border-gray-100 p-6 md:p-8 mb-8 transition-all hover:shadow-md;
        }
        .input-label {
          @apply block text-sm font-bold text-gray-700 mb-2 ml-1;
        }
        .input-field {
          @apply w-full px-4 py-3 rounded-2xl border border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none text-gray-900 bg-gray-50/50;
        }
        .icon-badge {
          @apply p-2 bg-primary/10 text-primary rounded-xl mb-4 inline-flex;
        }
      }
      #map {
        height: 350px;
        z-index: 1;
        border-radius: 1.5rem;
      }
    </style>
  </head>

  <body class="bg-gray-50 text-gray-900 antialiased font-sans">
    <div class="max-w-4xl mx-auto px-4 pt-8">
    <a href="javascript:history.back()" class="group inline-flex items-center gap-2 text-gray-500 hover:text-primary transition-all duration-300">
        <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-gray-100 shadow-sm group-hover:shadow-md group-hover:border-primary/20 transition-all">
            <span class="material-symbols-outlined text-xl group-hover:-translate-x-1 transition-transform">arrow_back</span>
        </div>
        <span class="text-sm font-bold tracking-wide uppercase">Kembali</span>
    </a>
    <main class="max-w-4xl mx-auto px-4 py-12">
      <div class="mb-12 text-center md:text-left">
        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Tambah Properti Baru</h1>
        <p class="text-gray-500 mt-2 text-lg">Lengkapi detail properti Anda untuk dipublikasikan ke Dabelyuland.</p>
      </div>

      <form action="index.php?page=upload&action=store" method="POST" onsubmit="return validateForm();">
        <input type="hidden" name="property_id" value=<?= $propertyId ?>>
        <section class="form-card">
          <div class="icon-badge">
            <span class="material-symbols-outlined">info</span>
          </div>
          <h3 class="text-xl font-extrabold mb-6">Informasi Utama</h3>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
              <label class="input-label">Judul Properti</label>
              <input type="text" value="<?= $property['title'] ?? '' ?>" name="title" required class="input-field" placeholder="Villa Modern di Pusat Kota" />
            </div>
            <div>
              <label class="input-label">Harga (IDR)</label>
              <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-bold text-sm">Rp</span>
                <input value="<?= $property['price'] ?? 0 ?>" type="number" name="price" required class="input-field pl-12" placeholder="0" />
              </div>
            </div>
            <div class="grid grid-cols-3 gap-3">
              <div>
                <label class="input-label">Kamar</label>
                <input type="number" value="<?= $property['bedrooms'] ?? 0 ?>" name="bedrooms" class="input-field text-center px-2" placeholder="0" />
              </div>
              <div>
                <label class="input-label">Toilet</label>
                <input type="number" value="<?= $property['bathrooms'] ?? 0 ?>" name="bathrooms" class="input-field text-center px-2" placeholder="0" />
              </div>
              <div>
                <label class="input-label">Luas m²</label>
                <input type="number" value="<?= $property['building_area'] ?? 0 ?>" name="building_area" class="input-field text-center px-2" placeholder="0" />
              </div>
            </div>
          </div>
        </section>

        <!-- kategori -->
        <section class="form-card">
            <div class="icon-badge">
                <span class="material-symbols-outlined">category</span>
            </div>
            <h3 class="text-xl font-extrabold mb-2">Kategori Layanan Dabelyuland</h3>
            <p class="text-sm text-gray-500 mb-6">Pilih kategori properti atau jasa yang ingin Anda tampilkan.</p>
           
          <div class="flex flex-wrap gap-3" id="category-container">
            <?php
            // Daftar kategori agar kode lebih bersih (DRY - Don't Repeat Yourself)
            $categories = ['Kantor', 'Gudang', 'Rumah', 'Ruko', 'Apartemen', 'Tanah'];
            
            foreach ($categories as $cat) :
            ?>
                <label class="cursor-pointer">
                    <input type="radio" 
                          name="category" 
                          value="<?= $cat; ?>" 
                          class="hidden peer"
                          <?= ($property['category'] ?? '' == $cat) ? 'checked' : ''; ?>
                          >
                    <span class="px-6 py-3 rounded-2xl border-2 border-gray-100 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary font-bold transition-all block text-sm">
                        <?= $cat; ?>
                    </span>
                </label>
            <?php endforeach; ?>
        </div>
        </section>

        <section class="form-card">
          <div class="icon-badge">
            <span class="material-symbols-outlined">description</span>
          </div>
          <h3 class="text-xl font-extrabold mb-2">Deskripsi Detail</h3>
          <p class="text-sm text-gray-500 mb-6">Ceritakan keunggulan properti Anda kepada calon pembeli.</p>
          <textarea 
              name="description" 
              rows="5" 
              class="input-field resize-none py-4" 
              placeholder="Tulis deskripsi lengkap hunian di sini..."
          ><?= htmlspecialchars($property['description'] ?? '') ?>
          </textarea>
        </section>

        <section class="form-card">
          <div class="icon-badge">
              <span class="material-symbols-outlined">star</span>
          </div>
          <h3 class="text-xl font-extrabold mb-6">Fasilitas Properti</h3>
          
          <div id="facility-container" class="space-y-3">
              <?php 
              // Asumsikan $property['facilities'] berisi array string, misal: ['WiFi', 'AC']
              // Jika data dari database berupa JSON string, jangan lupa di-json_decode dulu
              $existing_facilities = $property['facilities'] ?? []; 
              
              if (!empty($existing_facilities)): 
                  foreach ($existing_facilities as $index => $facility): 
              ?>
                  <div class="flex items-center gap-3 animate-in fade-in duration-300">
                      <input type="text" name="facility_label[]" 
                            value="<?= htmlspecialchars($facility) ?>" 
                            placeholder="Contoh: Wifi 500Mbps" 
                            class="flex-1 input-field" />
                      
                      <?php if ($index === 0): ?>
                          <div class="w-10"></div> <?php else: ?>
                          <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600 transition-colors p-2">
                              <span class="material-symbols-outlined">delete</span>
                          </button>
                      <?php endif; ?>
                  </div>
              <?php 
                  endforeach; 
              else: 
              ?>
                  <div class="flex items-center gap-3">
                      <input type="text" name="facility_label[]" placeholder="Contoh: Wifi 500Mbps, AC, Kolam Renang" class="flex-1 input-field" />
                      <div class="w-10"></div>
                  </div>
              <?php endif; ?>
          </div>

          <button type="button" onclick="addFacility()" class="mt-6 flex items-center gap-2 text-primary font-bold text-sm hover:underline">
              <span class="material-symbols-outlined text-lg">add_circle</span> Tambah Fasilitas Lain
          </button>
      </section>

        <section class="form-card">
          <div class="icon-badge">
            <span class="material-symbols-outlined">photo_library</span>
          </div>
          <h3 class="text-xl font-extrabold mb-2">Galeri Foto</h3>
          <p class="text-sm text-gray-500 mb-8">Minimal 5 foto. Gunakan kotak pertama sebagai foto sampul utama.</p>
          <div id="image-grid" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4"></div>
        </section>

        <section class="form-card">
          <div class="icon-badge">
            <span class="material-symbols-outlined">location_on</span>
          </div>
          <h3 class="text-xl font-extrabold mb-6">Lokasi Properti</h3>
          <div id="map" class="mb-8 border border-gray-100 shadow-inner"></div>
          <input type="hidden" name="latitude" id="lat" />
          <input type="hidden" name="longitude" id="lng" />
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <input type="text" name="city" id="city" class="input-field" value="<?= $property['city'] ?? '' ?>" placeholder="Kota/Kabupaten" />
            <input type="text" name="district" id="district" class="input-field" value="<?= $property['district'] ?? '' ?>" placeholder="Kecamatan" />
            <textarea name="address_detail" rows="2" class="md:col-span-2 input-field" placeholder="Detail Alamat (Jalan, No. Rumah, Blok)"><?= $property['address_detail'] ?? '' ?></textarea>
          </div>
        </section>

        <div class="flex flex-col md:flex-row items-center justify-between gap-6 py-8">
          <p class="text-sm text-gray-400 font-medium text-center md:text-left leading-relaxed">
            Dengan menekan simpan, data akan dikirim ke <br />
            sistem verifikasi Dabelyuland Indonesia.
          </p>
          <button type="submit" class="w-full md:w-auto bg-primary hover:bg-primary-dark text-white px-12 py-4 rounded-2xl font-black text-lg shadow-xl shadow-primary/20 transition-all hover:-translate-y-1">SIMPAN PROPERTI</button>
        </div>
      </form>
    </main>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
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
      const propertyId = "<?php echo $propertyId; ?>";
      /* ==========================================
       JS LOGIC - ORIGINAL (Sesuai Kode Anda)
       ========================================== */
      const defaultLat = <?= json_encode((float)($property['latitude'] ?? -6.2)) ?>;
      const defaultLng = <?= json_encode((float)($property['longitude'] ?? 106.816666)) ?>;

      const map = L.map("map").setView([defaultLat, defaultLng], 13);
      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", { attribution: "© OpenStreetMap" }).addTo(map);
      let marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

      document.getElementById("lat").value = defaultLat;
      document.getElementById("lng").value = defaultLng;

      function updateCoords(lat, lng) {
        document.getElementById("lat").value = lat;
        document.getElementById("lng").value = lng;
      }

      marker.on("dragend", (e) => updateCoords(marker.getLatLng().lat, marker.getLatLng().lng));
      map.on("click", (e) => {
        marker.setLatLng(e.latlng);
        updateCoords(e.latlng.lat, e.latlng.lng);
      });

      // Fasilitas (Disederhanakan menjadi Label saja sesuai permintaan sebelumnya)
      function addFacility() {
          const container = document.getElementById("facility-container");
          const div = document.createElement("div");
          div.className = "flex items-center gap-3 animate-in fade-in duration-300";
          div.innerHTML = `
              <input type="text" name="facility_label[]" placeholder="Label Fasilitas" class="flex-1 input-field" />
              <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600 transition-colors p-2">
                  <span class="material-symbols-outlined">delete</span>
              </button>
          `;
          container.appendChild(div);
      }

      // Gambar Properti
      const imageGrid = document.getElementById("image-grid");
      let fileCounter = 0;

      function createUploadSlot(isFirst = false) {
        fileCounter++;
        const slotId = `file-${fileCounter}`;
        const div = document.createElement("div");
        const borderClass = isFirst ? "border-primary border-2" : "border-gray-200 border-2";

        div.className = `relative group aspect-square border-dashed rounded-2xl overflow-hidden hover:border-primary transition-all bg-gray-50/50 ${borderClass}`;
        div.id = `container-${slotId}`;

        div.innerHTML = `
            <label for="${slotId}" class="flex flex-col items-center justify-center w-full h-full cursor-pointer hover:bg-emerald-50/10">
                ${isFirst ? '<span class="absolute top-2 left-2 bg-primary text-white text-[10px] px-2 py-0.5 rounded shadow-sm z-10 font-bold uppercase">Utama</span>' : ""}
                <div class="flex flex-col items-center justify-center text-gray-400 group-hover:text-primary transition-colors" id="placeholder-${slotId}">
                    <span class="material-symbols-outlined text-3xl mb-1">${isFirst ? "photo_camera" : "add"}</span>
                    <span class="text-[10px] font-bold uppercase tracking-tighter">${isFirst ? "Sampul" : "Tambah"}</span>
                </div>
                <img id="preview-${slotId}" class="hidden w-full h-full object-cover" />
                <input id="${slotId}" name="images[]" type="file" class="hidden image-input" accept="image/*" onchange="previewImage(this, '${slotId}', ${fileCounter})" />
            </label>
            ${
              !isFirst
                ? `
            <button type="button" onclick="removeSlot('${slotId}')" class="absolute top-2 right-2 bg-red-500 text-white rounded-lg p-1 opacity-0 group-hover:opacity-100 transition-all scale-75 group-hover:scale-100">
                <span class="material-symbols-outlined text-sm">close</span>
            </button>`
                : ""
            }
        `;
        imageGrid.appendChild(div);
      }

      // Fungsi Preview Gambar
    async function previewImage(input, id, urutan) {
      if (input.files && input.files[0]) {
        const file = input.files[0];
        const container = document.getElementById(`container-${id}`);
        const preview = document.getElementById(`preview-${id}`);
        const placeholder = document.getElementById(`placeholder-${id}`);
        const submitBtn = document.querySelector('button[type="submit"]');
        const reader = new FileReader();
        reader.onload = function (e) {
          document.getElementById(`preview-${id}`).src = e.target.result;
          document.getElementById(`preview-${id}`).classList.remove("hidden");
          document.getElementById(`placeholder-${id}`).classList.add("hidden");

          // Cek apakah perlu tambah kotak baru
          checkAndAddSlot();
        };
        reader.readAsDataURL(input.files[0]);

        // 2. State Loading & Disable Submit
          container.classList.add('opacity-50', 'pointer-events-none');
          const loadingIndicator = addLoadingUI(container); // Tambahkan elemen spinner
          submitBtn.disabled = true;
          submitBtn.classList.add('bg-gray-400');
          submitBtn.classList.add('hover:bg-gray-700');
          submitBtn.textContent = 'Tunggu Sebentar...';

          // 3. Kirim ke Server (AJAX)
          const formData = new FormData();
          formData.append('image', file);
          formData.append('property_id', propertyId);
          formData.append('is_main', id === 'file-1' ? 1 : 0);
          formData.append('urutan', urutan);

          try {
              const response = await fetch('index.php?page=upload&action=async_upload', {
                  method: 'POST',
                  body: formData
              });
              
              if (response.ok) {
                  console.log('Upload sukses:');
              }
          } catch (error) {
            console.error('Gagal mengunggah gambar:', error);
              alert('Gagal mengunggah gambar');
          } finally {
              // 4. Selesai Loading
              container.classList.remove('opacity-50', 'pointer-events-none');
              loadingIndicator.remove();
              submitBtn.disabled = false;
              submitBtn.classList.remove('bg-gray-400');
              submitBtn.classList.remove('hover:bg-gray-700');
              submitBtn.textContent = 'SIMPAN PROPERTI';
          }
      }
    }

    function addLoadingUI(container) {
      const loader = document.createElement('div');
      loader.className = "absolute inset-0 flex items-center justify-center bg-white/50";
      loader.innerHTML = '<div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>';
      container.appendChild(loader);
      return loader;
  }
      function removeSlot(id) {
        const total = imageGrid.children.length;
        if (total > 4) document.getElementById(`container-${id}`).remove();
        else {
          const input = document.getElementById(id);
          input.value = "";
          document.getElementById(`preview-${id}`).classList.add("hidden");
          document.getElementById(`placeholder-${id}`).classList.remove("hidden");
        }
      }

      function checkAndAddSlot() {
        const total = imageGrid.children.length;
        const filled = Array.from(document.querySelectorAll(".image-input")).filter((i) => i.value !== "").length;
        if (filled === total) createUploadSlot(false);
      }

      function validateForm() {
          // 1. Validasi Gambar Utama
          const mainImage = document.querySelector(".image-input");
          if (!mainImage || mainImage.files.length === 0) {
              alert("Mohon unggah gambar utama (kotak pertama) sebagai foto sampul properti!");
              // Pastikan container mendapatkan perhatian visual
              document.getElementById("container-file-1").scrollIntoView({ behavior: 'smooth', block: 'center' });
              return false;
          }

          // 2. Validasi Kategori
          // Mencari radio button yang dipilih dalam grup 'category'
          const selectedCategory = document.querySelector('input[name="category"]:checked');
          
          if (!selectedCategory) {
              alert("Silakan pilih salah satu Kategori Layanan!");
              
              // Opsional: Scroll ke bagian kategori agar user tahu mana yang harus diisi
              document.getElementById("category-container").scrollIntoView({ behavior: 'smooth', block: 'center' });
              
              // Memberi border merah tipis pada container kategori sebagai penanda
              const catContainer = document.getElementById("category-container");
              catContainer.classList.add("p-2", "border-2", "border-red-500", "rounded-2xl");
              
              return false;
          }

          return true; // Semua validasi lolos, form akan dikirim
      }

      // Init slots
      createUploadSlot(true);
      for (let i = 0; i < 4; i++) createUploadSlot(false);
    </script>
  </body>
</html>
