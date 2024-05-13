<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 lg:p-8">
                    <x-application-logo class="block w-auto h-12" />

                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Beinvenido a AutoSeguro
                    </h1>

                    <p class="mt-6 leading-relaxed text-gray-500">
                        Autoseguro S.A. se destaca en el mercado de seguros por su enfoque especializado en vehículos. Su modelo de negocio se centra en facilitar al cliente la contratación de seguros, adaptándose a las necesidades específicas de cada vehículo y situación. Además, Autoseguro S.A. ha innovado en el servicio al cliente, proporcionando una experiencia personalizada y eficiente.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-6 p-6 bg-gray-200 bg-opacity-25 md:grid-cols-2 lg:gap-8 lg:p-8">
                    <div>{{--item 1--}}
                        <div class="flex items-center">
                            <h2 class="text-xl font-semibold text-gray-900 ms-3">
                                <a href="/">Solicita Seguro</a>
                            </h2>
                        </div>

                        <p class="mt-4 text-sm leading-relaxed text-gray-500">
                            Solicita un seguro con nosotros
                        </p>

                        <p class="mt-4 text-sm">
                            <a href="/" class="inline-flex items-center font-semibold text-indigo-700">                Ir

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ms-1 fill-indigo-500">
                                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                </svg>{{--Flechita azul--}}
                            </a>
                        </p>
                    </div>

                    <div>{{--item 2--}}
                        <div class="flex items-center">
                            <h2 class="text-xl font-semibold text-gray-900 ms-3">
                                <a href="{{ route('cotizacion.create') }}">Solicitar Cotización</a>
                            </h2>
                        </div>
                    
                        <p class="mt-4 text-sm leading-relaxed text-gray-500">
                            Solicita una cotización automática en nuestra web
                        </p>
                    
                        <p class="mt-4 text-sm">



                            <a href="{{ route('cotizacion.create') }}" class="inline-flex items-center font-semibold text-indigo-700">
                                Ir
                    
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ms-1 fill-indigo-500">
                                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </p>
                    </div>
                    {{-- <div>item 2
                        <div class="flex items-center">
                            <h2 class="text-xl font-semibold text-gray-900 ms-3">
                                <a href="/">Solicitar Cotizacion</a>
                            </h2>
                        </div>

                        <p class="mt-4 text-sm leading-relaxed text-gray-500">
                            Solicita una cotizacion automatica en nuestra web
                        </p>

                        <p class="mt-4 text-sm">
                            <a href="/" class="inline-flex items-center font-semibold text-indigo-700">
                                Ir

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ms-1 fill-indigo-500">
                                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </p>
                    </div> --}}

                    <div>{{--item 4--}}
                        <div class="flex items-center">
                            <h2 class="text-xl font-semibold text-gray-900 ms-3">
                                Contactanos
                            </h2>
                        </div>

                        <p class="mt-4 text-sm leading-relaxed text-gray-500">
                            Contacta con atencion al cliente
                        </p>
                        <p class="mt-4 text-sm">
                            <a href="/" class="inline-flex items-center font-semibold text-indigo-700">                Ir

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ms-1 fill-indigo-500">
                                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                </svg>{{--Flechita azul--}}
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
