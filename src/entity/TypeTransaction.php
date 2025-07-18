<?php
namespace App\entity;
enum TypeTransaction:string {
    case depot="depot";
    case retrait="retrait";
    case paiement="paiement";
}