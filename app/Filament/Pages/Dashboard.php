<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard{
    
    protected static ?string $navigationGroup = 'Home';  // Grupo deseado
    
    // Opcional: Personaliza etiqueta e ícono
    protected static ?string $navigationLabel = 'Escritorio';
    protected static ?string $navigationIcon = 'heroicon-o-home';
}