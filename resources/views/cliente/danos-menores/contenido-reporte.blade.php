<div>
    <h2><b>{{ $dano->titulo }}</b></h2>
    <p>{{ $dano->detalle }}</p>
    <p>Fecha de reporte: {{ $dano->created_at }}</p>
    @if ($dano->multimedia->count() > 0)

        <div class="card bg-indigo-100">
            <div class="card-header">Archivos adjuntos</div>
            <div class="row card-body m-1">
                @foreach ($dano->multimedia as $file)
                    {{-- Si el archivo termina en jpg, png, jpeg, gif, svg, bmp, webp, se mostrará como imagen, de lo contrario se mostrará como un enlace para descargar el archivo. --}}
                    @if (preg_match('/\.(jpg|png|jpeg|gif|svg|bmp|webp)$/i', $file->url))
                        <div class="card col-sm-4 p-2">
                            <div class="row-1">
                                <img src="{{ asset($file->url) }}" class="img-fluid rounded mx-auto d-block"
                                    style="height: 200px;">
                                <a href="{{ asset($file->url) }}" class="btn btn-primary" download><i
                                        class="bi bi-download"></i></a>
                                <a href="{{ asset($file->url) }}" class="btn btn-primary" target="_blank"><i
                                        class="bi bi-eye"></i></a>
                            </div>
                        </div>
                    @elseif (preg_match('/\.(mp4)$/i', $file->url))
                        <div class="card col-sm-4 p-2">
                            <div class="row-2">
                                <img src="{{ asset('images/video.png') }}" class="img-fluid rounded mx-auto d-block"
                                    style="height: 200px;">
                                <a href="{{ asset($file->url) }}" class="btn btn-primary" target="_blank"><i
                                        class="bi bi-play-circle"></i></a>
                                <a href="{{ asset($file->url) }}" class="btn btn-primary" download><i
                                        class="bi bi-download"></i></a>
                            </div>
                        </div>
                    @else
                        <div class="card col-sm-4 p-2">
                            <div class="row-1">
                                <img src="{{ asset('images/pdf.png') }}" class="img-fluid rounded mx-auto d-block"
                                    style="height: 200px;">
                                <a href="{{ asset($file->url) }}" class="btn btn-primary" download><i
                                        class="bi bi-download"></i></a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    @endif
</div>
