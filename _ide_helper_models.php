<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Auth{
/**
 * App\Models\Auth\Permission
 *
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $title
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|Permission action($action = 'read')
 * @method static \Illuminate\Database\Eloquent\Builder|Permission collect($sort = 'display_name')
 * @method static \Database\Factories\Permission factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission sortable($defaultParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission usingSearchString($string)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * App\Models\Auth\Role
 *
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string|null $description
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\Permission[] $permissions
 * @method static \Illuminate\Database\Eloquent\Builder|Role collect($sort = 'display_name')
 * @method static \Database\Factories\Role factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role sortable($defaultParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Role usingSearchString($string)
 */
	class Role extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * App\Models\Auth\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $last_logged_in_at
 * @property string $locale
 * @property string|null $landing_page
 * @property bool $enabled
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Common\Company[] $companies
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Dashboard[] $dashboards
 * @property-read mixed $last_logged
 * @property-read mixed $picture
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auth\Role[] $roles
 * @method static \Plank\Mediable\MediableCollection|static[] all($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|User collect($sort = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|User enabled()
 * @method static \Database\Factories\User factory(...$parameters)
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|User isCustomer()
 * @method static \Illuminate\Database\Eloquent\Builder|User isNotCustomer()
 * @method static \Illuminate\Database\Eloquent\Builder|User isNotOwner()
 * @method static \Illuminate\Database\Eloquent\Builder|User isOwner()
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User orWherePermissionIs($permission = '')
 * @method static \Illuminate\Database\Eloquent\Builder|User orWhereRoleIs($role = '', $team = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User sortable($defaultParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User source($source)
 * @method static \Illuminate\Database\Eloquent\Builder|User usingSearchString($string)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDoesntHavePermission()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDoesntHaveRole()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHasMediaMatchAll(array $tags)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePermissionIs($permission = '', $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleIs($role = '', $team = null, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User withMediaAndVariantsMatchAll($tags = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Translation\HasLocalePreference {}
}

namespace App\Models\Auth{
/**
 * App\Models\Auth\UserCompany
 *
 * @property int $user_id
 * @property int $company_id
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Auth\User|null $user
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserCompany onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserCompany truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|UserCompany withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserCompany withoutTrashed()
 */
	class UserCompany extends \Eloquent {}
}

namespace App\Models\Auth{
/**
 * App\Models\Auth\UserDashboard
 *
 * @property int $user_id
 * @property int $dashboard_id
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Dashboard|null $dashboard
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Auth\User|null $user
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserDashboard onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserDashboard truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|UserDashboard withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserDashboard withoutTrashed()
 */
	class UserDashboard extends \Eloquent {}
}

namespace App\Models\Banking{
/**
 * App\Models\Banking\Account
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string $number
 * @property string $currency_code
 * @property float $opening_balance
 * @property string|null $bank_name
 * @property string|null $bank_phone
 * @property string|null $bank_address
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Setting\Currency|null $currency
 * @property-read string $balance
 * @property-read string $expense_balance
 * @property-read string $income_balance
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Banking\Transaction[] $transactions
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account exists()
 * @method static \Database\Factories\Account factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account name($name)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account number($number)
 * @method static \Illuminate\Database\Query\Builder|Account onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Account truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Account withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Account withoutTrashed()
 */
	class Account extends \Eloquent {}
}

namespace App\Models\Banking{
/**
 * App\Models\Banking\Reconciliation
 *
 * @property int $id
 * @property int $company_id
 * @property int $account_id
 * @property \Illuminate\Support\Carbon $started_at
 * @property \Illuminate\Support\Carbon $ended_at
 * @property float $closing_balance
 * @property bool $reconciled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Banking\Account|null $account
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation exists()
 * @method static \Database\Factories\Reconciliation factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation newQuery()
 * @method static \Illuminate\Database\Query\Builder|Reconciliation onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Reconciliation truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Reconciliation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Reconciliation withoutTrashed()
 */
	class Reconciliation extends \Eloquent {}
}

namespace App\Models\Banking{
/**
 * App\Models\Banking\Transaction
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property \Illuminate\Support\Carbon $paid_at
 * @property float $amount
 * @property string $currency_code
 * @property float $currency_rate
 * @property int $account_id
 * @property int|null $document_id
 * @property int|null $contact_id
 * @property int $category_id
 * @property string|null $description
 * @property string $payment_method
 * @property string|null $reference
 * @property int $parent_id
 * @property string|null $created_from
 * @property int|null $created_by
 * @property int $reconciled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Banking\Account|null $account
 * @property-read \App\Models\Document\Document|null $bill
 * @property-read \App\Models\Setting\Category|null $category
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read \App\Models\Setting\Currency|null $currency
 * @property-read \App\Models\Document\Document|null $document
 * @property-read float $amount_for_account
 * @property-read string $attachment
 * @property-read bool $has_transfer_relation
 * @property-read string $route_id
 * @property-read string $route_name
 * @property-read mixed $template_path
 * @property-read string $type_title
 * @property-read \App\Models\Document\Document|null $invoice
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read Transaction|null $parent
 * @property-read \App\Models\Common\Recurring|null $recurring
 * @property-read \App\Models\Auth\User|null $user
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction accountId($account_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction categoryId($category_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction contactId($contact_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction documentId($document_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction expense()
 * @method static \Database\Factories\Transaction factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction income()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isDocument()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isNotDocument()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isNotReconciled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isNotTransfer()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isReconciled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction isTransfer()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction latest()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction newQuery()
 * @method static \Illuminate\Database\Query\Builder|Transaction onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction paid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction type($types)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transaction withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|Transaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Transaction withoutTrashed()
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models\Banking{
/**
 * App\Models\Banking\Transfer
 *
 * @property int $id
 * @property int $company_id
 * @property int $expense_transaction_id
 * @property int $income_transaction_id
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Banking\Transaction|null $expense_transaction
 * @property-read float $amount
 * @property-read string $attachment
 * @property-read string $description
 * @property-read int $from_account_id
 * @property-read string $from_account_rate
 * @property-read string $from_currency_code
 * @property-read string $payment_method
 * @property-read string $reference
 * @property-read mixed $template_path
 * @property-read int $to_account_id
 * @property-read string $to_account_rate
 * @property-read string $to_currency_code
 * @property-read \App\Models\Banking\date $transferred_at
 * @property-read \App\Models\Banking\Transaction|null $income_transaction
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer exists()
 * @method static \Database\Factories\Transfer factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer newQuery()
 * @method static \Illuminate\Database\Query\Builder|Transfer onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Transfer withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|Transfer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Transfer withoutTrashed()
 */
	class Transfer extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Company
 *
 * @property int $id
 * @property string|null $domain
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Banking\Account[] $accounts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Setting\Category[] $categories
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Common\Contact[] $contacts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Setting\Currency[] $currencies
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Dashboard[] $dashboards
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentHistory[] $document_histories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $document_item_taxes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItem[] $document_items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentTotal[] $document_totals
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Document\Document[] $documents
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\EmailTemplate[] $email_templates
 * @property-read string $company_logo
 * @property-read mixed $location
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Common\Item[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Module\ModuleHistory[] $module_histories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Module\Module[] $modules
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Banking\Reconciliation[] $reconciliations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Recurring[] $recurring
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Report[] $reports
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Setting\Setting[] $settings
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Setting\Tax[] $taxes
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Banking\Transaction[] $transactions
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Banking\Transfer[] $transfers
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Auth\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Widget[] $widgets
 * @method static \Plank\Mediable\MediableCollection|static[] all($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Company autocomplete($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Company collect($sort = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|Company enabled($value = 1)
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Company isNotOwner()
 * @method static \Illuminate\Database\Eloquent\Builder|Company isOwner()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Query\Builder|Company onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company sortable($defaultParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Company source($source)
 * @method static \Illuminate\Database\Eloquent\Builder|Company userId($user_id)
 * @method static \Illuminate\Database\Eloquent\Builder|Company usingSearchString($string)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereHasMediaMatchAll(array $tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Company withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Company withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Company withMediaAndVariantsMatchAll($tags = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Company withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|Company withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Company withoutTrashed()
 */
	class Company extends \Eloquent implements \Laratrust\Contracts\Ownable {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Contact
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property string $name
 * @property string|null $email
 * @property int|null $user_id
 * @property string|null $tax_number
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $city
 * @property string|null $zip_code
 * @property string|null $state
 * @property string|null $country
 * @property string|null $website
 * @property string $currency_code
 * @property bool $enabled
 * @property string|null $reference
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Setting\Currency|null $currency
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Document\Document[] $documents
 * @property-read mixed $location
 * @property-read string $logo
 * @property-read mixed $unpaid
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Banking\Transaction[] $transactions
 * @property-read \App\Models\Auth\User|null $user
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact customer()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact email($email)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact exists()
 * @method static \Database\Factories\Contact factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact newQuery()
 * @method static \Illuminate\Database\Query\Builder|Contact onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact type($types)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact vendor()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|Contact withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Contact withoutTrashed()
 */
	class Contact extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Dashboard
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read string $alias
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Auth\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Widget[] $widgets
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard alias($alias)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard exists()
 * @method static \Database\Factories\Dashboard factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard newQuery()
 * @method static \Illuminate\Database\Query\Builder|Dashboard onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Dashboard userId($user_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Dashboard withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Dashboard withoutTrashed()
 */
	class Dashboard extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\EmailTemplate
 *
 * @property int $id
 * @property int $company_id
 * @property string $alias
 * @property string $class
 * @property string $name
 * @property string $subject
 * @property string $body
 * @property string|null $params
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate alias($alias)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate moduleAlias($alias)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate newQuery()
 * @method static \Illuminate\Database\Query\Builder|EmailTemplate onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EmailTemplate truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|EmailTemplate withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EmailTemplate withoutTrashed()
 */
	class EmailTemplate extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\InventoryHistorie
 *
 * @property int $id
 * @property int $company_id
 * @property int $user_id
 * @property int $item_id
 * @property int $warehouse_id
 * @property string $type_type
 * @property int $type_id
 * @property float $quantity
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read string $basename
 * @property-read InventoryHistorie|null $originalMedia
 * @property-read \Illuminate\Database\Eloquent\Collection|InventoryHistorie[] $variants
 * @method static \Illuminate\Database\Eloquent\Builder|Media forPathOnDisk(string $disk, string $path)
 * @method static \Illuminate\Database\Eloquent\Builder|Media inDirectory(string $disk, string $directory, bool $recursive = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Media inOrUnderDirectory(string $disk, string $directory)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryHistorie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryHistorie newQuery()
 * @method static \Illuminate\Database\Query\Builder|InventoryHistorie onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryHistorie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media unordered()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereBasename(string $basename)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereIsOriginal()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereIsVariant(?string $variant_name = null)
 * @method static \Illuminate\Database\Query\Builder|InventoryHistorie withTrashed()
 * @method static \Illuminate\Database\Query\Builder|InventoryHistorie withoutTrashed()
 */
	class InventoryHistorie extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\InventoryItem
 *
 * @property int $id
 * @property int $company_id
 * @property int $item_id
 * @property float|null $opening_stock
 * @property float|null $opening_stock_value
 * @property float|null $reorder_level
 * @property string|null $barcode
 * @property int|null $vendor_id
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $sku
 * @property int|null $warehouse_id
 * @property int $default_warehouse
 * @property string|null $unit
 * @property int|null $returnable
 * @property-read string $basename
 * @property-read InventoryItem|null $originalMedia
 * @property-read \Illuminate\Database\Eloquent\Collection|InventoryItem[] $variants
 * @method static \Illuminate\Database\Eloquent\Builder|Media forPathOnDisk(string $disk, string $path)
 * @method static \Illuminate\Database\Eloquent\Builder|Media inDirectory(string $disk, string $directory, bool $recursive = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Media inOrUnderDirectory(string $disk, string $directory)
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InventoryItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media unordered()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereBasename(string $basename)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereIsOriginal()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereIsVariant(?string $variant_name = null)
 */
	class InventoryItem extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Item
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string|null $sku
 * @property string|null $description
 * @property float $sale_price
 * @property float $purchase_price
 * @property int $quantity
 * @property int|null $category_id
 * @property int|null $tax_id
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Setting\Category|null $category
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItem[] $document_items
 * @property-read string $item_id
 * @property-read string $picture
 * @property-read string $tax_ids
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\ItemTax[] $taxes
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item autocomplete($filter)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item exists()
 * @method static \Database\Factories\Item factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item name($name)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item newQuery()
 * @method static \Illuminate\Database\Query\Builder|Item onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|Item withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Item withoutTrashed()
 */
	class Item extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\ItemTax
 *
 * @property int $id
 * @property int $company_id
 * @property int $item_id
 * @property int|null $tax_id
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Setting\Tax|null $tax
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax newQuery()
 * @method static \Illuminate\Database\Query\Builder|ItemTax onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|ItemTax withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ItemTax withoutTrashed()
 */
	class ItemTax extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Media
 *
 * @property int $id
 * @property int $company_id
 * @property string $disk
 * @property string $directory
 * @property string $filename
 * @property string $extension
 * @property string $mime_type
 * @property string $aggregate_type
 * @property int $size
 * @property string|null $variant_name
 * @property int|null $original_media_id
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read string $basename
 * @property-read Media|null $originalMedia
 * @property-read \Illuminate\Database\Eloquent\Collection|Media[] $variants
 * @method static \Illuminate\Database\Eloquent\Builder|Media forPathOnDisk(string $disk, string $path)
 * @method static \Illuminate\Database\Eloquent\Builder|Media inDirectory(string $disk, string $directory, bool $recursive = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Media inOrUnderDirectory(string $disk, string $directory)
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Query\Builder|Media onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media unordered()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereBasename(string $basename)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereIsOriginal()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereIsVariant(?string $variant_name = null)
 * @method static \Illuminate\Database\Query\Builder|Media withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Media withoutTrashed()
 */
	class Media extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Recurring
 *
 * @property int $id
 * @property int $company_id
 * @property string $recurable_type
 * @property int $recurable_id
 * @property string $frequency
 * @property int $interval
 * @property string $started_at
 * @property int $count
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $recurable
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring newQuery()
 * @method static \Illuminate\Database\Query\Builder|Recurring onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Recurring truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Recurring withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Recurring withoutTrashed()
 */
	class Recurring extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Report
 *
 * @property int $id
 * @property int $company_id
 * @property string $class
 * @property string $name
 * @property string $description
 * @property object|null $settings
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read string $alias
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report alias($alias)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report newQuery()
 * @method static \Illuminate\Database\Query\Builder|Report onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Report truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Report withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Report withoutTrashed()
 */
	class Report extends \Eloquent {}
}

namespace App\Models\Common{
/**
 * App\Models\Common\Widget
 *
 * @property int $id
 * @property int $company_id
 * @property int $dashboard_id
 * @property string $class
 * @property string $name
 * @property int $sort
 * @property object|null $settings
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Dashboard|null $dashboard
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Auth\User[] $users
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget exists()
 * @method static \Database\Factories\Widget factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget newQuery()
 * @method static \Illuminate\Database\Query\Builder|Widget onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Widget truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Widget withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Widget withoutTrashed()
 */
	class Widget extends \Eloquent {}
}

namespace App\Models\Document{
/**
 * App\Models\Document\Document
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property string $document_number
 * @property string|null $order_number
 * @property string $status
 * @property \Illuminate\Support\Carbon $issued_at
 * @property \Illuminate\Support\Carbon $due_at
 * @property float $amount
 * @property string $currency_code
 * @property float $currency_rate
 * @property int $category_id
 * @property int $contact_id
 * @property string $contact_name
 * @property string|null $contact_email
 * @property string|null $contact_tax_number
 * @property string|null $contact_phone
 * @property string|null $contact_address
 * @property string|null $contact_city
 * @property string|null $contact_zip_code
 * @property string|null $contact_state
 * @property string|null $contact_country
 * @property string|null $notes
 * @property string|null $footer
 * @property int $parent_id
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Setting\Category|null $category
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read \App\Models\Setting\Currency|null $currency
 * @property-read string $amount_due
 * @property-read string $amount_without_tax
 * @property-read string $attachment
 * @property-read mixed $contact_location
 * @property-read string $discount
 * @property-read string $paid
 * @property-read mixed $received_at
 * @property-read int $reconciled
 * @property-read mixed $sent_at
 * @property-read string $status_label
 * @property-read mixed $template_path
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentHistory[] $histories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $item_taxes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItem[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read Document|null $parent
 * @property-read \App\Models\Common\Recurring|null $recurring
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentTotal[] $totals
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Banking\Transaction[] $transactions
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document accrued()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document due($date)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document exists()
 * @method static \Database\Factories\Document factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document latest()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document notPaid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document number(string $number)
 * @method static \Illuminate\Database\Query\Builder|Document onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document paid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|Document withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Document withoutTrashed()
 */
	class Document extends \Eloquent {}
}

namespace App\Models\Document{
/**
 * App\Models\Document\DocumentHistory
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property string $status
 * @property int $notify
 * @property string|null $description
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory newQuery()
 * @method static \Illuminate\Database\Query\Builder|DocumentHistory onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|DocumentHistory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DocumentHistory withoutTrashed()
 */
	class DocumentHistory extends \Eloquent {}
}

namespace App\Models\Document{
/**
 * App\Models\Document\DocumentItem
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property int|null $item_id
 * @property string $name
 * @property string|null $description
 * @property string|null $sku
 * @property float $quantity
 * @property float $price
 * @property float $tax
 * @property string $discount_type
 * @property float $discount_rate
 * @property float $total
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read string $discount
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $taxes
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|DocumentItem onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|DocumentItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DocumentItem withoutTrashed()
 */
	class DocumentItem extends \Eloquent {}
}

namespace App\Models\Document{
/**
 * App\Models\Document\DocumentItemTax
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property int $document_item_id
 * @property int $tax_id
 * @property string $name
 * @property float $amount
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Setting\Tax|null $tax
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax newQuery()
 * @method static \Illuminate\Database\Query\Builder|DocumentItemTax onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|DocumentItemTax withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DocumentItemTax withoutTrashed()
 */
	class DocumentItemTax extends \Eloquent {}
}

namespace App\Models\Document{
/**
 * App\Models\Document\DocumentTotal
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property string|null $code
 * @property string $name
 * @property float $amount
 * @property int $sort_order
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read mixed $title
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal code($code)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal newQuery()
 * @method static \Illuminate\Database\Query\Builder|DocumentTotal onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|DocumentTotal withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DocumentTotal withoutTrashed()
 */
	class DocumentTotal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Item
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string|null $sku
 * @property string|null $description
 * @property float $sale_price
 * @property float $purchase_price
 * @property int $quantity
 * @property int|null $category_id
 * @property int|null $tax_id
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\InventoryItem|null $baarCode
 * @property-read \App\Models\Setting\Category|null $category
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItem[] $document_items
 * @property-read string $item_id
 * @property-read string $picture
 * @property-read string $tax_ids
 * @property-read mixed $upper
 * @property-read mixed $w_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\InventoryItem[] $inventory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\InventoryHistorie[] $inventoryHistories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\InventoryItem[] $inventory_items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\ItemTax[] $taxes
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item autocomplete($filter)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item exists()
 * @method static \Database\Factories\Item factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item name($name)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item newQuery()
 * @method static \Illuminate\Database\Query\Builder|Item onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|Item withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Item withoutTrashed()
 */
	class Item extends \Eloquent {}
}

namespace App\Models\Module{
/**
 * App\Models\Module\Module
 *
 * @property int $id
 * @property int $company_id
 * @property string $alias
 * @property bool $enabled
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module alias($alias)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module newQuery()
 * @method static \Illuminate\Database\Query\Builder|Module onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Module truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Module withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Module withoutTrashed()
 */
	class Module extends \Eloquent {}
}

namespace App\Models\Module{
/**
 * App\Models\Module\ModuleHistory
 *
 * @property int $id
 * @property int $company_id
 * @property int $module_id
 * @property string $version
 * @property string|null $description
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory newQuery()
 * @method static \Illuminate\Database\Query\Builder|ModuleHistory onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ModuleHistory truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|ModuleHistory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ModuleHistory withoutTrashed()
 */
	class ModuleHistory extends \Eloquent {}
}

namespace App\Models\Setting{
/**
 * App\Models\Setting\Category
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string $type
 * @property string $color
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Document\Document[] $documents
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Common\Item[] $items
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Banking\Transaction[] $transactions
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category expense()
 * @method static \Database\Factories\Category factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category income()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category item()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category name($name)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category newQuery()
 * @method static \Illuminate\Database\Query\Builder|Category onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category other()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category transfer()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Category type($types)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Category withoutTrashed()
 */
	class Category extends \Eloquent {}
}

namespace App\Models\Setting{
/**
 * App\Models\Setting\Currency
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string $code
 * @property float $rate
 * @property string $precision
 * @property string $symbol
 * @property string $symbol_first
 * @property string $decimal_mark
 * @property string $thousands_separator
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Banking\Account[] $accounts
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Common\Contact[] $contacts
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Document\Document[] $documents
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Banking\Transaction[] $transactions
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency code($code)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency exists()
 * @method static \Database\Factories\Currency factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency newQuery()
 * @method static \Illuminate\Database\Query\Builder|Currency onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Currency truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Currency withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Currency withoutTrashed()
 */
	class Currency extends \Eloquent {}
}

namespace App\Models\Setting{
/**
 * App\Models\Setting\Setting
 *
 * @property int $id
 * @property int $company_id
 * @property string $key
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting newQuery()
 * @method static \Illuminate\Database\Query\Builder|Setting onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting prefix($prefix = 'company')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Setting truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Setting withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Setting withoutTrashed()
 */
	class Setting extends \Eloquent {}
}

namespace App\Models\Setting{
/**
 * App\Models\Setting\Tax
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property float $rate
 * @property string $type
 * @property bool $enabled
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $document_items
 * @property-read string $title
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Common\Item[] $items
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax compound()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax exists()
 * @method static \Database\Factories\Tax factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax fixed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax inclusive()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax name($name)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax normal()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax notRate($rate)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax notWithholding()
 * @method static \Illuminate\Database\Query\Builder|Tax onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax rate($rate)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax type($types)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Tax withTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Tax withholding()
 * @method static \Illuminate\Database\Query\Builder|Tax withoutTrashed()
 */
	class Tax extends \Eloquent {}
}

namespace App\Models\Purchase{
/**
 * App\Models\Purchase\Bill
 *
 * @deprecated 
 * @see Document
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property string $document_number
 * @property string|null $order_number
 * @property string $status
 * @property \Illuminate\Support\Carbon $issued_at
 * @property \Illuminate\Support\Carbon $due_at
 * @property float $amount
 * @property string $currency_code
 * @property float $currency_rate
 * @property int $category_id
 * @property int $contact_id
 * @property string $contact_name
 * @property string|null $contact_email
 * @property string|null $contact_tax_number
 * @property string|null $contact_phone
 * @property string|null $contact_address
 * @property string|null $contact_city
 * @property string|null $contact_zip_code
 * @property string|null $contact_state
 * @property string|null $contact_country
 * @property string|null $notes
 * @property string|null $footer
 * @property int $parent_id
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Setting\Category|null $category
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read \App\Models\Setting\Currency|null $currency
 * @property-read string $amount_due
 * @property-read string $amount_without_tax
 * @property-read string $attachment
 * @property mixed $bill_number
 * @property mixed $billed_at
 * @property-read mixed $contact_location
 * @property-read string $discount
 * @property-read string $paid
 * @property-read mixed $received_at
 * @property-read int $reconciled
 * @property-read mixed $sent_at
 * @property-read string $status_label
 * @property-read mixed $template_path
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentHistory[] $histories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $item_taxes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItem[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Document\Document|null $parent
 * @property-read \App\Models\Common\Recurring|null $recurring
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentTotal[] $totals
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Banking\Transaction[] $transactions
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document accrued()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document due($date)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill exists()
 * @method static \Database\Factories\Document factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document latest()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document notPaid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document number(string $number)
 * @method static \Illuminate\Database\Query\Builder|Bill onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document paid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|Bill withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Bill withoutTrashed()
 */
	class Bill extends \Eloquent {}
}

namespace App\Models\Purchase{
/**
 * App\Models\Purchase\BillHistory
 *
 * @deprecated 
 * @see DocumentHistory
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property string $status
 * @property int $notify
 * @property string|null $description
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property mixed $bill_id
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory newQuery()
 * @method static \Illuminate\Database\Query\Builder|BillHistory onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillHistory truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|BillHistory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BillHistory withoutTrashed()
 */
	class BillHistory extends \Eloquent {}
}

namespace App\Models\Purchase{
/**
 * App\Models\Purchase\BillItem
 *
 * @deprecated 
 * @see DocumentItem
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property int|null $item_id
 * @property string $name
 * @property string|null $description
 * @property string|null $sku
 * @property float $quantity
 * @property float $price
 * @property float $tax
 * @property string $discount_type
 * @property float $discount_rate
 * @property float $total
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property mixed $bill_id
 * @property-read string $discount
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $taxes
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|BillItem onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|BillItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BillItem withoutTrashed()
 */
	class BillItem extends \Eloquent {}
}

namespace App\Models\Purchase{
/**
 * App\Models\Purchase\BillItemTax
 *
 * @deprecated 
 * @see DocumentItemTax
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property int $document_item_id
 * @property int $tax_id
 * @property string $name
 * @property float $amount
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property mixed $bill_id
 * @property mixed $bill_item_id
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Setting\Tax|null $tax
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax newQuery()
 * @method static \Illuminate\Database\Query\Builder|BillItemTax onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItemTax truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|BillItemTax withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BillItemTax withoutTrashed()
 */
	class BillItemTax extends \Eloquent {}
}

namespace App\Models\Purchase{
/**
 * App\Models\Purchase\BillTotal
 *
 * @deprecated 
 * @see DocumentTotal
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property string|null $code
 * @property string $name
 * @property float $amount
 * @property int $sort_order
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property mixed $bill_id
 * @property-read mixed $title
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal code($code)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal newQuery()
 * @method static \Illuminate\Database\Query\Builder|BillTotal onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillTotal truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|BillTotal withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BillTotal withoutTrashed()
 */
	class BillTotal extends \Eloquent {}
}

namespace App\Models\Sale{
/**
 * App\Models\Sale\Invoice
 *
 * @deprecated 
 * @see Document
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property string $document_number
 * @property string|null $order_number
 * @property string $status
 * @property \Illuminate\Support\Carbon $issued_at
 * @property \Illuminate\Support\Carbon $due_at
 * @property float $amount
 * @property string $currency_code
 * @property float $currency_rate
 * @property int $category_id
 * @property int $contact_id
 * @property string $contact_name
 * @property string|null $contact_email
 * @property string|null $contact_tax_number
 * @property string|null $contact_phone
 * @property string|null $contact_address
 * @property string|null $contact_city
 * @property string|null $contact_zip_code
 * @property string|null $contact_state
 * @property string|null $contact_country
 * @property string|null $notes
 * @property string|null $footer
 * @property int $parent_id
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Setting\Category|null $category
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read \App\Models\Setting\Currency|null $currency
 * @property-read string $amount_due
 * @property-read string $amount_without_tax
 * @property-read string $attachment
 * @property-read mixed $contact_location
 * @property-read string $discount
 * @property mixed $invoice_number
 * @property mixed $invoiced_at
 * @property-read string $paid
 * @property-read mixed $received_at
 * @property-read int $reconciled
 * @property-read mixed $sent_at
 * @property-read string $status_label
 * @property-read mixed $template_path
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentHistory[] $histories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $item_taxes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItem[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Document\Document|null $parent
 * @property-read \App\Models\Common\Recurring|null $recurring
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentTotal[] $totals
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Banking\Transaction[] $transactions
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document accrued()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document due($date)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice exists()
 * @method static \Database\Factories\Document factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document latest()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document notPaid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document number(string $number)
 * @method static \Illuminate\Database\Query\Builder|Invoice onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document paid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|Invoice withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Invoice withoutTrashed()
 */
	class Invoice extends \Eloquent {}
}

namespace App\Models\Sale{
/**
 * App\Models\Sale\InvoiceHistory
 *
 * @deprecated 
 * @see DocumentHistory
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property string $status
 * @property int $notify
 * @property string|null $description
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property mixed $invoice_id
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory newQuery()
 * @method static \Illuminate\Database\Query\Builder|InvoiceHistory onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceHistory truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|InvoiceHistory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|InvoiceHistory withoutTrashed()
 */
	class InvoiceHistory extends \Eloquent {}
}

namespace App\Models\Sale{
/**
 * App\Models\Sale\InvoiceItem
 *
 * @deprecated 
 * @see DocumentItem
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property int|null $item_id
 * @property string $name
 * @property string|null $description
 * @property string|null $sku
 * @property float $quantity
 * @property float $price
 * @property float $tax
 * @property string $discount_type
 * @property float $discount_rate
 * @property float $total
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read string $discount
 * @property mixed $invoice_id
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $taxes
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|InvoiceItem onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|InvoiceItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|InvoiceItem withoutTrashed()
 */
	class InvoiceItem extends \Eloquent {}
}

namespace App\Models\Sale{
/**
 * App\Models\Sale\InvoiceItemTax
 *
 * @deprecated 
 * @see DocumentItemTax
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property int $document_item_id
 * @property int $tax_id
 * @property string $name
 * @property float $amount
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property mixed $invoice_id
 * @property mixed $invoice_item_id
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Setting\Tax|null $tax
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax newQuery()
 * @method static \Illuminate\Database\Query\Builder|InvoiceItemTax onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItemTax truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|InvoiceItemTax withTrashed()
 * @method static \Illuminate\Database\Query\Builder|InvoiceItemTax withoutTrashed()
 */
	class InvoiceItemTax extends \Eloquent {}
}

namespace App\Models\Sale{
/**
 * App\Models\Sale\InvoiceTotal
 *
 * @deprecated 
 * @see DocumentTotal
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property string|null $code
 * @property string $name
 * @property float $amount
 * @property int $sort_order
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property mixed $invoice_id
 * @property-read mixed $title
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal code($code)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal newQuery()
 * @method static \Illuminate\Database\Query\Builder|InvoiceTotal onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceTotal truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|InvoiceTotal withTrashed()
 * @method static \Illuminate\Database\Query\Builder|InvoiceTotal withoutTrashed()
 */
	class InvoiceTotal extends \Eloquent {}
}

namespace Modules\CompositeItems\Models{
/**
 * Modules\CompositeItems\Models\CompositeItem
 *
 * @property int $id
 * @property int $company_id
 * @property int $item_id
 * @property string|null $sku
 * @property string|null $barcode
 * @property string|null $unit
 * @property int|null $returnable
 * @property int|null $track_inventory
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\CompositeItems\Models\Item[] $composite_items
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem canTrack()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|CompositeItem onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompositeItem withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|CompositeItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CompositeItem withoutTrashed()
 */
	class CompositeItem extends \Eloquent {}
}

namespace Modules\CompositeItems\Models{
/**
 * Modules\CompositeItems\Models\Item
 *
 * @property int $id
 * @property int $company_id
 * @property int $item_id
 * @property int $composite_item_id
 * @property float $quantity
 * @property int|null $warehouse_id
 * @property string|null $created_by
 * @property string|null $created_from
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item newQuery()
 * @method static \Illuminate\Database\Query\Builder|Item onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Item withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Item withoutTrashed()
 */
	class Item extends \Eloquent {}
}

namespace Modules\CreditDebitNotes\Models{
/**
 * Modules\CreditDebitNotes\Models\CreditNote
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property string $document_number
 * @property string|null $order_number
 * @property string $status
 * @property \Illuminate\Support\Carbon $issued_at
 * @property \Illuminate\Support\Carbon $due_at
 * @property float $amount
 * @property string $currency_code
 * @property float $currency_rate
 * @property int $category_id
 * @property int $contact_id
 * @property string $contact_name
 * @property string|null $contact_email
 * @property string|null $contact_tax_number
 * @property string|null $contact_phone
 * @property string|null $contact_address
 * @property string|null $contact_city
 * @property string|null $contact_zip_code
 * @property string|null $contact_state
 * @property string|null $contact_country
 * @property string|null $notes
 * @property string|null $footer
 * @property int $parent_id
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Setting\Category|null $category
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\CreditDebitNotes\Models\CreditsTransaction[] $credits_transactions
 * @property-read \App\Models\Setting\Currency|null $currency
 * @property-read \Modules\CreditDebitNotes\Models\CreditNoteDetails|null $details
 * @property-read string $amount_due
 * @property-read string $amount_without_tax
 * @property-read string $attachment
 * @property-read mixed $contact_location
 * @property-read bool $credit_customer_account
 * @property-read string $discount
 * @property-read int|null $invoice_id
 * @property-read string $invoice_number
 * @property-read mixed $paid
 * @property-read mixed $received_at
 * @property-read int $reconciled
 * @property-read mixed $sent_at
 * @property-read string $status_label
 * @property-read mixed $template_path
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentHistory[] $histories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $item_taxes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItem[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Document\Document|null $parent
 * @property-read \App\Models\Common\Recurring|null $recurring
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentTotal[] $totals
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Banking\Transaction[] $transactions
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document accrued()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document due($date)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote exists()
 * @method static \Modules\CreditDebitNotes\Database\Factories\CreditNote factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document latest()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document notPaid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document number(string $number)
 * @method static \Illuminate\Database\Query\Builder|CreditNote onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document paid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNote truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|CreditNote withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CreditNote withoutTrashed()
 */
	class CreditNote extends \Eloquent {}
}

namespace Modules\CreditDebitNotes\Models{
/**
 * Modules\CreditDebitNotes\Models\CreditNoteDetails
 *
 * @property int $id
 * @property int $company_id
 * @property int $document_id
 * @property int|null $invoice_id
 * @property int $credit_customer_account
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails newQuery()
 * @method static \Illuminate\Database\Query\Builder|CreditNoteDetails onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditNoteDetails truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|CreditNoteDetails withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CreditNoteDetails withoutTrashed()
 */
	class CreditNoteDetails extends \Eloquent {}
}

namespace Modules\CreditDebitNotes\Models{
/**
 * Modules\CreditDebitNotes\Models\CreditsTransaction
 *
 * @property int $id
 * @property int $company_id
 * @property int $document_id
 * @property string $type
 * @property string $paid_at
 * @property float $amount
 * @property string $currency_code
 * @property float $currency_rate
 * @property int $category_id
 * @property int $contact_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Modules\CreditDebitNotes\Models\CreditNote|null $credit_note
 * @property-read \App\Models\Sale\Invoice|null $invoice
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction document($document_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction expense()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction income()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction newQuery()
 * @method static \Illuminate\Database\Query\Builder|CreditsTransaction onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CreditsTransaction truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|CreditsTransaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CreditsTransaction withoutTrashed()
 */
	class CreditsTransaction extends \Eloquent {}
}

namespace Modules\CreditDebitNotes\Models{
/**
 * Modules\CreditDebitNotes\Models\DebitNote
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property string $document_number
 * @property string|null $order_number
 * @property string $status
 * @property \Illuminate\Support\Carbon $issued_at
 * @property \Illuminate\Support\Carbon $due_at
 * @property float $amount
 * @property string $currency_code
 * @property float $currency_rate
 * @property int $category_id
 * @property int $contact_id
 * @property string $contact_name
 * @property string|null $contact_email
 * @property string|null $contact_tax_number
 * @property string|null $contact_phone
 * @property string|null $contact_address
 * @property string|null $contact_city
 * @property string|null $contact_zip_code
 * @property string|null $contact_state
 * @property string|null $contact_country
 * @property string|null $notes
 * @property string|null $footer
 * @property int $parent_id
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Setting\Category|null $category
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read \App\Models\Setting\Currency|null $currency
 * @property-read \Modules\CreditDebitNotes\Models\DebitNoteDetails|null $details
 * @property-read string $amount_due
 * @property-read string $amount_without_tax
 * @property-read string $attachment
 * @property-read int|null $bill_id
 * @property-read string $bill_number
 * @property-read mixed $contact_location
 * @property-read string $discount
 * @property-read mixed $paid
 * @property-read mixed $received_at
 * @property-read int $reconciled
 * @property-read mixed $sent_at
 * @property-read string $status_label
 * @property-read mixed $template_path
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentHistory[] $histories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $item_taxes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItem[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Document\Document|null $parent
 * @property-read \App\Models\Common\Recurring|null $recurring
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentTotal[] $totals
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Banking\Transaction[] $transactions
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document accrued()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document due($date)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote exists()
 * @method static \Modules\CreditDebitNotes\Database\Factories\DebitNote factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document latest()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document notPaid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document number(string $number)
 * @method static \Illuminate\Database\Query\Builder|DebitNote onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document paid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNote truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|DebitNote withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DebitNote withoutTrashed()
 */
	class DebitNote extends \Eloquent {}
}

namespace Modules\CreditDebitNotes\Models{
/**
 * Modules\CreditDebitNotes\Models\DebitNoteDetails
 *
 * @property int $id
 * @property int $company_id
 * @property int $document_id
 * @property int|null $bill_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails newQuery()
 * @method static \Illuminate\Database\Query\Builder|DebitNoteDetails onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DebitNoteDetails truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|DebitNoteDetails withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DebitNoteDetails withoutTrashed()
 */
	class DebitNoteDetails extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\Company
 *
 * @property int $id
 * @property int $company_id
 * @property int $created_by
 * @property string $stage
 * @property int|null $owner_id
 * @property string|null $mobile
 * @property string|null $fax_number
 * @property string $source
 * @property string|null $note
 * @property int|null $contact_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\CompanyContact[] $companyContact
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read \App\Models\Auth\User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Deal[] $deals
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Email[] $emails
 * @property-read mixed $crm_contact
 * @property-read string $name
 * @property-read string $picture
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Log[] $logs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Note[] $notes
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Schedule[] $schedules
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Task[] $tasks
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company exists()
 * @method static \Modules\Crm\Database\Factories\Company factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company instance()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company newQuery()
 * @method static \Illuminate\Database\Query\Builder|Company onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Company withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|Company withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Company withoutTrashed()
 */
	class Company extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\CompanyContact
 *
 * @property int $id
 * @property int $company_id
 * @property int $crm_company_id
 * @property int $crm_contact_id
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Modules\Crm\Models\Company|null $company
 * @property-read \Modules\Crm\Models\Contact|null $contact
 * @property-read \App\Models\Auth\User|null $createdBy
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact newQuery()
 * @method static \Illuminate\Database\Query\Builder|CompanyContact onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|CompanyContact truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|CompanyContact withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CompanyContact withoutTrashed()
 */
	class CompanyContact extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\Contact
 *
 * @property int $id
 * @property int $company_id
 * @property int $created_by
 * @property string $stage
 * @property int|null $owner_id
 * @property string|null $born_at
 * @property string|null $mobile
 * @property string|null $fax_number
 * @property string $source
 * @property string|null $note
 * @property int|null $contact_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\CompanyContact[] $contactCompany
 * @property-read \App\Models\Auth\User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Deal[] $deals
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Email[] $emails
 * @property-read string $name
 * @property-read string $picture
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Log[] $logs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Note[] $notes
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Schedule[] $schedules
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Task[] $tasks
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact exists()
 * @method static \Modules\Crm\Database\Factories\Contact factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact instance()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact newQuery()
 * @method static \Illuminate\Database\Query\Builder|Contact onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Contact withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|Contact withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Contact withoutTrashed()
 */
	class Contact extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\Deal
 *
 * @property int $id
 * @property int $company_id
 * @property int|null $crm_contact_id
 * @property int|null $crm_company_id
 * @property int $pipeline_id
 * @property int $stage_id
 * @property string $name
 * @property float|null $amount
 * @property int $owner_id
 * @property string|null $closed_at
 * @property string $status
 * @property int $created_by
 * @property string $color
 * @property string|null $currency_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\DealActivity[] $activities
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\DealAgent[] $agents
 * @property-read \Modules\Crm\Models\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\DealCompetitor[] $competitors
 * @property-read \Modules\Crm\Models\Contact|null $contact
 * @property-read \App\Models\Auth\User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Email[] $emails
 * @property-read string $picture
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Note[] $notes
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Modules\Crm\Models\DealPipeline|null $pipeline
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal exists()
 * @method static \Modules\Crm\Database\Factories\Deal factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal newQuery()
 * @method static \Illuminate\Database\Query\Builder|Deal onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Deal truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Deal withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Deal withoutTrashed()
 */
	class Deal extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\DealActivity
 *
 * @property int $id
 * @property int $company_id
 * @property int $deal_id
 * @property int $created_by
 * @property string $activity_type
 * @property string|null $name
 * @property string|null $date
 * @property string|null $time
 * @property string|null $duration
 * @property \App\Models\Auth\User|null $assigned
 * @property string|null $note
 * @property int $done
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Modules\Crm\Models\DealActivityType|null $activityType
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $createdBy
 * @property-read \Modules\Crm\Models\Deal|null $deal
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity newQuery()
 * @method static \Illuminate\Database\Query\Builder|DealActivity onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivity truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|DealActivity withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DealActivity withoutTrashed()
 */
	class DealActivity extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\DealActivityType
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string|null $icon
 * @property int $rank
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $createdBy
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType exists()
 * @method static \Modules\Crm\Database\Factories\DealActivityType factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType newQuery()
 * @method static \Illuminate\Database\Query\Builder|DealActivityType onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealActivityType truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|DealActivityType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DealActivityType withoutTrashed()
 */
	class DealActivityType extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\DealAgent
 *
 * @property int $id
 * @property int $company_id
 * @property int $deal_id
 * @property int $user_id
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $createdBy
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Auth\User|null $user
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent newQuery()
 * @method static \Illuminate\Database\Query\Builder|DealAgent onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealAgent truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|DealAgent withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DealAgent withoutTrashed()
 */
	class DealAgent extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\DealCompetitor
 *
 * @property int $id
 * @property int $company_id
 * @property int $deal_id
 * @property int $created_by
 * @property string|null $name
 * @property string|null $web_site
 * @property string|null $strengths
 * @property string|null $weaknesses
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $createdBy
 * @property-read \Modules\Crm\Models\Deal|null $deal
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor newQuery()
 * @method static \Illuminate\Database\Query\Builder|DealCompetitor onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealCompetitor truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|DealCompetitor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DealCompetitor withoutTrashed()
 */
	class DealCompetitor extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\DealEmail
 *
 * @property int $id
 * @property int $company_id
 * @property int $deal_id
 * @property int $registered_user
 * @property string $to
 * @property string $subject
 * @property string|null $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Modules\Crm\Models\Deal|null $deal
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail newQuery()
 * @method static \Illuminate\Database\Query\Builder|DealEmail onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealEmail truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|DealEmail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DealEmail withoutTrashed()
 */
	class DealEmail extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\DealNote
 *
 * @property int $id
 * @property int $company_id
 * @property int $deal_id
 * @property int $registered_user
 * @property string $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Modules\Crm\Models\Deal|null $deal
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote newQuery()
 * @method static \Illuminate\Database\Query\Builder|DealNote onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealNote truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|DealNote withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DealNote withoutTrashed()
 */
	class DealNote extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\DealOwner
 *
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner newQuery()
 * @method static \Illuminate\Database\Query\Builder|DealOwner onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealOwner truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|DealOwner withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DealOwner withoutTrashed()
 */
	class DealOwner extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\DealPipeline
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Deal[] $deals
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\DealPipelineStage[] $stages
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline exists()
 * @method static \Modules\Crm\Database\Factories\DealPipeline factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline newQuery()
 * @method static \Illuminate\Database\Query\Builder|DealPipeline onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipeline truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|DealPipeline withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DealPipeline withoutTrashed()
 */
	class DealPipeline extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\DealPipelineStage
 *
 * @property int $id
 * @property int $company_id
 * @property int $pipeline_id
 * @property string $name
 * @property string $life_stage
 * @property int $rank
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Crm\Models\Deal[] $deals
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage exists()
 * @method static \Modules\Crm\Database\Factories\DealPipelineStage factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage newQuery()
 * @method static \Illuminate\Database\Query\Builder|DealPipelineStage onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DealPipelineStage truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|DealPipelineStage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DealPipelineStage withoutTrashed()
 */
	class DealPipelineStage extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\Email
 *
 * @property int $id
 * @property int $company_id
 * @property int $created_by
 * @property string $emailable_type
 * @property int $emailable_id
 * @property string $from
 * @property string $to
 * @property string $subject
 * @property string|null $body
 * @property int $send
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $emailable
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email exists()
 * @method static \Modules\Crm\Database\Factories\Email factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email instance()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email newQuery()
 * @method static \Illuminate\Database\Query\Builder|Email onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Email truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Email withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Email withoutTrashed()
 */
	class Email extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\Log
 *
 * @property int $id
 * @property int $company_id
 * @property string $logable_type
 * @property int $logable_id
 * @property string $log_type
 * @property string $date
 * @property string $time
 * @property string|null $description
 * @property string|null $subject
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $logable
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log exists()
 * @method static \Modules\Crm\Database\Factories\Log factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log instance()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log newQuery()
 * @method static \Illuminate\Database\Query\Builder|Log onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Log truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Log withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Log withoutTrashed()
 */
	class Log extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\Note
 *
 * @property int $id
 * @property int $company_id
 * @property int $created_by
 * @property string $noteable_type
 * @property int $noteable_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $noteable
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note exists()
 * @method static \Modules\Crm\Database\Factories\Note factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note instance()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note newQuery()
 * @method static \Illuminate\Database\Query\Builder|Note onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Note truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Note withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Note withoutTrashed()
 */
	class Note extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\Schedule
 *
 * @property int $id
 * @property int $company_id
 * @property int $created_by
 * @property string $scheduleable_type
 * @property int $scheduleable_id
 * @property string|null $name
 * @property string $started_at
 * @property string $started_time_at
 * @property string $ended_at
 * @property string $ended_time_at
 * @property string|null $description
 * @property string $schedule_type
 * @property string|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Modules\Crm\Models\Company|null $company
 * @property-read \Modules\Crm\Models\Contact|null $contact
 * @property-read \App\Models\Auth\User|null $createdBy
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $scheduleable
 * @property-read \App\Models\Auth\User|null $user
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule exists()
 * @method static \Modules\Crm\Database\Factories\Schedule factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule instance()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule newQuery()
 * @method static \Illuminate\Database\Query\Builder|Schedule onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Schedule truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Schedule withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Schedule withoutTrashed()
 */
	class Schedule extends \Eloquent {}
}

namespace Modules\Crm\Models{
/**
 * Modules\Crm\Models\Task
 *
 * @property int $id
 * @property int $company_id
 * @property string $taskable_type
 * @property int $taskable_id
 * @property string|null $name
 * @property string|null $user_id
 * @property string $started_at
 * @property string $started_time_at
 * @property string|null $description
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $createdBy
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $taskable
 * @property-read \App\Models\Auth\User|null $user
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task exists()
 * @method static \Modules\Crm\Database\Factories\Task factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task instance()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task newQuery()
 * @method static \Illuminate\Database\Query\Builder|Task onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Task truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Task withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Task withoutTrashed()
 */
	class Task extends \Eloquent {}
}

namespace Modules\CustomFields\Models{
/**
 * Modules\CustomFields\Models\Field
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string $code
 * @property string $icon
 * @property string $class
 * @property int $type_id
 * @property int $required
 * @property string|null $rule
 * @property bool $enabled
 * @property string $locations
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $show
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Modules\CustomFields\Models\FieldLocation|null $fieldLocation
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\CustomFields\Models\FieldTypeOption[] $fieldTypeOption
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\CustomFields\Models\FieldValue[] $field_values
 * @property-read \Modules\CustomFields\Models\Location|null $location
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Modules\CustomFields\Models\Type|null $type
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field byLocation($location_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field newQuery()
 * @method static \Illuminate\Database\Query\Builder|Field onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Field truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Field withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Field withoutTrashed()
 */
	class Field extends \Eloquent {}
}

namespace Modules\CustomFields\Models{
/**
 * Modules\CustomFields\Models\FieldLocation
 *
 * @property int $id
 * @property int $company_id
 * @property string $field_id
 * @property string $location_id
 * @property string $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\CustomFields\Models\Field[] $field
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation newQuery()
 * @method static \Illuminate\Database\Query\Builder|FieldLocation onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldLocation truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|FieldLocation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FieldLocation withoutTrashed()
 */
	class FieldLocation extends \Eloquent {}
}

namespace Modules\CustomFields\Models{
/**
 * Modules\CustomFields\Models\FieldTypeOption
 *
 * @property int $id
 * @property int $company_id
 * @property int $field_id
 * @property int $type_id
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Modules\CustomFields\Models\Field|null $field
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption newQuery()
 * @method static \Illuminate\Database\Query\Builder|FieldTypeOption onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldTypeOption truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|FieldTypeOption withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FieldTypeOption withoutTrashed()
 */
	class FieldTypeOption extends \Eloquent {}
}

namespace Modules\CustomFields\Models{
/**
 * Modules\CustomFields\Models\FieldValue
 *
 * @property int $id
 * @property int $company_id
 * @property int $field_id
 * @property int $type_id
 * @property string $type
 * @property int $location_id
 * @property string $model_type
 * @property int $model_id
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Modules\CustomFields\Models\Field|null $field
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue newQuery()
 * @method static \Illuminate\Database\Query\Builder|FieldValue onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue record($id, $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|FieldValue truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|FieldValue withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FieldValue withoutTrashed()
 */
	class FieldValue extends \Eloquent {}
}

namespace Modules\CustomFields\Models{
/**
 * Modules\CustomFields\Models\Location
 *
 * @property int $id
 * @property mixed $name
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location code($code)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location newQuery()
 * @method static \Illuminate\Database\Query\Builder|Location onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Location truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Location withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Location withoutTrashed()
 */
	class Location extends \Eloquent {}
}

namespace Modules\CustomFields\Models{
/**
 * Modules\CustomFields\Models\Type
 *
 * @property int $id
 * @property mixed $name
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type newQuery()
 * @method static \Illuminate\Database\Query\Builder|Type onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Type truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Type withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Type withoutTrashed()
 */
	class Type extends \Eloquent {}
}

namespace Modules\Estimates\Models{
/**
 * Modules\Estimates\Models\Estimate
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property string $document_number
 * @property string|null $order_number
 * @property string $status
 * @property \Illuminate\Support\Carbon $issued_at
 * @property \Illuminate\Support\Carbon $due_at
 * @property float $amount
 * @property string $currency_code
 * @property float $currency_rate
 * @property int $category_id
 * @property int $contact_id
 * @property string $contact_name
 * @property string|null $contact_email
 * @property string|null $contact_tax_number
 * @property string|null $contact_phone
 * @property string|null $contact_address
 * @property string|null $contact_city
 * @property string|null $contact_zip_code
 * @property string|null $contact_state
 * @property string|null $contact_country
 * @property string|null $notes
 * @property string|null $footer
 * @property int $parent_id
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Setting\Category|null $category
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read \App\Models\Setting\Currency|null $currency
 * @property-read \Modules\Estimates\Models\EstimateExtraParameter $extra_param
 * @property-read string $amount_due
 * @property-read string $amount_without_tax
 * @property-read string $attachment
 * @property-read mixed $contact_location
 * @property-read string $discount
 * @property-read string $invoiced_at
 * @property-read string $paid
 * @property-read mixed $received_at
 * @property-read int $reconciled
 * @property-read mixed $sent_at
 * @property-read string $status_label
 * @property-read mixed $template_path
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentHistory[] $histories
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Estimates\Models\EstimateDocument[] $invoices
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $item_taxes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItem[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Document\Document|null $parent
 * @property-read \App\Models\Common\Recurring|null $recurring
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentTotal[] $totals
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Banking\Transaction[] $transactions
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document accrued()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document due($date)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate estimate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate expire($date)
 * @method static \Modules\Estimates\Database\Factories\Estimate factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate invoiced()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document latest()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate notInvoiced()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document notPaid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document number(string $number)
 * @method static \Illuminate\Database\Query\Builder|Estimate onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document paid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Estimate truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|Estimate withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Estimate withoutTrashed()
 */
	class Estimate extends \Eloquent {}
}

namespace Modules\Estimates\Models{
/**
 * Modules\Estimates\Models\EstimateDocument
 *
 * @property int $id
 * @property int $company_id
 * @property int $document_id
 * @property int $item_id
 * @property string $item_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $item
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument newQuery()
 * @method static \Illuminate\Database\Query\Builder|EstimateDocument onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateDocument truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|EstimateDocument withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EstimateDocument withoutTrashed()
 */
	class EstimateDocument extends \Eloquent {}
}

namespace Modules\Estimates\Models{
/**
 * Modules\Estimates\Models\EstimateExtraParameter
 *
 * @property int $id
 * @property int $company_id
 * @property int $document_id
 * @property \Illuminate\Support\Carbon|null $expire_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Modules\Estimates\Models\Estimate|null $estimate
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter expire($date)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter newQuery()
 * @method static \Illuminate\Database\Query\Builder|EstimateExtraParameter onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateExtraParameter truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|EstimateExtraParameter withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EstimateExtraParameter withoutTrashed()
 */
	class EstimateExtraParameter extends \Eloquent {}
}

namespace Modules\Estimates\Models{
/**
 * Modules\Estimates\Models\EstimateHistory
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property string $status
 * @property int $notify
 * @property string|null $description
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory estimate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory newQuery()
 * @method static \Illuminate\Database\Query\Builder|EstimateHistory onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateHistory truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|EstimateHistory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EstimateHistory withoutTrashed()
 */
	class EstimateHistory extends \Eloquent {}
}

namespace Modules\Estimates\Models{
/**
 * Modules\Estimates\Models\EstimateItem
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property int|null $item_id
 * @property string $name
 * @property string|null $description
 * @property string|null $sku
 * @property float $quantity
 * @property float $price
 * @property float $tax
 * @property string $discount_type
 * @property float $discount_rate
 * @property float $total
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read string $discount
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $taxes
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem estimate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|EstimateItem onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItem truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|EstimateItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EstimateItem withoutTrashed()
 */
	class EstimateItem extends \Eloquent {}
}

namespace Modules\Estimates\Models{
/**
 * Modules\Estimates\Models\EstimateItemTax
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property int $document_item_id
 * @property int $tax_id
 * @property string $name
 * @property float $amount
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Setting\Tax|null $tax
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax estimate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax newQuery()
 * @method static \Illuminate\Database\Query\Builder|EstimateItemTax onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateItemTax truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|EstimateItemTax withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EstimateItemTax withoutTrashed()
 */
	class EstimateItemTax extends \Eloquent {}
}

namespace Modules\Estimates\Models{
/**
 * Modules\Estimates\Models\EstimateTotal
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property string|null $code
 * @property string $name
 * @property float $amount
 * @property int $sort_order
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read mixed $title
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal code($code)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal estimate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal newQuery()
 * @method static \Illuminate\Database\Query\Builder|EstimateTotal onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|EstimateTotal truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|EstimateTotal withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EstimateTotal withoutTrashed()
 */
	class EstimateTotal extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\Adjustment
 *
 * @property int $id
 * @property int $company_id
 * @property string|null $date
 * @property string $adjustment_number
 * @property int $warehouse_id
 * @property string|null $description
 * @property string $reason
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\AdjustmentItem[] $adjustment_items
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Modules\Inventory\Models\Warehouse|null $warehouse
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment exists()
 * @method static \Modules\Inventory\Database\Factories\Adjustment factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment newQuery()
 * @method static \Illuminate\Database\Query\Builder|Adjustment onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Adjustment truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Adjustment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Adjustment withoutTrashed()
 */
	class Adjustment extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\AdjustmentItem
 *
 * @property int $id
 * @property int $company_id
 * @property int $adjustment_id
 * @property int $item_id
 * @property int $item_quantity
 * @property int $adjusted_quantity
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdjustmentItem onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|AdjustmentItem truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|AdjustmentItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdjustmentItem withoutTrashed()
 */
	class AdjustmentItem extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\BillItem
 *
 * @property int $id
 * @property int $company_id
 * @property int $bill_id
 * @property int $item_id
 * @property int|null $warehouse_id
 * @property float|null $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|BillItem onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BillItem truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|BillItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BillItem withoutTrashed()
 */
	class BillItem extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\DocumentItem
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property int $item_id
 * @property int|null $warehouse_id
 * @property float|null $quantity
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $document_item_id
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read \App\Models\Document\DocumentItem|null $document_item
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItem[] $document_items
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|DocumentItem onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|DocumentItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DocumentItem withoutTrashed()
 */
	class DocumentItem extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\History
 *
 * @property int $id
 * @property int $company_id
 * @property int $user_id
 * @property int $item_id
 * @property int $warehouse_id
 * @property string $type_type
 * @property int $type_id
 * @property float $quantity
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\DocumentItem|null $document_item
 * @property-read mixed $action_route
 * @property-read mixed $action_text
 * @property-read mixed $action_type
 * @property-read mixed $action_url
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $type
 * @property-read \Modules\Inventory\Models\Warehouse|null $warehouse
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History document()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History newQuery()
 * @method static \Illuminate\Database\Query\Builder|History onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|History withTrashed()
 * @method static \Illuminate\Database\Query\Builder|History withoutTrashed()
 */
	class History extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\InvoiceItem
 *
 * @property int $id
 * @property int $company_id
 * @property int $invoice_id
 * @property int $item_id
 * @property int|null $warehouse_id
 * @property float|null $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|InvoiceItem onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InvoiceItem truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|InvoiceItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|InvoiceItem withoutTrashed()
 */
	class InvoiceItem extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\Item
 *
 * @property int $id
 * @property int $company_id
 * @property int $item_id
 * @property float|null $opening_stock
 * @property float|null $opening_stock_value
 * @property float|null $reorder_level
 * @property string|null $barcode
 * @property int|null $vendor_id
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $sku
 * @property int|null $warehouse_id
 * @property int $default_warehouse
 * @property string|null $unit
 * @property int|null $returnable
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\History[] $histories
 * @property-read \Modules\Inventory\Models\History|null $history
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\VariantValue[] $values
 * @property-read \Modules\Inventory\Models\Warehouse|null $warehouse
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item exists()
 * @method static \Modules\Inventory\Database\Factories\Item factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item newQuery()
 * @method static \Illuminate\Database\Query\Builder|Item onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Item withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Item withoutTrashed()
 */
	class Item extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\ItemGroup
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string|null $description
 * @property int|null $category_id
 * @property int|null $tax_id
 * @property bool $enabled
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Setting\Category|null $category
 * @property-read \App\Models\Common\Company|null $company
 * @property-read string $picture
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\ItemGroupItem[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\VariantValue[] $values
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\ItemGroupVariantValue[] $variant_values
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\ItemGroupVariant[] $variants
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup exists()
 * @method static \Modules\Inventory\Database\Factories\ItemGroups factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup newQuery()
 * @method static \Illuminate\Database\Query\Builder|ItemGroup onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroup withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|ItemGroup withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ItemGroup withoutTrashed()
 */
	class ItemGroup extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\ItemGroupItem
 *
 * @property int $id
 * @property int $company_id
 * @property int $item_id
 * @property int $item_group_id
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read string $tax_ids
 * @property-read \Modules\Inventory\Models\Item|null $inventory_item
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\ItemTax[] $taxes
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\ItemGroupVariantValue[] $values
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\ItemGroupVariant[] $variants
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|ItemGroupItem onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupItem truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|ItemGroupItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ItemGroupItem withoutTrashed()
 */
	class ItemGroupItem extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\ItemGroupVariant
 *
 * @property int $id
 * @property int $company_id
 * @property int $item_group_id
 * @property int $variant_id
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\ItemGroupVariantValue[] $values
 * @property-read \Modules\Inventory\Models\Variant|null $variant
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\VariantValue[] $variant_values
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant newQuery()
 * @method static \Illuminate\Database\Query\Builder|ItemGroupVariant onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariant truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|ItemGroupVariant withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ItemGroupVariant withoutTrashed()
 */
	class ItemGroupVariant extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\ItemGroupVariantValue
 *
 * @property int $id
 * @property int $company_id
 * @property int $item_group_id
 * @property int|null $item_group_variant_id
 * @property int $variant_id
 * @property int $variant_value_id
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $item_id
 * @property int|null $item_group_item_id
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Modules\Inventory\Models\ItemGroupItem|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue newQuery()
 * @method static \Illuminate\Database\Query\Builder|ItemGroupVariantValue onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemGroupVariantValue truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|ItemGroupVariantValue withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ItemGroupVariantValue withoutTrashed()
 */
	class ItemGroupVariantValue extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\Manufacturer
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string|null $description
 * @property bool $enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Common\Item[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\ManufacturerVendor[] $manufacturer_vendors
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer newQuery()
 * @method static \Illuminate\Database\Query\Builder|Manufacturer onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Manufacturer truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Manufacturer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Manufacturer withoutTrashed()
 */
	class Manufacturer extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\ManufacturerItem
 *
 * @property int $id
 * @property int $company_id
 * @property int $manufacturer_id
 * @property int $item_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \Modules\Inventory\Models\Manufacturer|null $manufacturer
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|ManufacturerItem onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerItem truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|ManufacturerItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ManufacturerItem withoutTrashed()
 */
	class ManufacturerItem extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\ManufacturerVendor
 *
 * @property int $id
 * @property int $company_id
 * @property int $manufacturer_id
 * @property int $vendor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Modules\Inventory\Models\Manufacturer|null $manufacturer
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Common\Contact|null $vendor
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor newQuery()
 * @method static \Illuminate\Database\Query\Builder|ManufacturerVendor onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ManufacturerVendor truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|ManufacturerVendor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ManufacturerVendor withoutTrashed()
 */
	class ManufacturerVendor extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\TransferOrder
 *
 * @property int $id
 * @property int $company_id
 * @property int|null $item_id
 * @property string|null $date
 * @property string $transfer_order
 * @property string|null $reason
 * @property int|null $transfer_quantity
 * @property int $source_warehouse_id
 * @property int $destination_warehouse_id
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $transfer_order_number
 * @property string $status
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Modules\Inventory\Models\Warehouse|null $destination_warehouse
 * @property-read mixed $in_transfer
 * @property-read mixed $item_quantity
 * @property-read mixed $ready
 * @property-read mixed $transferred
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\TransferOrderHistory[] $histories
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Modules\Inventory\Models\Warehouse|null $source_warehouse
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\TransferOrderItem[] $transfer_order_items
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder exists()
 * @method static \Modules\Inventory\Database\Factories\TransferOrder factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder newQuery()
 * @method static \Illuminate\Database\Query\Builder|TransferOrder onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrder truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|TransferOrder withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TransferOrder withoutTrashed()
 */
	class TransferOrder extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\TransferOrderHistory
 *
 * @property int $id
 * @property int $company_id
 * @property int $created_by
 * @property int $transfer_order_id
 * @property string $status
 * @property string|null $created_from
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Auth\User|null $user
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory newQuery()
 * @method static \Illuminate\Database\Query\Builder|TransferOrderHistory onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderHistory truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|TransferOrderHistory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TransferOrderHistory withoutTrashed()
 */
	class TransferOrderHistory extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\TransferOrderItem
 *
 * @property int $id
 * @property int $company_id
 * @property int $transfer_order_id
 * @property int $item_id
 * @property int $item_quantity
 * @property int $transfer_quantity
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|TransferOrderItem onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TransferOrderItem truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|TransferOrderItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TransferOrderItem withoutTrashed()
 */
	class TransferOrderItem extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\Variant
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string|null $type
 * @property bool $enabled
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\ItemGroupVariant[] $item_groups
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\VariantValue[] $values
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant exists()
 * @method static \Modules\Inventory\Database\Factories\Variant factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant newQuery()
 * @method static \Illuminate\Database\Query\Builder|Variant onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Variant truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Variant withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Variant withoutTrashed()
 */
	class Variant extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\VariantValue
 *
 * @property int $id
 * @property int $company_id
 * @property int $variant_id
 * @property string $name
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Modules\Inventory\Models\Variant|null $variant
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue newQuery()
 * @method static \Illuminate\Database\Query\Builder|VariantValue onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|VariantValue truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|VariantValue withTrashed()
 * @method static \Illuminate\Database\Query\Builder|VariantValue withoutTrashed()
 */
	class VariantValue extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\Warehouse
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property bool $enabled
 * @property string|null $zip_code
 * @property string|null $state
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $description
 * @property string|null $country
 * @property string|null $city
 * @property-read \App\Models\Common\Company|null $company
 * @property-read mixed $core_items
 * @property-read mixed $default_warehouse
 * @property-read mixed $history_pagination
 * @property-read mixed $item_pagination
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\History[] $histories
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\Item[] $items
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse exists()
 * @method static \Modules\Inventory\Database\Factories\Warehouse factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse newQuery()
 * @method static \Illuminate\Database\Query\Builder|Warehouse onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Warehouse truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Warehouse withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Warehouse withoutTrashed()
 */
	class Warehouse extends \Eloquent {}
}

namespace Modules\Inventory\Models{
/**
 * Modules\Inventory\Models\WarehouseItem
 *
 * @property int $id
 * @property int $company_id
 * @property int $warehouse_id
 * @property int $item_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read mixed $quantity
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Modules\Inventory\Models\Warehouse|null $warehouse
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|WarehouseItem onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|WarehouseItem truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|WarehouseItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|WarehouseItem withoutTrashed()
 */
	class WarehouseItem extends \Eloquent {}
}

namespace Modules\SalesPurchaseOrders\Models\PurchaseOrder{
/**
 * Modules\SalesPurchaseOrders\Models\PurchaseOrder\Bill
 *
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill newQuery()
 * @method static \Illuminate\Database\Query\Builder|Bill onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Bill truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Bill withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Bill withoutTrashed()
 */
	class Bill extends \Eloquent {}
}

namespace Modules\SalesPurchaseOrders\Models\PurchaseOrder{
/**
 * Modules\SalesPurchaseOrders\Models\PurchaseOrder\ExtraParameter
 *
 * @property int $id
 * @property int $company_id
 * @property int $document_id
 * @property \Illuminate\Support\Carbon|null $expected_delivery_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model|null $purchase_order
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter newQuery()
 * @method static \Illuminate\Database\Query\Builder|ExtraParameter onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|ExtraParameter withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ExtraParameter withoutTrashed()
 */
	class ExtraParameter extends \Eloquent {}
}

namespace Modules\SalesPurchaseOrders\Models\PurchaseOrder{
/**
 * Modules\SalesPurchaseOrders\Models\PurchaseOrder\History
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property string $status
 * @property int $notify
 * @property string|null $description
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History newQuery()
 * @method static \Illuminate\Database\Query\Builder|History onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History purchase()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|History withTrashed()
 * @method static \Illuminate\Database\Query\Builder|History withoutTrashed()
 */
	class History extends \Eloquent {}
}

namespace Modules\SalesPurchaseOrders\Models\PurchaseOrder{
/**
 * Modules\SalesPurchaseOrders\Models\PurchaseOrder\Item
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property int|null $item_id
 * @property string $name
 * @property string|null $description
 * @property string|null $sku
 * @property float $quantity
 * @property float $price
 * @property float $tax
 * @property string $discount_type
 * @property float $discount_rate
 * @property float $total
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read string $discount
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $taxes
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item newQuery()
 * @method static \Illuminate\Database\Query\Builder|Item onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item purchase()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Item withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Item withoutTrashed()
 */
	class Item extends \Eloquent {}
}

namespace Modules\SalesPurchaseOrders\Models\PurchaseOrder{
/**
 * Modules\SalesPurchaseOrders\Models\PurchaseOrder\ItemTax
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property int $document_item_id
 * @property int $tax_id
 * @property string $name
 * @property float $amount
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Setting\Tax|null $tax
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax newQuery()
 * @method static \Illuminate\Database\Query\Builder|ItemTax onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax purchase()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|ItemTax withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ItemTax withoutTrashed()
 */
	class ItemTax extends \Eloquent {}
}

namespace Modules\SalesPurchaseOrders\Models\PurchaseOrder{
/**
 * Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property string $document_number
 * @property string|null $order_number
 * @property string $status
 * @property \Illuminate\Support\Carbon $issued_at
 * @property \Illuminate\Support\Carbon $due_at
 * @property float $amount
 * @property string $currency_code
 * @property float $currency_rate
 * @property int $category_id
 * @property int $contact_id
 * @property string $contact_name
 * @property string|null $contact_email
 * @property string|null $contact_tax_number
 * @property string|null $contact_phone
 * @property string|null $contact_address
 * @property string|null $contact_city
 * @property string|null $contact_zip_code
 * @property string|null $contact_state
 * @property string|null $contact_country
 * @property string|null $notes
 * @property string|null $footer
 * @property int $parent_id
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\SalesPurchaseOrders\Models\PurchaseOrder\Bill[] $bills
 * @property-read \App\Models\Setting\Category|null $category
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\SalesPurchaseOrders\Models\SalesPurchaseOrderDocument[] $converted_bills
 * @property-read \App\Models\Setting\Currency|null $currency
 * @property-read \Modules\SalesPurchaseOrders\Models\PurchaseOrder\ExtraParameter $extra_param
 * @property-read string $amount_due
 * @property-read string $amount_without_tax
 * @property-read string $attachment
 * @property-read string $billed_at
 * @property-read mixed $contact_location
 * @property-read string $discount
 * @property-read string $paid
 * @property-read mixed $received_at
 * @property-read int $reconciled
 * @property-read mixed $sent_at
 * @property-read string $status_label
 * @property-read mixed $template_path
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentHistory[] $histories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $item_taxes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItem[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Document\Document|null $parent
 * @property-read \App\Models\Common\Recurring|null $recurring
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentTotal[] $totals
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Banking\Transaction[] $transactions
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document accrued()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model billed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model delivery($date)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document due($date)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model exists()
 * @method static \Modules\SalesPurchaseOrders\Database\Factories\PurchaseOrder factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document latest()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model notBilled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document notPaid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document number(string $number)
 * @method static \Illuminate\Database\Query\Builder|Model onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document paid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model purchase()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|Model withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Model withoutTrashed()
 */
	class Model extends \Eloquent {}
}

namespace Modules\SalesPurchaseOrders\Models\PurchaseOrder{
/**
 * Modules\SalesPurchaseOrders\Models\PurchaseOrder\Total
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property string|null $code
 * @property string $name
 * @property float $amount
 * @property int $sort_order
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read mixed $title
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal code($code)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total newQuery()
 * @method static \Illuminate\Database\Query\Builder|Total onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total purchase()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Total withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Total withoutTrashed()
 */
	class Total extends \Eloquent {}
}

namespace Modules\SalesPurchaseOrders\Models\SalesOrder{
/**
 * Modules\SalesPurchaseOrders\Models\SalesOrder\ExtraParameter
 *
 * @property int $id
 * @property int $company_id
 * @property int $document_id
 * @property \Illuminate\Support\Carbon|null $expected_shipment_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Modules\SalesPurchaseOrders\Models\SalesOrder\Model|null $sales_order
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter newQuery()
 * @method static \Illuminate\Database\Query\Builder|ExtraParameter onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ExtraParameter truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|ExtraParameter withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ExtraParameter withoutTrashed()
 */
	class ExtraParameter extends \Eloquent {}
}

namespace Modules\SalesPurchaseOrders\Models\SalesOrder{
/**
 * Modules\SalesPurchaseOrders\Models\SalesOrder\History
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property string $status
 * @property int $notify
 * @property string|null $description
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History newQuery()
 * @method static \Illuminate\Database\Query\Builder|History onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History sales()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|History truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentHistory type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|History withTrashed()
 * @method static \Illuminate\Database\Query\Builder|History withoutTrashed()
 */
	class History extends \Eloquent {}
}

namespace Modules\SalesPurchaseOrders\Models\SalesOrder{
/**
 * Modules\SalesPurchaseOrders\Models\SalesOrder\Invoice
 *
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice newQuery()
 * @method static \Illuminate\Database\Query\Builder|Invoice onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Invoice truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Invoice withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Invoice withoutTrashed()
 */
	class Invoice extends \Eloquent {}
}

namespace Modules\SalesPurchaseOrders\Models\SalesOrder{
/**
 * Modules\SalesPurchaseOrders\Models\SalesOrder\Item
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property int|null $item_id
 * @property string $name
 * @property string|null $description
 * @property string|null $sku
 * @property float $quantity
 * @property float $price
 * @property float $tax
 * @property string $discount_type
 * @property float $discount_rate
 * @property float $total
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read string $discount
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $taxes
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item newQuery()
 * @method static \Illuminate\Database\Query\Builder|Item onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item sales()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Item truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItem type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Item withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Item withoutTrashed()
 */
	class Item extends \Eloquent {}
}

namespace Modules\SalesPurchaseOrders\Models\SalesOrder{
/**
 * Modules\SalesPurchaseOrders\Models\SalesOrder\ItemTax
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property int $document_item_id
 * @property int $tax_id
 * @property string $name
 * @property float $amount
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Setting\Tax|null $tax
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax newQuery()
 * @method static \Illuminate\Database\Query\Builder|ItemTax onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax sales()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|ItemTax truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentItemTax type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|ItemTax withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ItemTax withoutTrashed()
 */
	class ItemTax extends \Eloquent {}
}

namespace Modules\SalesPurchaseOrders\Models\SalesOrder{
/**
 * Modules\SalesPurchaseOrders\Models\SalesOrder\Model
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property string $document_number
 * @property string|null $order_number
 * @property string $status
 * @property \Illuminate\Support\Carbon $issued_at
 * @property \Illuminate\Support\Carbon $due_at
 * @property float $amount
 * @property string $currency_code
 * @property float $currency_rate
 * @property int $category_id
 * @property int $contact_id
 * @property string $contact_name
 * @property string|null $contact_email
 * @property string|null $contact_tax_number
 * @property string|null $contact_phone
 * @property string|null $contact_address
 * @property string|null $contact_city
 * @property string|null $contact_zip_code
 * @property string|null $contact_state
 * @property string|null $contact_country
 * @property string|null $notes
 * @property string|null $footer
 * @property int $parent_id
 * @property string|null $created_from
 * @property int|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Setting\Category|null $category
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Common\Contact|null $contact
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\SalesPurchaseOrders\Models\SalesPurchaseOrderDocument[] $converted_documents
 * @property-read \App\Models\Setting\Currency|null $currency
 * @property-read \Modules\SalesPurchaseOrders\Models\SalesOrder\ExtraParameter $extra_param
 * @property-read string $amount_due
 * @property-read string $amount_without_tax
 * @property-read string $attachment
 * @property-read mixed $contact_location
 * @property-read string $discount
 * @property-read string $invoiced_at
 * @property-read string $paid
 * @property-read mixed $received_at
 * @property-read int $reconciled
 * @property-read mixed $sent_at
 * @property-read string $status_label
 * @property-read mixed $template_path
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentHistory[] $histories
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\SalesPurchaseOrders\Models\SalesOrder\Invoice[] $invoices
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItemTax[] $item_taxes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentItem[] $items
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Media[] $media
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Document\Document|null $parent
 * @property-read \App\Models\Common\Recurring|null $recurring
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document\DocumentTotal[] $totals
 * @property-read \Plank\Mediable\MediableCollection|\App\Models\Banking\Transaction[] $transactions
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document accrued()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document due($date)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model exists()
 * @method static \Modules\SalesPurchaseOrders\Database\Factories\SalesOrder factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model flushCache(array $tags = [])
 * @method static \Plank\Mediable\MediableCollection|static[] get($columns = ['*'])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model invoiced()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document latest()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model notInvoiced()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document notPaid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document number(string $number)
 * @method static \Illuminate\Database\Query\Builder|Model onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document paid()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sales()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model shipment($date)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMedia($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document whereHasMediaMatchAll(array $tags)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMedia($tags = [], bool $matchAll = false, bool $withVariants = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariants($tags = [], bool $matchAll = false)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaAndVariantsMatchAll($tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Document withMediaMatchAll(bool $tags = [], bool $withVariants = false)
 * @method static \Illuminate\Database\Query\Builder|Model withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Model withoutTrashed()
 */
	class Model extends \Eloquent {}
}

namespace Modules\SalesPurchaseOrders\Models\SalesOrder{
/**
 * Modules\SalesPurchaseOrders\Models\SalesOrder\Total
 *
 * @property int $id
 * @property int $company_id
 * @property string $type
 * @property int $document_id
 * @property string|null $code
 * @property string $name
 * @property float $amount
 * @property int $sort_order
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Document\Document|null $document
 * @property-read mixed $title
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal bill()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal code($code)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal invoice()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total newQuery()
 * @method static \Illuminate\Database\Query\Builder|Total onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total sales()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Total truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|DocumentTotal type(string $type)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|Total withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Total withoutTrashed()
 */
	class Total extends \Eloquent {}
}

namespace Modules\SalesPurchaseOrders\Models{
/**
 * Modules\SalesPurchaseOrders\Models\SalesPurchaseOrderDocument
 *
 * @property int $id
 * @property int $company_id
 * @property int $document_id
 * @property int $item_id
 * @property string $item_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $item
 * @property-read \App\Models\Auth\User|null $owner
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument newQuery()
 * @method static \Illuminate\Database\Query\Builder|SalesPurchaseOrderDocument onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SalesPurchaseOrderDocument truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|SalesPurchaseOrderDocument withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SalesPurchaseOrderDocument withoutTrashed()
 */
	class SalesPurchaseOrderDocument extends \Eloquent {}
}

namespace Modules\WarehouseRoleManagement\Models{
/**
 * Modules\WarehouseRoleManagement\Models\InventoryItem
 *
 * @property int $id
 * @property int $company_id
 * @property int $item_id
 * @property float|null $opening_stock
 * @property float|null $opening_stock_value
 * @property float|null $reorder_level
 * @property string|null $barcode
 * @property int|null $vendor_id
 * @property string|null $created_from
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $sku
 * @property int|null $warehouse_id
 * @property int $default_warehouse
 * @property string|null $unit
 * @property int|null $returnable
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\History[] $histories
 * @property-read \Modules\Inventory\Models\History|null $history
 * @property-read \App\Models\Common\Item|null $item
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Inventory\Models\VariantValue[] $values
 * @property-read \Modules\Inventory\Models\Warehouse|null $warehouse
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem exists()
 * @method static \Modules\Inventory\Database\Factories\Item factory(...$parameters)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|InventoryItem onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|InventoryItem truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|InventoryItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|InventoryItem withoutTrashed()
 */
	class InventoryItem extends \Eloquent {}
}

namespace Modules\WarehouseRoleManagement\Models{
/**
 * Modules\WarehouseRoleManagement\Models\UserWarehouse
 *
 * @property int $user_id
 * @property int $warehouse_id
 * @property-read \App\Models\Common\Company|null $company
 * @property-read \App\Models\Auth\User|null $owner
 * @property-read \App\Models\Auth\User|null $user
 * @property-read \Modules\Inventory\Models\Warehouse|null $warehouse
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model account($accounts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model allCompanies()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collect($sort = 'name')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model collectForExport($ids = [], $sort = 'name', $id_field = 'id')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model companyId($company_id)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model contact($contacts)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model enabled()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isNotOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model isOwner()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model monthsOfYear($field)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserWarehouse onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model reconciled($value = 1)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model sortable($defaultParameters = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model source($source)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserWarehouse truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model usingSearchString()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @method static \Illuminate\Database\Query\Builder|UserWarehouse withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserWarehouse withoutTrashed()
 */
	class UserWarehouse extends \Eloquent {}
}

