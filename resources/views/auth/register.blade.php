@extends('layouts.app', ['title' => 'Crear cuenta · MODULA'])

@section('content')
<div class="min-h-screen lg:grid lg:grid-cols-2">

    {{-- Panel de marca --}}
    <div class="relative hidden overflow-hidden bg-ink px-12 py-14 text-canvas lg:flex lg:flex-col lg:justify-between">
        <div>
            <div class="flex items-center gap-2 text-sm font-semibold tracking-wide text-canvas/70">
                <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-brand text-xs font-bold text-white">M</span>
                MODULA
                <span class="rounded-full bg-canvas/10 px-2 py-0.5 text-xs font-medium text-canvas/60">v3.4 Enterprise</span>
            </div>

            <div class="mt-16 max-w-md">
                <span class="inline-flex items-center rounded-full border border-canvas/15 px-3 py-1 text-xs font-medium text-canvas/70">
                    Aislamiento dedicado multi-tenant
                </span>
                <h1 class="mt-5 text-4xl font-bold leading-tight tracking-tight">
                    Crea tu espacio de trabajo industrial componible.
                </h1>
                <p class="mt-4 text-sm leading-relaxed text-canvas/60">
                    Estandariza operaciones, sincroniza tu catálogo MRP y conecta motores de reglas
                    con cumplimiento CFDI 4.0 automatizado desde el día uno.
                </p>
            </div>

            <div class="mt-10 max-w-md space-y-3">
                <span class="inline-flex items-center rounded-full bg-emerald-500/15 px-3 py-1 text-xs font-semibold text-emerald-300">
                    Ruta de despliegue inicial · Fase 1 de 3
                </span>

                <div class="flex items-start gap-3 rounded-xl border border-brand/40 bg-brand/10 p-4">
                    <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-brand text-xs font-bold text-white">1</span>
                    <div>
                        <p class="text-sm font-semibold">Identidad Corporativa &amp; Matriz</p>
                        <p class="text-xs text-canvas/50">Credenciales de administrador raíz.</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 rounded-xl border border-canvas/10 bg-canvas/5 p-4">
                    <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-canvas/10 text-xs font-bold text-canvas/60">2</span>
                    <div>
                        <p class="text-sm font-semibold text-canvas/80">Configuración de Planta &amp; Nodos MRP</p>
                        <p class="text-xs text-canvas/50">Ubicaciones de almacén, línea, flota.</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 rounded-xl border border-canvas/10 bg-canvas/5 p-4">
                    <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-canvas/10 text-xs font-bold text-canvas/60">3</span>
                    <div>
                        <p class="text-sm font-semibold text-canvas/80">Módulos Iniciales &amp; Políticas LCAP</p>
                        <p class="text-xs text-canvas/50">Reglas de negocio BRE, disparadores.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 overflow-hidden rounded-2xl border border-canvas/10">
            <img src="{{ asset('images/infraestructura-industrial.jpg') }}" alt="Infraestructura industrial" class="h-32 w-full object-cover">
            <div class="bg-canvas/5 px-4 py-3 text-xs text-canvas/60">
                <p class="font-semibold text-canvas/80">Sincronización tolerante a fallos</p>
                <p class="mt-0.5">Modo offline resiliente para plantas sin conectividad o remotas.</p>
            </div>
        </div>
    </div>

    {{-- Panel de registro --}}
    <div class="flex min-h-screen items-center justify-center bg-canvas-alt px-6 py-12">
        <div class="w-full max-w-md">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wide text-brand">Registro de empresa</span>
                <span class="rounded-full bg-white px-2.5 py-1 text-xs font-medium text-ink/60 ring-1 ring-line">Fase 1 de 2</span>
            </div>
            <h2 class="mt-2 text-2xl font-bold text-ink">Registro de Empresa y Administrador</h2>
            <p class="mt-1.5 text-sm text-ink/60">Configura las credenciales de tu cuenta raíz y la sede de operación de la matriz.</p>

            <div class="mt-6 grid grid-cols-2 gap-3">
                <x-button variant="outline" type="button">Microsoft Entra ID</x-button>
                <x-button variant="outline" type="button">Google Workspace</x-button>
            </div>

            <div class="mt-6 flex items-center gap-3 text-xs text-ink/40">
                <span class="h-px flex-1 bg-line"></span>
                O registro por credenciales
                <span class="h-px flex-1 bg-line"></span>
            </div>

            <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-6">
                @csrf

                <fieldset class="space-y-4">
                    <legend class="text-xs font-semibold uppercase tracking-wide text-brand">1. Datos del administrador raíz</legend>

                    <x-input label="Nombre completo del administrador" name="nombre_admin" value="{{ old('nombre_admin') }}" placeholder="Ing. Fernando Elizondo" required />
                    <x-input label="Correo corporativo" name="email" type="email" value="{{ old('email') }}" placeholder="f.elizondo@construcciones.mx" required />

                    <div class="grid grid-cols-2 gap-4">
                        <x-input label="Contraseña maestra" name="password" type="password" placeholder="••••••••••" required />
                        <x-input label="Confirmar contraseña" name="password_confirmation" type="password" placeholder="••••••••••" required />
                    </div>
                </fieldset>

                <fieldset class="space-y-4">
                    <legend class="text-xs font-semibold uppercase tracking-wide text-brand">2. Entidad legal &amp; sede principal</legend>

                    <x-input label="Razón social de la empresa" name="razon_social" value="{{ old('razon_social') }}" required />

                    <div class="grid grid-cols-2 gap-4">
                        <x-input label="RFC de la empresa (SAT)" name="rfc" value="{{ old('rfc') }}" placeholder="CIM230618AX3" required />
                        <x-input label="Nombre de la sede principal" name="sede_principal" value="{{ old('sede_principal') }}" placeholder="Planta Toluca / Matriz" required />
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-ink">Giro industrial predominante (configuración LCAP)</label>
                        <div class="grid grid-cols-2 gap-3">
                            @foreach (['Construcción y Renta', 'Manufactura y Ensamble', 'Distribución y Logística', 'Servicios Industriales'] as $i => $giro)
                                <label class="flex cursor-pointer items-center gap-2 rounded-xl border px-3 py-2.5 text-sm {{ $i === 0 ? 'border-brand bg-brand/10 text-brand font-medium' : 'border-line bg-white text-ink/70' }}">
                                    <input type="radio" name="giro" value="{{ $giro }}" class="h-4 w-4 text-brand focus:ring-brand/40" @checked($i === 0)>
                                    {{ $giro }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </fieldset>

                <label class="flex items-start gap-2 text-xs text-ink/60">
                    <input type="checkbox" name="acepta_terminos" class="mt-0.5 h-4 w-4 rounded border-line text-brand focus:ring-brand/40" required>
                    Acepto los <a href="#" class="font-medium text-brand hover:text-brand-dark">Términos del Servicio LCAP</a>,
                    el <a href="#" class="font-medium text-brand hover:text-brand-dark">Aviso de Privacidad Industrial</a>
                    y autorizo el uso de datos bajo reglas fiscales de timbrado Anexo 20 (SAT México).
                </label>

                <x-button type="submit" variant="primary">
                    Crear espacio de trabajo y continuar
                </x-button>
            </form>

            <p class="mt-6 text-center text-xs text-ink/40">
                ¿Ya tienes una cuenta federada en MODULA?
                <a href="{{ route('login') }}" class="font-semibold text-brand hover:text-brand-dark">Iniciar sesión</a>
            </p>
        </div>
    </div>
</div>
@endsection
