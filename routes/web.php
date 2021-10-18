<?php

use App\Models\Hotel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use League\CommonMark\Extension\Table\Table;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ReservationController::class, 'create'])->name('form-contact');
Route::post('/', [ReservationController::class, 'store']);

// Route::get('test-hotels', function () {
//     $hotels = Hotel::all();

// Route::get('test-hotels', function () {
//     $hotels = Hotel::orderBy('nom', 'desc')->get();

// Route::get('hotel', [HotelController::class, 'index'])->name('hotel.index');

// Route::get('hotel/{hotel}/show', [HotelController::class, 'show'])->name('hotel.show');

// Route::get('hotel/{hotel}/edit', [HotelController::class, 'edit'])->name('hotel.edit');
// Route::put('hotel/{hotel}/edit', [HotelController::class, 'update'])->name('hotel.update');;

// Route::get('hotel/create', [HotelController::class, 'create'])->name('hotel.create');
// Route::post('hotel', [HotelController::class, 'store'])->name('hotel.store');

// Route::delete('hotel/{hotel}/destroy', [HotelController::class, 'destroy'])->name('hotel.destroy');

Route::resource('hotel', HotelController::class);

Route::get('categorie/{slug}/evenements', [HotelController::class, 'index'])->name('hotels.categorie');

// Route::get('index', function () {
    // $hotel = Hotel::find(5);
    // $hotel->description = rand(1,99);
    // $hotel->save();

    //Modification
    // $hotel = Hotel::find(7);
    // $hotel->description = 'Un hotel';
    // $hotel->save();

    // $hotels = Hotel::where('nom', 'like', '%Disney%')->get();

    // echo '<table>';
    //     echo '<tr>
    //             <th>ID</th>
    //             <th>NOM</th>
    //             <th>DESCRIPTION</th>
    //         </tr>';
    // foreach ($hotels as $key => $hotel) {
    //     echo '<tr>';
    //     if($hotel->id < 10) {
    //         echo '<td>0' . $hotel->id . '</td><td>' . $hotel->nom . '</td><td>' . $hotel->description . '</td>';
    //         echo '<br>';
    //     } else {
    //         echo $hotel->id . '</td><td>' . $hotel->nom  . '</td><td>' . $hotel->description .'</td>';
    //         echo '<br>';
    //     }
    //     echo '</tr>';
    // }
    // echo '</table>';

    //Ajout
    // $hotel = new Hotel();
    // $hotel->nom = 'Test';
    // $hotel->lieu = 'Test';
    // $hotel->quand = '2021-12-12';
    // $hotel->description = 'Test';
    // $hotel->save();

    //Suppression
    // $hotel = Hotel::where('id', '>=', 11)->delete();

    //Pagination
    // $hotel = Hotel::skip(6)->take(3)->get();

    // $hotel = Hotel::findOrFail(4987189729);

//     return '';
// });