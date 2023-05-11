@if ($paginator->lastPage() > 1)
    <div class="hidden sm:flex">
        <span class="mr-4">
            Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
        </span>

        <div class="flex items-center">
            <span class="mr-2">Go to page:</span>
            <select onchange="if (this.value) window.location.href=this.value" class="form-select rounded-md shadow-sm">
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <option value="{{ $paginator->url($i) }}" {{ ($paginator->currentPage() == $i) ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor
            </select>
        </div>
    </div>
@endif
