<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case BillCollector = 'bill_collector';
    case Accountant = 'accountant';
}
