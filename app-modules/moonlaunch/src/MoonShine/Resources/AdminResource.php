<?php

declare(strict_types=1);

namespace Estivenm0\Moonlaunch\MoonShine\Resources;

use App\Models\User;
use Estivenm0\Moonlaunch\Traits\Properties;
use Illuminate\Validation\Rule;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Fields\Relationships\BelongsToMany;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Attributes\Icon;
use MoonShine\UI\Components\Badge;
use MoonShine\UI\Components\Collapse;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Flex;
use MoonShine\UI\Components\Tabs;
use MoonShine\UI\Components\Tabs\Tab;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Email;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Password;
use MoonShine\UI\Fields\PasswordRepeat;
use MoonShine\UI\Fields\Text;
use Sweet1s\MoonshineRBAC\Traits\WithRoleFormComponent;
use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;

#[Icon('s.user-group')]
/**
 * @extends ModelResource<User>
 */
class AdminResource extends ModelResource
{
    use Properties;
    use WithRoleFormComponent;
    use WithRolePermissions;

    protected string $model = User::class;

    public function __construct()
    {
        $this->title(__('moonlaunch::ui.resource.admins_title'))
            ->columnSelection()
            ->with(['roles'])
            ->column('name')
            ->isAsync(false);
    }

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {

        return [
            ID::make()->sortable(),

            //  Image::make(__('moonlaunch::ui.resource.avatar'), 'avatar')
            //     ->modifyRawValue(fn(?string $raw): string => $raw ?? ''),

            Text::make(__('moonlaunch::ui.resource.name'), 'name'),

            BelongsToMany::make(__('moonlaunch::ui.resource.role'), 'roles')
                ->inLine(
                    separator: ' ',
                    badge: fn ($model, $value) => Badge::make((string) $value, 'primary'),
                ),

            Email::make(__('moonlaunch::ui.resource.email'), 'email'),

            Date::make(__('moonlaunch::ui.resource.created_at'), 'created_at')
                ->format('d/M/Y')
                ->sortable(),
        ];
    }

    protected function formFields(): iterable
    {
        return [
            Box::make([
                Tabs::make([
                    Tab::make(__('moonlaunch::ui.resource.main_information'), [
                        ID::make()->sortable(),

                        Flex::make([
                            Text::make(__('moonlaunch::ui.resource.name'), 'name')
                                ->required(),

                            Email::make(__('moonlaunch::ui.resource.email'), 'email')
                                ->required(),
                        ]),

                        // Image::make(__('moonlaunch::ui.resource.avatar'), 'avatar')
                        //     ->disk(moonshineConfig()->getDisk())
                        //     ->dir('moonshine_users')
                        //     ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif']),

                        Flex::make([
                            Password::make(__('moonlaunch::ui.resource.password'), 'password')
                                ->customAttributes(['autocomplete' => 'new-password'])
                                ->eye(),

                            PasswordRepeat::make(__('moonlaunch::ui.resource.repeat_password'), 'password_repeat')
                                ->customAttributes(['autocomplete' => 'confirm-password'])
                                ->eye(),
                        ])->canSee(fn () => ! $this->item),

                        Date::make(__('moonlaunch::ui.resource.created_at'), 'created_at')
                            ->format('d.m.Y')
                            ->default(now()->toDateTimeString()),
                    ])->icon('user-circle'),

                    Tab::make(__('moonlaunch::ui.resource.password'), [
                        Collapse::make(__('moonlaunch::ui.resource.change_password'), [
                            Password::make(__('moonlaunch::ui.resource.password'), 'password')
                                ->customAttributes(['autocomplete' => 'new-password'])
                                ->eye(),

                            PasswordRepeat::make(__('moonlaunch::ui.resource.repeat_password'), 'password_repeat')
                                ->customAttributes(['autocomplete' => 'confirm-password'])
                                ->eye(),
                        ])->icon('lock-closed'),
                    ])->canSee(fn () => $this->item)
                        ->icon('lock-closed'),
                ]),
            ]),
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return $this->indexFields();
    }

    /**
     * @return array{name: array|string, moonshine_user_role_id: array|string, email: array|string, password: array|string}
     */
    protected function rules($item): array
    {
        return [
            'name' => 'required',
            'email' => [
                'sometimes',
                'bail',
                'required',
                'email',
                Rule::unique('users')->ignoreModel($item),
            ],
            'password' => $item->exists
                ? 'sometimes|nullable|min:6|required_with:password_repeat|same:password_repeat'
                : 'required|min:6|required_with:password_repeat|same:password_repeat',
        ];
    }

    protected function search(): array
    {
        return [
            'id',
            'name',
            'email',
        ];
    }

    protected function filters(): iterable
    {
        return [
            BelongsToMany::make(__('moonlaunch::ui.resource.role'), 'roles'),
        ];
    }
}
