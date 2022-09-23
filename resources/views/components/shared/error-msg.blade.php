@if ($errors->any())
  <div class="rounded-md bg-red-50 p-4">
    <div class="flex">
      <div class="flex-shrink-0">
        <!-- Heroicon name: mini/x-circle -->
        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
          aria-hidden="true">
          <path fill-rule="evenodd"
            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
            clip-rule="evenodd" />
        </svg>
      </div>
      <div class="ml-3">
        @php
          $error_msg = $errors->getMessages();
        @endphp
        {{-- {{ dd($errors->keys()) }} --}}
        <h3 class="text-sm font-medium text-red-800">
          @error('msg')
            {{ $message }}
          @else
            {{ 'エラーが発生しました。' }}
          @enderror
        </h3>
        @if (implode(' ', $errors->keys()) !== 'msg')
          <div class="mt-2 text-sm text-red-700">
            <ul role="list" class="list-disc space-y-1 pl-5">
              @foreach ($errors->getMessages() as $key => $error)
                @if ($key != 'msg')
                  <li>{{ implode(' ', $error) }}</li>
                @endif
              @endforeach
            </ul>
          </div>
        @endif
      </div>
      <div class="ml-auto pl-3">
        <div class="-mx-1.5 -my-1.5">
          <button type="button"
            class="inline-flex rounded-md bg-red-50 p-1.5 text-red-800 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 focus:ring-offset-green-50">
            <span class="sr-only">Dismiss</span>
            <!-- Heroicon name: mini/x-mark -->
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
              aria-hidden="true">
              <path
                d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
@endif
