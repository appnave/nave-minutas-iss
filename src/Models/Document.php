<?php

namespace Bildvitta\IssJuridico\Models;

use Bildvitta\IssJuridico\Traits\UsesJuridicoDB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes, UsesJuridicoDB;

    protected $connection = 'iss-juridico';

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function signerDocuments(): HasMany
    {
        return $this->hasMany(SignerDocument::class);
    }

    // ==============================================================
    // SCOPES
    // ==============================================================

    public function scopeOfType(Builder $query, string $slug): Builder
    {
        return $query->whereHas('documentType', function ($q) use ($slug) {
            $q->where('slug', $slug);
        });
    }

    public function scopeSigned(Builder $query): Builder
    {
        return $query->whereHas('signerDocuments', function ($q) {
            $q->whereNotNull('signed_at');
        });
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', 1);
    }

    public function scopeModuleNameSales(Builder $query): Builder
    {
        return $query->where('external_module_name', 'vendas');
    }
}
