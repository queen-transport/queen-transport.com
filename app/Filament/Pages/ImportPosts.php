<?php

namespace App\Filament\Pages;

use App\Support\WordPressPostImporter;
use BackedEnum;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Http\UploadedFile;
use UnitEnum;

class ImportPosts extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected string $view = 'filament.pages.import-posts';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowUpTray;

    protected static string|UnitEnum|null $navigationGroup = 'Blog';

    protected static ?string $navigationLabel = 'Import Artikel';

    /**
     * @var array<string, mixed>
     */
    public ?array $data = [];

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Import dari WordPress (WXR)')
                    ->description('Unggah file export XML WordPress (Tools → Export) untuk memasukkan artikelnya ke sini. Kategori dan tag yang belum ada akan dibuat otomatis.')
                    ->components([
                        FileUpload::make('file')
                            ->label('File XML')
                            ->acceptedFileTypes(['text/xml', 'application/xml'])
                            ->storeFiles(false)
                            ->required()
                            ->columnSpanFull(),
                        Checkbox::make('only_published')
                            ->label('Hanya artikel yang berstatus "Published"')
                            ->default(true),
                    ]),
            ])
            ->statePath('data');
    }

    public function import(): void
    {
        $state = $this->form->getState();

        /** @var UploadedFile $file */
        $file = $state['file'];

        $result = (new WordPressPostImporter)->import(
            $file->get(),
            authorId: auth()->id(),
            onlyPublished: (bool) $state['only_published'],
        );

        $this->form->fill();

        Notification::make()
            ->title('Import selesai')
            ->body(sprintf(
                '%d artikel diimpor, %d dilewati.%s',
                $result['imported'],
                $result['skipped'],
                $result['errors'] !== [] ? ' Error: '.implode('; ', $result['errors']) : '',
            ))
            ->success()
            ->send();
    }
}
