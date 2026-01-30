<div class="p-6">
  <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Properti Baru</h2>

    <form action="index.php?page=upload&action=store" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()" class="space-y-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Judul Properti</label>
          <input type="text" name="title" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2 bg-gray-50 focus:ring-blue-500 border" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Harga (IDR)</label>
          <input type="number" name="price" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2 bg-gray-50 focus:ring-blue-500 border" />
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Kamar Tidur</label>
          <input type="number" name="bedrooms" class="mt-1 block w-full border p-2 rounded-md" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Kamar Mandi</label>
          <input type="number" name="bathrooms" class="mt-1 block w-full border p-2 rounded-md" />
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Luas Bangun (m2)</label>
          <input type="number" name="building_area" class="mt-1 block w-full border p-2 rounded-md" />
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Fasilitas (Ikon & Label)</label>
        <div id="facility-container" class="space-y-2">
          <div class="flex gap-2">
            <input type="text" name="facility_icon[]" placeholder="Ikon (e.g. wifi)" class="flex-1 border p-2 rounded-md" />
            <input type="text" name="facility_label[]" placeholder="Label (e.g. Wifi 500Mbps)" class="flex-2 border p-2 rounded-md" />
          </div>
        </div>
        <button type="button" onclick="addFacility()" class="mt-2 text-sm text-blue-600 font-semibold">+ Tambah Fasilitas Lain</button>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-3">Foto Properti (Minimal 5 Foto)</label>

        <div id="image-grid" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4"></div>

        <p class="text-xs text-gray-500 mt-3">* Kotak baru akan muncul otomatis setelah semua kotak terisi gambar.</p>
      </div>

      <div class="card bg-gray-50 p-4 rounded-lg border border-gray-200">
        <label class="block text-sm font-bold text-gray-700 mb-2">Lokasi Properti</label>

        <div id="map" class="w-full h-64 rounded-md mb-4 shadow-inner border" style="z-index: 1"></div>

        <!-- Longtitude dan Langtitude -->
        <input type="hidden" name="latitude" id="lat" />
        <input type="hidden" name="longitude" id="lng" />

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-xs font-medium text-gray-500">Kota/Kabupaten</label>
            <input type="text" name="city" id="city" placeholder="Masukkan Kota" class="mt-1 block w-full border-gray-300 rounded-md p-2 text-sm border focus:ring-blue-500" />
          </div>
          <div>
            <label class="block text-xs font-medium text-gray-500">Kecamatan</label>
            <input type="text" name="district" id="district" placeholder="Masukkan Kecamatan" class="mt-1 block w-full border-gray-300 rounded-md p-2 text-sm border focus:ring-blue-500" />
          </div>
          <div class="md:col-span-2">
            <label class="block text-xs font-medium text-gray-500">Detail Alamat</label>
            <textarea name="address_detail" id="address_detail" rows="2" placeholder="Nama Jalan, Blok, No. Rumah" class="mt-1 block w-full border-gray-300 rounded-md p-2 text-sm border focus:ring-blue-500"></textarea>
          </div>
        </div>
      </div>

      <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-bold hover:bg-blue-700 transition">SIMPAN PROPERTI</button>
    </form>
  </div>
</div>

