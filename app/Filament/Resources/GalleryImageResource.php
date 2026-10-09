<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryImageResource\Pages;
use App\Models\GalleryImage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

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
                    ->disk('s3')
                    ->directory('uploads')
                    ->visibility('public')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('الصورة')
                    ->disk('s3')
                    ->circular(false),

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
