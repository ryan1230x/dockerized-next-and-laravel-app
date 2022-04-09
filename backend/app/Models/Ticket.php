<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClientAddress;
use App\Models\ClientInformation;

class Ticket extends Model
{
    use HasFactory;

    /**
     * define values that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'name',
        'landline',
        'contact_number',
        'service',
        'network',
        'portability',
        'package',
        'address',
        'created_by',
        'requested_date',
        'ticket_id',
    ];

    /**
     * address relationship
     *
     * @return Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address()
    {
        return $this->hasOne(ClientAddress::class);
    }

    /**
     * information relationship
     *
     * @return Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function information()
    {
        return $this->hasOne(ClientInformation::class);
    }

    /**
     * service relationship
     *
     * @return Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function service()
    {
        return $this->hasOne(ClientService::class);
    }

    /**
     * comments relationship
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    /**
     * history relationship
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history()
    {
        return $this->hasMany(History::class);
    }

    /**
     * tags relationship
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
