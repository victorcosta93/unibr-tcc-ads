<?php
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    // Nome da tabela
    protected $table = 'chamado';
    
    // Chave primário
    protected $primaryKey = 'cd_chamado';
    
    // Removendo os campos de tempo
    public $timestamps = false;
    
    /**
     * Relacionamento hasOne
     * Contrato
     */
    public function contrato(){
        return $this->belongsTo('App\Http\Controllers\Contrato', 'cd_contrato', 'cd_contrato');
    }
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
<<<<<<< HEAD
        'deleted_at',
        'dt_abertura_chamado',
        'dt_fechamento_chamado'
=======
        'deleted_at'
>>>>>>> 869f1d7234454476026a5280ea89456cc9fb4291
    ];
}
