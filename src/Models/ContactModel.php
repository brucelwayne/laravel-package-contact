<?php

namespace Brucelwayne\Contact\Models;

use Carbon\Traits\Date;
use Illuminate\Database\Eloquent\Model;
use Veelasky\LaravelHashId\Eloquent\HashableId;

/**
 * @property integer $team_id
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property Date $created_at
 * @property Date $updated_at
 *
 * @method static where(...$args)
 * @method static self create($input)
 *
 */
class ContactModel extends Model
{

    use HashableId;

    protected $table = 'blw_contacts';

    protected $hashKey = 'blw_contacts';

    protected $fillable = [
        'team_id',
        'email',
        'subject',
        'message',
        'token',
    ];

    protected $hidden = [
        'id',
    ];

    protected $appends = [
        'hash'
    ];

    public static function byToken(string $token)
    {
        return static::where('token', $token)->first();
    }

    public static function createNewContact($input)
    {
        return static::create($input);
    }

    public function getRouteKeyName(): string
    {
        return 'hash';
    }
}