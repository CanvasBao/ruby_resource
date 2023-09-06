<?php

namespace App\Traits;

trait EnumHelper
{
  public static function names(): array
  {
    return array_column(self::cases(), 'name');
  }

  public static function values(): array
  {
    return array_column(self::cases(), 'value');
  }

  public static function labels(): array
  {
    $result = [];
    foreach(self::cases() as $case){
      array_push($result, $case->label());
    }
    return $result;
  }

  public static function array(): array
  {
    return array_combine(self::names(), self::values());
  }

  public static function arrayLabel(): array
  {
    return array_combine(self::values(), self::labels());
  }

  public static function toOptions(): array
  {
    $options = [];
    foreach(self::cases() as $case){
      array_push($options, ['value' => $case->value, 'text' => $case->label()]);
    }
    return $options;
  }

  public static function valueOfName($name): string
  {
    $options = array_combine(self::names(), self::values());
    return array_key_exists($name,$options) ? $options[$name] : '';
  }

  public static function valueOfLabel($label): string
  {
    $options = array_combine(self::labels(), self::values());
    return array_key_exists($label,$options) ? $options[$label] : '';
  }

  public static function hasKey($value): bool
  {
    return in_array($value, self::values());
  }

  public static function hasLabel($label): bool
  {
    return in_array($label, self::labels());
  }
}
