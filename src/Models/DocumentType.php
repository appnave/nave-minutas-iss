<?php

namespace Bildvitta\IssJuridico\Models;

use Bildvitta\IssJuridico\Traits\UsesJuridicoDB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentType extends Model
{
    use SoftDeletes, UsesJuridicoDB;

    protected $connection = 'iss-juridico';

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}
