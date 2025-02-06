<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function updateProfilePhoto($photo)
    {
        // Almacena la foto en la carpeta 'FotosPerfil' en S3
        $path = $photo->store('FotosPerfil', 's3');

        // Actualiza la ruta de la foto de perfil en la base de datos
        $this->forceFill([
            'profile_photo_path' => $path,
        ])->save();
    }

    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo_path
            ? Storage::disk($this->profilePhotoDisk())->url($this->profile_photo_path)
            : $this->defaultProfilePhotoUrl();
    }


    public function deleteProfilePhoto()
{
    // Verifica si existe el path de la foto de perfil
    if ($this->profile_photo_path) {
        try {
            // Intenta eliminar la foto de S3
            Storage::disk('s3')->delete($this->profile_photo_path);

            // Actualiza el campo profile_photo_path a null
            $this->profile_photo_path = null; // Asignar null a la propiedad
            $this->save(); // Guardar los cambios en la base de datos

            return true; // Foto eliminada con éxito
        } catch (\Exception $e) {
            // Manejo de errores
            \Log::error('Error al eliminar la foto de perfil: ' . $e->getMessage());
            return false; // Error al eliminar la foto
        }
    }

    // Si no hay foto de perfil, devuelve false
    return false;
}



    public function ciclosAcademicos()
    {
        return $this->hasMany(CiclosAcademico::class);
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'user_id');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }


    public function ciclosCursos()
    {
        return $this->hasMany(CiclosCurso::class);
    }

    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
