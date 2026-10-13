@extends('layouts.dashboard', ['title' => 'Editar Perfil · MODULA', 'breadcrumb' => 'Editar Identidad & Preferencias'])

@section('content')
<div class="mx-auto max-w-6xl space-y-6 pb-24">

    {{-- Cabecera de perfil --}}
    <div class="flex flex-col gap-4 rounded-2xl border border-line bg-white p-6 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex items-center gap-4">
            <div class="h-16 w-16 overflow-hidden rounded-full bg-canvas-alt ring-2 ring-brand/30">
                <img src="{{ asset('images/avatar-carlos-mendoza.jpg') }}" alt="Arq. Carlos Mendoza" class="h-full w-full object-cover">
            </div>
            <div>
                <div class="flex items-center gap-2">
                    <h1 class="text-lg font-bold text-ink">Arq. Carlos Mendoza</h1>
                    <span class="rounded-full bg-brand/10 px-2 py-0.5 text-xs font-semibold text-brand">Jefe de Planta / Almacén</span>
                </div>
                <p class="mt-1 flex flex-wrap items-center gap-x-3 gap-y-1 text-xs text-ink/50">
                    <span class="inline-flex items-center gap-1"><span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>Activo hace 3h</span>
                    <span>carlos.mendoza@modula.erp</span>
                    <span>Planta Toluca / Matriz, CAP</span>
                    <span class="font-mono">ID: ERP-9842-TLC</span>
                </p>
            </div>
        </div>

        <div class="flex items-center gap-3 self-start sm:self-center">
            <label class="flex items-center gap-2 rounded-xl border border-line bg-canvas-alt px-3 py-2 text-xs font-medium text-ink/60">
                Apariencia visual
                <select name="apariencia" class="rounded-lg border-none bg-transparent text-xs font-semibold text-ink focus:ring-0">
                    <option>Día Cálido</option>
                    <option>Noche Penumbra</option>
                </select>
            </label>
        </div>
    </div>

    <form id="perfil-form" method="POST" action="{{ route('profile.update') }}" class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        @csrf
        @method('PATCH')

        <div class="space-y-6 lg:col-span-2">

            {{-- 1. Información personal --}}
            <fieldset class="space-y-4 rounded-2xl border border-line bg-white p-6">
                <legend class="px-1 text-sm font-semibold text-ink">
                    <span class="text-brand">●</span> 1. Información Personal y de Contacto
                </legend>
                <p class="-mt-2 text-xs text-ink/50">Parámetros oficiales sincronizados con la estructura orgánica de la organización.</p>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <x-input label="Nombre completo oficial" name="nombre_completo" value="{{ old('nombre_completo', 'Carlos Mendoza Villaseñor') }}" />
                    <x-input label="Puesto oficial en la organización" name="puesto" value="{{ old('puesto', 'Superintendente de Logística y Almacén') }}" />
                    <x-input label="Correo corporativo" name="email" type="email" value="{{ old('email', 'carlos.mendoza@modula.erp') }}" />
                    <x-input label="Teléfono móvil / alertas WhatsApp" name="telefono" value="{{ old('telefono', '+52 722 491 8200') }}" />
                </div>
            </fieldset>

            {{-- 2. Sucursales --}}
            <fieldset class="space-y-4 rounded-2xl border border-line bg-white p-6">
                <legend class="px-1 text-sm font-semibold text-ink">
                    <span class="text-brand">●</span> 2. Sucursales de Trabajo y Espacio Activo
                </legend>
                <p class="-mt-2 text-xs text-ink/50">Control de bitácoras geográficas para filtrado automático de inventarios y compras.</p>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-ink">Planta predeterminada</label>
                        <select name="planta" class="w-full rounded-xl border border-line bg-white px-3.5 py-2.5 text-sm text-ink focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/40">
                            <option>Planta Toluca / Matriz</option>
                        </select>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-ink">Idioma del sistema</label>
                        <select name="idioma" class="w-full rounded-xl border border-line bg-white px-3.5 py-2.5 text-sm text-ink focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/40">
                            <option>Español (México)</option>
                        </select>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-ink">Zona horaria operativa</label>
                        <select name="zona_horaria" class="w-full rounded-xl border border-line bg-white px-3.5 py-2.5 text-sm text-ink focus:border-brand focus:outline-none focus:ring-2 focus:ring-brand/40">
                            <option>GMT-6 Ciudad de México</option>
                        </select>
                    </div>
                </div>
            </fieldset>

            {{-- 3. Seguridad --}}
            <fieldset class="space-y-4 rounded-2xl border border-line bg-white p-6">
                <legend class="px-1 text-sm font-semibold text-ink">
                    <span class="text-brand">●</span> 3. Credenciales de Seguridad &amp; Acceso
                </legend>
                <p class="-mt-2 text-xs text-ink/50">Políticas de robustez y verificación multinivel corporativas ISO 27001.</p>

                <div class="rounded-xl border border-line bg-canvas-alt p-4">
                    <div class="flex items-center justify-between text-sm font-semibold text-ink">
                        Cambio de contraseña
                        <span class="text-xs font-normal text-ink/40">Última modificación: hace 12 días</span>
                    </div>
                    <div class="mt-3 grid grid-cols-1 gap-3 sm:grid-cols-3">
                        <x-input name="password_actual" type="password" placeholder="Contraseña actual" />
                        <x-input name="password_nueva" type="password" placeholder="Mínimo 12 caracteres" />
                        <x-input name="password_confirmacion" type="password" placeholder="Repite la contraseña" />
                    </div>
                    <div class="mt-3">
                        <div class="h-1.5 w-full overflow-hidden rounded-full bg-line">
                            <div class="h-full w-5/6 rounded-full bg-emerald-500"></div>
                        </div>
                        <p class="mt-1 text-xs text-emerald-600">Fortaleza de clave criptográfica: Excelente</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="rounded-xl border border-line p-4">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-semibold text-ink">Autenticación 2FA (TOTP)</p>
                            <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-xs font-medium text-emerald-700">Activo</span>
                        </div>
                        <p class="mt-1 text-xs text-ink/50">Protegido con aplicación autenticadora (Google Authenticator).</p>
                        <div class="mt-3 grid grid-cols-2 gap-2">
                            <x-button variant="outline" type="button">Reconfigurar llave</x-button>
                            <x-button variant="outline" type="button">Códigos respaldo</x-button>
                        </div>
                    </div>
                    <div class="rounded-xl border border-line p-4">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-semibold text-ink">Llaves FIDO2 / Passkey</p>
                            <span class="rounded-full bg-canvas-alt px-2 py-0.5 text-xs font-medium text-ink/60">Registradas</span>
                        </div>
                        <p class="mt-1 text-xs text-ink/50">YubiKey 5 NFC · añadida el 12 ene 2024.</p>
                        <x-button variant="outline" type="button" class="mt-3">Enlazar nueva passkey</x-button>
                    </div>
                </div>
            </fieldset>
        </div>

        {{-- Columna lateral --}}
        <aside class="space-y-6">
            <div class="rounded-2xl border border-line bg-white p-5">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-semibold text-ink">Facultades LCAP</p>
                    <span class="rounded-full bg-canvas-alt px-2 py-0.5 text-xs font-medium text-ink/50">Solo lectura</span>
                </div>
                <p class="mt-1 text-xs text-ink/50">Matriz de capacidades delegadas para este usuario organizativo en MODULA.</p>

                <ul class="mt-4 space-y-3 text-sm">
                    <li class="rounded-xl border border-line p-3">
                        <p class="font-medium text-ink">Kardex &amp; Inventarios</p>
                        <p class="mt-0.5 text-xs text-ink/50">Acceso total a movimientos, mermas y ajustes en Almacén Toluca.</p>
                    </li>
                    <li class="rounded-xl border border-line p-3">
                        <p class="font-medium text-ink">Aprobación de Recetas BOM</p>
                        <p class="mt-0.5 text-xs text-ink/50">Límite financiero máximo autorizado: $850,000 MXN por orden.</p>
                    </li>
                    <li class="rounded-xl border border-line p-3">
                        <p class="font-medium text-ink">Timbrado Fiscal CFDI 4.0</p>
                        <p class="mt-0.5 text-xs text-ink/50">Restringido. Requiere validación y visto bueno Anexo 20.</p>
                    </li>
                </ul>

                <a href="#" class="mt-4 block text-center text-xs font-semibold text-brand hover:text-brand-dark">
                    ¿Requieres ampliar las facultades? Solicitar al admin
                </a>
            </div>

            <div class="rounded-2xl border border-line bg-white p-5">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-semibold text-ink">Sesiones activas</p>
                    <button type="button" class="text-brand">+</button>
                </div>

                <ul class="mt-4 space-y-3">
                    <li class="rounded-xl border border-line p-3">
                        <div class="flex items-center justify-between text-sm font-medium text-ink">
                            MacBook Pro 16"
                            <span class="rounded-full bg-brand/10 px-2 py-0.5 text-xs font-semibold text-brand">Esta sesión</span>
                        </div>
                        <p class="mt-0.5 text-xs text-ink/50">Toluca, México · Chrome 128</p>
                        <p class="text-xs text-ink/40">187.190.44.12 · Activa ahora</p>
                    </li>
                    <li class="rounded-xl border border-line p-3">
                        <p class="text-sm font-medium text-ink">iPhone 15 Pro</p>
                        <p class="mt-0.5 text-xs text-ink/50">App Móvil / Almacén · iOS 18</p>
                        <p class="text-xs text-ink/40">187.201.88.3 · hace 3 hrs</p>
                    </li>
                </ul>

                <x-button variant="outline" type="button" class="mt-4">Cerrar todas las demás sesiones</x-button>
            </div>

            <p class="px-1 text-xs text-ink/40">
                Huella de actividad v1.4.1 — cualquier cambio de credenciales o sucursales genera un hash criptográfico inmutable en la auditoría de bitácoras.
            </p>
        </aside>
    </form>
</div>

{{-- Barra de guardado --}}
<div class="fixed inset-x-0 bottom-0 flex items-center justify-between border-t border-line bg-white px-6 py-3 shadow-[0_-4px_16px_rgba(25,24,23,0.06)]">
    <p class="text-xs text-ink/50">Hay modificaciones sin guardar en preferencias personales.</p>
    <div class="flex gap-3">
        <x-button variant="outline" type="button">Descartar cambios</x-button>
        <x-button variant="primary" type="submit" form="perfil-form">Guardar cambios de perfil</x-button>
    </div>
</div>
@endsection
