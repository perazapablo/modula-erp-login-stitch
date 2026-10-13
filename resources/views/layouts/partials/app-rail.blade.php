<aside class="flex w-16 shrink-0 flex-col items-center justify-between bg-ink py-4 text-canvas/60">
    <div class="flex flex-col items-center gap-4">
        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand text-xs font-bold text-white">M</span>

        <nav class="mt-4 flex flex-col gap-1">
            @php
                $items = [
                    ['icon' => 'home', 'label' => 'Ventas Rápidas'],
                    ['icon' => 'filter', 'label' => 'Filtros Inteligentes'],
                    ['icon' => 'layers', 'label' => 'Borradores y Modelos'],
                    ['icon' => 'flow', 'label' => 'Etapas del Proceso'],
                    ['icon' => 'bolt', 'label' => 'Automatizaciones BPA'],
                    ['icon' => 'shield', 'label' => 'Reglas de Validación'],
                ];
            @endphp

            @foreach ($items as $item)
                <button
                    type="button"
                    title="{{ $item['label'] }}"
                    class="flex h-10 w-10 items-center justify-center rounded-xl text-canvas/50 transition-colors hover:bg-canvas/10 hover:text-canvas"
                >
                    <span class="text-xs font-semibold">{{ Str::upper(Str::substr($item['label'], 0, 2)) }}</span>
                </button>
            @endforeach
        </nav>
    </div>

    <div class="flex flex-col items-center gap-3">
        <span class="h-px w-6 bg-canvas/10"></span>
        <div class="h-8 w-8 overflow-hidden rounded-full bg-canvas/10">
            <img src="{{ asset('images/avatar-usuario.jpg') }}" alt="Usuario" class="h-full w-full object-cover">
        </div>
    </div>
</aside>
