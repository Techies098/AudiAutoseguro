importScripts('my_js/sw-utils.js');

const DYNAMIC_CACHE = 'dynamic-v1';


self.addEventListener('install', e =>{
    console.log('SW-instalando');

});

self.addEventListener('activate', e => {
    //Borrando versiones viejas de cache:
    console.log("SW-Activando");
    const respuesta = caches.keys().then(keys => {
        keys.forEach( cacheAnterior => {
            if( cacheAnterior !== DYNAMIC_CACHE && cacheAnterior.includes('dynamic') ){
                return caches.delete(cacheAnterior);
            }
        });
    }).catch((err)=> {
        console.log('No se encontró en internet: '+ err);
        return caches.match(e.request);
    });

    e.waitUntil(respuesta);
});

//ESTO FUNCIONA OK
self.addEventListener('fetch', e => {
    const respuesta = fetch(e.request ).then(data => {
        if(!data) return caches.match(e.request);//404
        caches.open(DYNAMIC_CACHE).then(cache => {
            cache.put(e.request, data);//add data to cache
        });
        return data.clone();
    }).catch((err)=> {
        console.log('No se encontró en internet: '+ err);
        return caches.match(e.request);
    })
    e.respondWith(respuesta);
});


// self.addEventListener('install', event => {
//     console.log('Instalando SW');
// })

// self.addEventListener('activate', event => {
//     console.log('SW: Activo');
// })


// self.addEventListener('fetch', e => {

//     console.log('SW:', e.request.url);

// })


