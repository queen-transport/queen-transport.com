<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use App\Support\FileUploadCleanup;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageSettings extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected string $view = 'filament.pages.manage-settings';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $navigationLabel = 'Pengaturan';

    /**
     * @var array<string, mixed>
     */
    public ?array $data = [];

    public function mount(): void
    {
        $setting = Setting::current();

        $this->form->fill([
            'hero_video' => $setting->hero_video,
            'perawatan_video' => $setting->perawatan_video,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Video Halaman Utama')
                    ->description('Video yang tampil di hero dan bagian perawatan rutin pada halaman depan.')
                    ->components([
                        FileUpload::make('hero_video')
                            ->label('Video Hero')
                            ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/quicktime'])
                            ->disk('public')
                            ->directory('settings')
                            ->deleteUploadedFileUsing(FileUploadCleanup::deleteOnRemove()),
                        FileUpload::make('perawatan_video')
                            ->label('Video Perawatan Rutin')
                            ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/quicktime'])
                            ->disk('public')
                            ->directory('settings')
                            ->deleteUploadedFileUsing(FileUploadCleanup::deleteOnRemove()),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        Setting::current()->update($this->form->getState());

        Notification::make()
            ->title('Pengaturan disimpan')
            ->success()
            ->send();
    }
}
