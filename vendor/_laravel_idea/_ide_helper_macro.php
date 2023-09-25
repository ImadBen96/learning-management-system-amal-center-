<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection PhpFullyQualifiedNameUsageInspection */

namespace Illuminate\Database\Eloquent {
    
    /**
     * @method array transform(array $array, array $transformers = null)
     */
    class Builder {}
}

namespace Illuminate\Database\Eloquent\Relations {
    
    /**
     * @method void searchable($chunk = null)
     * @method void unsearchable($chunk = null)
     */
    class HasManyThrough {}
}

namespace Illuminate\Http {

    use CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine;
    
    /**
     * @method array validate(array $rules, ...$params)
     * @method array validateWithBag(string $errorBag, array $rules, ...$params)
     * @method bool hasValidSignature($absolute = true)
     * @method bool hasValidRelativeSignature()
     */
    class Request {}
    
    /**
     * @method CloudinaryEngine storeOnCloudinary($folder = null)
     * @method CloudinaryEngine storeOnCloudinaryAs($folder = null, $publicId = null)
     */
    class UploadedFile {}
}

namespace Illuminate\Support {
    
    /**
     * @method void searchable()
     * @method void unsearchable()
     */
    class Collection {}
}