<script>
  // Koordinat awal (Jakarta)
  const defaultLat = -6.2;
  const defaultLng = 106.816666;

  // Inisialisasi Peta
  const map = L.map("map").setView([defaultLat, defaultLng], 13);

  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap",
  }).addTo(map);

  // Marker yang bisa digeser
  let marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

  // Set nilai awal input hidden
  document.getElementById("lat").value = defaultLat;
  document.getElementById("lng").value = defaultLng;

  // Fungsi untuk update input hidden
  function updateCoords(lat, lng) {
    document.getElementById("lat").value = lat;
    document.getElementById("lng").value = lng;
    console.log(`Koordinat tersimpan: ${lat}, ${lng}`);
  }

  // Event: Marker digeser
  marker.on("dragend", function (e) {
    const pos = marker.getLatLng();
    updateCoords(pos.lat, pos.lng);
  });

  // Event: Peta diklik
  map.on("click", function (e) {
    marker.setLatLng(e.latlng);
    updateCoords(e.latlng.lat, e.latlng.lng);
  });
  const imageGrid = document.getElementById("image-grid");
  let fileCounter = 0;

    function createUploadSlot(isFirst = false) {
        fileCounter++;
        const slotId = `file-${fileCounter}`;

        const div = document.createElement("div");
        // Tambahkan border biru jika ini adalah slot utama
        const borderClass = isFirst ? "border-blue-500 border-2" : "border-gray-300 border-2";
        div.className = `relative group aspect-square border-dashed rounded-lg overflow-hidden hover:border-blue-500 transition-colors ${borderClass}`;
        div.id = `container-${slotId}`;

        div.innerHTML = `
            <label for="${slotId}" class="flex flex-col items-center justify-center w-full h-full cursor-pointer bg-gray-50 hover:bg-gray-100">
                ${isFirst ? '<span class="absolute top-2 left-2 bg-blue-600 text-white text-[10px] px-2 py-0.5 rounded shadow-sm z-10 font-bold uppercase">Utama</span>' : ''}
                
                <div class="flex flex-col items-center justify-center pt-5 pb-6 text-gray-400" id="placeholder-${slotId}">
                    <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    <span class="text-xs">${isFirst ? 'Upload Sampul' : 'Tambah Foto'}</span>
                </div>
                <img id="preview-${slotId}" class="hidden w-full h-full object-cover" />
                
                <input id="${slotId}" name="images[]" type="file" class="hidden image-input" accept="image/*" 
                    onchange="previewImage(this, '${slotId}')"} />
            </label>
            
            ${isFirst ? '' : `
            <button type="button" onclick="removeSlot('${slotId}')" class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>`}
        `;

        imageGrid.appendChild(div);
    }

    // Inisialisasi awal: Kotak pertama dikirim 'true' sebagai utama
    createUploadSlot(true); 
    for (let i = 0; i < 4; i++) {
        createUploadSlot(false);
    }

  // Fungsi Preview Gambar
  async function previewImage(input, id) {
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

        // 3. Kirim ke Server (AJAX)
        const formData = new FormData();
        formData.append('image', file);
        formData.append('property_id', document.getElementById(id).value);
        formData.append('is_main', id === 'file-1' ? 1 : 0);

        try {
            const response = await fetch('index.php?page=upload&action=async_upload', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            
            if (result.success) {
                console.log('Upload sukses:', result.image_path);
            }
        } catch (error) {
            alert('Gagal mengunggah gambar');
        } finally {
            // 4. Selesai Loading
            container.classList.remove('opacity-50', 'pointer-events-none');
            loadingIndicator.remove();
            checkAllUploadsDone(submitBtn); // Fungsi cek apakah semua foto sudah selesai
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

  // Fungsi Hapus
  function removeSlot(id) {
    const container = document.getElementById(`container-${id}`);
    const totalSlots = imageGrid.children.length;

    // Jika sudah ada isinya, hapus kontennya saja atau hapus kotaknya?
    // Di sini kita hapus kotaknya, tapi pastikan minimal 4 kotak tetap ada
    if (totalSlots > 4) {
      container.remove();
    } else {
      // Jika sisa 4, reset saja isinya agar tetap ada 4 kotak kosong
      document.getElementById(`preview-${id}`).classList.add("hidden");
      document.getElementById(`placeholder-${id}`).classList.remove("hidden");
      document.getElementById(id).value = "";
    }
  }

  function checkAndAddSlot() {
    const totalSlots = imageGrid.children.length;
    const filledSlots = Array.from(document.querySelectorAll('input[type="file"]')).filter((i) => i.value !== "").length;

    // Jika semua kotak terisi, tambahkan satu lagi
    if (filledSlots === totalSlots) {
      createUploadSlot();
    }
  }

  function validateForm() {
        // Ambil input file pertama (Gambar Utama)
        const mainImage = document.querySelector('.image-input');
        
        if (!mainImage || mainImage.files.length === 0) {
            alert("Mohon unggah gambar utama (kotak pertama) sebagai foto sampul properti!");
            mainImage.parentElement.classList.add('border-red-500'); // Beri highlight merah jika kosong
            return false; // Batalkan submit
        }
        
        return true; // Izinkan submit
    }
</script>
