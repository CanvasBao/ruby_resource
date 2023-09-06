<?php

namespace App\Enums;

use App\Traits\EnumHelper;

enum OrderStatusEnum:int {
  use EnumHelper;

  case new = 0;
  case cancel = 1;
  case finished = 2;

  public function label(): string
  {
      return match($this) {
          static::new => 'mới',
          static::cancel => 'hủy',
          static::finished => 'hoàn thành',
      };
  }

  public function color(): string
  {
      return match($this) {
          static::new => '#437ec4',
          static::cancel => '#c04949',
          static::finished => '#A3A3A3',
      };
  }
}