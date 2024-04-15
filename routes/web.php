    <?php

    use App\Http\Controllers\ProfileController;
    use Illuminate\Foundation\Application;
    use Illuminate\Support\Facades\Route;
    use Inertia\Inertia;
    use App\Http\Controllers\Cursos;
    use App\Http\Controllers\Continguts;
    use App\Http\Controllers\DeporteController;
    use App\Http\Controllers\ChinoController;
    use App\Http\Controllers\ComunicacionController;
    use App\Http\Controllers\DawController;
    use App\Models\Deporte;
    use App\Models\Chino;
    use App\Models\Daw;
    use App\Models\Comunicacion;

    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });

    Route::get('/dashboard', function () {
        $chinos = Chino::all();
        $comunicacions = Comunicacion::all();
        $deportes = Deporte::all();
        $daws = Daw::all();
    
        return Inertia::render('Dashboard', [
            'chinos' => $chinos,
            'comunicacions' => $comunicacions,
            'deportes' => $deportes,
            'daws' => $daws,
        ]);
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::get('/cursos', [Cursos::class, 'index'])->name('cursos.view');
    
    Route::get('/chino', [ChinoController::class, 'index'])->name('chino.view');
    Route::get('/comunicacion', [ComunicacionController::class, 'index'])->name('comunicacion.view');
    Route::get('/daw', [DawController::class, 'index'])->name('daw.view');
    
    Route::get('/deporte', [DeporteController::class, 'index'])->name('deporte.view');
    Route::get('/createdeporte', [DeporteController::class, 'create'])->name('create.deporte');




    require __DIR__.'/auth.php';
