<?php

namespace App\Library;

class Helper {

	/**
	 * Generate a unique slug.
	 * If it already exists, a number suffix will be appended.
	 * It probably works only with MySQL.
	 *
	 * @param Illuminate\Database\Eloquent\Model $model
	 * @param string $value
	 * @return string
	 */
	public static function getUniqueAlias(\Illuminate\Database\Eloquent\Model $model, $value)
	{
	    $slug = str_slug($value);
	    $slugCount = count($model->whereRaw("alias REGEXP '^{$slug}(-[0-9]+)?$' and id != '{$model->id}'")->get());

	    return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
	}
}