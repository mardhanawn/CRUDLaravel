<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Books extends Model
{
    protected $fillable = ['judul', 'penerbit', 'tahun_terbit', 'pengarang']; 
}
