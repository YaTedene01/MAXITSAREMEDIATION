<?php
namespace App\entity;
enum StatutTransaction:string {
    case Enattente="En attente";
    case Reussie="Reussie";
    case Annule="Annule";
    case Echec="Echec";
}