<?php


namespace App\Infra\Models;


use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * Class Member
 * @package App\Infra\Models
 */
class Member extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'member';

    protected $primaryKey = 'id';

    protected $fillable = ['me01', 'me02', 'me03','me04', 'me05', 'me06', 'me07','me08','me09'];

    public function getMemberEmail($email)
    {
        return $this->where('email', $email);
    }
}
