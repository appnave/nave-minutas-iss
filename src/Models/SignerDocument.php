<?php

namespace Bildvitta\IssJuridico\Models;

use Bildvitta\IssJuridico\Traits\UsesJuridicoDB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SignerDocument extends Model
{
    use SoftDeletes, UsesJuridicoDB;

    protected $connection = 'iss-juridico';

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
}
