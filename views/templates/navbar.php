<!-- Navigation -->
    <header class="sticky top-0 z-50 w-full bg-surface-light/90 dark:bg-surface-dark/90 backdrop-blur-md border-b border-border-light dark:border-border-dark">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
          <!-- Logo -->
          <div class="flex items-center gap-2 cursor-pointer">
            <div class="flex items-center justify-center overflow-hidden">
              <img src="public/images/dabelyu.png" alt="Logo Dabelyuland" class="h-24 w-auto object-contain transition-transform duration-300 hover:scale-105" />
            </div>
            <h2 class="text-xl font-bold tracking-tight text-text-main dark:text-white">Dabelyuland</h2>
          </div>
          <!-- Desktop Nav -->
          <div class="hidden md:flex items-center gap-8">
            <a class="text-sm font-medium text-text-main dark:text-gray-200 hover:text-primary dark:hover:text-primary transition-colors" href="index.php">Beranda</a>
            <a class="text-sm font-medium text-text-main dark:text-gray-200 hover:text-primary dark:hover:text-primary transition-colors" href="index.php?page=property">Properti</a>
            <a class="text-sm font-medium text-text-main dark:text-gray-200 hover:text-primary dark:hover:text-primary transition-colors" href="index.php?page=portfolio">Portofolio</a>
          </div>
          <!-- CTA -->
          <div class="flex items-center gap-4">
            <a href="index.php?page=login" class="hidden md:flex items-center justify-center h-10 px-6 rounded-lg bg-primary hover:bg-primary-dark text-white text-sm font-bold transition-all shadow-md shadow-primary/20">Jual Properti</a>
            <!-- Mobile Menu Button -->
            <button class="md:hidden p-2 text-text-main dark:text-white">
              <span class="material-symbols-outlined">menu</span>
            </button>
          </div>
        </div>
      </div>
    </header>