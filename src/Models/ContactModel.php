<?php
namespace Brucelwayne\Contact\Models;

use Carbon\Traits\Date;
use Illuminate\Database\Eloquent\Model;
use Veelasky\LaravelHashId\Eloquent\HashableId;

/**
 * @property integer $team_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $title
 * @property string $content
 * @property Date $created_at
 * @property Date $updated_at
 *
 */
class ContactModel extends Model{

    use HashableId;

    protected $table = 'contacts';

    protected $hashKey = ContactModel::class;

    protected $fillable = [
        'team_id',
        'name',
        'email',
        'phone',
        'title',
        'content',
    ];

    protected $hidden = [
        'id',
    ];

    protected $appends = [
        'hash'
    ];

    public function getRouteKeyName()
    {
        return 'hash';
    }
}