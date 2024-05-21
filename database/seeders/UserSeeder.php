<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Administrador;
use App\Models\Perito;
use App\Models\Vendedor;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        //Administrador:
        User::factory()->create([
            'name' => 'Usuario Administrador',
            'email' => 'test@example.com',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('administrador');

        Administrador::create([
            'user_id' => 1
        ]);

        //Cliente:
        User::factory()->create([
            'name' => 'Usuario Cliente',
            'email' => 'cliente@example.com',
            'telefono' => '78452052',
            'direccion' => 'Av. Los Cusis / Calle Toborochi / Nro Casa 342',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 2
        ]);

        User::factory()->create([
            'name' => 'Usuario Vendedor ',
            'email' => 'vendedor@example.com',
            'telefono' => '75028281',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('vendedor');

        Vendedor::create([
            'user_id' => 3
        ]);

        User::factory()->create([
            'name' => 'Usuario Perito',
            'email' => 'perito@example.com',
            'telefono' => '68232052',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('perito');

        Perito::create([
            'user_id' => 4
        ]);

        //Agregar mas si lo necesitan:

        //Clientes:
        User::factory()->create([
            'name' => 'Santiago Fernandez Rodriguez',
            'email' => 'santiago@gmail.com',
            'direccion' => 'Av. Centenario / Calle Charcas / Nro Casa 6534',
            'telefono' => '73987654',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 5
        ]);

        User::factory()->create([
            'name' => 'LUIS GUZMAN QUINTANILLA',
            'email' => 'luisg@gmail.com',
            'direccion' => 'CALLE ANA BARBA Y EJERCITO NACIONAL',
            'telefono' => '72616535',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 6
        ]);

        User::factory()->create([
            'name' => 'ANGELITA FLORES OSINAGA',
            'email' => 'angelitaf@gmail.com',
            'direccion' => 'AVENIDA SANTOS DUMOND',
            'telefono' => '73161075',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 7
        ]);

        User::factory()->create([
            'name' => 'CLARA MONTAÑO CORONADO',
            'email' => 'claram@gmail.com',
            'direccion' => 'C/NUFLO DE CHAVEZ - INCOS',
            'telefono' => '76617443',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 8
        ]);

        User::factory()->create([
            'name' => 'ALFREDO GARCIA FLORES',
            'email' => 'alfredog@gmail.com',
            'direccion' => 'AV. OCORO ESQ. DALIA UV 131',
            'telefono' => '71007377',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 9
        ]);

        User::factory()->create([
            'name' => 'DOROTEA VASQUEZ PIMENTEL',
            'email' => 'doroteav@gmail.com',
            'direccion' => 'AV. MOSCU ENTRE 7mo. Y 8vo. ANILLO BARRIO TIERRAS NUEVAS EL CARMEN',
            'telefono' => '72176365',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 10
        ]);

        User::factory()->create([
            'name' => 'HORACIA PEÑA MENACHO',
            'email' => 'horaciap@gmail.com',
            'direccion' => 'TENIENTE CUELLAR 50',
            'telefono' => '70803345',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 11
        ]);

        User::factory()->create([
            'name' => 'LUIS ALBERTO MAMANI BOLIVAR',
            'email' => 'luisam@gmail.com',
            'direccion' => 'CALLE FINAL CHARCAS',
            'telefono' => '79876232',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 12
        ]);

        User::factory()->create([
            'name' => 'GUADALUPE MURILLO GARZON',
            'email' => 'guadalupem@gmail.com',
            'direccion' => 'CALLE 27 DE MAYO N° 106',
            'telefono' => '73135381',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 13
        ]);

        User::factory()->create([
            'name' => 'LORENZO HINOJOSA CARMONA',
            'email' => 'lorenzoh@gmail.com',
            'direccion' => 'AV. PREFECTO RIVAS',
            'telefono' => '76072633',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 14
        ]);

        User::factory()->create([
            'name' => 'SANDRA ISABEL HURTADO GUTIERREZ',
            'email' => 'sandraih@gmail.com',
            'direccion' => 'CALLE GRANADA VILLA',
            'telefono' => '79881588',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 15
        ]);


        User::factory()->create([
            'name' => 'RENE MYLAN ARCAINE',
            'email' => 'renem@gmail.com',
            'direccion' => 'BARRIO GUARACACHI DIAGONAL 21',
            'telefono' => '72697268',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 16
        ]);

        User::factory()->create([
            'name' => 'NARDO ARIEL RODRIGUEZ',
            'email' => 'nardoa@gmail.com',
            'direccion' => 'PAMPA DE LA ISLA Y LOS CHACOS',
            'telefono' => '73177244',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 17
        ]);

        User::factory()->create([
            'name' => 'WALTER ARCE FLORES',
            'email' => 'waltera@gmail.com',
            'direccion' => 'BARRIO NOEL KEMPF MERCADO UV 99',
            'telefono' => '74646189',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 18
        ]);

        User::factory()->create([
            'name' => 'RUDY ORTEGA ROMAGERA',
            'email' => 'rudyo@gmail.com',
            'direccion' => 'RANCHO NUEVO AV. MONTECRISTO',
            'telefono' => '70057361',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 19
        ]);

        User::factory()->create([
            'name' => 'SANDRA GARCIA CABRERA',
            'email' => 'sandragc@gmail.com',
            'direccion' => 'URBANIZACION OLENDER BARRIO 30 DE MARZO',
            'telefono' => '76009835',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('cliente');

        Cliente::create([
            'user_id' => 20
        ]);

        //vendedores:
        User::factory()->create([

            'name' => 'Juan Torres Perez',
            'email' => 'juan@gmail.com',

            'telefono' => '79542856',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('vendedor');

        Vendedor::create([
            'user_id' => 21
        ]);

        User::factory()->create([
            'name' => 'Diego',
            'email' => 'diego@gmail.com',
            'telefono' => '68743632',
            'password' => bcrypt('00000000'), //8 veces 0
        ])->assignRole('perito');

        Vendedor::create([
            'user_id' => 22
        ]);
    }
}
