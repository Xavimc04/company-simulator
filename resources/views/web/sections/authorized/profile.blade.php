@extends('web.layouts.sidebar')

@section('body')
    <main class="w-full p-10 flex gap-10 flex-col overflow-y-scroll">
        <div 
            class="h-[100px] rounded w-full" 
            style="background-image: url(https://www.monlau.com/estudis-professionals/wp-content/uploads/sites/3/2020/02/recepci%C3%B3-1.jpg)"
        ></div>

        <div class="flex flex-col lg:flex-row gap-1 flex-1 transition-all">
            <section class="flex-1 flex flex-col pr-0 lg:pr-10 gap-5 order-last lg:order-first mt-10 lg:mt-0 overflow-y-scroll">
                <div>
                    <h2 class="text-2xl font-extrabold text-blue-500">
                        Información personal
                    </h2>
        
                    <small>Previsualización completa de todos los datos personales además de la modificación de los permitidos</small>
                </div>

                <x-labeled-input 
                    label="Identificador"
                    value="{{ Auth::user()->id }}" 
                    type="text"
                    icon="devices"
                    disabled="true"
                />

                <x-labeled-input 
                    label="Dirección de correo"
                    value="{{ Auth::user()->email }}" 
                    type="text"
                    icon="email"
                    disabled="true"
                />

                <x-labeled-input 
                    label="Nombre de usuario"
                    value="{{ Auth::user()->name }}" 
                    type="text"
                    icon="person"
                    disabled="true"
                />

                @livewire('sections.authorized.profile-picture')

                <div class="w-full flex justify-end">
                    <x-button wireClick="save" icon="add_task" styles="justify-center" content="Confirmar cambios" />
                </div>
            </section>

            <section class="px-0 lg:px-10 w-full lg:w-[400px] rounded border-0 lg:border-l">
                <h2 class="text-2xl font-extrabold text-blue-500">
                    {{ Auth::user()->name }}
                </h2>
    
                <small>{{ Auth::user()->role->name }}</small>

                <table class="bg-red-500 w-full mt-7">
                    <tbody>
                        <tr class="bg-white border-b flex justify-between">
                            <td class="py-4">Estado</td>

                            <td class="py-4">
                                @if (Auth::user()->status == 'active')
                                    <span class="text-green-500 lowercase bg-green-100 px-2 py-1 rounded border border-green-500">Activa</span>
                                @else
                                    <span class="text-red-500 lowercase bg-red-100 px-2 py-1 rounded border border-red-500">Inactiva</span>
                                @endif
                            </td>
                        </tr>

                        <tr class="bg-white border-b flex justify-between">
                            <td class="py-4">Verificación</td>

                            <td class="py-4">
                                @if (Auth::user()->email_verified_at)
                                    <span class="text-green-500 lowercase bg-green-100 px-2 py-1 rounded border border-green-500">Confirmado</span>
                                @else
                                    <span class="text-red-500 lowercase bg-red-100 px-2 py-1 rounded border border-red-500">Sin validar</span>
                                @endif
                            </td>
                        </tr>

                        <tr class="bg-white border-b flex justify-between">
                            <td class="py-4">Antiguedad</td>

                            <td class="py-4">
                                {{ Auth::user()->created_at->diffForHumans() }}
                            </td>
                        </tr>

                        <tr class="bg-white border-b flex justify-between">
                            <td class="py-4">Actualización</td>

                            <td class="py-4">
                                {{ Auth::user()->updated_at->diffForHumans() }}
                            </td>
                        </tr>

                        @if (Auth::user()->center_id)
                            <tr class="bg-white border-b flex justify-between">
                                <td class="py-4">Centro</td>

                                <td class="py-4">
                                    {{ Auth::user()->center->name }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </section>
        </div>
    </main>
@endsection