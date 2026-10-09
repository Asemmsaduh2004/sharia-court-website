<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryImageResource\Pages;
use App\Models\GalleryImage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Http;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class GalleryImageResource extends Resource
{
    protected static ?string $model = GalleryImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'معرض الصور';

    protected static ?string $modelLabel = 'صورة';

    protected static ?string $pluralModelLabel = 'معرض الصور';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('عنوان الصورة (اختياري)'),

                Forms\Components\Select::make('category')
                    ->label('التصنيف')
                    ->options([
                        'buildings' => 'المباني',
                        'facilities' => 'المرافق',
                        'tech' => 'التقنية',
                        'judiciary' => 'القضاء',
                    ])
                    ->required(),

                Forms\Components\FileUpload::make('image_path')
                    ->label('اختر الصورة من الجهاز')
                    ->image()
                    ->required()
                    ->saveUploadedFileUsing(function (TemporaryUploadedFile $file) {
                        // إرسال الصورة مباشرة إلى API ImgBB
                        $apiKey = env('IMGBB_API_KEY', '775b65c05f359ca31c23e947124bd690');
                        
                        $response = Http::asMultipart()->post("https://api.imgbb.com/1/upload?key={$apiKey}", [
                            'image' => base64_encode(file_get_contents($file->getRealPath())),
                        ]);

                        if ($response->successful() && isset($response->json('data')['url'])) {
                            return $response->json('data')['url'];
                        }

                        throw new \Exception('فشل رفع الصورة إلى ImgBB: ' . $response->body());
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('الصورة')
                    ->getUploadedFileUrlUsing(fn ($state) => $state), // لعرض رابط ImgBB المباشر في الجدول

                Tables\Columns\TextColumn::make('title')
                    ->label('العنوان')
                    ->default('بدون عنوان'),

                Tables\Columns\TextColumn::make('category')
                    ->label('التصنيف')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'buildings' => 'المباني',
                        'facilities' => 'المرافق',
                        'tech' => 'التقنية',
                        'judiciary' => 'القضاء',
                        default => $state,
                    }),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleryImages::route('/'),
            'create' => Pages\CreateGalleryImage::route('/create'),
            'edit' => Pages\EditGalleryImage::route('/{record}/edit'),
        ];
    }
}
