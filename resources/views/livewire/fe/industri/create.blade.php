<!-- Background Overlay -->
<div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-700 bg-opacity-50">
  
  <!-- Modal Container -->
  <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-3 transform scale-100 opacity-100 overflow-y-auto max-h-[70vh]">
    
    <!-- Header -->
    <div class="text-md font-semibold text-gray-800 text-center">
        Tambah Industri
    </div>
    <div class="border-t border-gray-300 my-2"></div>

    <!-- Form -->
    <form class="space-y-2">
      
      <fieldset class="border border-gray-300 rounded-md p-2">
        <legend class="text-xs text-gray-700 px-1">Nama Industri</legend>
        <input type="text" wire:model.defer="nama"
            class="w-full p-2 text-xs border border-gray-300 rounded-md focus:ring-blue-500" placeholder="Masukkan nama industri">
      </fieldset>

      <fieldset class="border border-gray-300 rounded-md p-2">
        <legend class="text-xs text-gray-700 px-1">Bidang Usaha</legend>
        <input type="text" wire:model.defer="bidang_usaha"
            class="w-full p-2 text-xs border border-gray-300 rounded-md focus:ring-blue-500" placeholder="Masukkan bidang usaha">
      </fieldset>

      <fieldset class="border border-gray-300 rounded-md p-2">
        <legend class="text-xs text-gray-700 px-1">Alamat</legend>
        <input type="text" wire:model.defer="alamat"
            class="w-full p-2 text-xs border border-gray-300 rounded-md focus:ring-blue-500" placeholder="Masukkan alamat">
      </fieldset>

      <fieldset class="border border-gray-300 rounded-md p-2">
        <legend class="text-xs text-gray-700 px-1">Kontak</legend>
        <input type="text" wire:model.defer="kontak"
            class="w-full p-2 text-xs border border-gray-300 rounded-md focus:ring-blue-500" placeholder="Masukkan kontak">
      </fieldset>

      <fieldset class="border border-gray-300 rounded-md p-2">
        <legend class="text-xs text-gray-700 px-1">Email</legend>
        <input type="email" wire:model.defer="email"
            class="w-full p-2 text-xs border border-gray-300 rounded-md focus:ring-blue-500" placeholder="Masukkan email">
      </fieldset>

      <fieldset class="border border-gray-300 rounded-md p-2">
        <legend class="text-xs text-gray-700 px-1">Website</legend>
        <input type="text" wire:model.defer="website"
            class="w-full p-2 text-xs border border-gray-300 rounded-md focus:ring-blue-500" placeholder="Masukkan website">
      </fieldset>

      <!-- Tombol -->
      <div class="flex justify-end pt-2 space-x-2">
        <button wire:click="closeModal()" type="button" 
          class="px-3 py-1 text-xs text-gray-700 bg-gray-300 rounded-md shadow-sm hover:bg-gray-400">
          Batal
        </button>
        <button wire:click.prevent="store()" 
          class="px-4 py-2 text-black bg-green-500 rounded-md shadow-lg hover:bg-green-600 transition duration-300">
          Simpan
        </button>
      </div>
    </form>
  </div>
</div>
