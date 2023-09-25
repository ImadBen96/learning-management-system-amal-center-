<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpFullyQualifiedNameUsageInspection */

namespace Illuminate\Database\Eloquent {
    
    /**
     * @method static array transform(array $array, array $transformers = null)
     */
    class Builder {}
}

namespace Illuminate\Database\Eloquent\Relations {
    
    /**
     * @method static void searchable($chunk = null)
     * @method static void unsearchable($chunk = null)
     */
    class HasManyThrough {}
}

namespace Illuminate\Http {

    use CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine;
    
    /**
     * @method static array validate(array $rules, ...$params)
     * @method static array validateWithBag(string $errorBag, array $rules, ...$params)
     * @method static bool hasValidSignature($absolute = true)
     * @method static bool hasValidRelativeSignature()
     */
    class Request {}
    
    /**
     * @method static CloudinaryEngine storeOnCloudinary($folder = null)
     * @method static CloudinaryEngine storeOnCloudinaryAs($folder = null, $publicId = null)
     */
    class UploadedFile {}
}

namespace Illuminate\Support {
    
    /**
     * @method static void searchable()
     * @method static void unsearchable()
     */
    class Collection {}
}