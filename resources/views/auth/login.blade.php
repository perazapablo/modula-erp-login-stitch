@extends('layouts.app', ['title' => 'Iniciar sesión · MODULA'])

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
                    Núcleo industrial reconfigurable
                </span>
                <h1 class="mt-5 text-4xl font-bold leading-tight tracking-tight">
                    El Sistema Operativo Industrial Componible.
                </h1>
                <p class="mt-4 text-sm leading-relaxed text-canvas/60">
                    Ensambla flujos MRP, despachos aduanales y timbrado CFDI con gobernanza de clase aeroespacial.
                    La agilidad No-Code combinada con la solidez transaccional del código nativo.
                </p>
            </div>

            <div class="mt-10 grid max-w-md grid-cols-3 gap-4">
                <div class="rounded-xl border border-canvas/10 bg-canvas/5 p-4">
                    <p class="text-lg font-bold">99.98%</p>
                    <p class="mt-1 text-xs text-canvas/50">Motor BPE activo</p>
                </div>
                <div class="rounded-xl border border-canvas/10 bg-canvas/5 p-4">
                    <p class="text-lg font-bold">Anexo 20</p>
                    <p class="mt-1 text-xs text-canvas/50">CFDI / SAT validado</p>
                </div>
                <div class="rounded-xl border border-canvas/10 bg-canvas/5 p-4">
                    <p class="text-lg font-bold">±0.00%</p>
                    <p class="mt-1 text-xs text-canvas/50">REPS validado</p>
                </div>
            </div>
        </div>

        <div class="mt-12 overflow-hidden rounded-2xl border border-canvas/10">
            <img src="{{ asset('images/planta-toluca.jpg') }}" alt="Línea de ensamble, Planta Toluca" class="h-40 w-full object-cover">
            <div class="flex items-center justify-between bg-canvas/5 px-4 py-3 text-xs text-canvas/60">
                <span>Línea de Ensamble · Renta de Planta Toluca</span>
                <span class="inline-flex items-center gap-1.5">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    En línea
                </span>
            </div>
        </div>
    </div>

    {{-- Panel de autenticación --}}
    <div class="flex min-h-screen items-center justify-center bg-canvas-alt px-6 py-12">
        <div class="w-full max-w-sm">
            <span class="text-xs font-semibold uppercase tracking-wide text-brand">Portal de autenticación</span>
            <h2 class="mt-2 text-2xl font-bold text-ink">Bienvenido de vuelta</h2>
            <p class="mt-1.5 text-sm text-ink/60">Ingresa tus credenciales para acceder al espacio de trabajo industrial.</p>

            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
                @csrf

                <div>
                    <label for="workspace" class="mb-1.5 block text-sm font-medium text-ink">Espacio de trabajo / Planta</label>
                    <div class="flex items-center justify-between rounded-xl border border-line bg-white px-3.5 py-2.5 text-sm">
                        <span class="font-medium text-ink">Planta Toluca / Matriz Opera</span>
                        <a href="#" class="text-xs font-semibold text-brand hover:text-brand-dark">Cambiar matriz</a>
                    </div>
                </div>

                <x-input
                    label="Correo corporativo o ID de empleado"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    placeholder="c.mendoza@modula.mx"
                    required
                    autofocus
                />

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="mb-1.5 block text-sm font-medium text-ink">Contraseña</label>
                        <a href="#" class="text-xs font-semibold text-brand hover:text-brand-dark">¿Olvidaste tu contraseña?</a>
                    </div>
                    <x-input name="password" type="password" placeholder="••••••••••" required />
                </div>

                <label class="flex items-center gap-2 text-sm text-ink/70">
                    <input type="checkbox" name="remember" class="h-4 w-4 rounded border-line text-brand focus:ring-brand/40">
                    Recordarme en este equipo por 30 días
                </label>

                <x-button type="submit" variant="primary">
                    Iniciar sesión en MODULA
                </x-button>

                <div class="flex items-center gap-3 text-xs text-ink/40">
                    <span class="h-px flex-1 bg-line"></span>
                    O ingresar mediante identidad federada
                    <span class="h-px flex-1 bg-line"></span>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <x-button variant="outline" type="button">Google SSO</x-button>
                    <x-button variant="outline" type="button">Azure AD</x-button>
                </div>

                <button type="button" class="w-full text-center text-xs font-medium text-ink/50 hover:text-brand">
                    Llave de seguridad FIDO2 / Passkey biométrica
                </button>
            </form>

            <p class="mt-10 text-center text-xs text-ink/40">
                Cifrado TLS 1.3 de grado aeroespacial · Auditoría SAT Anexo 20 activa
            </p>
        </div>
    </div>
</div>
@endsection
