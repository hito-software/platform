@error($name)
    <div class="flex items-center space-x-2 text-sm font-bold text-red-600">
        <i class="fas fa-times"></i>
        <span>{{ $message }}</span>
    </div>
@enderror
