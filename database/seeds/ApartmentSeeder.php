<?php

use Illuminate\Database\Seeder;
use App\Model\Apartment;
use App\Model\User;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;

class ApartmentSeeder extends Seeder
{

   public function run(FakerGenerator $faker)
   {
      $faker = FakerFactory::create('it_IT');

      $category = ['appartamenti', 'stanze', 'casali', 'ville'];
      $cities = [
         [
            'city' => 'Milano',
            'addresses' => [
               [
                  'structure'    => 'Niguarda Park House',
                  'address'      => 'via Antonio da Saluzzo 25',
                  'description'  => 'L\'appartamento si trova a 7 min a piedi dal centro, è circondato da pizzerie, supermercati, farmacie, banche, ufficio postale, gelaterie, parco per amici pelosi. E\' arredato in stile moderno, l’ingresso è ampio, con un armadio rivestito in specchio, in salone ci sono i due divani (di cui uno è divano letto).',
                  'price'        => '200',
                  'rooms'        => '1',
                  'beds'         => '2',
                  'bathrooms_n'  => '1',
                  'area'         => '40',
                  'latitude'     => '45.525443',
                  'longitude'    => '9.189183'
               ],
               [
                  'structure'    => 'Mita Milano Rooms',
                  'address'      => 'Viale Certosa 89',
                  'description'  => 'Ubicata a soli 50 metri dalla stazione della metropolitana Buonarroti, la struttura propone la connessione WiFi gratuita in tutti gli ambienti e sistemazioni climatizzate site in un appartamento all’ultimo piano e dotate di vista sui tetti della... Camera climatizzata dotata di ingresso privato, terrazza affacciata sul giardino, TV LCD, set per la preparazione di tè e caffè e bagno privato. In lontananza è possibile vedere il Duomo.
                  Recensioni',
                  'price'        => '130',
                  'rooms'        => '1',
                  'beds'         => '3',
                  'bathrooms_n'  => '1',
                  'area'         => '55',
                  'latitude'     => '45.472239',
                  'longitude'    => '9.156307'
               ],
            ]
         ],
         [
            'city' => 'Sesto San Giovanni',
            'addresses' => [
               [
                  'structure'    => 'Casa da Suite Aria',
                  'address'      => 'Via Muggiasca 7',
                  'description'  => 'La Casa da Suite Aria sorge a Sesto San Giovanni. Climatizzato e situato a 2,2 km dal Centro Commerciale Vulcano, l’appartamento offre un parcheggio privato e il WiFi gratuito.',
                  'price'        => '220',
                  'rooms'        => '1',
                  'beds'         => '4',
                  'bathrooms_n'  => '1',
                  'area'         => '50',
                  'latitude'     => '45.548336',
                  'longitude'    => '9.256754'
               ],
            ]
         ],
         [
            'city' => 'Bussero',
            'addresses' => [
               [
                  'structure'    => 'Le Magnolie BB',
                  'address'      => 'Via Bergamo 3',
                  'description'  => 'Situato a Monza, a 5 km dall\'Autodromo e a 2,2 km dal Duomo, il RotApartment - Monza offre sistemazioni climatizzate con WiFi gratuito e terrazza. Ospitato in un edificio risalente al 1965, l\’alloggio sorge a 2,3 km dalla Reggia di Monza.',
                  'price'        => '115',
                  'rooms'        => '2',
                  'beds'         => '4',
                  'bathrooms_n'  => '1',
                  'area'         => '75',
                  'latitude'     => '45.531663',
                  'longitude'    => '9.371572'
               ],
            ]
         ],
         [
            'city' => 'Monza',
            'addresses' => [
               [
                  'structure'    => 'RotApartment',
                  'address'      => 'Viale Europa 61',
                  'description'  => 'Situato a Monza, a 5 km dall\'Autodromo e a 2,2 km dal Duomo, il RotApartment - Monza offre sistemazioni climatizzate con WiFi gratuito e terrazza. Ospitato in un edificio risalente al 1965, l\’alloggio sorge a 2,3 km dalla Reggia di Monza.',
                  'price'        => '268',
                  'rooms'        => '1',
                  'beds'         => '4',
                  'bathrooms_n'  => '1',
                  'area'         => '40',
                  'latitude'     => '45.586385',
                  'longitude'    => '9.288064'
               ],
            ]
         ],
         [
            'city' => 'Venezia',
            'addresses' => [
               [
                  'structure'    => 'Veneziacentopercento Ruga Apartment',
                  'address'      => 'Calle de le Ole 310',
                  'description'  => 'Il Veneziacentopercento Ruga Apartment in Venice offre sistemazioni con WiFi gratuito a 2,4 km dal Lungomare d\'Annunzio, a 1,1 km dalla Chiesa di San Giorgio Maggiore e a 1,4 km dal Palazzo Ducale.',
                  'price'        => '409',
                  'rooms'        => '2',
                  'beds'         => '7',
                  'bathrooms_n'  => '1',
                  'area'         => '90',
                  'latitude'     => '45.433863',
                  'longitude'    => '12.357427'
               ],
               [
                  'structure'    => 'Gorne Apartment',
                  'address'      => 'Calle dei Preti 2025',
                  'description'  => 'Il Veneziacentopercento Gorne Apartment in Venice offre una sistemazione con WiFi gratuito a Venezia, a 2,7 km dal Lungomare d\'Annunzio e a 1 km dalla Chiesa di San Giorgio Maggiore e dal Palazzo Ducale.',
                  'price'        => '413',
                  'rooms'        => '2',
                  'beds'         => '7',
                  'bathrooms_n'  => '1',
                  'area'         => '90',
                  'latitude'     => '45.433506',
                  'longitude'    => '12.353110'
               ],
            ]
         ],
         [
            'city' => 'Murano',
            'addresses' => [
               [
                  'structure'    => 'Villa SPECCHIO',
                  'address'      => 'Fondamenta venier 30',
                  'description'  => 'La Villa SPECCHIO, è una mini villa interamente nuova con 2 camere matrimoniali, 2 bagni e ben 5 finestre che si affacciano su il suo giardino privato nel cuore della laguna.
                  Una villetta di ultima generazione con luminosità unica in ogni stanza.
                  Bagni di marmo bianco, riscaldamento a pavimento, giardino attrezzato con tavoli, poltrone e sdrai, e appena fuori dal cancello il Canal Grande di Murano e la fermata di vaporetto Venier con collegamento per ogni area di Venezia giorno e notte.',
                  'price'        => '574',
                  'rooms'        => '2',
                  'beds'         => '5',
                  'bathrooms_n'  => '1',
                  'area'         => '70',
                  'latitude'     => '45.458543',
                  'longitude'    => '12.351060'
               ],
               [
                  'structure'    => 'Suites BOUTIQUE',
                  'address'      => 'Rivalonga 26',
                  'description'  => 'Situato a Murano, a breve distanza da Anfora e Murano, la struttura vanta la vista sul canale e offre un bar e la connessione WiFi gratuita. This apartment has a toaster, stovetop and dishwasher.',
                  'price'        => '283',
                  'rooms'        => '1',
                  'beds'         => '2',
                  'bathrooms_n'  => '1',
                  'area'         => '45',
                  'latitude'     => '45.456776',
                  'longitude'    => '12.354444'
               ],
            ]
         ],
         [
            'city' => 'Genova',
            'addresses' => [
               [
                  'structure'    => 'L\'Oasi - Camera Matrimoniale',
                  'address'      => 'Via Loano 23/B',
                  'description'  => 'Dotato di un giardino con barbecue gratuito, L\'Oasi si trova a 200 m dal lungomare di Pegli. Avrete gratuitamente a disposizione la connessione WiFi in tutti gli ambienti e il parcheggio privato. Camera dotata di vista mare, connessione Wi-Fi gratuita e bagno privato con vasca o doccia.',
                  'price'        => '118',
                  'rooms'        => '1',
                  'beds'         => '3',
                  'bathrooms_n'  => '1',
                  'area'         => '50',
                  'latitude'     => '44.430577',
                  'longitude'    => '8.799611'
               ],
               [
                  'structure'    => 'LA LANTERNA DI ANGELO',
                  'address'      => 'Via Antonio Cantore 8',
                  'description'  => 'Situata a Genova, a 1,6 km dal porto e a 1,8 km dall\'Università di Genova.',
                  'price'        => '153',
                  'rooms'        => '1',
                  'beds'         => '4',
                  'bathrooms_n'  => '1',
                  'area'         => '45',
                  'latitude'     => '44.413216',
                  'longitude'    => '8.903934'
               ],
            ]
         ],
         [
            'city' => 'Roma',
            'addresses' => [
               [
                  'structure'    => 'Vatican City Relais',
                  'address'      => 'Via Bernardo Cavallino',
                  'description'  => 'Situato a Roma, il Vatican City Relais offre sistemazioni con balcone privato. La struttura dista circa 3,3 km dalla Basilica di San Pietro, 4,2 km dai Musei Vaticani e 5 km dal Vaticano. La struttura mette a vostra disposizione una cucina e un salone in comune, e il servizio di biglietteria.',
                  'price'        => '41',
                  'rooms'        => '1',
                  'beds'         => '3',
                  'bathrooms_n'  => '1',
                  'area'         => '40',
                  'latitude'     => '41.897102',
                  'longitude'    => '12.437501'
               ],
               [
                  'structure'    => 'Il Covo BB',
                  'address'      => 'Via Bernardo Cavallino',
                  'description'  => 'Situato nel centro storico della capitale, nello splendido rione Monti, il Covo B&B dista un breve tragitto a piedi dal Colosseo e dai Fori Romani. Include una TV LCD, un mini frigorifero e l\'aria condizionata.',
                  'price'        => '146',
                  'rooms'        => '1',
                  'beds'         => '3',
                  'bathrooms_n'  => '1',
                  'area'         => '45',
                  'latitude'     => '41.897311',
                  'longitude'    => '12.490321'
               ],
            ]
         ],
         [
            'city' => 'Fiumicino',
            'addresses' => [
               [
                  'structure'    => 'Fiumicino Inn Airport',
                  'address'      => 'Via D\'Altri William 110A',
                  'description'  => 'Situato a 5 minuti di auto dall\'aeroporto di Fiumicino, il Fiumicino Inn offre camere con balcone. Tutte le camere del Fiumicino Inn sono dotate di bagno interno, connessione Wi-Fi gratuita, aria condizionata e TV a schermo piatto. Camera dotata di aria condizionata, connessione Wi-Fi gratuita, bagno privato e balcone di 5 m² con tavolo e sedie. Al momento della prenotazione siete pregati di specificare la tipologia di letto desiderata.',
                  'price'        => '101',
                  'rooms'        => '1',
                  'beds'         => '2',
                  'bathrooms_n'  => '1',
                  'area'         => '50',
                  'latitude'     => '41.762653',
                  'longitude'    => '12.242832'
               ],
               [
                  'structure'    => 'Sabrina Airport',
                  'address'      => 'Via delle Pinne 115',
                  'description'  => 'Situato a Fiumicino, a soli 10 minuti in auto dall\'aeroporto, il Sabrina Airport offre la connessione Wi-Fi gratuita, camere climatizzate, un parcheggio privato gratuito e una terrazza e un giardino in comune. Camera climatizzata dotata di connessione Wi-Fi gratuita, TV a schermo piatto, vista sul giardino e bagno interno.',
                  'price'        => '124',
                  'rooms'        => '1',
                  'beds'         => '3',
                  'bathrooms_n'  => '1',
                  'area'         => '65',
                  'latitude'     => '41.807961',
                  'longitude'    => '12.220189'
               ],
            ]
         ],
         [
            'city' => 'Napoli',
            'addresses' => [
               [
                  'structure'    => 'A\' Luggetella',
                  'address'      => 'Via Bernardo Cavallino',
                  'description'  => 'Ubicato nel quartiere Vomero di Napoli, a 2,1 km dall\'Osservatorio Astronomico di Capodimonte, l\'A\' Luggetella fornisce camere climatizzate e un parcheggio privato gratuito. Le camere presentano una TV a schermo piatto, una terrazza o un balcone dove potrete sorseggiare un caffè o un tè, e un bagno privato completo di bidet, accappatoi, set di cortesia e asciugacapelli.',
                  'price'        => '50',
                  'rooms'        => '3',
                  'beds'         => '9',
                  'bathrooms_n'  => '2',
                  'area'         => '200',
                  'latitude'     => '40.859349',
                  'longitude'    => '14.231051'
               ],
               [
                  'structure'    => 'YouRelais Pergolesi',
                  'address'      => 'Via Bernardo Cavallino',
                  'description'  => 'Le unità sono dotate di pavimenti piastrellati, cucina completamente attrezzata con lavastoviglie, TV a schermo piatto con canali via cavo e bagno privato con bidet. Se desiderate viaggiare leggermente, potrete usufruire di asciugamani e lenzuola a un costo aggiuntivo. La struttura fornisce il servizio di noleggio biciclette.',
                  'price'        => '50',
                  'rooms'        => '1',
                  'beds'         => '4',
                  'bathrooms_n'  => '1',
                  'area'         => '70',
                  'latitude'     => '40.832519',
                  'longitude'    => '14.226204'
               ],
            ]
         ],
         [
            'city' => 'Ischia',
            'addresses' => [
               [
                  'structure'    => 'La cassetta gialla',
                  'address'         => 'Corso Regina Elena 124',
                  'description' => 'Casa con ampio cancello esterno automatico e parcheggio, composta da soggiorno, cucina, camera matrimoniale con ampio bagno e ripostiglio; appena ristrutturata e mobili nuovi nuovi.A soli 5 minuti di macchina dalla spiaggia dei Maronti e fermata bus a 20 metri dalla casa.',
                  'price'        => '172',
                  'rooms'        => '2',
                  'beds'         => '4',
                  'bathrooms_n'  => '1',
                  'area'         => '150',
                  'latitude'     => '40.713924',
                  'longitude'    => '13.926176'
               ],
               [
                  'structure'    => 'Casa Di Meglio Dependance',
                  'address'         => 'Via Bosco 3',
                  'description' => 'Immersa nel verde e situata in una posizione tranquilla sull\'isola di Ischia, a 10 minuti a piedi dalla spiaggia, la Struttura offre camere con balcone e connessione WiFi gratuita. Camera con 1 letto matrimoniale e 1 letto singolo. Su richiesta sono disponibili 3 letti singoli.',
                  'price'        => '110',
                  'rooms'        => '1',
                  'beds'         => '3',
                  'bathrooms_n'  => '1',
                  'area'         => '60',
                  'latitude'     => '40.745582',
                  'longitude'    => '13.910987'
               ],
            ]
         ],
         [
            'city' => 'Vibo Marina',
            'addresses' => [
               [
                  'structure'    => 'W Vibo',
                  'address'         => 'Via Tormachiello 27',
                  'description' => 'Questo appartamento, situata a Vibo Marina, è ideale per 4 viaggiatori. Offre 2 camere da letto.
                  è perfetto per rilassarsi una giornata di escursione. La cucina è interamente equipaggiata per permetterti di cucinare i tuoi piatti preferiti. Goditi i pasti al tavolo da pranzo che offre sedie per 12 persone. L\'appartamento possiede 2 confortevoli camere da letto, 1 con un divano letto, e 1 con un letto matrimoniale,. Il bagno è dotato di una vasca da bagno e WC. L\'appartamento dispone di aria condizionata.',
                  'price'        => '256',
                  'rooms'        => '2',
                  'beds'         => '4',
                  'bathrooms_n'  => '1',
                  'area'         => '95',
                  'latitude'     => '38.708569',
                  'longitude'    => '16.098299'
               ],
               [
                  'structure'    => 'À La Maison De Gabry',
                  'address'         => 'Viale Parodi 55',
                  'description' => 'À La Maison si trova a Vibo Valentia e vanta una posizione strategica vicino alla spiaggia. Castello di Bivona e Castello di Murat sono due dei più importanti punti di riferimento della zona. E per chi ama le attività, è d\'obbligo una tappa a Porto di Vibo Marina e Porto di Tropea.',
                  'price'        => '73',
                  'rooms'        => '4',
                  'beds'         => '10',
                  'bathrooms_n'  => '2',
                  'area'         => '95',
                  'latitude'     => '38.713607',
                  'longitude'    => '16.125973'
               ],
            ]
         ],
         [
            'city' => 'Tropea',
            'addresses' => [
               [
                  'structure'    => 'Villa Giada',
                  'address'      => 'Via Lungomare, snc 27',
                  'description'  => 'Villa Giada si trova a Tropea e vanta una posizione strategica nei pressi di una stazione ferroviaria e sulla spiaggia. Due delle principali attrazioni naturalistiche della zona sono Lido "Blanca Beach" e Spiaggia del Convento. A livello culturale, invece, spiccano Museo del Mare e Insediamento Rupestre degli Sbariati. Grazie ad attività come immersioni subacquee, snorkeling e windsurf nelle vicinanze, divertirsi in acqua non sarà certo difficile!',
                  'price'        => '216',
                  'rooms'        => '4',
                  'beds'         => '11',
                  'bathrooms_n'  => '4',
                  'area'         => '150',
                  'latitude'     => '38.675771',
                  'longitude'    => '15.890224'
               ],
               [
                  'structure'    => 'Le Tolde Del Corallone La Pinta',
                  'address'      => 'Largo Vaccari 44',
                  'description'  => 'Le Tolde del Corallone Tropea appartamento arredato con gusto costituito da camera matrimoniale con balconcino, cucina con balcone a picco sul mare. Bagno con box doccia e finestra. L’appartamento si trova al secondo piano di un palazzo dell’800, accessibile tramite scala (alcuni scalini hanno grandezze diverse). Il balcone a picco sul mare da la possibilità di poter far colazione, pranzare e cenare all’ esterno con un vista mozzafiato.',
                  'price'        => '339',
                  'rooms'        => '2',
                  'beds'         => '2',
                  'bathrooms_n'  => '1',
                  'area'         => '75',
                  'latitude'     => '38.677851',
                  'longitude'    => '15.895184'
               ],
            ]
         ],
         [
            'city' => 'Santa Domenica',
            'addresses' => [
               [
                  'structure'    => 'Appartamenti Regina',
                  'address'      => 'Contrada Conte 10 B',
                  'description'  => 'Situato a 3 km dal Lido Alex, l\'Appartamenti Regina offre sistemazioni con giardino, una terrazza e una reception aperta 24 ore su 24. La connessione Wi-Fi e il parcheggio privato sono disponibili gratuitamente. Casa vacanze con cucina, utensili e lavatrice.',
                  'price'        => '171',
                  'rooms'        => '1',
                  'beds'         => '4',
                  'bathrooms_n'  => '1',
                  'area'         => '55',
                  'latitude'     => '38.662727',
                  'longitude'    => '15.858972'
               ],
               [
                  'structure'    => 'Residenza Borgo Italico',
                  'address'      => 'Via Valle dell\'acqua',
                  'description'  => 'Situata a Santa Domenica, la Residenza Borgo Italico offre una piscina all\'aperto e servizi gratuiti quali la connessione WiFi e un parcheggio privato in loco. Questa camera tripla dispone di balcone, ingresso privato e forno.',
                  'price'        => '122',
                  'rooms'        => '1',
                  'beds'         => '3',
                  'bathrooms_n'  => '1',
                  'area'         => '55',
                  'latitude'     => '38.665302',
                  'longitude'    => '15.873679'
               ],
            ]
         ],
         [
            'city' => 'Palermo',
            'addresses' => [
               [
                  'structure'    => 'C\'era Una Volta',
                  'address'         => 'Via Principe di Granatelli 28',
                  'description' => 'Situato in una zona pedonale nel cuore di Palermo, a 20 minuti a piedi dalla stazione centrale, il C\'era Una Volta offre il Wi-Fi gratuito ed eleganti sistemazioni dotate di aria condizionata e balcone. Camera climatizzata con TV a schermo piatto.',
                  'price'        => '135',
                  'rooms'        => '1',
                  'beds'         => '3',
                  'bathrooms_n'  => '1',
                  'area'         => '65',
                  'latitude'     => '38.125120',
                  'longitude'    => '13.359318'
               ],
               [
                  'structure'    => 'Piazza Marina Chic',
                  'address'      => 'Piazza Marina 8',
                  'description'  => 'Situato a Palermo, a 1,1 km dalla Cattedrale di Palermo, l\'Apartment Palermo offre un balcone. 1,6 km dal Palazzo dei Normanni. Il WiFi è fruibile gratuitamente in tutte le aree.',
                  'price'        => '260',
                  'rooms'        => '3',
                  'beds'         => '6',
                  'bathrooms_n'  => '2',
                  'area'         => '105',
                  'latitude'     => '38.118086',
                  'longitude'    => '13.368129'
               ],
            ]
         ],
      ];

      foreach ($cities as $city) {
         $addresses = $city['addresses'];
         $baseLorPicUrl = 'https://picsum.photos/1920/1080?random=';
         foreach ($addresses as $address) {
            Apartment::create([
               'user_id' => User::inRandomOrder()->first()->id,
               'title' => $address['structure'],
               'thumb' => $baseLorPicUrl . rand(1, 500),
               'description'  => $address['description'],
               'category'     => $category[array_rand($category)],
               'rooms_n'      => $address['rooms'],
               'beds_n'       => $address['beds'],
               'bathrooms_n'  => $address['bathrooms_n'],
               'area'         => $address['area'],
               'city'         => $city['city'],
               'address'      => $address['address'],
               'latitude'     => $address['latitude'],
               'longitude'    => $address['longitude'],
               'price'        => $address['price'],
               'visible'      => rand(0, 1)
            ]);
         }
     }
   }
}
