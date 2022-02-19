<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Carro
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $nome_veiculo
 * @property string|null $link
 * @property string|null $ano
 * @property string|null $combustivel
 * @property string|null $portas
 * @property string|null $quilometragem
 * @property string|null $cambio
 * @property string|null $cor
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User $user
 *
 * @package App\Models
 */
class Carro extends Model
{
    protected $table = 'carros';

    protected $casts = [
        'user_id' => 'int'
    ];

    protected $fillable = [
        'user_id',
        'nome_veiculo',
        'link',
        'ano',
        'combustivel',
        'portas',
        'quilometragem',
        'cambio',
        'cor'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}