
@csrf

<div class="mb-4">
    <label for="auxilio_id" class="block text-gray-700 text-sm font-bold mb-2">
        Auxilio:
    </label>
    <select name="auxilio_id" id="auxilio_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @foreach($auxilios as $auxilio)
            <option value="{{ $auxilio->id }}" {{ isset($solicitud) && $solicitud->auxilio_id == $auxilio->id ? 'selected' : '' }}>
                {{ $auxilio->nombre }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label for="ubicacion" class="block text-gray-700 text-sm font-bold mb-2">
        Ubicación:
    </label>
    <input type="text" name="ubicacion" id="ubicacion" value="{{ old('ubicacion', $solicitud->ubicacion ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
</div>

{{-- <div class="mb-4">
    <label for="estado" class="block text-gray-700 text-sm font-bold mb-2">
        Estado:
    </label>
    <select name="estado" id="estado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <option value="pendiente" {{ isset($solicitud) && $solicitud->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="en progreso" {{ isset($solicitud) && $solicitud->estado == 'en progreso' ? 'selected' : '' }}>En Progreso</option>
        <option value="aprobada" {{ isset($solicitud) && $solicitud->estado == 'aprobada' ? 'selected' : '' }}>Aprobada</option>
        <option value="denegada" {{ isset($solicitud) && $solicitud->estado == 'denegada' ? 'selected' : '' }}>Denegada</option>
    </select>
</div> --}}

<div class="mb-4">
    <label for="hora" class="block text-gray-700 text-sm font-bold mb-2">
        Hora:
    </label>
    <input type="time" name="hora" id="hora" value="{{ old('hora', $solicitud->hora ?? now()->format('H:i:s')) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
</div>

<div class="mb-4">
    <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">
        Fecha:
    </label>
    <input type="date" name="fecha" id="fecha" value="{{ old('fecha', $solicitud->fecha ?? now()->format('Y-m-d')) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
</div>