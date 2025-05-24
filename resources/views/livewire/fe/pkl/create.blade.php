<div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-700 bg-opacity-50">
  <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-4 transform scale-100 opacity-100">
    
    <!-- Header -->
    <div class="text-lg font-semibold text-gray-800 text-center">
        Lapor PKL
    </div>
    <div class="border-t border-gray-300 my-2"></div>

    <!-- Form -->
    <form class="space-y-3">
      <fieldset class="border border-gray-300 rounded-md p-3">
        <legend class="text-sm text-gray-700 px-2">Siswa</legend>
        <select wire:model="siswaId" class="w-full p-2 text-sm border border-gray-300 rounded-md focus:ring-blue-500">
            <option value="">Pilih Siswa</option>
            <option value="{{ $siswa_login->id }}">{{ $siswa_login->nama }}</option>
        </select>
      </fieldset>

      <fieldset class="border border-gray-300 rounded-md p-3">
        <legend class="text-sm text-gray-700 px-2">Industri</legend>
        <select wire:model="industriId" class="w-full p-2 text-sm border border-gray-300 rounded-md focus:ring-blue-500">
            <option value="">Pilih Industri</option>
            @foreach ($industris as $industri)
                <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
            @endforeach
        </select>
      </fieldset>

      <fieldset class="border border-gray-300 rounded-md p-3">
        <legend class="text-sm text-gray-700 px-2">Guru Pembimbing</legend>
        <select wire:model="guruId" class="w-full p-2 text-sm border border-gray-300 rounded-md focus:ring-blue-500">
            <option value="">Pilih Guru Pembimbing PKL</option>
            @foreach ($gurus as $guru)
                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
            @endforeach
        </select>
      </fieldset>

      <fieldset class="border border-gray-300 rounded-md p-3">
        <legend class="text-sm text-gray-700 px-2">Pelaksanaan PKL</legend>

        <div class="mb-3">
          <label class="block text-sm font-bold text-gray-700">Mulai</label>
          <input wire:model="mulai" type="date" class="mt-1 p-2 text-sm border border-gray-300 rounded-md w-full focus:ring-blue-300">
        </div>

        <div class="mb-3">
          <label class="block text-sm font-bold text-gray-700">Selesai</label>
          <input wire:model="selesai" type="date" class="mt-1 p-2 text-sm border border-gray-300 rounded-md w-full focus:ring-blue-300">
        </div>
      </fieldset>

      <!-- Tombol -->
      <div class="flex justify-end pt-3 space-x-2">
        <button wire:click="closeModal()" type="button" class="px-4 py-2 text-sm text-gray-700 bg-gray-300 rounded-md shadow-sm hover:bg-gray-400">
            Cancel
        </button>
        <button wire:click.prevent="store()" 
                class="px-6 py-3 text-black bg-green-500 rounded-md shadow-lg hover:bg-green-600 transition duration-300">
            Save
        </button>

      </div>
    </form>
  </div>
</div>
