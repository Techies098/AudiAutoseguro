<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Contrato') }}
        </h2>
    </x-slot>
    <!---->

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form class="row g-3">
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ $correoCliente }}" placeholder="{{ $correoCliente }}">
                        </div>
                        <div class="col-12">
                            <label for="mensaje" class="form-label">Mensaje:</label>
                            <input type="text" class="form-control" name="mensaje" id="mensaje">
                        </div>
                        <div class="col-md-12">
                            <label for="adjunto" class="form-label">Adjunto:</label>
                            <div>
                                <input type="file" class="form-file" name="adjunto" id="adjunto" accept=".pdf">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Enviar correo</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



    <!---->
</x-app-layout>
